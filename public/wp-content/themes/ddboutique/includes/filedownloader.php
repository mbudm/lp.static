<?php
/*  Copyright 2010  webprodigy.ca (email : info@webprodigy.ca)
    This file is part of Download Protect.

    Download Protect is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    Download Protect is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Download Protect.  If not, see <http://www.gnu.org/licenses/>.

*/
class FileDownloader {
	
	private $allowed_referrer; //For hotlink protection
	private $file; //the file to download
	private $fname; //The file name
	private $fsize; //size of the file
	private $fext; //File extenstion
	private $mtype;
	private $log_downloads; //Whether or not to log downloads
	private $log_file = "downloads.log"; //Log file name
	private $allowed_ext = array (
	  // archives
	  'zip' => 'application/zip',
	
	  // documents
	  'pdf' => 'application/pdf',
	  'doc' => 'application/msword',
	  'xls' => 'application/vnd.ms-excel',
	  'ppt' => 'application/vnd.ms-powerpoint',
	  
	  // executables
	  'exe' => 'application/octet-stream',
	
	  // images
	  'gif' => 'image/gif',
	  'png' => 'image/png',
	  'jpg' => 'image/jpeg',
	  'jpeg' => 'image/jpeg',
	
	  // audio
	  'mp3' => 'audio/mpeg',
	  'wav' => 'audio/x-wav',
	
	  // video
	  'mpeg' => 'video/mpeg',
	  'mpg' => 'video/mpeg',
	  'mpe' => 'video/mpeg',
	  'mov' => 'video/quicktime',
	  'avi' => 'video/x-msvideo',
	  'wmv' => 'video/x-ms-wmv',
	  'mp4' => 'video/mp4'
	);
	
	public function __construct($file='', $rename='', $allowed='', $log=false) {
		@set_time_limit(0);
		$this->allowed_referrer = $allowed;
		$this->log_downloads = $log;
		$this->file = $file;
		$this->fname = basename($this->file);
		if($rename != '') $this->fname = str_replace(array('"',"'",'\\','/'), '', $rename);
		if ($this->fname === '') $this->fname = 'NoName';
		//Leech Protection
		if ($this->allowed_referrer !== '' && (!isset($_SERVER['HTTP_REFERER']) || strpos(strtoupper($_SERVER['HTTP_REFERER']),strtoupper($this->allowed_referrer)) === false)) die("Internal server error. Please contact system administrator.");
		
		if (!is_file($this->file)) die("File does not exist. Make sure you specified correct file name.");
		$this->fsize = filesize($this->file);
		$this->fext = strtolower(substr(strrchr($this->fname,"."),1));
		// check if allowed extension
		//if (!array_key_exists($this->fext, $this->allowed_ext)) die("Not allowed file type.");
		//$this->setMime();
		$this->mtype = 'application/force-download'; //As per popular request.
	}
	
	public function download() {
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Type: $this->mtype");
		header("Content-Disposition: attachment; filename=\"$this->fname\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . $this->fsize);
		// download
		// @readfile($file_path);
		$file = @fopen($this->file,"rb");
		if ($file) {
		  while(!feof($file)) {
		    print(fread($file, 1024*8));
		    flush();
		    if (connection_status()!=0) {
		      @fclose($file);
		      die();
		    }
		  }
		  @fclose($file);
		}
		
		// log downloads
		if (!$this->log_downloads) die();
		
		$f = @fopen($this->log_file, 'a+');
		if ($f) {
		  @fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']."  ".$this->fname."\n");
		  @fclose($f);
		}
	
	
	}
	
	private function setMime() {
		if ($this->allowed_ext[$this->fext] == '') {
	  		if (function_exists('mime_content_type')) $this->mtype = mime_content_type($this->file);
	  		else if (function_exists('finfo_file')) {
	  	  		$finfo = finfo_open(FILEINFO_MIME); // return mime type
	  	  		$this->mtype = finfo_file($finfo, $this->file);
	  	  		finfo_close($finfo);  
	  		}
	  	if ($this->mtype == '') $this->mtype = "application/force-download";
		}
		else {
		  // get mime type defined by admin
		  $this->mtype = $this->allowed_ext[$this->fext];
		}
	}	
	
	private function find_file ($dirname, $fname, &$file_path) {
	  $dir = opendir($dirname);
	
	  while ($file = readdir($dir)) {
	    if (empty($file_path) && $file != '.' && $file != '..') {
	      if (is_dir($dirname.'/'.$file)) {
	        find_file($dirname.'/'.$file, $fname, $file_path);
	      }
	      else {
	        if (file_exists($dirname.'/'.$fname)) {
	          $file_path = $dirname.'/'.$fname;
	          return;
	        }
	      }
	    }
	  }
	
	}

}
?>

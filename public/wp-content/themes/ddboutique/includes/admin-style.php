<?php header("Content-type: text/css"); ?>
#themesettings {position:relative;}
#themesettings #themesettings_nav{
	width:20%;
	float:left;
}
#themesettings #themesettings_nav li.init-active a{
	font-weight:bold;
}
#themesettings form{
	width:78%;float:right;
	display:none;
}
#themesettings form.init-active{
	display:block;
}
#themesettings form li{position:relative; padding-left:30%;}
#themesettings label{width:30%;position:absolute; left:0; top:0;}

#themesettings input[type="text"], #themesettings textarea, #themesettings small{width:60%;}
#themesettings small{display:block;}
#themesettings form li.cb label{position:relative;top:auto;right:auto;}
#themesettings form li.cb input{float:left;margin-right:0.5em;}

input.button-alert{
	border-color:#b22;
	background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #f60), color-stop(30%, #f00), color-stop(80%, #c00), color-stop(100%, #800));
  background-image: -webkit-linear-gradient(#f60, #f00 30%, #c00 80%, #800);
  background-image: -moz-linear-gradient(#f60, #f00 30%, #c00 80%, #800);
  background-image: -o-linear-gradient(#f60, #f00 30%, #c00 80%, #800);
  background-image: -ms-linear-gradient(#f60, #f00 30%, #c00 80%, #800);
  background-image: linear-gradient(#f60, #f00 30%, #c00 80%, #800);
}
input.button-alert:hover{
	border-color:#800;
	background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #f00), color-stop(30%, #c00), color-stop(80%, #800), color-stop(100%, #600));
  background-image: -webkit-linear-gradient(#f00, #c00 30%, #800 80%, #600);
  background-image: -moz-linear-gradient(#f00, #c00 30%, #800 80%, #600);
  background-image: -o-linear-gradient(#f00, #c00 30%, #800 80%, #600);
  background-image: -ms-linear-gradient(#f00, #c00 30%, #800 80%, #600);
  background-image: linear-gradient(#f00, #c00 30%, #800 80%, #600);
}
#themesettings form li,.form-field td, .form-field {
	position:relative;
}
input.color-picker,#themesettings input.color-picker{
	width:20%;
}
.fpicker{
	display:none;
	position:absolute;
	top:-90px;
	left:45%;
	z-index:100;
}
.form-field .fpicker{
	left:22%;
	top:-150px;
}

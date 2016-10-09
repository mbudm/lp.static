<?php header("Content-type: text/css; charset: UTF-8"); require( '../../../wp-load.php' ); require( 'includes/style_setup.php' );?>/* Reset */
html, body, div, span, applet, object, iframe,
h1,
h2, h2, h3, h4, h5, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}
body {
  line-height: 1.2;
}
ol, ul {
  list-style: none;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}

q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

/* clearfix */
.cfix:after,#content:after,section:after, aside:after,article:after,ul.three-cols:after,body.tax-mbudm_product_category ul#product-promo:after , #comments_template .comment:after{
  content: "\0020";
  display: block;
  height: 0;
  clear: both;
  overflow: hidden;
  visibility: hidden;
}
/* basic clear -for clear shortcode */
.clear{
	  clear: both;
}

/* html5 fixes */
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary {
  display: block;
}

/* hidden text intended for screen readers */
.accessibility {
  display: none;
}


/*
Rebuild 
*/

html, body {
  height: 100%;
}
body {
  font-family: '<?php echo $mb_body_text ?>',Tahoma,Arial,sans-serif;
  font-weight: 300;
  font-size: 100%;
  background: <?php echo $mb_body_bg . $mb_background_image_str; ?>;
  color: <?php echo $mb_bodyCol ?>;
}
#wrap {
  background: <?php echo $mb_content_bg ?>;
  
  margin: 0 auto;
  position: relative;
  height: auto !important;
  height: 100%;
  min-height: 100%;
  padding: 0 3%;
  min-width: 280px;
  -moz-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5) 0 0 20px;
  -webkit-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5) 0 0 20px;
  -o-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5) 0 0 20px;
  box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5) 0 0 20px;
  
  
}

/* default layout for below 480 - everything one column:

| - - - - .col1 - - - - |
| - - - - .col2 - - - - |
| - - - - .col3 - - - - |
| - - - - .col4 - - - - |
| - - - - .col5 - - - - |
| - - - - .col6 - - - - |
| - - - - .col7 - - - - |
| - - - - .col8 - - - - |
| - - - - .col9 - - - - |

*/

/* content fade */
.js #content {
  display: none;
}

/* 2 columns = 1 column*/
.col1 {
  min-width: 280px;
}

.col2 {
  min-width: 280px;
}

/* 3 columns = 1 column */
.col3, .col4, .col5 {
  min-width: 280px;
}

/* 2 cols 0.25/0.75 = 1 column */
.col6 , .col7, .col8, .col9{
  min-width: 280px;
}

/* handle .col 3, 4 or 5 as sub col of col7 */
.col7 .col3, .col7 .col4, .col7 .col5 {
  width: 100%;
  margin-left: 0;
}

/* Element base styles */
hr {
  border: none;
  height: 4px;
  background: <?php echo $mb_info_color_light ?>;
  clear: both;
}
section, aside{
  margin: 1em 0;
}
aside>hr{
	margin-bottom:1em;
}
/* for section shortcodes  - hide auto generated br */
section.via-shortcode>br{
	display:none;
}
section.via-shortcode{
	margin-top:0;
}
article{
  overflow:hidden;
  /* crop big images or other media elements in content */
}
h1, h2, h3{
  font-size: 1.5em;
  font-family: '<?php echo $mb_heading_text ?>',Georgia,Tahoma,Arial,sans-serif;
  color: <?php echo $mb_headingCol ?>;
  margin: 0;
  line-height: 1.5em;
}
h2 {
  font-size: 1.2em;
}
hr+h2{
	margin-top:0.7em;
}
h3, h4, h5 {
  font-size: 1.1em;
  color: <?php echo $mb_subHeadCol ?>;
  margin: 0.7em 0 0.3em;
  line-height: 1.3;
}
h4 {
  font-size: 1.05em;
}
h5 {
  font-size: 1em;
}
p {
  margin: 0 0 1em;
  line-height: 1.5em;
}
p:empty{
	margin:0;
}
p strong {
  color: <?php echo $mb_emCol ?>;
}
p em {
  color: <?php echo $mb_emCol ?>;
}
p, li, dt, dd, td, th {
  font-size: 0.9em;
}

small {
  font-size: 0.7em;
  margin: 0 0 0.3em;
  color: <?php echo $mb_info_color ?>;
}
q{
}
blockquote {
  position:relative;
  font-family: '<?php echo $mb_heading_text ?>',Georgia,Tahoma,Arial,sans-serif;
  padding:0 0.5em 0 1.8em;
  margin-bottom:1em;
  color: <?php echo $mb_info_color_shade ?>;
  line-height:1.5;
}
blockquote:before {
  content: '\201C ';
  font-size: 4em;
  line-height: 0.8em;
  font-family: Georgia,"Times New Roman", Times, serif;
  color: <?php echo $mb_info_color_tint ?>;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
}
blockquote:after {
  content: "\201E ";
  font-size: 4em;
  font-family: Georgia,"Times New Roman", Times, serif;
  color: <?php echo $mb_info_color_tint ?>;
  line-height: 0.1em;
  height: 1px;
  margin-top: -0.2em;
  vertical-align: top;
  display: inline-block;
}

/* nested elements - ensure font size remains consistent*/
li li, li dt, li dd, li td, li th {
  font-size: 1em;
}

/* links */
a {
  text-decoration: none;
  color: <?php echo $mb_linkCol ?>;
  background-color:transparent;
}
a:hover {
  color: <?php echo $mb_linkColHover ?>;
}
a:active {
  color: <?php echo $mb_linkColActive ?>;
}
a:visited {
  color: <?php echo $mb_linkColVisited ?>;
}
small a {
  color: <?php echo $mb_info_color_shade ?>;
  font-weight: bold;
}

/* article */
article>h1{
	margin-bottom:0.2em;
}
article ul{
	margin: 0 0 1em;
}
article ul li{
	padding-left:1.3em;
	position:relative;
	margin-bottom:0.5em;
}
article ul li:before {
  content: "\2014";
  font-weight: normal;
  font-size: 0.6em;
  position: absolute;
  left: 0;
  top: 0.2em;
}
article ol{
	margin-bottom:1em;
	list-style:decimal;
	margin-left:1em;
}
article ol li{
	padding-left:.3em;
	position:relative;
	margin-bottom:0.5em;
}

/* forms */
form ul li,article form ul li {
  padding: 0 0 0.5em 26%;
  position: relative;
}
article form ul li:before{
  content: "";
}
form ul li label {
  color: <?php echo $mb_subHeadCol ?>;
  font-size: 0.8em;
  display: block;
  width: 24%;
  position: absolute;
  top: 0.8em;
  left: 0;
  line-height: 1.3em;
}
form ul li label strong {
  font-weight: bold;
  font-size: 0.9em;
}
form ul li label small {
  display: block;
  font-size: 0.9em;
}
form ul li input[type="text"], form ul li input[type="password"], form ul li textarea {
  padding: 0.4em 2%;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  -khtml-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid <?php echo $mb_info_color_tint ?>;
  background: rgba(<?php echo $mb_content_bg_rgb_str ?>, 0.8);
  width: 95%;
  font-size: 0.9em;
}
form ul li select {
  width: 70%;
}
form ul li.cb{
	padding-bottom:1em;
}
form ul li.cb>label {
  position: relative;
  width: 96%;
}
form ul li.cb>label input {
	margin-right:0.5em;
}

form.f-compact label{display:none}
form.f-compact li.cb label{display:block}
form.f-compact li{padding:0;}
form.f-compact li.multiple input{display:inline;width:44%;}
form.f-compact p{margin:0 0 0.5em;}

/* tables */
#content table {
  width: 100%;
  margin: 0 0 2em;
}
#content table thead th{
	 font-weight: bold;
}
#content td, #content table tbody th {
  font-weight: 300;
}
#content td, #content th {
  border-bottom: 1px solid <?php echo $mb_info_color_light ?>;
  padding: 0.8em 0;
}
#content tr#noItems td {
  padding: 2em 0;
  font-size: 0.8em;
  color: <?php echo $mb_info_color_shade ?>;
  text-align: center;
}

/* alerts and errors */
.alerts, .errors {
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  -khtml-border-radius: 5px;
  border-radius: 5px;
  padding: 0.4em 0.8em;
  background: <?php echo $mb_sub_action_color ?>;
  color: <?php echo $mb_content_bg ?>;
  text-shadow: <?php echo $mb_sub_action_color_dark ?> 0 1px 2px;
}
.errors {
  background: <?php echo $mb_buy_color ?>;
  text-shadow: <?php echo $mb_buy_color_dark ?> 0 1px 2px;
}
.alerts a, .errors a,.alerts a:hover, .errors a:hover,.alerts a:visited, .errors a:visited{
	font-weight:bold;
	color: <?php echo $mb_content_bg ?>;
}
.alerts strong, .errors strong{
	font-weight:bold;
	color: <?php echo $mb_content_bg ?>;
}
.alerts h3{
	color:<?php echo $mb_sub_action_color_very_light ?>
}
.errors h3{
	color:<?php echo $mb_buy_color_very_light ?>
}
/* buttons */
a.buy-btn, a.info-btn, input.info-btn, .mbSelect, #comments_template a.comment-reply-link, a.submit-btn, input.submit-btn, button.submit-btn {
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  -khtml-border-radius: 5px;
  border-radius: 5px;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $mb_buy_color_light ?>), color-stop(30%, <?php echo $mb_buy_color_tint ?>), color-stop(80%, <?php echo $mb_buy_color ?>), color-stop(100%, <?php echo $mb_buy_color_dark ?>));
  background-image: -webkit-linear-gradient(<?php echo $mb_buy_color_light ?>, <?php echo $mb_buy_color_tint ?> 30%, <?php echo $mb_buy_color ?> 80%, <?php echo $mb_buy_color_dark ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_buy_color_light ?>, <?php echo $mb_buy_color_tint ?> 30%, <?php echo $mb_buy_color ?> 80%, <?php echo $mb_buy_color_dark ?>);
  background-image: -o-linear-gradient(<?php echo $mb_buy_color_light ?>, <?php echo $mb_buy_color_tint ?> 30%, <?php echo $mb_buy_color ?> 80%, <?php echo $mb_buy_color_dark ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_buy_color_light ?>, <?php echo $mb_buy_color_tint ?> 30%, <?php echo $mb_buy_color ?> 80%, <?php echo $mb_buy_color_dark ?>);
  background-image: linear-gradient(<?php echo $mb_buy_color_light ?>, <?php echo $mb_buy_color_tint ?> 30%, <?php echo $mb_buy_color ?> 80%, <?php echo $mb_buy_color_dark ?>);
  -moz-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 4px;
  -webkit-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 4px;
  -o-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 4px;
  box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 4px;
  text-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.8) 0px 0px 3px;
  border: 1px solid <?php echo $mb_buy_color ?>;
  border-bottom-color: <?php echo $mb_buy_color_very_dark ?>;
  border-top-color: <?php echo $mb_buy_color_light ?>;
  display: inline-block;
  border-radius: 4px;
  color: <?php echo $mb_content_bg ?>;
  font-weight: bold;
  font-size: 1.1em;
  padding: 0.5em 0.8em;
}
a.buy-btn:hover, a.info-btn:hover, input.info-btn:hover, .mbSelect:hover, #comments_template a.comment-reply-link:hover, a.submit-btn:hover, input.submit-btn:hover, button.submit-btn:hover {
  text-decoration: none;
  color: <?php echo $mb_content_bg ?>;
  -moz-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 1px;
  -webkit-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 1px;
  -o-box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 1px;
  box-shadow: rgba(<?php echo $mb_shadow_rgb_str ?>, 0.3) 1px 1px 1px;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $mb_buy_color_tint ?>), color-stop(30%, <?php echo $mb_buy_color ?>), color-stop(80%, <?php echo $mb_buy_color_shade ?>), color-stop(100%, <?php echo $mb_buy_color_very_dark ?>));
  background-image: -webkit-linear-gradient(<?php echo $mb_buy_color_tint ?>, <?php echo $mb_buy_color ?> 30%, <?php echo $mb_buy_color_shade ?> 80%, <?php echo $mb_buy_color_very_dark ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_buy_color_tint ?>, <?php echo $mb_buy_color ?> 30%, <?php echo $mb_buy_color_shade ?> 80%, <?php echo $mb_buy_color_very_dark ?>);
  background-image: -o-linear-gradient(<?php echo $mb_buy_color_tint ?>, <?php echo $mb_buy_color ?> 30%, <?php echo $mb_buy_color_shade ?> 80%, <?php echo $mb_buy_color_very_dark ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_buy_color_tint ?>, <?php echo $mb_buy_color ?> 30%, <?php echo $mb_buy_color_shade ?> 80%, <?php echo $mb_buy_color_very_dark ?>);
  background-image: linear-gradient(<?php echo $mb_buy_color_tint ?>, <?php echo $mb_buy_color ?> 30%, <?php echo $mb_buy_color_shade ?> 80%, <?php echo $mb_buy_color_very_dark ?>);
  cursor: pointer;
}
a.info-btn, input.info-btn, .mbSelect, #comments_template a.comment-reply-link {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $mb_info_color_light ?>), color-stop(30%, <?php echo $mb_info_color_tint ?>), color-stop(80%, <?php echo $mb_info_color ?>), color-stop(100%, <?php echo $mb_info_color_dark ?>));
  background-image: -webkit-linear-gradient(<?php echo $mb_info_color_light ?>, <?php echo $mb_info_color_tint ?> 30%, <?php echo $mb_info_color ?> 80%, <?php echo $mb_info_color_dark ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_info_color_light ?>, <?php echo $mb_info_color_tint ?> 30%, <?php echo $mb_info_color ?> 80%, <?php echo $mb_info_color_dark ?>);
  background-image: -o-linear-gradient(<?php echo $mb_info_color_light ?>, <?php echo $mb_info_color_tint ?> 30%, <?php echo $mb_info_color ?> 80%, <?php echo $mb_info_color_dark ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_info_color_light ?>, <?php echo $mb_info_color_tint ?> 30%, <?php echo $mb_info_color ?> 80%, <?php echo $mb_info_color_dark ?>);
  background-image: linear-gradient(<?php echo $mb_info_color_light ?>, <?php echo $mb_info_color_tint ?> 30%, <?php echo $mb_info_color ?> 80%, <?php echo $mb_info_color_dark ?>);
  border-color: <?php echo $mb_info_color ?>;
  border-bottom-color: <?php echo $mb_info_color_very_dark ?>;
  border-top-color: <?php echo $mb_info_color_light ?>;
  
}
a.info-btn:hover, input.info-btn:hover, .mbSelect:hover, #comments_template a.comment-reply-link:hover {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $mb_info_color_tint ?>), color-stop(30%, <?php echo $mb_info_color ?>), color-stop(80%, <?php echo $mb_info_color_shade ?>), color-stop(100%, <?php echo $mb_info_color_very_dark ?>));
  background-image: -webkit-linear-gradient(<?php echo $mb_info_color_tint ?>, <?php echo $mb_info_color ?> 30%, <?php echo $mb_info_color_shade ?> 80%, <?php echo $mb_info_color_very_dark ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_info_color_tint ?>, <?php echo $mb_info_color ?> 30%, <?php echo $mb_info_color_shade ?> 80%, <?php echo $mb_info_color_very_dark ?>);
  background-image: -o-linear-gradient(<?php echo $mb_info_color_tint ?>, <?php echo $mb_info_color ?> 30%, <?php echo $mb_info_color_shade ?> 80%, <?php echo $mb_info_color_very_dark ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_info_color_tint ?>, <?php echo $mb_info_color ?> 30%, <?php echo $mb_info_color_shade ?> 80%, <?php echo $mb_info_color_very_dark ?>);
  background-image: linear-gradient(<?php echo $mb_info_color_tint ?>, <?php echo $mb_info_color ?> 30%, <?php echo $mb_info_color_shade ?> 80%, <?php echo $mb_info_color_very_dark ?>);
}
a.submit-btn, input.submit-btn, button.submit-btn {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $mb_action_color_light ?>), color-stop(30%, <?php echo $mb_action_color_tint ?>), color-stop(80%, <?php echo $mb_action_color ?>), color-stop(100%, <?php echo $mb_action_color_dark ?>));
  background-image: -webkit-linear-gradient(<?php echo $mb_action_color_light ?>, <?php echo $mb_action_color_tint ?> 30%, <?php echo $mb_action_color ?> 80%, <?php echo $mb_action_color_dark ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_action_color_light ?>, <?php echo $mb_action_color_tint ?> 30%, <?php echo $mb_action_color ?> 80%, <?php echo $mb_action_color_dark ?>);
  background-image: -o-linear-gradient(<?php echo $mb_action_color_light ?>, <?php echo $mb_action_color_tint ?> 30%, <?php echo $mb_action_color ?> 80%, <?php echo $mb_action_color_dark ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_action_color_light ?>, <?php echo $mb_action_color_tint ?> 30%, <?php echo $mb_action_color ?> 80%, <?php echo $mb_action_color_dark ?>);
  background-image: linear-gradient(<?php echo $mb_action_color_light ?>, <?php echo $mb_action_color_tint ?> 30%, <?php echo $mb_action_color ?> 80%, <?php echo $mb_action_color_dark ?>);
  border-color: <?php echo $mb_action_color ?>;
  border-bottom-color: <?php echo $mb_action_color_very_dark ?>;
  border-top-color: <?php echo $mb_action_color_light ?>;
}
a.submit-btn:hover, input.submit-btn:hover, button.submit-btn:hover {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $mb_action_color_tint ?>), color-stop(30%, <?php echo $mb_action_color ?>), color-stop(80%, <?php echo $mb_action_color_shade ?>), color-stop(100%, <?php echo $mb_action_color_very_dark ?>));
  background-image: -webkit-linear-gradient(<?php echo $mb_action_color_tint ?>, <?php echo $mb_action_color ?> 30%, <?php echo $mb_action_color_shade ?> 80%, <?php echo $mb_action_color_very_dark ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_action_color_tint ?>, <?php echo $mb_action_color ?> 30%, <?php echo $mb_action_color_shade ?> 80%, <?php echo $mb_action_color_very_dark ?>);
  background-image: -o-linear-gradient(<?php echo $mb_action_color_tint ?>, <?php echo $mb_action_color ?> 30%, <?php echo $mb_action_color_shade ?> 80%, <?php echo $mb_action_color_very_dark ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_action_color_tint ?>, <?php echo $mb_action_color ?> 30%, <?php echo $mb_action_color_shade ?> 80%, <?php echo $mb_action_color_very_dark ?>);
  background-image: linear-gradient(<?php echo $mb_action_color_tint ?>, <?php echo $mb_action_color ?> 30%, <?php echo $mb_action_color_shade ?> 80%, <?php echo $mb_action_color_very_dark ?>);
}
.buy-btn em {
  font-size: 1.2em;
  font-style: normal;
  vertical-align: baseline;
  line-height: 0.5em;
  height: 0.5em;
}

/* tag list & category labels  */
.taglist{
	margin:1em 0;
}
.mb_product_cats {
  display: inline-block;
  font-size: 0.8em;
  font-family: Arial,sans-serif;
  font-weight: 300;
}
.mb_product_cats a,.mb_product_cats a:visited,.taglist a,.taglist a:visited{
  padding: 0.3em 0.4em 0.2em;
  -moz-border-radius: 0.4em;
  -webkit-border-radius: 0.4em;
  -o-border-radius: 0.4em;
  -ms-border-radius: 0.4em;
  -khtml-border-radius: 0.4em;
  border-radius: 0.4em;
  background: <?php echo $mb_info_color_light ?>;
  color: <?php echo $mb_content_bg ?>;
  text-shadow: rgba(<?php echo $mb_content_bg_rgb_str ?>, 0.5) 0 0 2px;
  margin-right:0.4em;
  display:inline-block;
  line-height:1.1em;
}
/* category colors */
<?php
foreach($cat_slugs_colors as $cat) { 
?>
.mb_product_cats a.mb_cat_<?php echo $cat['slug'] ?>,.mb_product_cats a.mb_cat_<?php echo $cat['slug'] ?>:visited{
	background-color:<?php echo $cat['col'] ?>;
	text-shadow: rgba(<?php echo hex2rgbstr(colourBrightness($cat['col'], -0.3)); ?>, 0.8) 0 0 3px;
	
}
.mb_product_cats a.mb_cat_<?php echo $cat['slug'] ?>:hover{
	/* lighter bg? */
	background-color:<?php echo colourBrightness($cat['col'], -0.1); ?>;
}
<?php
}
?>

/* widgets */
.widget {
  margin-bottom: 1em;
}
li.widget{
	font-size:1em;
}
.widget>h2{
margin-top: 0.2em;
}
.widget>h3{
margin-top: 0.2em;
font-size: 1.2em;
}
.widget ul {
  margin-top: 0.5em;
}
.widget li {
  background: transparent url("images/sprite-global.png") no-repeat 0 -300px;
  padding: 0 0 0.6em 1.5em;
  line-height: 1.4;
  font-size:0.9em;
}
.widget li li{
  font-size:1em;
}
article .widget li:before {
  content:'';
}
.widget li span.rss-date {
  color: <?php echo $mb_info_color ?>;
}
.widget li div.rssSummary {
  font-size: 1em;
}
.widget li cite {
  color: <?php echo $mb_info_color ?>;
  display: inline;
}
.widget li.current_page_item {
  font-weight: bold;
}
.widget-blank-msg {
  background: <?php echo $mb_info_color_very_light ?>;
  border:1px solid <?php echo $mb_info_color_light ?>;
  padding:0 0.5em 0.5em;
  margin-bottom:0.7em;
}
.widget-blank-msg p{
margin-bottom:0.3em;
}
.mb_widget_featured_products li {
  background: none;
  padding: 0;
}
#calendar-wrap {
  margin-top: 0.5em;
}
#content #wp-calendar caption {
  background: <?php echo $mb_info_color_shade ?>;
  color: <?php echo $mb_content_bg ?>;
  padding: 0.3em;
}
#content #wp-calendar th {
  background: <?php echo $mb_info_color_tint ?>;
  border-right: 1px solid <?php echo $mb_info_color_tint ?>;
  color: <?php echo $mb_info_color_dark ?>;
  padding: .6em .6em .4em .3em;
  text-align: right;
}
#content #wp-calendar tbody td {
  padding: .8em .6em .6em .3em;
  text-align: right;
  color: <?php echo $mb_info_color_dark ?>;
  position: relative;
  border-right: 1px solid <?php echo $mb_info_color_light ?>;
}
#content #wp-calendar tbody td a {
  color: <?php echo $mb_content_bg ?>;
  background: <?php echo $mb_action_color_shade ?>;
  -moz-border-radius: 0.3em;
  -webkit-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  -ms-border-radius: 0.3em;
  -khtml-border-radius: 0.3em;
  border-radius: 0.3em;
  width: 60%;
  padding: .6em 10% .4em 0;
  position: absolute;
  display: block;
  top: .2em;
  right: 0;
}
#content #wp-calendar tbody td a:hover {
  background: <?php echo $mb_action_color ?>;
}
#content #wp-calendar tbody td:first-child {
  border-left: 1px solid <?php echo $mb_info_color_light ?>;
}
#content #wp-calendar tfoot td {
  border-bottom: 1px solid <?php echo $mb_info_color_dark ?>;
}
#content #wp-calendar tfoot a {
  color: <?php echo $mb_info_color_dark ?>;
  font-size: 0.9em;
  padding: .4em 1em .4em;
  -moz-border-radius: 0.3em;
  -webkit-border-radius: 0.3em;
  -o-border-radius: 0.3em;
  -ms-border-radius: 0.3em;
  -khtml-border-radius: 0.3em;
  border-radius: 0.3em;
  background: <?php echo $mb_info_color_tint ?>;
}
#content #wp-calendar tfoot a:hover {
  background: <?php echo $mb_info_color ?>;
  color: <?php echo $mb_info_color_light ?>;
}
.widget_mb_text {
  font-size: 1.1em;
  line-height: 1.6;
}
.widget_mb_text div.inverted {
  color: <?php echo $mb_content_bg ?>;
  background-color: <?php echo $mb_info_color ?>;
  padding: 4%;
}

.widget_mb_text div.edged,.widget_mb_text div.edged-shaded {
	border:1px solid <?php echo $mb_info_color_light ?>;
	padding: 4%;
	/*
	  -moz-box-shadow: inset 0 0 3em 1em rgba(<?php echo $mb_content_bg_rgb_str ?>, 0.9);
  -webkit-box-shadow: inset 0 -5em 3em 1em rgba(<?php echo $mb_info_color_very_dark_rgb_str ?>, 0.9);
  -o-box-shadow: inset 0 -1em 3em 1em rgba(<?php echo $mb_info_color_very_dark_rgb_str ?>, 0.9);
  box-shadow: 0 0.2em 1.2em 0 rgba(<?php echo $mb_info_color_very_light_rgb_str ?>, 0.9);*/
}
.widget_mb_text div.shaded,.widget_mb_text div.edged-shaded {
 background-image: -webkit-linear-gradient(<?php echo $mb_info_color_very_light ?>  , <?php echo $mb_content_bg ?> 50%, <?php echo $mb_content_bg ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_info_color_very_light ?>, <?php echo $mb_content_bg ?> 50%, <?php echo $mb_content_bg ?>);
  background-image: -o-linear-gradient(<?php echo $mb_info_color_very_light ?>, <?php echo $mb_content_bg ?>  50%, <?php echo $mb_content_bg ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_info_color_very_light ?>, <?php echo $mb_content_bg ?>  50%, <?php echo $mb_content_bg ?>);
  background-image: linear-gradient(<?php echo $mb_info_color_very_light ?>, <?php echo $mb_content_bg ?> 50%, <?php echo $mb_content_bg ?>);
  padding: 4%;
 
  color: <?php echo $mb_info_color_dark ?>;
}
.widget_mb_text div.inverted.edged,.widget_mb_text div.inverted.edged-shaded {
	border-color:<?php echo $mb_info_color_dark ?>;
}
.widget_mb_text div.inverted.shaded,.widget_mb_text div.inverted.edged-shaded {
	 background-image: -webkit-linear-gradient(<?php echo $mb_info_color_shade ?>, <?php echo $mb_info_color ?> 50%, <?php echo $mb_info_color ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_info_color_shade ?>, <?php echo $mb_info_color ?> 50%, <?php echo $mb_info_color ?>);
  background-image: -o-linear-gradient(<?php echo $mb_info_color_shade ?>, <?php echo $mb_info_color ?>  50%, <?php echo $mb_info_color ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_info_color_shade ?>, <?php echo $mb_info_color ?>  50%, <?php echo $mb_info_color ?>);
  background-image: linear-gradient(<?php echo $mb_info_color_shade ?>, <?php echo $mb_info_color ?> 50%, <?php echo $mb_info_color ?>);
  padding: 4%;
  
  color: <?php echo $mb_content_bg ?>;
}

/* .widget_buy_promo / .widget_download_promo */
.widget_buy_promo h2.widgettitle, .widget_download_promo h2.widgettitle {
  text-transform: uppercase;
  font-size: 0.8em;
}
a.big-promo {
  display: block;
  position:relative;
  background-color: <?php echo $mb_action_color ?>;
  -moz-box-shadow: inset 0 -3em 6em 1em rgba(<?php echo $mb_shadow_rgb_str ?>, 0.2);
  -webkit-box-shadow: inset 0 -3em 6em 1em rgba(<?php echo $mb_shadow_rgb_str ?>, 0.2);
  -o-box-shadow: inset 0 -3em 6em 1em rgba(<?php echo $mb_shadow_rgb_str ?>, 0.2);
  box-shadow: inset 0 -3em 6em 1em rgba(<?php echo $mb_shadow_rgb_str ?>, 0.2);
  color: <?php echo $mb_action_color_very_dark ?>;
  font-weight: bold;
  line-height: 1.3;
  padding: 0.8em;
}
a.big-promo p, a.big-promo h3 {
	padding:0;
}
a.big-promo h3 {
  font-size: 1.6em;
  line-height: 1.3;
  margin: 0;
  color: <?php echo $mb_content_bg ?>;
}
a.big-promo h3 strong{
  color: <?php echo $mb_action_color_uber_dark ?>;
  display: block;
  font-weight: bold;
}
a.big-promo  .price {
  background: <?php echo $mb_content_bg ?>;
  color: <?php echo $mb_action_color_uber_dark ?>;
  -moz-border-radius: 1.2em;
  -webkit-border-radius: 1.2em;
  -o-border-radius: 1.2em;
  -ms-border-radius: 1.2em;
  -khtml-border-radius: 1.2em;
  border-radius: 1.2em;
  display: inline-block;
  padding: 0.5em 0.2em;
  font-size: 3em;
  float:right;
  line-height: 0.8em;
  vertical-align: bottom;
  -moz-box-shadow: 0 0 1em 0.2em rgba(<?php echo $mb_content_bg_rgb_str ?> , 0.9);
  -webkit-box-shadow: 0 0 1em 0.2em rgba(<?php echo $mb_content_bg_rgb_str ?> , 0.9);
  -o-box-shadow: 0 0 1em 0.2em rgba(<?php echo $mb_content_bg_rgb_str ?> , 0.9);
  box-shadow: 0 0 1em 0.2em rgba(<?php echo $mb_content_bg_rgb_str ?> , 0.9);
  
}
a.big-promo .curr-symbol { 
	font-weight:normal;
	font-size:0.9em;
	vertical-align:top;
}
a.big-promo .cs-after{
	font-size:0.7em;
}
a.big-promo .price-whole{
font-size:1.2em;
}
a.big-promo .price-fraction{
  font-size: 0.5em;
  vertical-align: top;
  padding-bottom:0.5em;
}
a.big-promo  .currency {
font-size: 0.3em;
line-height: 0;
display: block;
text-align: center;
padding-top: 0.8em;
}
a.big-promo .clause {
	color: <?php echo $mb_action_color_very_dark ?>;
	font-size: 0.85em;
	font-weight:bold;
	display: block;
	width: auto;
	text-align: right;
	position:absolute;
	right:1em;
	bottom:0.4em;
}
a.big-promo p {
  font-weight: bold;
  font-size: 1.1em;
  margin: 0;
}
a.big-promo:hover {
  text-decoration: none;
  background-color: <?php echo $mb_action_color_light ?>;
}
/* download promo */
.widget_download_promo a.big-promo {
  background-color: <?php echo $mb_sub_action_color ?>;
  padding: 0.8em;
}
.widget_download_promo a.big-promo:hover {
  background-color: <?php echo $mb_sub_action_color_shade ?>;
}
.widget_download_promo a.big-promo p {
  font-weight: normal;
  margin: 0;
  color: <?php echo $mb_sub_action_color_light ?>;
 /* text-shadow: rgba(<?php echo $mb_sub_action_color_light_rgb_str ?>, 1) 0 0 .5em;*/
}
.widget_download_promo a.big-promo:hover p{
   color: <?php echo $mb_sub_action_color_very_light ?>;
}
.widget_download_promo a.big-promo h3{
  text-align: center;
  margin: 0.1em 0;
  line-height: 1.2;
  text-shadow: rgba(<?php echo $mb_content_bg_rgb_str ?>, 1) 0 0 2em;
}
.widget_download_promo a.big-promo h3:hover, .widget_download_promo a.big-promo h4:hover, .widget_download_promo a.big-promo h5:hover {
  color: <?php echo $mb_content_bg ?>;
}
/* mb recent comments */
.widget_mb_recent_comments {
  border: 3px solid <?php echo $mb_info_color ?>;
}
#recent-comments{
  padding: 4% 4% 0 4%;
}
.widget_mb_recent_comments h2 {
  margin: 0;
}
.widget_mb_recent_comments li {
  margin-bottom: 0.5em;
  position: relative;
  padding-left: 2em;
  background: none;
}
.widget_mb_recent_comments li a {
  padding: 0.5em 0 0;
  display: block;
  line-height: 1.5em;
}
.widget_mb_recent_comments li a:before {
  content: '\201C ';
  font-size: 4em;
  line-height: 1em;
  font-family: Georgia,"Times New Roman", Times, serif;
  color: <?php echo $mb_info_color_tint ?>;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
}
.widget_mb_recent_comments li a:after {
  content: "\201E ";
  font-size: 4em;
  font-family: Georgia,"Times New Roman", Times, serif;
  color: <?php echo $mb_info_color_tint ?>;
  line-height: 0.1em;
  height: 1px;
  margin-top: -0.2em;
  vertical-align: top;
  display: inline-block;
}
/* mb recent posts */
.widget_mb_recent_posts ul li {
  margin-top: 0.7em;
  line-height: 1;
  padding: 0;
  background: none;
  position: relative;
}
.widget_mb_recent_posts ul.no_dates li {
  margin: 0;
  position: relative;
  padding: 0.3em 0 0.3em 1.2em;
}
.widget_mb_recent_posts ul.no_dates li:before {
  content: "\2014";
  font-weight: normal;
  font-size: 0.8em;
  position: absolute;
  left: 0;
  top: 0.3em;
}
.widget_mb_recent_posts li.active a {
  font-weight: bold;
  color: <?php echo $mb_info_color_dark ?>;
}
.widget_mb_recent_posts ul.no_dates li.more {
  margin-top: 0.8em;
  padding-left: 0;
}
.widget_mb_recent_posts ul.no_dates li.more:before {
  content: none;
}
.widget_mb_recent_posts li.more a {
  background: <?php echo $mb_content_bg ?> url("images/sprite-global.png") no-repeat 0 -300px;
  padding: 0.1em 0 0.5em 1.2em;
  font-weight: bold;
}
.widget_mb_recent_posts li div {
  color: <?php echo $mb_info_color ?>;
  font-style: normal;
  display: inline-block;
  width: 7em;
}
.widget_mb_recent_posts ul.show_dates li.more a {
  margin-left: 5.8em;
}
.widget_mb_recent_posts ul.show_dates li {
  padding-left: 0;
}
/* side nav - widgets*/
#side-nav h2{
	margin: 0 0 0.7em;
}
#side-nav h3 a,#side-nav h3 a:visited{
	 color: <?php echo $mb_info_color_shade ?>;
	 font-size:.9em;
}
#side-nav h3, #side-nav h4, #side-nav h5 {
  margin: 0;
}
#side-nav ul {
  margin: 0.3em 0 1.3em;
}
#side-nav ul li {
  background: none;
  font-size: 0.8em;
  margin: 0;
  position: relative;
  padding: 0.3em 0 0.3em 1.2em;
}
#side-nav ul li:before {
  content: "\2014";
  font-weight: normal;
  font-size: 0.8em;
  position: absolute;
  left: 0;
  top: 0.4em;
}
#side-nav li.active > a, #side-nav h3.active, #side-nav h4.active, #side-nav h5.active {
  font-weight: bold;
}
/* mb products list widget */
.mb_widget_products_list li {
  padding: 0;
  background: none;
}
/* Mailing list forms widget */
.widget_mb_mailing_list p {
  margin: 0;
}
.widget_mb_mailing_list ul li {
  background: none;
  padding:0;
  margin-bottom:0.5em;
}
.widget_mb_mailing_list label {
  display: none;
}
/*
.widget_mb_mailing_list input#username {
  width: 185px;
}
.widget_mb_mailing_list input#useremail {
  width: 185px;
}
*/
.widget_mb_mailing_list input#username,.widget_mb_mailing_list input#useremail {
width:90%;}

/* Sidebars */
/* clear both columns */
#sidebar-home-bottom {
  clear: both;
}
hr+#sidebar-home-bottom{
margin-top:1em;
}

/* tooltip - qtip */
.qtip-content figcaption {
  padding: 0.6em;
  margin: 0.8em;
  font-size: 0.9em;
  background: <?php echo $mb_content_bg ?>;
  background-color: rgba(<?php echo $mb_content_bg_rgb_str ?>, 0.95);
  -moz-box-shadow: 0 0 1em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  -webkit-box-shadow: 0 0 1em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  -o-box-shadow: 0 0 1em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  box-shadow: 0 0 1em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  display: block;
  line-height: 1.2em;
}
.qtip-content figcaption h3, .qtip-content figcaption h4, .qtip-content figcaption h5, .qtip-content figcaption p {
  margin: 0;
}
.qtip-content figcaption .mb_product_cats {
  display: none;
}

/* header */
header {
  padding-top:1.5em;/* matches height of nav-top */
  height: <?php echo $mb_logo_small_height ?>;
  border-bottom: 4px solid <?php echo $mb_header_line ?>;
  position: relative;
}
header h1 a, header h2 a {
  display: block;
  width: <?php echo $mb_logo_small_width ?>;
  height: <?php echo $mb_logo_small_height ?>;
  background: <?php echo $mb_content_bg ?> url("<?php echo $mb_logo_small ?>") no-repeat 0 0;
  text-indent: -9000px;
}
header h2 {
  display: none;
}
/* nav (main) */
nav#access, #nav-top {
  position: absolute;
}
nav#access {
  right: 0;
  top: <?php echo $mb_navpos_small ?>;
  width: auto;
  text-align: right;
}
nav#access ul {
  margin: 0;
  padding: 0;
  border: 0;
}
nav#access ul li {
  list-style-image: none;
  list-style-type: none;
  margin-left: <?php echo $mb_navitem_space_small ?>;
  white-space: nowrap;
  display: inline-block;
  float: left;
  padding: 0;
  position:relative;
}
nav#access ul li:first-child, nav#access ul li.first {
  margin-left:0;
}
nav#access li a {
  font-size: 0.9em;
  color: <?php echo $mb_info_color_tint ?>;
  position:relative;
}
nav#access li a:hover {
  color: <?php echo $mb_info_color ?>;
  text-decoration: none;
}
nav#access li a div.mm_on{
	width:1.4em;
	height:0.8em;
	position:relative;
	display:inline;
	margin-left:0.3em;
}
nav#access li a span.menu_meta{
	color:<?php echo $mb_content_bg ?>;
	font-size:0.7em;
	text-align:center;
	height:1em;
	padding:0.2em 0.55em;
	border-radius:0.8em;
	background: <?php echo $mb_buy_color_tint ?>;
}
nav#access li a div.mm_off{
	display:none;
}
/* selected states - include sub pages for products, news and downloads */
nav#access li.current-menu-item a,
nav#access li.current-menu-item a:hover,
nav#access li.current-menu-item a:visited{
  color: <?php echo $mb_info_color_very_dark ?>;
}

/* submenu hidden by js */
nav#access li ul.sub-menu {
  display: none;
  position:absolute;
  top:2em;
  left:-0.6em;
  z-index:100;
  background: <?php echo $mb_content_bg ?>;
  background-color: rgba(<?php echo $mb_content_bg_rgb_str ?>, 0.95);
  -moz-box-shadow: 0 0 1em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  -webkit-box-shadow: 0 0 1em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  -o-box-shadow: 0 0 1em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  box-shadow: 0 0.3em 0.4em 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.2);
}
nav#access li ul.sub-menu li{
	display:block;
	text-align:left;
	float:none;
	margin-left:0;
	padding:0.4em 2em 0.6em 0.7em;
	font-size:0.8em;
}
nav#access li ul.sub-menu li a {
  color: <?php echo $mb_info_color_shade ?>;
}
nav#access li ul.sub-menu li a:hover {
  color: <?php echo $mb_info_color_very_dark ?>;
}

/* nav top */
#nav-top {
  left: 0;
  top: 0;
  background-color: <?php echo $mb_info_color_tint ?>;
  text-align: right;
  width: 100%;
  height:1.5em;
}
#nav-top li {
  display: inline;
  padding:0.2em 0  0;
}
#nav-top li a {
  padding: 0 1em;
  border-left: 1px solid <?php echo $mb_content_bg ?>;
  font-size: 0.8em;
}
#nav-top li:first-child a {
  border: none;
}
#nav-top a, #nav-top a:hover, #nav-top a:visited {
  color: <?php echo $mb_content_bg ?>;
}

/* content  */
#content { 
  margin: 1em 0;
  position: relative;
  padding-bottom: 5em; /* for footer */
}

/* footer */
footer {
  position: absolute;
  bottom: 0;
  height: 3.5em;
  margin: 0;
  padding: 1.5em 0 0;
  background-color: <?php echo $mb_info_color_very_dark ?>;
  display: block;
  width: 94%;
  font-size: 0.75em;
}
footer nav ul, footer div.menu ul {
  padding: 0 0 0.5em 1em;
  margin: 0;
}
footer nav li, footer div.menu li {
  display: inline;
  padding: 0 0 0 1em;
  border-left: 1px solid <?php echo $mb_info_color_shade ?>;
  margin-left:0.7em;
  font-size: 1em;
}
footer nav li:first-child, footer div.menu li:first-child {
  border: none;
  margin: 0;
}
footer a, footer a:hover, footer a:visited {
  color: <?php echo $mb_info_color_very_light ?>;
}
footer small {
  color: <?php echo $mb_info_color_tint ?>;
  padding-left: 1em;
  display: inline-block;
  font-size: 1em;
}

footer small #creditlink{
	padding-left:1em;
}
/* Product Promo */
ul#product-promo.simple_cycle {
  position: relative;
  width: 100%;
  height: 280px;
  margin-bottom: 20px;
}
ul#product-promo.simple_cycle li {
  top: 0;
  left: 0;
  width: 100%;
  height: 280px;
}
ul#product-promo.simple_cycle .product-holder {
  width: 280px;
  height: 280px;
}
ul#product-promo.simple_cycle .product-holder img.attachment-product-large {
  display: none;
}
.product-holder {
  display: table;<?php if(!$hide_product_shadow){ ?>
  background-image: -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 70, color-stop(50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0.1)), color-stop(70%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0)));
  background-image: -webkit-radial-gradient(50% 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0.1) 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0) 70%);
  background-image: -moz-radial-gradient(50% 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0.1) 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0) 70%);
  background-image: -o-radial-gradient(50% 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0.1) 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0) 70%);
  background-image: -ms-radial-gradient(50% 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0.1) 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0) 70%);
  background-image: radial-gradient(50% 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0.1) 50%, rgba(<?php echo $mb_shadow_rgb_str ?>, 0) 70%);<?php } // end if not hide prod shadow ?>
  margin: 0 auto;
  position: relative;
}
.vframe {
  display: table-cell;
  vertical-align: middle;
}
.product-holder a, .product-holder .vframe div{
  display: block;
  text-align: center;
  padding:0.5em;
}
.product-holder a img, .product-holder a span, .product-holder div span {<?php if(!$hide_product_shadow){ ?>
  -moz-box-shadow: 0 0 10px 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  -webkit-box-shadow: 0 0 10px 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  -o-box-shadow: 0 0 10px 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);
  box-shadow: 0 0 10px 0 rgba(<?php echo $mb_shadow_rgb_str ?>, 0.5);<?php } // end if not hide prod shadow ?>
}
.product-holder a span, .product-holder .vframe div span{
  display: inline-block;
  background: <?php echo $mb_info_color_light ?>;
  border: 3px solid <?php echo $mb_content_bg ?>;
  color: <?php echo $mb_info_color_tint ?>;
  font-size: 1em;
  padding: 4em 0.5em 4em;
  width: 50%;
}
#product-promo-wrapper {
  width: 100%;
}
#product-promo-wrapper a.navitem {
  background: transparent url("images/sprite-global.png") no-repeat 0 0px;
  text-indent: 9000px;
  display: block;
  position: absolute;
  width: 50px;
  height: 100px;
  top: 45px;
  right: 0;
  cursor: pointer;
}
#product-promo-wrapper a.navitem:hover {
 opacity: 0.7;
}
#product-promo-wrapper #pp_prev {
  background-position: -50px 0;
  left: 0;
  right: auto;
}
#product-promo-wrapper a.disabled {
  opacity: 0.3;
  cursor: default;
}
#product-promo-wrapper .slider-content {
  overflow: hidden;
  width: 280px;
  margin: 0 auto;
  height: auto;
}
#product-promo-wrapper .slider-content ul#product-promo {
  margin: 0;
  display: inline-block;
  white-space: nowrap;
}
#product-promo-wrapper .slider-content ul#product-promo > li {
  display: inline-block;
  width: 280px;
  height: auto;
  margin-right: 20px;
  vertical-align: top;
}
#product-promo-wrapper .slider-content ul#product-promo li.last {
  margin-right: 0;
}
#product-promo-wrapper .slider-content ul#product-promo .product-holder {
  width: 280px;
  height: 280px;
  position: relative;
  z-index: 2;
}
ul#product-promo .product-info {
  border: 1px solid <?php echo $mb_info_color_tint ?>;
  padding: 140px 10px 3.2em;
  margin-top: -140px;
  white-space: normal;
  position: relative;
  background: <?php echo $mb_content_bg ?>;
  height: auto;
}
ul#product-promo .product-info h2 {
  margin-bottom: 0;
  font-size: 1.2em;
}
ul#product-promo .product-info p {
  line-height: 1.4em;
  margin: 0 0 0.4em;
}
#content .product-info table {
  margin: 0.7em 0 0.4em;
}
#content .product-info th, #content .product-info td {
  line-height: 1.5em;
  /* same vertical spacing as p */
  padding: 0.3em 0;
  border: none;
  vertical-align:top;
}
#content .product-info th {
  font-weight: bold;
  padding-right: 1em;
  vertical-align:top;
}
#content #product-promo .product-info th, #content #product-promo .product-info td {
  font-size: 0.75em;
}
/* product buttons */
ul#product-promo .product-info ul {
  position: absolute;
  top: auto;
  bottom: 0.9em;
  height: 2em;
}
ul#product-promo .product-info ul li {
  display: inline;
  float: left;
  margin-left: 0.7em;
}
ul#product-promo .product-info ul li:first-child {
  margin: 0;
}
ul#product-promo .product-info ul li a {
  font-size: 0.9em;
}
ul.three-cols li>a {
  display: inline-block;
  padding: 0.3em 0 0.7em 1.3em;
  background: transparent url("images/sprite-global.png") no-repeat 0 -297px;
  line-height: 1.2em;
}
ul.three-cols li a .mb_product_cats {
  margin-left: 0;
  display: inline;
}
ul.three-cols li.col3{
	clear:left;
}


/* Mobile minimiser */
.minimiser {
  padding: 0.3em .5em .5em;
  margin: 0.5em  0;
}
.minTrigger {
  background: transparent url("images/sprite-global.png") no-repeat 0 -597px;
  padding-left: 20px;
  display: inline-block;
  font-size: 0.9em;
  margin-top: 0.2em;
  color: <?php echo $mb_linkCol ?>;
}
.minimiser .hidden{
	display:none;
}
.minIsOpen .minTrigger {
  background-position: 0 -697px;
}
.minIsOpen {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $mb_content_bg ?>), color-stop(10%, <?php echo $mb_info_color_very_light ?>), color-stop(100%, <?php echo $mb_info_color_tint ?>));
  background-image: -webkit-linear-gradient(<?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?> 10%, <?php echo $mb_info_color_tint ?>);
  background-image: -moz-linear-gradient(<?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?> 10%, <?php echo $mb_info_color_tint ?>);
  background-image: -o-linear-gradient(<?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?> 10%, <?php echo $mb_info_color_tint ?>);
  background-image: -ms-linear-gradient(<?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?> 10%, <?php echo $mb_info_color_tint ?>);
  background-image: linear-gradient(<?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?> 10%, <?php echo $mb_info_color_tint ?>);
  -moz-border-radius-bottomleft: 0.5em;
  -webkit-border-bottom-left-radius: 0.5em;
  -o-border-bottom-left-radius: 0.5em;
  -ms-border-bottom-left-radius: 0.5em;
  -khtml-border-bottom-left-radius: 0.5em;
  border-bottom-left-radius: 0.5em;
  -moz-border-radius-bottomright: 0.5em;
  -webkit-border-bottom-right-radius: 0.5em;
  -o-border-bottom-right-radius: 0.5em;
  -ms-border-bottom-right-radius: 0.5em;
  -khtml-border-bottom-right-radius: 0.5em;
  border-bottom-right-radius: 0.5em;
}

/* Template specific CSS */

/* product-detail page */
body.single-mbudm_product .product-holder {
  height: 280px;
  width: 280px;
  margin-bottom: 1em;
}
body.single-mbudm_product .product-info {
  margin-bottom: 1em;
}
/*buttons */
body.single-mbudm_product .product-info ul li a {
  width: 205px;
  padding: 0.8em 0;
  text-align: center;
  margin: 0.8em 0 0;
}
body.single-mbudm_product .product-info ul li small {
  color:$mb_info_color_shade;
  font-size:0.9em;
  display:block;
  padding:0.3em 0 0.6em;
}
body.single-mbudm_product article {
  clear: both;
}

/* product category page */
body.tax-mbudm_product_category ul#product-promo > li {
  display: inline-block;
  height: auto;
  vertical-align: top;
}
body.tax-mbudm_product_category ul#product-promo .product-holder {
  height: 205px;
  position: relative;
  z-index: 2;
}
body.tax-mbudm_product_category ul#product-promo .product-info {
  padding-bottom: 5em;
  padding-left: 10px;
  padding-right: 10px;
}
/*buttons */
body.tax-mbudm_product_category ul#product-promo .product-info ul {
  height: 4.2em;
  display: block;
  bottom: 0.7em;
}
body.tax-mbudm_product_category ul#product-promo .product-info ul li {
  display: block;
  float: none;
  margin: 0.4em 0 0;
}
body.tax-mbudm_product_category ul#product-promo .product-info ul li:first-child {
  margin: 0;
}
body.tax-mbudm_product_category ul#product-promo .product-info ul li a {
  font-size: 0.8em;
  width: 181px;
  /*4px for border on product-info an on button */
  text-align: center;
  padding-left: 0;
  padding-right: 0;
}

/* downloads page */
#category-select{
	display:block;
	text-align:left;
	font-size:13px;
	height:17px;
	line-height:13px;
	border-bottom:4px solid <?php echo $mb_info_color_light ?>;
	white-space:nowrap;
}
#category-select dt, #category-select dd{display:inline;}
#category-select dd{padding-left:0.5em;font-size:1em;}
#category-select a,#category-select a:visited{
	color:<?php echo $mb_info_color_shade ?>;
	background:<?php echo $mb_info_color_very_light ?>;
	border-radius:0.3em 0.3em 0 0;
	padding:4px 0.5em 3px;
}
#category-select a.active{
	font-weight:bold;
	background:<?php echo $mb_content_bg ?>;
	color:<?php echo $mb_info_color_dark ?>;
	border:1px solid <?php echo $mb_info_color_light ?>;
	border-bottom:none;
	padding-bottom:7px;
}
body.page-template-mb_downloads-php section .col4 h3, body.page-template-mb_downloads-php section .col4 h4, body.page-template-mb_downloads-php section .col4 h5, body.page-template-mb_downloads-php section .col5 h3, body.page-template-mb_downloads-php section .col5 h4, body.page-template-mb_downloads-php section .col5 h5 {
  color: <?php echo $mb_info_color_tint ?>;
  text-align: center;
}
body.page-template-mb_downloads-php .product-info {
  padding: 0;
  background: none;
  border: none;
}
body.page-template-mb_downloads-php .product-holder {
  width: 205px;
  height: 205px;
  margin-bottom: 0.4em;
}
body.page-template-mb_downloads-php .col3, body.page-template-mb_downloads-php .col4, body.page-template-mb_downloads-php .col5 {
  padding-bottom: 0.5em;
}
body.page-template-mb_downloads-php section .col4, body.page-template-mb_downloads-php section .col5 {
  text-align: center;
}

/* download detail page */
body.single-mbudm_download .product-holder {
  width:280px;
  height: 280px;
  margin-bottom: 1em;
}
body.single-mbudm_download .product-info {
  margin-bottom: 1em;
}
body.single-mbudm_download article {
  clear: both;
}
body.single-mbudm_download section#download-actions{
	margin-top:0;	
}

body.single-mbudm_download section#upgrade-promo{
	border-top:4px solid <?php echo $mb_info_color_light ?>;
	/*
	background-image: -webkit-linear-gradient( 0deg, <?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?>);
	background-image: -moz-linear-gradient(0deg, <?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?>);
	background-image: -o-linear-gradient(0deg, <?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?>);
	background-image: -ms-linear-gradient(0deg, <?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?>);
	background-image: linear-gradient(0deg,<?php echo $mb_content_bg ?>, <?php echo $mb_info_color_very_light ?>);
	*/
	
	background-image: -webkit-linear-gradient(<?php echo $mb_info_color_very_light ?>, <?php echo  $mb_content_bg ?> 5% , <?php echo $mb_content_bg ?> 95% ,<?php echo $mb_info_color_very_light ?>);
	
	
	margin-bottom:0;
}
body.single-mbudm_download section#upgrade-promo+section{
	margin-top:0;
}
body.single-mbudm_download section#upgrade-promo h2{
	margin:0.7em 0 0.3em;
}
body.single-mbudm_download section#upgrade-promo ul li {
	display: inline;
	float: left;
	margin-right: 0.7em;
	padding-bottom: 0.7em;
}
body.single-mbudm_download section#upgrade-promo .product-holder{
	width:205px;
	height:205px;
	float:right;
	margin:0;
}

/* checkout page */
body.mbudm_incontext{
	display:none;
}
section#checkout {
  border-top: 4px solid <?php echo $mb_info_color_light ?>;
  position:relative;
}
#checkout form#addProduct {
  display: inline-block;
  float: right;
}
#checkout form#addProduct input {
  display: none;
}
#checkout form#addProduct select, #checkout form#addProduct .mbSelect {
  width: 260px;
}
/* custom select box */
.mbSelect {
  position: relative;
   -moz-border-radius-topleft: 0;
  -webkit-border-top-left-radius: 0;
  -o-border-top-left-radius: 0;
  -ms-border-top-left-radius: 0;
  -khtml-border-top-left-radius: 0;
  border-top-left-radius: 0;
  -moz-border-radius-topright: 0;
  -webkit-border-top-right-radius: 0;
  -o-border-top-right-radius: 0;
  -ms-border-top-right-radius: 0;
  -khtml-border-top-right-radius: 0;
  border-top-right-radius: 0;
}
.mbSelect h4 {
  margin: 0;
  color: <?php echo $mb_content_bg ?>;
  font-size: 0.9em;
  line-height: 1em;
}
.mbSelect ul {
  position: absolute;
  width: 90%;
  background: <?php echo $mb_info_color_very_dark ?>;
  top: 1.8em;
  left: 3%;
  padding: 0 3% 0.2em;
  margin-top: 1px;
  -moz-border-radius-bottomleft: 4px;
  -webkit-border-bottom-left-radius: 4px;
  -o-border-bottom-left-radius: 4px;
  -ms-border-bottom-left-radius: 4px;
  -khtml-border-bottom-left-radius: 4px;
  border-bottom-left-radius: 4px;
  -moz-border-radius-bottomright: 4px;
  -webkit-border-bottom-right-radius: 4px;
  -o-border-bottom-right-radius: 4px;
  -ms-border-bottom-right-radius: 4px;
  -khtml-border-bottom-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.mbSelect ul li {
  border-top: 1px solid <?php echo $mb_info_color_dark ?>;
  font-weight: 300;
  padding: 0.4em 0.6em;
  font-size: 0.8em;
  line-height:1.3;
}
.mbSelect ul li:first-child {
  border: none;
}
.mbSelect ul li:hover {
  background: rgba(<?php echo hex2rgbstr($mb_info_color_dark) ?>, 0.5);
  -moz-box-shadow: inset 0 0 0.5em 0.4em <?php echo $mb_info_color_very_dark ?>;
  -webkit-box-shadow: inset 0 0 0.5em 0.4em <?php echo hex2rgbstr($mb_info_color_very_dark) ?>;
  -o-box-shadow: inset 0 0 0.5em 0.4em <?php echo $mb_info_color_very_dark ?>;
  box-shadow: inset 0 0 0.5em 0.4em <?php echo $mb_info_color_very_dark ?>;
}
#checkout table tbody th {
  width: 60%;
}
#checkout .currency-cell {
  text-align: right;
}
a.removeProduct, #simplemodal-container a.modalCloseImg {
  display: block;
  text-align: left;
  width: 20px;
  height: 20px;
  -moz-border-radius: 0.75em;
  -webkit-border-radius: 0.75em;
  -o-border-radius: 0.75em;
  -ms-border-radius: 0.75em;
  -khtml-border-radius: 0.75em;
  border-radius: 0.75em;
  background: <?php echo $mb_info_color_very_dark ?>;
  color: <?php echo $mb_content_bg ?>;
  float: right;
  margin-left: 10px;
  overflow: hidden;
  margin-top: -2px;
}
a.removeProduct span, #simplemodal-container a.modalCloseImg span {
  display: block;
}
a.removeProduct span:before, #simplemodal-container a.modalCloseImg span:before {
  content: 'x';
  display: block;
  width: 20px;
  height: 20px;
  text-align: center;
  font-size: 12px;
  line-height: 20px;
}
a.removeProduct:hover, #simplemodal-container a.modalCloseImg:hover {
  background: <?php echo $mb_info_color_dark ?>;
}
#checkout th.currency-cell {
  padding-right: 30px;
}
.currency-flag{
	padding-left:0.3em;
	color:<?php echo $mb_info_color ?>;
	font-size:0.8em;
}
#checkout table thead th{
	padding:1.5em 0 0.5em;
}
#checkout table#total {
  margin: 0;
  border-top: 1px solid <?php echo $mb_info_color_light ?>;
}
#checkout table#total th {
  height: 2.4em;
}
#checkout table#total th, #checkout table#total td {
  font-size: 1.2em;
  padding: 0.4em 0;
}
#checkout table#total td.currency-cell {
	padding-right:30px;
  white-space:nowrap;
}
#checkout form#paypalPurchase {
  margin: 1em 0 0;
  background: <?php echo $mb_info_color_light ?>;
  -moz-border-radius: 0.5em;
  -webkit-border-radius: 0.5em;
  -o-border-radius: 0.5em;
  -ms-border-radius: 0.5em;
  -khtml-border-radius: 0.5em;
  border-radius: 0.5em;
}
#checkout form#paypalPurchase input#checkout_submit {
  display: block;
  margin: 0.3em auto;
}
#checkout form#paypalPurchase small {
  display: block;
  line-height: 1.4em;
  padding: 0.2em 0.4em 0.4em 0.6em;
  color:<?php echo $mb_info_color_shade ?>;
}


/* #comments_template */
#comments_template h3, #comments_template h4, #comments_template h5 {
  color: <?php echo $mb_content_bg ?>;
  background: <?php echo $mb_info_color ?>;
  padding: 0.5em;
  margin: 0;
}
#comments_template h3#trackbacks, #comments_template h4#trackbacks, #comments_template h5#trackbacks {
  background: <?php echo $mb_info_color_tint ?>;
}
#comments_template .comment {
  border-top: 3px solid <?php echo $mb_info_color_light ?>;
}
#comments_template ul.commentlist > li.comment:first-child {
  border: none;
}
#comments_template .comment-body {
  position: relative;
  padding: 1em 0 0.5em 75px;
  min-height: 78px;
}
#comments_template .commentmetadata {
  font-size: 0.8em;
  position: absolute;
  bottom: 0.5em;
  right: 0;
}
#comments_template .commentmetadata a:first-child {
  color: <?php echo $mb_info_color_tint ?>;
}
#comments_template .vcard {
  position: absolute;
  top: 1em;
  left: 0;
  width: 55px;
}
#comments_template .vcard cite {
  color: <?php echo $mb_info_color_shade ?>;
  font-size: 0.75em;
  line-height: 13px;
  margin-top: 2px;
  display: block;
}
#comments_template .vcard .says {
  display: none;
}
#comments_template a.comment-reply-link {
  font-size: 0.8em;
}
#comments_template .children {
  margin-left: 75px;
}
#comments_template .children .children {
  margin-left: 0;
}
#comments_template p#comment-prompt {
  color: <?php echo $mb_info_color ?>;
  font-weight: bold;
  margin: 1em 0;
}
#comments_template #respond {
  border-top: 4px solid <?php echo $mb_info_color_tint ?>;
  padding-top: 1em;
}
#commentform{
	padding-top:0.5em;
}

/* simple modal */
#simplemodal-container a.modalCloseImg {
  z-index: 3200;
  position: absolute;
  top: -9px;
  right: -10px;
  cursor: pointer;
  border:2px solid  <?php echo $mb_content_bg ?>;
}
.simplemodal-overlay {
  background: <?php echo $mb_body_bg ?>;
}
.simplemodal-data {
  background: <?php echo $mb_content_bg ?>;
  width: 100%;
  height: 100%;
}
.simplemodal-data h2 {
  width: 96%;
  padding: 0.5em 0;
  margin: 0 auto;
}
.simplemodal-data iframe {
  width: 96%;
  height: 90%;
  border: 1px solid <?php echo $mb_info_color ?>;
  margin: 0 auto;
  display: block;
}

/* IE fixes  - .oldie = ie8/7/6 .mouldie = ie7/6 */

/* content fade - changed to wrap fade as a fix for flash of mobile style that shows before respond.js enables media queries */
.oldie #content {
  display: block;
}
.oldie #wrap{
  display:none;
}
.oldie a.buy-btn, .oldie a.info-btn, .oldie input.info-btn, .oldie .mbSelect, .oldie #comments_template a.comment-reply-link, #comments_template .oldie a.comment-reply-link, .oldie a.submit-btn, .oldie input.submit-btn, .oldie button.submit-btn {
  background: <?php echo $mb_buy_color ?>;
}
.oldie a.info-btn, .oldie input.info-btn, .oldie .mbSelect, .oldie #comments_template a.comment-reply-link, #comments_template .oldie a.comment-reply-link {
  background: <?php echo $mb_info_color ?>;
}
.oldie a.submit-btn, .oldie input.submit-btn, .oldie button.submit-btn {
  background: <?php echo $mb_action_color ?>;
}
/* explore a way to get ie9 gradients */
.ie9 a.buy-btn, .ie9 a.info-btn, .ie9 input.info-btn, .ie9 .mbSelect, .ie9 #comments_template a.comment-reply-link, #comments_template .ie9 a.comment-reply-link, .ie9 a.submit-btn, .ie9 input.submit-btn, .ie9 button.submit-btn {
  background: <?php echo $mb_buy_color ?>;
}
.ie9 a.info-btn, .ie9 input.info-btn, .ie9 .mbSelect, .ie9 #comments_template a.comment-reply-link, #comments_template .ie9 a.comment-reply-link {
  background: <?php echo $mb_info_color ?>;
}
.ie9 a.submit-btn, .ie9 input.submit-btn, .ie9 button.submit-btn {
  background: <?php echo $mb_action_color ?>;
}

.oldie .qtip-content figcaption {
  border: 1px solid <?php echo $mb_info_color ?>;
}
.oldie a.big-promo .price{
	background:none;
	color:<?php echo $mb_content_bg ?>;
	font-size:3.5em;
	padding-right:0;
}
.oldie .minIsOpen{
	background: <?php echo $mb_info_color_light ?>;
}
.oldie .widget_mb_mailing_list label, .oldie form.f-compact label{
  display:block;
  position:relative;
  top:auto;
}
.oldie #side-nav ul li:before {
  top: 0.2em;
}
.oldie .product-holder a img {
  background: <?php echo $mb_content_bg ?>;
  padding: 4px;
  <?php if(!$hide_product_shadow){ ?>border: 1px solid <?php echo $mb_info_color_light ?>;<?php } ?>
}
.oldie body.tax-mbudm_product_category ul#product-promo > li.col3{
	clear:left;
}
/* Mouldie - IE7/6 */
.mouldie .product-holder {
  position: relative;
}
.mouldie .vframe {
  position: absolute;
  top: 50%;
  width: 100%;
}
.mouldie .product-holder a {
  position: relative;
  top: -50%;
}
.mouldie body.page-template-mb_downloads-php .product-holder .vframe{
	left:0;
}
.mouldie #product-promo-wrapper {
  position: relative;
}
.mouldie #product-promo-wrapper a.navitem {
  zoom: 1;
}
.mouldie #product-promo-wrapper a.navitem:hover {
  filter: alpha(opacity=70);
}
.mouldie #product-promo-wrapper a.disabled {
  filter: alpha(opacity=30);
}
.mouldie #product-promo-wrapper a.disabled:hover {
  filter: alpha(opacity=30);
}
.mouldie #product-promo-wrapper .slider-content {
  position: relative;
}
.mouldie #product-promo-wrapper .slider-content ul#product-promo {
  display: inline;
  zoom: 1;
}
.mouldie #product-promo-wrapper .slider-content ul#product-promo li {
  display: inline;
}
.mouldie header {
  display: block;
  position: relative;
  zoom: 1;
}
.mouldie .qtip-content figcaption {
  background: <?php echo $mb_content_bg ?>;
  border: 1px solid <?php echo $mb_info_color ?>;
}
.mouldie .widget_mb_recent_posts li div {
  display: block;
  position: relative;
  zoom: 1;
  float: left;
}
.mouldie a.big-promo .price-whole{
	vertical-align:top;
}
.mouldie a.removeProduct, .mouldie #simplemodal-container a.modalCloseImg {
  display: inline;
  text-align: left;
  margin-top: 0;
  width:auto;
}
.mouldie a.removeProduct span, .mouldie #simplemodal-container a.modalCloseImg span {
  display: inline;
}
.mouldie section, .mouldie aside, .mouldie article, .mouldie nav#access ul, .mouldie #content, .mouldie ul.three-cols, .mouldie body.tax-mbudm_product_category ul#product-promo, .mouldie #comments_template .comment {
  zoom: 1;
}
.mouldie #product-promo-wrapper a.navitem:hover {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=70);
}
.mouldie #product-promo-wrapper a.disabled {
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=30);
}

/* mozilla only */
@-moz-document url-prefix() {
	form ul li input[type="text"], form ul li input[type="password"], form ul li textarea{
  		padding: 0.4em 0.4em 0.4em 0;
        text-indent:2%;
    }
}

/* CSS for different screen widths - > 480px */
@media only screen and (min-width: 480px) {
  #wrap {
    width: 430px;
    padding: 0 20px;
  }
  footer {
    width: 430px;
  }
  
  /* default layout for 480 - 768 - everything one column:

| - - - - .col1 - - - - |
| - - - - .col2 - - - - |
| - - - - .col3 - - - - |
| - - - - .col4 - - - - |
| - - - - .col5 - - - - |
| - - - - .col6 - - - - |
| - - - - .col7 - - - - |
| - - - - .col8 - - - - |
| - - - - .col9 - - - - |

Except when a subcol of col7 or col8 (these are 0.75 in full size mode)

*/
  /* 2 columns = 1 column */
  .col1,.col2 {
    width: 430px;
  }
  /* 3 columns = 1 column */
  .col3, .col4, .col5 {
    width: 430px;
  }
  /* 2 cols 0.25/0.75 = 1 column */
  .col6,.col7 {
    width: 430px;
  }
  .col1, .col2, .col3, .col4, .col5, .col6, footer {
    min-width: 0;
  }
  /* handle .itemEven/Odd as sub col of col7 (they will also be a col3 4 or 5)*/
  .col7 .itemEven, .col7 .itemOdd {
    width: 205px;
    margin-left: 0;
  }
  .col7 .itemEven {
    margin-left: 20px;
  }
  ul#product-promo.simple_cycle {
    height: 430px;
  }
  ul#product-promo.simple_cycle li {
    height: 430px;
  }
  ul#product-promo.simple_cycle .product-holder{
  	width:430px;
  	height: 430px;
  }
  ul#product-promo.simple_cycle .product-holder a{
  	 font-size:1em;
  	 line-height:1em;
  }
  ul#product-promo.simple_cycle .product-holder img.attachment-product-large {
    display: inline;
  }
  ul#product-promo.simple_cycle .product-holder img.attachment-product-medium {
    display: none;
  }
  #product-promo-wrapper a.navitem {
    right: -20px;
  }
  #product-promo-wrapper #pp_prev {
    left: -20px;
  }
  #product-promo-wrapper .product-holder {
    height: 430px;
  }
  body.single-mbudm_product .product-holder img.attachment-product-large{
    display: inline;
  }
  body.single-mbudm_product .product-holder img.attachment-product-medium{
    display: none;
  }
  body.single-mbudm_product .product-holder{
    height: 430px;
    width:430px;
  }
} /* end min-width: 480px */


/* CSS for different screen widths - > 768px */
@media only screen and (min-width: 768px) {
  #wrap {
    width: 655px;
    padding: 0 50px;
  }
  header{
  	height: <?php echo $mb_logo_medium_height ?>;
  }
  header h1 a, header h2 a {
    width: <?php echo $mb_logo_medium_width ?>;
	height: <?php echo $mb_logo_medium_height ?>;
	background: <?php echo $mb_content_bg ?> url("<?php echo $mb_logo_medium ?>") no-repeat 0 0;
  }
  nav#access {
    top: <?php echo $mb_navpos_medium ?>;
  }
  nav#access ul li {
  	margin-left: <?php echo $mb_navitem_space_medium ?>;
  }
  nav#access li a {
    font-size: 1em;
  }
  footer {
    width: 655px;
  }
  footer nav, footer div.menu {
    display: inline-block;
    float: right;
  }
  footer nav ul, footer div.menu ul {
    padding: 0 1em 0 0;
  }
  footer small #creditlink{
	display:block;
	margin-top:1em;
	padding-left:0;
}
  
  /*  layout for 768 - 992:
  
  | - - - - .col1 - - - - |
  | - - - - .col2 - - - - |
  | .col3 | .col4 | .col5 |
  | .col6 | - - .col7 - - |
  | - .col8 - - - | .col9 |
  Except when a subcol of col7 or col8 (these are 0.75 in full size mode)
  
  */
  
  /* 2 columns = 1 wide column */
  .col1,.col2 {
    width: 655px;
  }
  /* 3 columns */
  .col3, .col4, .col5 {
    width: 205px;
    float: left;
  }
  .col4, .col5 {
    margin-left: 20px;
  }
  /* 2 cols at full size these are 0.25/0.75  - make 1/3 2/3*/
  .col6 {
    width: 205px;
    float: left;
  }
  .col7 {
    width: 430px;
    float: right;
  }  
  .col8 {
    width: 430px;
    float: left;
  }  
  .col9 {
    width: 205px;
    min-width:205px;
    margin-left:20px;
    float: left;
  }
  /* handle .col 1 or 2 or 6 as sub col of col7 */
  .col7 .col1, .col7 .col2, .col7 .col6{
    width: 430px;
  }
  /* handle .col 1 or 2 or 9 as sub col of col8 */
  .col8 .col1, .col8 .col2, .col8 .col9{
    width: 430px;
  }
  #product-promo-wrapper .slider-content {
    width: 655px;
  }
  #product-promo-wrapper .slider-content ul#product-promo > li {
    width: 300px;
    margin-right: 55px;
  }
  #product-promo-wrapper .slider-content ul#product-promo .product-holder {
    width: 300px;
  }
  #product-promo-wrapper .slider-content ul#product-promo .product-info {
    width: 278px;
  }
  #product-promo-wrapper a.navitem {
    right: -50px;
  }
  #product-promo-wrapper #pp_prev {
    left: -50px;
  }
  /* act like .col7 */
  body.page-template-mb_downloads-php section .col4, body.page-template-mb_downloads-php section .col5 {
    width: 430px;
    float: right;
  }
  /* make 3 column widgets 1 column */
  .columnise-three {
    width: 655px;
    margin: 0;
    float: none;
  }
  #checkout table#total {
    width: 280px;
    float: right;
  }
  #checkout form#paypalPurchase {
    width: 280px;
    float: right;
    clear: both;
  }
  #category-select{
	font-size:16px;
	height:19px;
	line-height:15px;
	margin-top:1.4em;
  }
  /* IE fixes for min-width > 768px */
  .mouldie #product-promo-wrapper .slider-content ul#product-promo li {
    margin-right: 55px;
    width: 300px;
  }
  .mouldie #product-promo-wrapper .slider-content ul#product-promo li li {
    margin-right: 0;
    width: auto;
  }
  .mouldie #product-promo-wrapper .slider-content ul#product-promo li.last {
    margin-right: 0;
  }
}/* end min-width: 768px */


/* CSS for different screen widths - > 992px */
@media only screen and (min-width: 992px) {
  #wrap {
    width: 880px;
    padding: 0 50px;
  }
  footer {
    width: 880px;
  }
  header{
  	height: <?php echo $mb_logo_big_height ?>;
  }
  header h1 a, header h2 a {
    width: <?php echo $mb_logo_big_width ?>;
	height: <?php echo $mb_logo_big_height ?>;
	background: <?php echo $mb_content_bg ?> url("<?php echo $mb_logo_big ?>") no-repeat 0 0;
  }
  nav#access {
    top: <?php echo $mb_navpos_large ?>;
  }
  nav#access ul li {
  	margin-left: <?php echo $mb_navitem_space_large ?>;
  }
  nav#access li a {
    font-size: 1.3em;
  }
 footer small #creditlink{
	display:inline;
	margin-top:0;
	padding-left:1em;
}
  
  /*  layout for 992+:
  
  | - .col1 - | - .col2 - |
  | .col3 | .col4 | .col5 |
  |.col6| - - - .col7 - - |
  | - .col8 - - - - |.col9|
  
  Exception when a subcol of col1, col2, col7 or col8 
  
  */
  
  /* 2 columns */
  .col1 {
    width: 430px;
    float: left;
  }
  .col2 {
    width: 430px;
    float: right;
  }
  /* 3 columns */
  .col3, .col4, .col5 {
    width: 260px;
    float: left;
  }
  .col4, .col5,.col9 {
    margin-left: 20px;
  }
  /* 2 cols 0.25/0.75 */
  .col6 , .col7 .col6{
    width: 205px;
    float: left;
  }
  .col7 {
    width: 655px;
    float: right;
  }
    /* 2 cols 0.25/0.75 */
  .col9{
    width: 205px;
    float: left;
    min-width:205px;
  }
  .col8 {
    width: 655px;
    float: left;
  }
  /* handle .col 3, 4 or 5 as sub col of col7 */
  .col7 .col3, .col7 .col4, .col7 .col5 {
    width: 205px;
    margin-left: 20px;
  }
  .col7 .col3 {
    margin-left: 0;
  }
  
  /* handle .col8 and .col9 as sub of .col7 */
  .col7 .col8 {
    width: 335px;
  }
  
  /* handle .col 3, 4 or 5 as sub col of col1 or 2 (can happen with widgets) */
   .col1 .col3, .col1 .col4, .col1 .col5, .col2 .col3, .col2 .col4, .col2 .col5{
    width: 430px;
    margin-left: 0;
  }

  #product-promo-wrapper .slider-content {
    width: 880px;
  }
  #product-promo-wrapper .slider-content ul#product-promo > li {
    width: 280px;
    margin-right: 20px;
  }
  #product-promo-wrapper .slider-content ul#product-promo .product-holder {
    width: 280px;
  }
  #product-promo-wrapper .slider-content ul#product-promo .product-info {
    width: 258px;
  }
  /* override 768px rule to act like .col7 */
  body.page-template-mb_downloads-php section .col4, body.page-template-mb_downloads-php section .col5 {
    width: 280px;
    float: left;
  }
  #checkout table tbody th {
    width: 85%;
  }
  #checkout table#total th {
    width: 50%;
  }
  /* IE fixes for min-width > 992px */
  .mouldie #product-promo-wrapper .slider-content ul#product-promo li {
    margin-right: 20px;
    width: 280px;
  }
  .mouldie #product-promo-wrapper .slider-content ul#product-promo li li {
    margin-right: 0;
    width: auto;
  }
}

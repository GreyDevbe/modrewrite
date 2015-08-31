<?php 

error_reporting(E_ALL);

// Include routing class
include("Routing.php");

// Handle routing
$Info = ModRewriter::Route("routes.ini");

// If the page is not found
if(!$Info){
	echo "404 Not found";
	exit();
}

// Define wich page to load
switch($Info->Get(0)){
	case "news":
		$page = "pages/news.php";
		$title = "News";
		if($Info->Get("item")){
			$title = "Item " . $Info->Get("item") . " | " . $title;
		}
		break;
	case "profile":
		$page = "pages/profile.php";
		$title = "Profile";
		break;
	default:
		$page = "pages/home.php";
		$title = "Home";
		break;
}

// Root url
$root = "http://" . $_SERVER['HTTP_HOST'] . str_replace("index.php", "", $_SERVER['PHP_SELF']);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title ?></title>
<style type="text/css">
<!--
@charset "utf-8";
/* CSS Document */
body, html, div, blockquote, img, label, p, h1, h2, h3, h4, h5, h6, pre, ul,ol, li, dl, dt, dd, form, a, fieldset, input, th, td{
      margin: 0;
      padding: 0;
      border: 0;
      outline: none;
}

body{
	background:#eaeaea none repeat scroll 0 0;
	text-align: center;
	font-family:"Helvetica Neue",Arial,Helvetica,sans-serif;
	font-size:11.5px;
	line-height:21px;
}

h1, h2, h3, h4, h5, h6{
      font-size: 100%;
      margin: 0 15px;
	  font-weight:normal;
		line-height:1.4em;
		padding-bottom:5px;
}
ul, ol{
      list-style-image: none;
      list-style-type: none;
}     
img{
 border: 0;
}
h1, h2, h3 {
	font-weight:normal;
	margin:0;
	padding:0;
}
h1 {
	font-size:32px;
	font-weight:normal;
	line-height:1.4em;
	padding-bottom:0.7em;
	color: #3D3D3D;
	text-align: center;
	border-bottom:1px solid #EEEEEE;
}
h2 {
	clear:both;
	font-size:18px;
	color:#5B5A5A;
	line-height:1.4em;
	padding-bottom:5px;
}
ul {
	margin:0 1.5em 1.5em;
	list-style-position:inside;
	list-style-type:disc;
}
ol {
	list-style-image:none;
	list-style-position:inside;
	list-style-type:upper-alpha;
}
li {
	border-bottom:1px solid #DDDDDD;
	padding:3px 10px;
	color:#666666;
}
p{
	padding:0 0 1em;
}
hr {
	background:#DDDDDD none repeat scroll 0 0;
	border:medium none;
	clear:both;
	color:#DDDDDD;
	float:none;
	height:0.1em;
	margin:0 0 1.45em;
	width:100%;
}
a:link, a:visited, a:active{
	color:#3366CC;
	text-decoration:underline;
}
a:hover {
	color:#CC3333;
}

.default {
	padding-top: 5px;
	padding-right: 10px;
	padding-bottom: 5px;
	padding-left: 10px;
	margin-bottom: 5px;
	margin-top: 0px;
	margin-right: 0px;
	margin-left: 0px;
	background-color: #F2F2F2;
	border: 1px solid #CCC;
	color: #666;
}
.quiet {
	color:#666666;
}
.small {
	font-size:0.85em;
	line-height:1.875em;
	margin-bottom:1.875em;
}
#globalinfo{
	border-right:1px solid #EEEEEE;
	float: left;
	width: 180px;
	padding: 10px;
	font-weight: bold;
}
#globaldescription{
	float: right;
	width: 410px;
	padding: 10px;
}
#wrapper{
	width: 700px;
	margin: 20px auto;
	text-align: left;
}
#header{
	height: 130px;
}
#maincontent{
	border:1px solid #dddddd;	
	background-color: #FFF;
	padding: 30px;
}
#header h1 {
	font-size:24px;
	margin:0 0 0 5px;
	color:#616263;
}
#header p{
	margin:0px 0px 10px 0px;
}
#header ul{
	margin: 0px;
	padding: 0px;
}
#header li{
	list-style: none;
	margin: 0px;
	padding:0px;
}

#header h1 a {
	color:#616263;
	text-decoration:none;
}
#header h1 a:hover {
	text-decoration: underline;
}
#header .content{
	float: right;
	width: 550px;
	line-height:25px;
	
}
#header img {
	float:left;
	margin-right:10px;
}
#header h1 span {
	display:inline;
}
#shadow{
	height: 13px;
	background-color: #EFEFEF;
	background-image: url(../media/layout/shadow.gif);
}
#footer{
	margin-top: 5px;
	color: #898989;
	}
#tabbody{
	background-image: url(../media/layout/tabbg.png);
	background-repeat: repeat-x;
	padding: 10px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 20px;
	margin-left: 0px;
}
.bigtext{
	font-size: 24px;
	text-align: center;	
	color: #1C4E7E;
	font-weight: bold;
}
.red{
	color: #FF4411;
}
label{
	font-size:14px;
	font-weight:bold;
}
input, select, textarea{
	padding: 4px 6px;	
	border: solid 1px #7f9db9;
}
.nodisplay{
	display: none;
}
.grayed{
	background-color: #ebebe4;
	color: #aca899;
}
.left{
	float: left;
}
.right{
	float: right;
}
.spacer{
	display: block;
	clear: both;
}
.infoline{
	padding: 5px;
	border-bottom: solid 1px #d4e2ea;
}

.infoblock{
	padding: 5px;
	border: solid 1px #d4e2ea;
}
.ajaximageholder{
	border: solid 1px #eeede0;
	background-image: url(../media/layout/load.gif);
	background-repeat: no-repeat;
	background-position: center center;
	margin: 10px 0px;
}
.inputajax{
	background-image: url(../media/layout/load.gif);
	background-repeat: no-repeat;
	background-position: right center;
}
.inputinfo{
	font-style:italic;
	color:#171717;
	font-size: 10px;
}

.normal table, .disabled table, .good table, .bad table{
	border: none;
}
.normal table, .disabled table, .good table, .bad table{
	font-size:11px;
}

.normal{
	background-color: #f4f8fa;
	border: solid 1px #d4e2ea;
	margin-bottom: 5px;
}
.disabled{
	background-color: #f2f2f2;
	border: solid 1px #e2e2e2;
	margin-bottom: 5px;
	color: #bbb;
}
.good{
	background-color: #d1f39c;
	border: solid 1px #aadc63;
	margin-bottom: 15px;
	padding: 10px 15px;
}
.bad{
	background-color: #fcc9c9;
	border: solid 1px #dc6363;
	margin-bottom: 5px;
}
#topmenu a:hover {
	text-decoration:underline;
}
#topmenu li{
	list-style: none;
	margin: 0px 0px 0px 5px;
	padding: 0px;
	float: left;
}
#topmenu a {
	color:#FFFFFF;
	text-decoration:none;
	font-size: 16px;
	display: block;
	padding: 2px 10px 10px 10px;
}
#topmenu li.active {
	background-image: url(../media/layout/arrow.gif);
	background-repeat: no-repeat;
	background-position: bottom center;
}

-->
</style>
</head><body>
<div id="wrapper">
  <div id="maincontent">
    <div class="good">In this demo we used a trailing slash  for the url's. Click on the different pages to see the clean SEO friendly url's.</div>
    </p>
    <p>Pages: <a href="<?php echo $root; ?>">Home</a> | <a href="<?php echo $root; ?>profile/">Profile</a> | <a href="<?php echo $root; ?>news/">News</a></p>
    <?php
	 include($page);
	?>
  </div>
</div>
</body></html>

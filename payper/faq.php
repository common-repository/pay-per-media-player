<?php 
include_once("db.php"); 


if(isset($_REQUEST['width']) && $_REQUEST['width']!="")
{
  $width=$_REQUEST['width'];
}
else
{
  $width = '600';
}

if(isset($_REQUEST['height']) && $_REQUEST['height']!="")
{
  $height=$_REQUEST['height'];
}
else
{
  $height = '250';
}


if(isset($_REQUEST['stitle']) && $_REQUEST['stitle']!="")
{
  $stitle=$_REQUEST['stitle'];
}
else
{
  $stitle = '0';
}


if(isset($_REQUEST['size']) && $_REQUEST['size']!="")
{
  $size=$_REQUEST['size'];
}
else
{
  $size = 'full';
}


if(isset($_REQUEST['links']) && $_REQUEST['links']!="")
{
  $links=$_REQUEST['links'];
}
else
{
  $links = '0';
}


$c=array('DA1D1E', '497BF3', '13A536', 'F6C230', '343434');
$rnd = rand(0,4);


if(isset($_REQUEST['fcolor']) && $_REQUEST['fcolor']!="")
{
  $fcolor=$_REQUEST['fcolor'];
}
else
{
  $fcolor = '000000'; //$c[$rnd];
}


if(isset($_REQUEST['bcolor']) && $_REQUEST['bcolor']!="")
{
  $bcolor=$_REQUEST['bcolor'];
}
else
{
  $bcolor = 'ff0000'; //$c[$rnd];
}



if($width<150)
 $width = '150';

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
{
  $id=$_REQUEST['id'];
}
else
{
  $id = '0';
}


if(isset($_REQUEST['host']) && $_REQUEST['host']!="")
{
  $host=$_REQUEST['host'];
  //add_host($host);
}
else
{
  $host = $siteurl;
}


?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="PHP Simple HTML DOM Parser CSS Selector">
<meta name="keywords" content="PHP Simple HTML DOM Parser CSS Selector">
<title>Pay Per View Solution for Multimedia</title>
<link href="css/default.css" rel="stylesheet" type="text/css">

</head>
<body>



<h1>Pay Per View Solution for Multimedia</h1>
<div id="content">
 
<br>
<br>
 
<div align="center"> 
 <?php  //include("payper.php"); ?>
 
 Static text here...
 
</div>   
<br>
   
  
 
 
 
</body>
</html>
<!--$Rev: 48 $-->

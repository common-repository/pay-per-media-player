<?php include_once("config.php"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="1;URL='<?php echo urldecode(base64_decode($_REQUEST['ret'])); ?>'">
<title>Payment Canceled...</title>
</head>

<body>

<div align="center">

<?php 
//echo "<pre>";
//print_r($_SESSION);
//print_r($_REQUEST);
//die(urldecode(base64_decode($_REQUEST['ret'])));

echo "Payment Canceled";

?>

</div>

</body>
</html>
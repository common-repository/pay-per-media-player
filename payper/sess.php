<?php
include_once("config.php"); 

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
 $id = $_REQUEST['id'];
else
 $id = 0;

$_SESSION['currentid'.$id] = 1;
$_SESSION['transid'] = '';

?>
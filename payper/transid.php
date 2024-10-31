<?php
include_once("config.php"); 

$msg = "";


$transactionid = isset($_REQUEST['transactionid'])?$_REQUEST['transactionid']:"";
$pid = isset($_REQUEST['pid'])?$_REQUEST['pid']:"";

if(isset($transactionid) && isset($pid))
{

$qq = mysql_query("select id from `".$stable."` where pid = '".$pid."' and transactionid = '".$transactionid."' ");

$docdata = mysql_fetch_assoc($qq);


if(isset($docdata['id']) && $docdata['id']!="")
{

$_SESSION['currentid'.$id] = $_SESSION['currentid'.$id] + 1;
$_SESSION['transid'] = '';

}
else
{

  $msg = "Transaction ID is not valid!";

} 


}
else
{

 $msg = "Please enter valid Transaction ID!";

}


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

$url = $siteurl.'payper.php?id='.$id.'&size='.$size.'&width='.$width.'&height='.$height.'&links='.$links.'&stitle='.$stitle.'&fcolor='.$fcolor.'&bcolor='.$bcolor.'&host='.$host;

?>
<?php /*?><script language="javascript">

alert('<?php echo $url; ?>');

document.location = "<?php echo $url; ?>";

</script>
<?php */?><?php

header("location: ".$url."&msg=".$msg);
exit(1);

?>
<?php
include_once("config.php"); 

/*global $wpdb;
$table		=	$wpdb->prefix.'payper_playlist';	*/

if(in_array("exec", $_REQUEST)) die("Navigate Back!!");
if(in_array("<script", $_REQUEST)) die("Navigate Back!!");

$inside = 0;

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
  $height = '350';
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
  $host = $_REQUEST['host'];
  //add_host($host);
}
else
{
  $host = $siteurl;
  
}


$prms = 'id='.$id.'&size='.$size.'&width='.$width.'&height='.$height.'&links='.$links.'&stitle='.$stitle.'&fcolor='.$fcolor.'&bcolor='.$bcolor.'&host='.$host;


$phps = basename($_SERVER['PHP_SELF']);

?><style type="text/css">

body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}

img {border:none;}

</style>

<?php

switch($size)
{

case "small": $css = "player.css";
break;

case "full": $css = "player.css";
break;

case "big": $css = "player_big.css";
break;

default: $css = "player.css";

}

?>

<div align="center" style="width:<?php echo ($width-30); ?>px; height:<?php echo ($height-30); ?>px; border:1px solid #<?php echo $fcolor; ?>; background: #<?php echo $bcolor; ?>; -webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px;">

<br />

<?php

//$xml = simplexml_load_file($xml_file);

if($id)
{

$qq = mysql_query("select * from `".$table."` where id = '".$id."' ");
$docdata = mysql_fetch_assoc($qq);
$str = file_get_contents("xml/".$docdata['xml']);  


//$str = file_get_contents($xml_file);  

// load the string as xml object  
$xml = simplexml_load_string($str);  
$result = $xml->xpath("//item");

 
$mm=1;

foreach($result as $ii)
{	

$var4 = $ii->var4;						
$var3 = $ii->var3;  
$var1 = $ii->var1; 
$var2 = $ii->var2;

//echo $mm." -> ".$_SESSION['currentid'.$id];

$inside = 0;

if($mm == $_SESSION['currentid'.$id])
{

$inside = 1;

?>

<?php 

//$email = sprintf("%01.2f", $var3);

//if(isValidEmail("sriniv_1293527277_biz@inbox.info")) echo "SSSSSSSSSSS"; else echo "VVVVVVVVVVV";

if(!isValidEmail($var3))
{

?>

<strong>You are watching video <?php echo $var1;?><br /></strong>

<!-- START OF THE PLAYER EMBEDDING  -->

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url(__FILE__); ?>videojs/video-js.css">
    <script type='text/javascript' src="<?php echo plugin_dir_url(__FILE__); ?>videojs/video.js"></script>
    
    <?php /*?>image: "<?php echo $var4; ?>"<?php */?>
    
    <script type='text/javascript'>//<![CDATA[ 
	
    $(window).load(function(){
    var videojs = _V_("home_video", {sources:[{src:"<?php echo $var3; ?>", poster:"<?php echo $var4; ?>", type:"video/mp4"}]});
    videojs.addEvent('ended', function(){
    
    document.location = "<?php echo $siteurl; ?>next.php?<?php echo $prms; ?>";
	
    });
    
    
    });//]]>  
    
    </script>
	
	
	<!-- END OF THE PLAYER -->
    <div id="mediaplayer">    
    <video id=home_video class="video-js vjs-default-skin" controls preload="auto" width=<?php echo ($width-150); ?> height=<?php echo ($height-100); ?>></video>
    </div>
    

<?php } else { 

$_SESSION['price'] = sprintf("%01.2f", $var4);
$_SESSION['currency'] = $currency;

?>

<strong>To proceed with your payment of <?php echo sprintf("%01.2f", $var4)." ".$currency; ?>  we need your email address.<br />
Access video "<?php echo $var1; ?>" for a certain period of time<br /><br /></strong>

<form action="<?php echo $paypal_link; ?>" target="_top" method="post" name="payPalForm">
                    <input type="hidden" name="business" value="<?php echo $var3;?>">
                    <input type="hidden" name="cmd" value="_xclick">
                    
                    <input type="text" name="custom" placeholder="email" value="" /><br>

                    <input type="hidden" name="item_name" value="<?php echo $var1; ?>">
                    <input type="hidden" name="item_number" value="<?php echo $id."|".$var2; ?>">
                    <input type="hidden" name="amount" value="<?php echo sprintf("%01.2f", $var4); ?>">

                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
                    <input type="hidden" name="handling" value="0">
                    <input type="hidden" name="image_url" value="<?php echo $image_url; ?>"> 
                    <input type="hidden" name="cancel_return" value="<?php echo $siteurl; ?>cancel.php?ret=<?php echo base64_encode(urlencode($host)); ?>">
                    <input type="hidden" name="return" value="<?php echo $siteurl; ?>success.php?ret=<?php echo base64_encode(urlencode($host)); ?>">

                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> 

<br />
<br />

Already Paid user provide PayPal Transaction ID for this media file<br />

<?php
if(isset($_REQUEST['msg']) && $_REQUEST['msg']!="")
  echo "<script>alert('".$_REQUEST['msg']."');</script>"; 
?> 
 
<form name="frmpaid" action="transid.php?<?php echo $prms; ?>" method="post">

<input type="text" name="transactionid" placeholder="Transaction ID" value="" />
<input type="hidden" name="pid" value="<?php echo $var2; ?>" />

<input type="submit" name="Submit" value="Submit">

</form>


<?php } 

} 

?>


<?php $mm++; }  

}

?>

<?php /*?><div align="center">
<a href="<?php echo $siteurl; ?>prev.php?<?php echo $prms; ?>" style="text-align:left"><strong>&laquo;&nbsp;Prev</strong></a>&nbsp;&nbsp;
<a href="<?php echo $siteurl; ?>next.php?<?php echo $prms; ?>" style="text-align:right"><strong>Next&nbsp;&raquo;</strong></a>
</div><?php */?>

<div style="float:right; padding:7px;"><a href="http://www.svnlabs.com/" target="_blank"><img src="http://blog.svnlabs.com/animated_favicon1.gif" width="20" border="0" alt=""></a>&nbsp;<a href="https://twitter.com/intent/tweet?status=HTML5 Video Player with Playlist http%3A%2F%2Fhtml5.svnlabs.com&amp;url=http%3A%2F%2Fhtml5.svnlabs.com" target="_blank" title="Twitter"><img src="http://html5.svnlabs.com/twitter.png" border="0" width="20"></a>&nbsp;<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhtml5.svnlabs.com" target="_blank" title="Facebook"><img src="http://html5.svnlabs.com/facebook.png" border="0" width="20"></a>&nbsp;<a href="http://html5.svnlabs.com" target="_blank" title="HTML5 Video Player with Playlist"><img src="http://html5.svnlabs.com/link-icon.png" border="0" width="20"></a></div>

<?php

if($inside == 0) 
{ 

echo "Thanks for using widget"; 

} 



?>

<img src="http://html5.svnlabs.com/html5log/payper.php" alt="" width="1" height="1" />

</div>


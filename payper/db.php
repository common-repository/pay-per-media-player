<?php
//if (!session_id()) session_start();
@session_start();
error_reporting(0);

include_once("currency.php");

/*include_once("../../../../wp-config.php");

$table = $table_prefix.'payper_playlist';	

echo $_SERVER['REQUEST_URI'];

$siteurl="http://demo.svnlabs.com/payper/";

$return_url = $siteurl."success.php";
$cancel_return = $siteurl."cancel.php";


$image_url = "http://blog.svnlabs.com/wp-content/uploads/2012/06/html5mp3player.jpg";	*/


/*include_once("includes/DBCONFIG.php");
include_once("includes/config.inc.php");

$link = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
if (!$link) {
    die('Not Connected : ' . mysql_error());
}

// connect to database
$db_selected = mysql_select_db($DB_NAME, $link);

mysql_query("SET character_set_client=utf8", $link);
mysql_query("SET character_set_connection=utf8", $link);
mysql_query("SET character_set_results=utf8", $link);

if (!$db_selected) {
    die ('Can\'t Connected : ' . mysql_error());
}*/

/*$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$link) {
    die('Not Connected : ' . mysql_error());
}

// connect to database
$db_selected = mysql_select_db(DB_NAME, $link);

mysql_query("SET character_set_client=utf8", $link);
mysql_query("SET character_set_connection=utf8", $link);
mysql_query("SET character_set_results=utf8", $link);

if (!$db_selected) {
    die ('Can\'t Connected : ' . mysql_error());
}*/


//$siteurl = "http://localhost/payper/";


if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
 $id = $_REQUEST['id'];
else
 $id = 0;

$qq = mysql_query("select * from `".$table."` where id = '".$id."' ");
$docdata = mysql_fetch_assoc($qq);


// PayPal Config //

if($docdata['sandbox'])
{
 $paypal_link = "https://www.sandbox.paypal.com/cgi-bin/webscr";
}
else
{
 $paypal_link = "https://www.paypal.com/cgi-bin/webscr";
}


/*$return_url = $siteurl."success.php";
$cancel_return = $siteurl."cancel.php";

$currency = "USD";
$image_url = "http://blog.svnlabs.com/wp-content/uploads/2012/06/html5mp3player.jpg";*/


// PayPal Config //


// session manager

//$_SESSION['uid'] = isset($_REQUEST['id'])?$_REQUEST['id']:"1";
//$_SESSION['transid'] = '';
//$_SESSION['currentid'.$id] = isset($_SESSION['currentid'.$id])?$_SESSION['currentid'.$id]:1;


function format_number($number, $symbol = false )
{
   
    return  $symbol==true ? "£".number_format($number, 2, '.', '') : number_format($number, 2, '.', '');
}



function isValidEmail($email){
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email);
}


function is_valid_email($email)
{
	if(preg_match("/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/", $email) > 0)
		return true;
	else
		return false;
}


//if(isValidEmail("sriniv_1293527277_biz@inbox.info")) echo "SSSSSSSSSSS"; else echo "VVVVVVVVVVV";

?>
<?php include_once("config.php"); 


if(isset($_GET['tx']) && $_GET['tx']!="")
{
$item_no = $_GET['item_number'];
$item_transaction = $_GET['tx'];
$item_price = $_GET['amt'];
$item_currency = $_GET['cc'];
$item_email = $_GET['cm'];
}


if(isset($_REQUEST['txn_id']) && $_REQUEST['txn_id']!="")
{
$item_no = $_REQUEST['item_number'];
$item_transaction = $_REQUEST['txn_id'];
$item_price = $_REQUEST['mc_gross'];
$item_currency = $_REQUEST['mc_currency'];
$item_email = $_REQUEST['payer_email'];
}

//die($_SESSION['uid']);

//print_r($_GET);
//print_r($_SESSION);
//echo $currency;
//die();

$uids = explode("|", $item_no);

//echo urldecode(base64_decode($_REQUEST['ret']));

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="1;URL='<?php echo urldecode(base64_decode($_REQUEST['ret'])); ?>'">
<title>Payment Successful...</title>
</head>

<body>

<div align="center">

<?php 
//echo "<pre>";
//print_r($_SESSION);
//print_r($_REQUEST);
//die(urldecode(base64_decode($_REQUEST['ret'])));

//echo "Payment Successful...";

//Rechecking the product details
//if($item_price==$_SESSION['price'] && $item_currency==$currency)


if($item_price==$_SESSION['price'] && $item_currency==$_SESSION['currency'])
{

    $sql=mysql_query("select pid from `".$stable."` where transactionid='$item_transaction'");
    $row=mysql_fetch_array($sql);
    
	if($row['pid'])
	{
	
    /// transcation exists
	$_SESSION['transid'] = $item_transaction;
	
	}
	else
	{
	
			$result = mysql_query("INSERT INTO ".$stable."(pid, uid, email, amount, currency, saledate, transactionid) VALUES('".$uids['1']."', '".$uids['0']."', '$item_email', '$item_price', '$item_currency', NOW(), '$item_transaction')");
		
			if($result)
			{
				echo '<img src="images/loading_ani.gif">&nbsp;&nbsp;Payment Successful';
				// get next item from playlist
				$_SESSION['currentid'.$uids['0']] = $_SESSION['currentid'.$uids['0']] + 1;
				$_SESSION['transid'] = $item_transaction;
			}
			else
			{
				echo "Payment Error";
			}
	
	}



}
else
{
echo "Payment Failed";
}

?>

</div>

</body>
</html>
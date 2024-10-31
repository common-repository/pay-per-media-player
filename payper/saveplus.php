<?php
include_once("db.php");

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
 $id = $_REQUEST['id'];

$url = isset($_REQUEST['url'])?$_REQUEST['url']:"";
$size = isset($_REQUEST['size'])?$_REQUEST['size']:"";
$xml = isset($_REQUEST['xml'])?$_REQUEST['xml']:"";
$sandbox = isset($_REQUEST['sandbox'])?$_REQUEST['sandbox']:"0";
$id = isset($_REQUEST['id'])?$_REQUEST['id']:"";

$host = isset($_REQUEST['host'])?$_REQUEST['host']:"";


$qq = mysql_query("select * from `".$table."` where id = '".$id."' ");

$docdata = mysql_fetch_assoc($qq);


/// save playlist xml

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Save")
{

$c = count($_REQUEST['song']);

$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n";

$xml .= "<list>\r\n";

for($i=0;$i<$c;$i++)
{

  $xml .= "\r\n<item>\r\n";

    $xml .= "<var1><![CDATA[".$_REQUEST['title'][$i]."]]></var1>\r\n";

	$xml .= "<var2><![CDATA[".$_REQUEST['artist'][$i]."]]></var2>\r\n";

	$xml .= "<var3><![CDATA[".$_REQUEST['song'][$i]."]]></var3>\r\n";

    $xml .= "<var4><![CDATA[".$_REQUEST['image'][$i]."]]></var4>\r\n";

  $xml .= "</item>\r\n\r\n";

}
	
$xml .= "</list>\r\n";	


if(isset($docdata['xml']))
file_put_contents(plugin_dir_path(__FILE__)."xml/".$docdata['xml'], $xml); 


}


if(isset($xml) && $xml!="")
{



	if(isset($docdata['id']) && $docdata['id']!="")
	{
	
	  //die("update `xml` set `url` = '".$url."', `size` = '".$size."', `xml` = '".base64_encode($xml)."', `adddate` = now() where id = '".$docdata['id']."' ");
	  
	  $xxmmll = $docdata['xml'];
	  
	  if($xxmmll=="") $xxmmll = time().".xml";
	  
      file_put_contents(plugin_dir_path(__FILE__)."xml/".$xxmmll, $xml);
	  
	  mysql_query("update `".$table."` set `url` = '".$url."', `size` = '".$size."', `xml` = '".$xxmmll."', `sandbox` = '".$sandbox."', `adddate` = now() where id = '".$docdata['id']."' ");
	  
	  $iiid = $docdata['id'];
	
	}
	else
	{
	
	  $xxmmll = time().".xml";

      file_put_contents(plugin_dir_path(__FILE__)."xml/".$xxmmll, $xml);
	
	  mysql_query("insert into `".$table."` set `url` = '".$url."', `size` = '".$size."', `xml` = '".$xxmmll."', `sandbox` = '".$sandbox."', `adddate` = now() ");
	  
	  $iiid = mysql_insert_id();	
	
	}
	
	?>
    
    <script language="javascript">
    
	document.location = "<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=payper_playlist&id=".$iiid."#fragment-12"; ?>";
	
	</script>
    
    <?php
	
	//header("location: ".$siteurl."index.php?id=".$iiid."&host=".$url."#fragment-12");
	//exit(1);

}
else
{

   die("Something went wrong... navigate back");

}

?>
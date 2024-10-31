<?php
include_once("db.php");

if(isset($_REQUEST['id']) && $_REQUEST['id']!="")
 $id = $_REQUEST['id'];
else
 $id = 0;

$qq = mysql_query("select * from `".$table."` where id = '".$id."' ");

$docdata = mysql_fetch_assoc($qq);


/* Save Playlist */

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Save")
{

include("saveplus.php");

}


/* Save Playlist */


$ele = '';

if($id)
{



if(file_exists(plugin_dir_path(__FILE__)."xml/".$docdata['xml']))
{

$str = file_get_contents(plugin_dir_path(__FILE__)."xml/".$docdata['xml']); 
				
				// load the string as xml object  
			  $xml = simplexml_load_string($str);  
			  

              $result = $xml->xpath("//item");
			  
			  $mm=1;
				
			 
			  
			  
   		      foreach($result as $ii)
			  {	
					
				$mp3p = $ii->var4;						
					
				$mp3s = $ii->var3;  
                 
				$mp3t = $ii->var1; 
				
				$mp3a = $ii->var2;
			
			    $ele .= '<div id="divId' .$mm. '">';
				
				$ele .= '<input type="text" name="title[]"	id="title' .$mm. '" value="'.$mp3t.'" placeholder="title / item name" /><br /><input type="text" name="artist[]"	id="artist' .$mm. '" value="'.$mp3a.'" placeholder="artist / item number" /><br /><input type="text" size="70" name="song[]"	id="song' .$mm. '" value="'.$mp3s.'" placeholder="media preview or target link / paypal email" /><br /><input type="text" size="70" name="image[]"	id="image' .$mm. '" value="'.$mp3p.'" placeholder="image link / amount" />';
				
				if($mm==1)
				  $ele .= '&nbsp;<a href="javascript:void(0)" onclick="return addNewElementPreview()">[Add Preview]</a>&nbsp;<a href="javascript:void(0)" onclick="return addNewElementPayPal()">[Add PayPal Info]</a>&nbsp;<a href="javascript:void(0)" onclick="return addNewElement()">[Add Target]</a><br><br><br>';
				else
				  $ele .= '&nbsp;<a href="javascript:void(0)" onclick="return removeThisElement(' .$mm. ')">Remove This</a><br><br><br>';  
				  
				$ele .= '</div>';
				  
				
				$mm++;
				
			  
			  
			  
			
			}
			
}			


}


?>
	 
		
	 
 
		
		<strong>Pay Per View Solution for Multimedia&nbsp;<a href="<?php echo get_bloginfo('url') ;?>/wp-admin/admin.php?page=payper_playlist&id=0" style="background-color:#D84937; height:35px; color:#ffffff; font-weight:bold; padding:5px;">Add New</a></strong> 
        
        
        <br />
<br />
<strong>Step 1:</strong> Manage Multimedia link and other PayPal information  (currency in <?php echo $currency; ?>) <br /><br />


 <form name="frm" action="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=payper_playlist&action=update&id=<?php echo $_REQUEST['id']; ?>" method="post">
 


 <input type="hidden" name="url" value="<?php  if(isset($docdata['url'])) { echo $docdata['url']; } else { echo $_REQUEST['host']; } ?>" placeholder="http://www.domain.com" /><br />


<strong>PayPal Sandbox?</strong> <input type="checkbox" name="sandbox" value="1" <?php if($docdata['sandbox']=="1") { ?> checked="checked" <?php } ?>><br />
<br />
<br />


<input type="hidden" name="size" value="full" />


<div id="more_element_area">
  
  
  <?php if($ele!="") { ?>
  
  <?php echo $ele; ?>
  
  <?php }else{ ?>
  
    <input type="text" name="title[]" id="title1" value="" placeholder="preview title" /><br /><input type="text" name="artist[]" id="artist1" value="" placeholder="preview artist" /><br /><input type="text" name="song[]" id="song1" size="70" value="" placeholder="preview media link" /><br /><input type="text" name="image[]" id="image1" size="70" value="" placeholder="preview image link" />&nbsp;<a href="javascript:void(0)" onclick="return addNewElementPreview()">[Add Preview]</a>&nbsp;<a href="javascript:void(0)" onclick="return addNewElementPayPal()">[Add PayPal Info]</a>&nbsp;<a href="javascript:void(0)" onclick="return addNewElement()">[Add Target]</a><br><br>
    
  <?php } ?>  
    
  
</div>


<br />


<input type="submit" style="background-color:#D84937; height:35px; color:#ffffff; font-weight:bold;" name="submit" value="Save" />


</form>

<br />

<?php



?>

 
       
        
        <div>
        		
 </div>

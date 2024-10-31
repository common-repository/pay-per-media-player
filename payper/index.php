<?php 
//include_once("db.php");

//wp_enqueue_styles( 'custom-style' );
//wp_enqueue_scripts( 'custom-script' );

wp_enqueue_scripts();


$siteurl = plugin_dir_url(__FILE__);


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


if($action=="delete") {

$delete		=	mysql_query("DELETE FROM `".$table."` WHERE id='".$_REQUEST['id']."' ");
						
$isuccess	=	"Playlist deleted successfully";						
						
}	


?>


<?php $mm = 2; ?>

<script type="text/javascript">

	jQuery(document).ready(function(){
		jQuery(function() {jQuery('#container-1 > ul').tabs();});
	});

var idno = <?php echo $mm; ?>; // It start from id 2 
</script>



</head>
<body>



<h2>Pay Per View Solution for Multimedia</h2>
 
 
<br>
<br>
 
<div align="center"> 
 <?php  //include("payper.php"); ?>
</div>   
 
  
  <div id="container-1">
    <ul>
      <li><a href="#fragment-11"><span>Create Playlist</span></a></li>
      <li><a href="#fragment-12"><span>Customize Player</span></a></li>
      <li><a href="#fragment-13"><span>Get Player Widget</span></a></li>
      <li><a href="#fragment-14"><span>Saved Playlists</span></a></li>
      <li><a href="#fragment-15"><span>Help</span></a></li>
    </ul>
    
    <div id="fragment-11">
      <div class="code">
      <br>

      
      <?php include("formplus.php"); ?>
      
      </div>
    </div>
    
    <div id="fragment-12">
      <div class="code">
      
           
      <form name="html5frm" action="<?php echo get_bloginfo('url') ;?>/wp-admin/admin.php?page=payper_playlist&id=<?php echo $_REQUEST['id']; ?>#fragment-13" method="post">
      
      <table width="50%" border="0" cellspacing="3" cellpadding="3">
            <tr>
            
                               
            <?php /*?><td>Player Size:</td>
            <td><select name="size">
                    
                        <option value="small" <?php if($size=="small") { ?> selected="selected" <?php } ?>>Small Player - no playlist</option>
                        <option value="full" <?php if($size=="full") { ?> selected="selected" <?php } ?>>Full Player (Horizontal) - xml playlist</option>
                        <option value="big" <?php if($size=="big") { ?> selected="selected" <?php } ?>>Big Player (Vertical) - xml playlist</option>
                    
                    </select></td>
            
            </tr><tr>  <?php */?>      
            
            
            <?php /*?><td>Title Scrolling:</td>
            <td><input type="checkbox" name="stitle"  value="1" <?php if(isset($stitle) && $stitle=='1') echo 'checked="checked"'; ?>  /></td>
            
            </tr><tr><?php */?>
            
            
                       
            
                    
            <td>Width:</td>
            <td><input type="text" name="width"  value="<?php echo $width; ?>" style="width:60px;" />&nbsp;px</td>             
            
            
            </tr><tr>
            
            <td>Height:</td>
            <td><input type="text" name="height"  value="<?php echo $height; ?>" style="width:60px;" />&nbsp;px</td>
            
            </tr><tr>
            
            <td>Social Links:</td>
            <td><input type="checkbox" name="links"  value="1" <?php if(isset($links) && $links=='1') echo 'checked="checked"'; ?>  /></td>
            
            </tr><tr>
            
            <td>Frame Color:</td>
            <td>#&nbsp;<input class="color" name="fcolor" type="text" value="<?php echo $fcolor; ?>" /></td>
            
            </tr><tr>
            
            <td>Background Color:</td>
            <td>#&nbsp;<input class="color" name="bcolor" type="text" value="<?php echo $bcolor; ?>" /></td>
            
            </tr><tr>
            
            <td>&nbsp;</td>
            <td><input type="submit" name="go" value="Get widget" style="background-color:#D84937; height:35px; color:#ffffff; font-weight:bold;" /></td>
      
 
        </tr>
        </table>
        
        
        
   
   </form>
        
      </div>
    </div>
    
    <div id="fragment-13">
      <div class="code"> 
      
			<?php
            
            //$url = $siteurl.'payper.php?id='.$id.'&host='.$host.'&size='.$size.'&width='.$width.'&height='.$height.'&links='.$links.'&stitle='.$stitle.'&fcolor='.$fcolor.'&bcolor='.$bcolor;
			
			$url = $siteurl.'payper.php?id='.$id.'&host=&size='.$size.'&width='.$width.'&height='.$height.'&links='.$links.'&stitle='.$stitle.'&fcolor='.$fcolor.'&bcolor='.$bcolor;
            $uid = 'id="'.$id.'";';
            $w = 'width="'.$width.'";';
			$h = 'height="'.$height.'";';
            
            $cc = 'fcolor="'.$fcolor.'";';
			$bcc = 'bcolor="'.$bcolor.'";';
            $ll = 'links="'.$links.'";';
			$sl = 'stitle="'.$stitle.'";';
			$sz = 'size="'.$size.'";';
            
            
            $script = '<script type="text/javascript">'.$uid.$w.$h.$cc.$bcc.$ll.$sl.$sz.'</script><script type="text/javascript" src="'.$siteurl.'payper.js.php"></script>';
            $iframe = '<iframe src="' . $url . '" frameborder="0" scrolling="no" height="'.$height.'" width="'.$width.'"></iframe>';
			
			$shortcode = '[payper id='.$id.' width='.$width.' height='.$height.' fcolor='.$fcolor.' bcolor='.$bcolor.' links='.$links.']';
            
            ?>
            
            <?php //if(isset($_REQUEST['go']) && $_REQUEST['go']=="Get widget"){ ?>
            
            <?php if(isset($_REQUEST['id']) && $_REQUEST['id']!="0") { ?>
            
            <table width="50%" border="0" cellspacing="3" cellpadding="3">
            <tr>
            
            
            <td><strong>Wordpress Shortcode</strong><br />
            <hr />
            <textarea cols="60" rows="10" onFocus="this.select();" style="border:1px dotted #343434" ><?php echo $shortcode; ?></textarea></td>
            <td>
            
            
            <td><strong>JavaScript Widget</strong><br />
            <hr />
            <textarea cols="60" rows="10" onFocus="this.select();" style="border:1px dotted #343434" ><?php echo $script; ?></textarea></td>
            <td>
            
            <strong>iFrame Widget</strong><br />
            <hr />
            <textarea cols="60" rows="10" onFocus="this.select();" style="border:1px dotted #343434" ><?php echo $iframe; ?></textarea>
            
            </td>
            
            </tr>
            </table>
            
            <?php } else { ?>
            
            Please select <a href="<?php echo get_bloginfo('url') ;?>/wp-admin/admin.php?page=payper_playlist&p=<?php echo rand(1,10); ?>#fragment-14">Playlists</a> here ...
                                    
            <?php } ?>
            
            <?php //} ?>
            <br />
                
                
      </div>
    </div>
    <div id="fragment-14">
      <div class="code">
        
        <?php include("playlist.php"); ?>
        
      </div>
    </div>
    
    <div id="fragment-15">
      <div class="code">
        
        <br>
<br>

        
        <div style="width: 300px; padding: 10px; text-align:center; background-color: #FFFFCC;">
    <h3 style="text-align:center">Do you like this plugin? <br />I want to make it better?</h3>
    
    
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="RET8NPWS3BXQG">
<input type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
<br />

<a href="http://html5.svnlabs.com/" target="_blank">Security is not Free - Get fully customized Pay Per Player for Website</a>     
    
    <p><a href="http://www.svnlabs.com/concentrate" title="concentrate"><strong>Concentrate</strong></a> <strong>&gt;</strong> <a href="http://www.svnlabs.com/observe" title="observe"><strong>Observe</strong></a> <strong>&gt;</strong> <a href="http://www.svnlabs.com/imagine" title="imagine"><strong>Imagine</strong></a> <strong>&gt;</strong> <a href="http://www.svnlabs.com/launch" title="launch"><strong>Launch</strong></a></p>
    </div>
        
        
      </div>
    </div>
    
    
  </div>
   <br>
<br>

 
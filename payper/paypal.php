<?php

global $wpdb;
$stable		=	$wpdb->prefix."payper_sales";


$isuccess = isset($_REQUEST['isuccess'])?$_REQUEST['isuccess']:"";
$ierror = isset($_REQUEST['ierror'])?$_REQUEST['ierror']:"";


if(isset($_GET['id'])){
	$id		=	$_GET['id'];
}


$usql		=	"SELECT * FROM $table WHERE id='$id'";
$uresults 	= 	$wpdb->get_row( $usql  );


$action		=	"add";
if(isset($_GET['action'])){
	$action	=	$_GET['action'];	
}

if($action=="delete") {

$delete		=	$wpdb->query(
							"DELETE FROM $table WHERE id='$id'"
						);
						
$isuccess	=	"Playlist deleted successfully";						
						
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


if(isset($_REQUEST['tcolor1']) && $_REQUEST['tcolor1']!="")
{
  $tcolor1=$_REQUEST['tcolor1'];
}
else
{
  $tcolor1 = 'ffffff'; //$c[$rnd];
}

if(isset($_REQUEST['tcolor2']) && $_REQUEST['tcolor2']!="")
{
  $tcolor2=$_REQUEST['tcolor2'];
}
else
{
  $tcolor2 = 'a19b9b'; //$c[$rnd];
}


if(isset($_REQUEST['dlicon']) && $_REQUEST['dlicon']!="")
{
  $dlicon=$_REQUEST['dlicon'];
}
else
{
  $dlicon = 'http://html5.svnlabs.com/html5plus/download.png'; //$c[$rnd];
}



if(isset($_REQUEST['dlpos']) && $_REQUEST['dlpos']!="")
{
  $dlpos=$_REQUEST['dlpos'];
}
else
{
  $dlpos = '10'; //$c[$rnd];
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
  $host = 'localhost';
}


if(isset($_REQUEST['tid']) && $_REQUEST['tid']!="")
{
  $tid=" uid = '".$_REQUEST['tid']."' ";
}
else
{
  $tid = '1';  
}


?>



<h2>Manage Payments</h2>


<br />



<?php if(!empty($isuccess)): ?>
        
<span style="color:green;"><?php echo $isuccess; ?></span>

<?php elseif(!empty($ierror)): ?>

<span style="color:red;"><?php echo $ierror; ?></span>
       
<?php endif ?>

<?php if($action=="preview") { ?>

<?php include("preview.php"); ?>

<?php } else { ?>

<table class="wp-list-table widefat fixed" cellspacing="0" style="margin-top:20px;">
	<thead>
	<tr>		
        <th scope="col" width="18%"><a href="#">Playlist</a></th>
      <th scope="col" width="12%" ><a href="#">Email</a></th>
      <th scope="col" width="18%"><a href="#">Amount</a></th>
      <th scope="col" width="18%"><a href="#">Currency</a></th>
      <th scope="col" width="10%"><a href="#">Date</a></th>	
        <th scope="col" width="24%"><a href="#">Transaction ID</a></th>	
     </tr>
	</thead>

	<tfoot>
	<tr>
	    <th scope="col" width="18%"><a href="#">Playlist</a></th>
      <th scope="col" width="12%" ><a href="#">Email</a></th>
      <th scope="col" width="18%"><a href="#">Amount</a></th>
      <th scope="col" width="18%"><a href="#">Currency</a></th>
      <th scope="col" width="10%"><a href="#">Date</a></th>	
        <th scope="col" width="24%"><a href="#">Transaction ID</a></th>		
     </tr>
	</tfoot>

	<tbody id="the-list">
    
    <?php
		$sql		=	"SELECT * FROM $stable where $tid";

		$results 	= 	@$wpdb->get_results( $wpdb->prepare( $sql ) );
	?>
	<?php if( !empty( $results ) ) : ?>
    <?php foreach( $results as $result ): ?>
    <tr>
        <td><a href="admin.php?page=payper_playlist&id=<?php echo $result->id; ?>"><strong>Playlist-<?php echo $result->id; ?></strong></a> <br />(Item: <?php echo $result->pid; ?>)</td>
        <td width="12%"><?php echo $result->email; ?></td>
      <td width="18%"><?php echo $result->amount; ?></td>
      <td width="18%"><?php echo $result->currency; ?></td>
      <td width="10%"><?php echo $result->saledate; ?></td>
        <td width="24%"><?php echo $result->transactionid; ?></td>
	</tr>
	<?php endforeach; ?>
	
	<?php else: ?>
    
    <td class="posts column-posts num" colspan="5">No Item...</td>
    
	<?php endif; ?>
  	
  </tbody>
</table>   

<?php } ?>          

<?php

if(isset($_REQUEST['page']) && $_REQUEST['page']=="payper_saved_playlist") {

echo '<h2>Pay Per View Solution for Multimedia</h2><br>';

}

?>

<table class="wp-list-table widefat fixed" cellspacing="0" style="margin-top:20px;">
	<thead>
	<tr style="padding:5px;">		
        <th align="left" scope="col" width="15%"><a href="#">Title</a></th>
        <th abbr="left" scope="col" width="10%"><a href="#">Transactions</a></th>
        <th align="left" scope="col" width="10%"><a href="#">XML</a></th>
        <th align="left" scope="col" width="10%"><a href="#">Edit</a></th>	
        <th align="left" scope="col" width="10%"><a href="#">Delete</a></th>	
     </tr>
	</thead>

<?php /*?>	<tfoot>
	<tr>
	    <th align="left" scope="col" width="15%"><a href="#">Title</a></th>
        <th align="left" scope="col" width="10%"><a href="#">XML</a></th>
        <th align="left" scope="col" width="10%"><a href="#">Edit</a></th>	
        <th align="left" scope="col" width="10%"><a href="#">Delete</a></th>		
     </tr>
	</tfoot><?php */?>

	<tbody id="the-list">
    
    <?php
		$sql		=	mysql_query("SELECT * FROM `".$table."`");

     while($result = mysql_fetch_assoc($sql))
	 {	
	?>

    <tr>
        <td align="left"><a href="admin.php?page=payper_playlist&id=<?php echo $result['id']; ?>"><?php echo "Playlist-".$result['id']; ?></a></td>
        <td align="left"><a href="admin.php?page=payper_paypal&tid=<?php echo $result['id']; ?>">View</a></td>
        <td align="left" width="10%"><a href="<?php echo "xml/".$result['xml']; ?>" target="_blank"><?php echo $result['xml']; ?></a></td>
        <td align="left" width="10%"><a href="admin.php?page=payper_playlist&action=update&id=<?php echo $result['id']; ?>">Update</a></td>
        <td align="left" width="10%"><a onclick="return confirm('Are you sure?');" href="admin.php?page=payper_playlist&action=delete&id=<?php echo $result['id']; ?>">Delete</a></td>
	</tr>
	
    <?php } ?>
  	
  </tbody>
</table>   
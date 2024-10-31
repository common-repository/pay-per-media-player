<?php


/*$content = '<script type="text/javascript">id="'.$id.'";width="'.$width.'";height="'.$height.'";fcolor="'.$fcolor.'";bcolor="'.$bcolor.'";links="'.$links.'";stitle="'.$stitle.'";size="'.$size.'";</script><script type="text/javascript" src="'.$pluginurl.'payper/payper.js.php"></script>';*/


$content = "\n<!-- PayPer BEGIN -->\n"
                .'<script type="text/javascript">'
                ."\n//<!--\n"
                ."var id = '".$id."';\n"
				."var width = '".$width."';\n"
				."var height = '".$height."';\n"
				."var fcolor = '".$fcolor."';\n"
				."var bcolor = '".$bcolor."';\n"
				."var stitle = '".$stitle."';\n"
				."var size = '".$size."';\n"
				."var links = '".$links."';\n";				

$content .= "\n//-->\n</script>\n";			 

$content .= "\n".'<script type="text/javascript" src="'.$pluginurl.'payper/payper.js.php">';
$content .= "</script>\n";

$content .= "\n<!-- PayPer END -->";
			 



?>
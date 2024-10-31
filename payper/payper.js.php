<?php include_once("config.php"); ?>(function(){
	var url = "<?php echo $siteurl; ?>payper.php";
	
	var current_location = window.location;
	if(typeof id != 'undefined') {
		url += "?id="+id;
	}

	url += "&host="+current_location;

	if(typeof width != 'undefined') {
	  	url += "&width="+width;
	} else {
		url += "&width=414";
	}
	
	
	if(typeof height != 'undefined') {
	  	url += "&height="+height;
	} else {
		url += "&height=314";
	}
	
	if(typeof fcolor != 'undefined') {
	  	url += "&fcolor="+fcolor;
	} else {
		url += "&fcolor=000000";
	}
	
	if(typeof bcolor != 'undefined') {
	  	url += "&bcolor="+bcolor;
	} else {
		url += "&bcolor=ff0000";
	}
	
	if(typeof links != 'undefined') {
	  	url += "&links="+links;
	} else {
		url += "&links=0";
	}
	
	if(typeof stitle != 'undefined') {
	  	url += "&stitle="+stitle;
	} else {
		url += "&stitle=0";
	}
	
	if(typeof size != 'undefined') {
	  	url += "&size="+size;
	} else {
		url += "&size=full";
	}
	
	
 
    
	//alert(url);

	if(typeof id != 'undefined') {
		document.write("<iframe src='" + url + "' frameborder='0' scrolling='no' height='"+height+"' width='"+width+"' allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true'></iframe>");
	} else {
		document.write('<p>ID missing</p>');
	}
   	
})()

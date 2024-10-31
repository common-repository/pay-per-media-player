<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> - jsFiddle demo</title>
  
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
  <link rel="stylesheet" type="text/css" href="video-js.css">
  <script type='text/javascript' src="video.js"></script>
    
  
  <style type='text/css'>
   

  </style>
  


<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
var videojs = _V_("home_video", {sources:[{src:"http://www.808.dk/pics/video/gizmo.mp4", type:"video/mp4"}]});
videojs.addEvent('ended', function(){
    
	alert("sandeep");
    this.src({src:"http://video-js.zencoder.com/oceans-clip.mp4", type: "video/mp4"});
    this.play();
});


});//]]>  

</script>


</head>
<body>
   <video id=home_video class="video-js vjs-default-skin" controls preload="auto" width=640 height=264></video>


  
</body>


</html>


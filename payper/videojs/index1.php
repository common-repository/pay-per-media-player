<!DOCTYPE html>
<html>
<head>
  <title>Video.js | HTML5 Video Player</title>

  <!-- Chang URLs to wherever Video.js files will be hosted -->
  <link href="video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    _V_.options.flash.swf = "video-js.swf";
  </script>


</head>
<body>

  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264" poster="http://video-js.zencoder.com/oceans-clip.png" data-setup="{}">
    <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />    
  </video>

</body>
</html>

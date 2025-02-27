<!DOCTYPE html>
<html>
<head>
  <title>Video.js | HTML5 Video Player | YouTube Demo</title>

  <!-- Change URLs to wherever Video.js files will be hosted -->
  <link href="video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="video.js"></script>

</head>
<body>

  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="360"
      data-setup='{"techOrder":["youtube","html5"],"ytcontrols":false}'>
    <source src="http://www.youtube.com/watch?v=qWjzVHG9T1I" type='video/youtube' />
  </video>

</body>
</html>
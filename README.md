# projector
are you tired of changing from powerpoint to videoplayer to web browser in front of your audience?  
or do you want the same screen on 50+ computers?  

here is a universal browser based display script  

copy all files to /Library/WebServer/Documents/projector  
export your powerpoint slides as jpg 2048x1536 pixel and any other media files to /Library/WebServer/Documents/projector/cache  
(jpg, mp3, ...)
also drag and drop urls of local and remote websites to the cache directory   

start server  
```
sudo php -S 0.0.0.0:80 -t /Library/WebServer/Documents/projector -c /Library/WebServer/Documents/projector/php.ini
```

open administration browser http://0.0.0.0/admin.php  (aka server)  
open display browser on the remote computer with projector attached to http://[adminip]/slide.php  (aka client)  

![screenshot](screenshot.jpg "admin")

the links top right to let the client refresh or show a black screen
  
note 1: chrome is the best client browser AFAIK
note 2: start all videos manually  for the first time (right click in the client browser) due to security restraints 
note 3: webrtc needs an additional client browser plugins

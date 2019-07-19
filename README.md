# projector
tired of changing from powerpoint(r) to videoplayer to web browser in front of your audience?  
or do you want to have the same screen on 50+ computers?  

here is a universal browser based powerpoint(r) replacement  

copy all files to /Library/WebServer/Documents/projector  
export your powerpoint slides as jpg 2048x1536 pixel and any other media files to /Library/WebServer/Documents/projector/cache  
(jpg, mp3, apple urls, ...)

```
sudo php -S 0.0.0.0:80 -t /Library/WebServer/Documents/projector -c /Library/WebServer/Documents/projector/php.ini
```

point your administration browser to http://0.0.0.0/admin.php  (aka server)  
point your display browser on the remote computer with projector attached to http://[adminip]/slide.php  (aka client)  

![screenshot](screenshot.jpg "admin")

the two links top right to let the client refresh or show a black screen
  
note 1: chrome is the best client browser AFAIK
note 2: start the video manually (first time) with right click in the client browser  
note 3: webrtc needs an additional client browser plugins

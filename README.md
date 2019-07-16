# projector
a universal browser based powerpoint(r) replacement  

copy all files to /Library/WebServer/Documents/projector  
export powerpoint slides as jpg 2048x1536 pixel and  
coyp all media files to /Library/WebServer/Documents/projector
(jpg, mp3, apple urls, ...)

```
sudo php -S 0.0.0.0:80 -t /Library/WebServer/Documents/projector -c /Library/WebServer/Documents/projector/php.ini
```

point your administrator browser to http://0.0.0.0/admin.php  
point your display browser on the remote computer with projector to http://[admin]/display.php  

![screenshot](screenshot.jpg "admin")

the two links top right let the display refresh or go black 
all other media are picked up by the admin script

note 1: for webrtc the display browser will need some extensions  
note 2: some display browsers will need to start the video manually (first time only)

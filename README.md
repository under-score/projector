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
point your display browser on the remote computer with projector attached to http://[adminip]/slide.php  

![screenshot](screenshot.jpg "admin")

the two links top right let the display refresh or go black 
all other media will be picked up by the admin script  
  
note 1: chrome is the best display browser  
note 2: start the video manually (first time) with right click in display browser

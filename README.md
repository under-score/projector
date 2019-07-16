# projector
a universal browser based powerpoint(r) replacement  

copy all files to /Library/WebServer/Documents/projector  
coyp the media files to /Library/WebServer/Documents/projector
(jpg, mp3, links...)

```
sudo php -S 0.0.0.0:80 -t /Library/WebServer/Documents/projector -c /Library/WebServer/Documents/projector/php.ini
```

point your administrator browser to http://0.0.0.0/admin.php  
point your display browser with attached to http://0.0.0.0/display.php  

![screenshot](screenshot.jpg "admin")

the admin script collects all media in the cache directory   

the two links top right let the display refresh or go black  
all other links let the display change to the selected media    

note 1: for webrtc the display browser will need some extensions
note 2: some display browsers will need to start the video manually (first time only)

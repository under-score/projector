# projector
a universal browser based powerpoint(r) replacement  

copy all files to /Library/WebServer/Documents/projector
coyp all media files to /Library/WebServer/Documents/projector
(jpg, mp3, links

```
sudo php -S 0.0.0.0:80 -t /Library/WebServer/Documents/projector -c /Library/WebServer/Documents/projector/php.ini
```

point your administrator browser to http://0.0.0.0/admin.php  
point your display computer to http://0.0.0.0/link.php  

![screenshot](screenshot.jpg "admin")  

The admin script collects all media in the cache directory  
By clicking the links in the admininistrator window the display shows the selected media  

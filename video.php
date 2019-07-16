<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

<link rel="stylesheet" type="text/css" href="projector.css" />

<?
$get["refresh"]="false";
require('status.php');

function scd($dir) {
  $files = preg_grep("/.*\.(mp4|mp3)$/", scandir($dir));
  $files2=[];
  foreach ($files as $file) {
    $files2[$file] = filemtime($dir .'/' . $file);
  }
  $files = array_keys($files2);
  return $files;
}
$files= scd("cache");
$fn = $files[$status["position"]-1];
?>
</head>

<body>

<div id="main">

<section>
<video id="video" autoplay preload="true" style="object-fit:cover;width:100%;height:auto;">
<source src="cache/<? echo $fn;?>#t=0.5" type="video/mp4"/>
</video>
</section>

</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="projector.js"></script>

</body>
</html>
 
<!DOCTYPE HTML>

<head>
<base href="<? echo basename(__DIR__) ?>">

<link rel="stylesheet" type="text/css" href="projector.css" />

<?
$get["refresh"]="false";
require('status.php');

function scd3($dir) {
  $files = preg_grep("/^.*\.(webloc)$/", scandir($dir));
  $files2=[];
  foreach ($files as $file) {
    $handle = fopen("$dir/$file", "r");
    $str = fread($handle, filesize("$dir/$file"));
    fclose($handle);
    if (preg_match('/(http.*)[\x08|<]/', $str, $match) == 1) {
      $files2[] = $match[1];
    }
  }
  return $files2;
}

$files= scd3("cache");
$status["position"] = $status["position"]>sizeof($files) ? 1 : $status["position"];
$fn = $files[$status["position"]-1];
?>
</head>

<body>

<iframe
name="if" 
id="if"
frameBorder="0"
allowusermedia allow="autoplay; fullscreen; geolocation; camera; microphone; encrypted-media;" 
webkitallowfullscreen="true"
mozallowfullscreen="true"
scrolling="true"
src="<? echo $fn; ?>"
onload='loaded="true";'
></iframe>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="projector.js"></script>

</body>
</html>

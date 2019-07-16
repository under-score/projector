<!DOCTYPE HTML>

<head>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

<link rel="stylesheet" type="text/css" href="projector.css" />
</head>

<body>
<div id="main">

<?
$get["refresh"]="false";
require('status.php');

function scd($dir,$strg) {
  $files = preg_grep("/^.*\.(".$strg.")$/", scandir($dir));
  $files2=[];
  foreach ($files as $file) {
    $files2[$file] = filemtime($dir .'/' . $file);
  }
  $files = array_keys($files2);
  return $files;
}

$files= scd("cache","jpeg|jpg");
echo '<div class="center"><img class="projectedimg" src="cache/' . $files[$status["position"]-1] . '"></div>';
?>

</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="projector.js"></script>

</body>
</html>
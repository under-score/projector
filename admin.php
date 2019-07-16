<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>

<!--base href="<? echo basename(__DIR__) ?>"-->

<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="projector.css" />

<?
require('status.php');

set_time_limit(15);

function scd($dir,$strg) {
  $files = preg_grep("/^.*\.(".$strg.")$/", scandir($dir));
  $files2=[];
  foreach ($files as $file) {
    $files2[$file] = filemtime($dir .'/' . $file);
  }
  $files = array_keys($files2);
  return $files;
}

function scdlink($dir) {
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

echo '<div class="menu"><span id="clock"></span> ';
echo '<a href="status.php?black=';
echo $status["black"] == "true" ? "false" : "true";
echo '&redirect=admin" class="activestatus ';
echo $status["black"] == "true" ? "" : "high";
echo '">licht</a> ';
echo '<a href="">refresh</a></div>';
?>

<script>
function startTime() {
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
	var t = setTimeout(startTime,1000);
}

function checkTime(i) {
	if (i < 10) {i = "0" + i};
	return i;
}

$(document).keydown(function(event) {
  event.preventDefault();
});

</script>
</head>

<body onload="startTime();">

<div class="lines">fiatlux</div>

<pre>
screen
<a href="http://localhost/admin.php" target="_new">admin</a> | <a href="http://localhost/<? echo $status["output"]; ?>.php" target="_new">display</a>

<?
$files= scd("cache","jpeg|jpg");
$i=0;
foreach ($files as $k => $value) {
  $i++;
  echo '<div class="';
  echo $status["position"] != $i ? "slide" : "slidehigh";  
  echo '"><a href="status.php?output=slide&refresh=true&redirect=admin&position=' . $i . '" name="' . $i . '" class="activestatus ';
  echo $status["position"] != $i ? "" : "high";  
  echo '">'  . strtolower($value) . '<br>';
  echo '</div>' . PHP_EOL;
}

$files= scd("cache","mp3|mp4");
$i=0;
foreach ($files as $k => $value) {
  $i++;
  echo '<a name="'.$value.'" href="status.php?output=video&refresh=true&redirect=admin&position=' . $i . '" class="activestatus ';
  echo $status["output"]=="video" & $status["position"]== $i  ? "high" : "";
  echo '">'.$value.'</a> '.PHP_EOL;
}

$files= scdlink("cache");
$i=0;
foreach ($files as $k => $value) {
  $i++;
  echo '<a name="'.$value.'" href="status.php?output=link&refresh=true&redirect=admin&position=' . $i . '" class="activestatus ';
  echo $status["output"]=="link" & $status["position"]== $i  ? "high" : "";
  echo '">'.$value.'</a> '.PHP_EOL;
}
?>
</body>
</html>
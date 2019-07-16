<?
foreach($_GET as $k => $v) {
  $get[$k] = is_array($_GET[$k]) ? filter_var_array($_GET[$k], FILTER_SANITIZE_STRING) : filter_var($_GET[$k], FILTER_SANITIZE_STRING);
}
$callback = $get['callback'];
$status = parse_ini_file(__DIR__.'/status.txt');
foreach($status as $k => $v) {
  $status[$k] = $status[$k] == $get[$k] ||  !isset($get[$k]) ? $status[$k] : $get[$k];
  $out .= $k .'="' . $status[$k] . '"' . PHP_EOL;
}
file_put_contents(__DIR__.'/status.txt',$out);
if ($get["redirect"]!="" ) header('Location: '.$get["redirect"].'.php');
if (count($_GET)) echo $callback . "(" . json_encode($status) . ")";
?>
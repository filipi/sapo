<?PHP
$myPATH = ini_get('include_path') . ':./include:../include:../../include';
ini_set('include_path', $myPATH);
include("conf.inc");



echo "<PRE>";
var_dump($origins);

echo "=========================== Legacy HPS  Queue Status ===========================\n";
$command = $dest['shell'] . " " . $dest['host'] . " " . $dest['queue_status'];
$output = `$command`;
echo $output;

echo "============================= Head Node Disk Usage =============================\n";
$command = $dest['shell'] . " " . $dest['host'] . " " . $dest['disk_free'];
$output = `$command`;
echo $output;

echo "</PRE>";
?>
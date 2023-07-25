<?PHP
$myPATH = ini_get('include_path') . ':./include:../include:../../include';
ini_set('include_path', $myPATH);
include("conf.inc");

echo "<PRE>";
//var_dump($origins);

echo "=============================== HPC Queue Status ===============================\n";
$command = $dest['shell'] . " " . $dest['host2'] . " " . $dest['new_queue_status'];
$output = `$command`;
echo $output;
echo "\n";
echo "\n";
echo "=========================== Legacy HPC  Queue Status ===========================\n";
$command = $dest['shell'] . " " . $dest['host'] . " " . $dest['old_queue_status'];
$output = `$command`;
echo $output;
echo "\n";
echo "\n";
echo "============================= Head Node Disk Usage =============================\n";
$command = $dest['shell'] . " " . $dest['host'] . " " . $dest['disk_free'];
$output = `$command`;
echo $output;
echo "\n";
echo "\n";
echo "</PRE>";

$command = "ssh marfim cat /damarea/filipi/channeltracker/opencv/isolinhas_Ricardo/cropped/frame92.mini.png";
$figura = `$command`;
echo "<h2>in-situ Image preview</h2>";
echo "<img alt=\"pass through image\" src=\"data:image/png;base64," . base64_encode($figura) . "\" />";
?>
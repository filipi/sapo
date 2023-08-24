<?PHP
$myPATH = ini_get('include_path') . ':./include:../include:../../include';
ini_set('include_path', $myPATH);
include("conf.inc");

if (!in_array($_SERVER["REMOTE_ADDR"], $origins)){
  http_response_code(404);
  die();
}

echo "<PRE>";
//var_dump($origins);
//echo $_SERVER["REMOTE_ADDR"] . "\n";

echo "=============================== HPC Queue Status ===============================\n";
$command = $dest['shell'] . " " . $dest['hostname'][3] . " " . $dest['new_queue_status'];
$output = `$command`;
echo $output;
echo "\n";
$command = $dest['shell'] . " " . $dest['hostname'][3] . " " . $dest['new_nodes_status'];
$output = `$command`;
echo $output;
echo "\n";
echo "\n";
echo "=============================== HPC Queue Status ===============================\n";
$command = $dest['shell'] . " " . $dest['hostname'][2] . " " . $dest['new_queue_status'];
$output = `$command`;
echo $output;
echo "\n";
$command = $dest['shell'] . " " . $dest['hostname'][2] . " " . $dest['new_nodes_status'];
$output = `$command`;
echo $output;
echo "\n";
echo "\n";
echo "=============================== HPC Queue Status ===============================\n";
$command = $dest['shell'] . " " . $dest['hostname'][1] . " " . $dest['new_queue_status'];
$output = `$command`;
echo $output;
echo "\n";
$command = $dest['shell'] . " " . $dest['hostname'][1] . " " . $dest['new_nodes_status'];
$output = `$command`;
echo $output;
echo "\n";
echo "\n";
echo "=========================== Legacy HPC  Queue Status ===========================\n";
$command = $dest['shell'] . " " . $dest['hostname'][0] . " " . $dest['old_queue_status'];
$output = `$command`;
echo $output;
echo "\n";
echo "\n";
echo "============================= Head Node Disk Usage =============================\n";
$command = $dest['shell'] . " " . $dest['hostname'][0] . " " . $dest['disk_free'];
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
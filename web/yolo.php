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

$command = "ssh marfim cat /damarea/filipi/channeltracker/opencv/isolinhas_Ricardo/cropped/frame92.mini.png";

#ROTATE=-1.57
#TTE=68x64+147+58
#TRH=56x50+150+127
#ETE=44x46+117+206
#ERH=46x45+193+207

$FS_BRIGHT=34;
$FS_CONT=17;

#THRESH=12

$fswebcam = "/usr/bin/fswebcam";
$command = $fswebcam . " -r 1280x720 -F 15 -S 0 -D 0 -p YUYV --png 9 -s brightness=". $FS_BRIGHT . "% -s contrast=". $FS_CONT . " --quiet -d v4l2:/dev/video0 --no-banner - ";

$command = "cd /tmp; " . $fswebcam . " -r 1280x720 -F 15 -S 0 -D 0 -p YUYV --png 9 -s brightness=". $FS_BRIGHT . "% -s contrast=". $FS_CONT . " --quiet -d v4l2:/dev/video0 --no-banner --save /tmp/teste.png; /usr/local/GrandeIdeia/darknet-filipi/darknet detect /usr/local/GrandeIdeia/darknet-filipi/cfg/yolov3.cfg /usr/local/GrandeIdeia/yolov3.weights /tmp/teste.png 2>/dev/null;";

//echo "<PRE>\n";
//echo $command;
//echo "</PRE>\n";

$detections = `$command`;
//$detections = '{"time": 8.238648, "detections":[{"class":"refrigerator","accuracy":55,"x":0.268663,"y":0.747496,"w":0.113972,"h":0.330167},{"class":"tvmonitor","accuracy":95,"x":0.445084,"y":0.255795,"w":0.042415,"h":0.091687},{"class":"tvmonitor","accuracy":68,"x":0.359001,"y":0.492310,"w":0.104961,"h":0.145139},{"class":"chair","accuracy":97,"x":0.520784,"y":0.675333,"w":0.064489,"h":0.295906},{"class":"chair","accuracy":77,"x":0.125792,"y":0.440936,"w":0.065797,"h":0.178660},{"class":"chair","accuracy":66,"x":0.273204,"y":0.387098,"w":0.044044,"h":0.151356},{"class":"bottle","accuracy":53,"x":0.350815,"y":0.541089,"w":0.012717,"h":0.063072},{"class":"person","accuracy":97,"x":0.488964,"y":0.529296,"w":0.111176,"h":0.284606},]}';

$detections = str_replace("},]}", "}]}", $detections);
$yoloResult = json_decode($detections, true);

$command = "convert /tmp/predictions.jpg /tmp/predictions.png; cat /tmp/predictions.png";
$figura = `$command`;

//echo "<PRE>\n";
//echo $detections . "\n";
//var_dump($yoloResult);
//echo "</PRE>\n";

echo "<h2>Teste de contagem de pessoas no ProtoLab</h2>";

foreach($yoloResult['detections'] as $chave => $valor){
  //echo "<B>". $chave . ": </B><BR>";
  if ($valor['class'] == 'person'){
  foreach($yoloResult['detections'][$chave] as $chave2 => $valor2){
    echo "<B>". $chave2 . ": </B>". $valor2 . "<BR>";
  }
  }
}

echo "<img alt=\"pass through image\" src=\"data:image/png;base64," . base64_encode($figura) . "\" />";

#    fswebcam \
#	-F 15 -S 0 -D 0 \
#	-p YUYV --png 9 $dname \
#	-s brightness=${FS_BRIGHT}% -s contrast=${FS_CONT} \
#	--quiet -d v4l2:/dev/video0 --no-banner --save teste.png #- | img2sixel -w 720

## based on
## https://www.linuxquestions.org/questions/linux-hardware-18/fswebcam-consistent-image-capture-4175645968/

#    fswebcam \
#	-F 15 -S 0 -D 0 \
#	-p YUYV --png 9 $dname \
#	-s brightness=${FS_BRIGHT}% -s contrast=${FS_CONT} \
#	--quiet -d v4l2:/dev/video0 --no-banner --save teste.png #- | img2sixel -w 720

#    ./darknet detect ./cfg/yolov3.cfg ../yolov3.weights teste.png 2>/dev/null

#    img2sixel predictions.jpg -w 720

?>

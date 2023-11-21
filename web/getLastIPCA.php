<?PHP
$meses['Jan']='01';
$meses['Fev']='02';
$meses['Mar']='03';
$meses['Abr']='04';
$meses['Mai']='05';
$meses['Jun']='06';
$meses['Jul']='07';
$meses['Ago']='08';
$meses['Set']='09';
$meses['Out']='10';
$meses['Nov']='11';
$meses['Dez']='12';

$URL = "https://www.ibge.gov.br/explica/inflacao.php";
$command = 'wget ' . $URL . ' -q -O - | html2text | grep -A 2 "IPCA do último mês" | grep -v IPCA | tr -d "\n" | tr -s " "';
$IPCA = `$command`;


if ($IPCA){       
  $arrayIPCA = explode("%", $IPCA, 2);
  $variacao = str_replace(",", ".", $arrayIPCA[0]);
  if (floatval(trim($variacao))){
    $arrayData = explode("/", $arrayIPCA[1]);
    $mes = $meses[trim($arrayData[0])];
    $ano = $arrayData[1];
  }
}

if (floatval($variacao) && intval($mes) && intval($ano))
  $sucesso = 1;
else
  $sucesso = 0;

$result['sucesso'] = $sucesso;
$result['varicao'] = floatval(trim($variacao));
$result['mes'] = $mes;
$result['ano'] = $ano;

echo json_encode($result);
?>

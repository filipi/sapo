<?PHP
$i = 0;
$precos = `wget https://www.us-nano.com/inc/sdetail/34298 -q -O - | grep ecdProdOptions | grep esmR`;

//echo $precos;
$arrayPrecos = explode("<option", $precos);
foreach ($arrayPrecos as $preco){
  if (strpos($preco, "value")){
    $pattern = '/(.*)?>(.*)?\(add\s\$(.*)?\).*/i';
    $replacement = '${2} -- ${3}';
    //echo preg_replace($pattern, $replacement, $preco) . "\n";
    preg_match($pattern, $preco, $resultado);
        
    //var_dump($resultado);
    $i++;
    $tabelaPrecos[$i]['nome'] = $resultado[2];
    $tabelaPrecos[$i]['preco'] = $resultado[3];
  }
}

foreach ($tabelaPrecos as $item){
  echo "<B>Produto:</B> " .$item['nome'] . " - <B>Preço:</B> US$ " . $item['preco'] . "<BR>";
}
//echo json_encode($tabelaPrecos);
?>
<?PHP
//URL: https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/aplicacao#!/

//echo "<a href=\"https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/aplicacao#!/ \">";
//echo "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/aplicacao#!/</a><BR>";


$base = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/";
$recurso = "CotacaoDolarDia";

//$comando = "wget -q -O - " . $base . $recurso . "?\$format=json";
//https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarDia(dataCotacao=@dataCotacao)?@dataCotacao='12-21-2023'&$top=100&$format=json
$URL = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarDia(dataCotacao=@dataCotacao)?@dataCotacao='12-07-2023'&\$top=100&\$format=json";
$comando = "wget -q -O - \"" . $URL . "\"";

echo "<PRE>" . $comando . "<PRE>";
$resultado = `$comando`;

$array =  json_decode($resultado);
var_dump($array);

  /*

[codigo_recurso]?$format=json&[Outros Parâmetros]


Endereço padrão:
https ://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/[codigo_recurso]?$format=json&[Outros Parâmetros]

Os parâmetros disponíveis podem ser visualizados na documentação

Os códigos dos recursos disponibilizados são: Moedas, CotacaoDolarDia, CotacaoDolarPeriodo, CotacaoMoedaDia, CotacaoMoedaPeriodo

  Formatos de Retorno:
  Por padrão os dados podem ser retornados em 4 formatos:

  json (Padrão)
  xml
  text/csv
  text/htmlEndereço padrão:
  https ://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/[codigo_recurso]?$format=json&[Outros Parâmetros]

  Os parâmetros disponíveis podem ser visualizados na documentação

  Os códigos dos recursos disponibilizados são: Moedas, CotacaoDolarDia, CotacaoDolarPeriodo, CotacaoMoedaDia, CotacaoMoedaPeriodo

    Formatos de Retorno:
    Por padrão os dados podem ser retornados em 4 formatos:

  json (Padrão)
  xml
  text/csv
  text/html

*/

?>
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); 
$ponteiro = fopen ("http://www.atibaia.sp.gov.br/pat/vagas.asp", "r");
	
$StringJson = "[";
$contaLinhas = 0;
while (!feof ($ponteiro)) 
{
  $exibe = 1;
  $linha = fgets($ponteiro,9000);
  
  $TLinha = explode('centralizado fs12 negrito', $linha);
  if (count($TLinha) > 1 ) 
  {
      $contaLinhas++;
  }
    
  if ($contaLinhas == 18)  {
  $QTD = trim(strip_tags($linha));
  
  if ($StringJson != "[") {$StringJson .= ",";}
  $StringJson .= '{"VAGA":"' . $VAGA . '",';
  $StringJson .= '"URL":"http://www.atibaia.sp.gov.br/pat/v_vaga.asp?c=' . $URL . '",';
  $StringJson .= '"CIDADE":"' . $CIDADE . '",';
  $StringJson .= '"QTD":"' . $QTD . '"}';   
  $contaLinhas = 0;} 

  if ($contaLinhas == 17) $contaLinhas++;
  if ($contaLinhas == 16) $contaLinhas++;
  if ($contaLinhas == 15) $contaLinhas++;
  if ($contaLinhas == 14) $contaLinhas++;
  if ($contaLinhas == 13)  {
  $CIDADE = trim(strip_tags($linha));
  $contaLinhas++;  } 
  if ($contaLinhas == 12) $contaLinhas++;
  if ($contaLinhas == 11) $contaLinhas++;
  if ($contaLinhas == 10) $contaLinhas++;
  if ($contaLinhas == 9) $contaLinhas++;    
  if ($contaLinhas == 8)  {
    $VAGA = trim(strip_tags($linha));
    $contaLinhas++;  }     
  if ($contaLinhas == 7) $contaLinhas++;      
  if ($contaLinhas == 6) $contaLinhas++;       
  if ($contaLinhas == 5) $contaLinhas++;      
  if ($contaLinhas == 4) $contaLinhas++;  
  if ($contaLinhas == 3)  {
    $URL = trim(strip_tags($linha));
    $contaLinhas++;  } 
  if ($contaLinhas == 2) $contaLinhas++;
  if ($contaLinhas == 1) $contaLinhas++;
  
  
  /*
  if ($StringJson != "[") {$StringJson .= ",";}
  $StringJson .= '{"VAGA":"' . $VAGA . '",';
  $StringJson .= '"URL":"' . $URL . '",';
  $StringJson .= '"EMPRESA":"' . $EMPRESA . '"}';   */ 
  
}
    //echo $StringJson . "]"; 
    $fp = fopen("json-pat.php", "w");
    $escreve = fwrite($fp, '<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); ?>');
    $escreve = fwrite($fp, ($StringJson . "]"));
    fclose($fp);
	fclose ($ponteiro);
?>
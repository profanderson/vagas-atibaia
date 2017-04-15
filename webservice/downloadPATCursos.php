<?php
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8"); 
$ponteiro = fopen ("http://www.atibaia.sp.gov.br/pat/cursos.asp", "r");
	
$StringJson = "[";
$contaLinhas = 0;
while (!feof ($ponteiro)) 
{
  $exibe = 1;
  $linha = fgets($ponteiro,9000);
  
  $TLinha = explode('esquerda fs14', $linha);
  if (count($TLinha) > 1 ) 
  {
      $contaLinhas++;
  }
    
  if ($contaLinhas == 19) {
  $MATRICULA = trim(strip_tags($linha));
      
  if ($StringJson != "[") {$StringJson .= ",";}
  $StringJson .= '{"LOCAL":"' . $LOCAL . '",';
  $StringJson .= '"CURSO":"' . $CURSO . '",';
  $StringJson .= '"PERIODO":"' . $PERIODO . '",';
  $StringJson .= '"URL":"http://www.atibaia.sp.gov.br/pat/' . $URL . '",';
  $StringJson .= '"MATRICULA":"' . $MATRICULA . '"}';   
  $contaLinhas = 0;   
  } 
  if ($contaLinhas == 18) $contaLinhas++;  
  if ($contaLinhas == 17) $contaLinhas++;
  if ($contaLinhas == 17) $contaLinhas++;
  if ($contaLinhas == 16) $contaLinhas++;
  if ($contaLinhas == 15) $contaLinhas++;
  if ($contaLinhas == 14) {
  $linha = str_replace("<br />", " ", $linha);
  $PERIODO .= " à " . trim(strip_tags($linha));
  $contaLinhas++;  } 
  if ($contaLinhas == 13) $contaLinhas++; 
  if ($contaLinhas == 12) $contaLinhas++;
  if ($contaLinhas == 11) {
  $linha = str_replace("<br />", " até ", $linha);
  $PERIODO = trim(strip_tags($linha));
  $contaLinhas++;  } 
  if ($contaLinhas == 10) $contaLinhas++;
  if ($contaLinhas == 9) $contaLinhas++;    
  if ($contaLinhas == 8)  {
    $LOCAL = trim(strip_tags($linha));
    $contaLinhas++;  }     
  if ($contaLinhas == 7) $contaLinhas++;      
  if ($contaLinhas == 6) $contaLinhas++;       
  if ($contaLinhas == 5) $contaLinhas++;      
  if ($contaLinhas == 4) $contaLinhas++;  
  if ($contaLinhas == 3)  {
    $CURSO = trim(strip_tags($linha));
    $contaLinhas++;  } 
  if ($contaLinhas == 2) {
    $linha = explode('"', $linha);
    $URL = $linha[1];   
    $contaLinhas++; }
  if ($contaLinhas == 1) $contaLinhas++;
    
  /*
  if ($StringJson != "[") {$StringJson .= ",";}
  $StringJson .= '{"VAGA":"' . $VAGA . '",';
  $StringJson .= '"URL":"' . $URL . '",';
  $StringJson .= '"EMPRESA":"' . $EMPRESA . '"}';   */ 
  
}
    //echo $StringJson . "]"; 
    $fp = fopen("json-pat-cursos.php", "w");
    $escreve = fwrite($fp, '<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); ?>');
    $escreve = fwrite($fp, ($StringJson . "]"));
    fclose($fp);
	fclose ($ponteiro);
?>
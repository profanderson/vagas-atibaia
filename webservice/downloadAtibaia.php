<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=windows-1252"); 
$ponteiro = fopen ("http://www.atibaia.com.br/vagas/index.asp", "r");
	
$StringJson = "[";
while (!feof ($ponteiro)) 
{
  $exibe = 1;
  $linha = fgets($ponteiro,9000);
  $achei = explode('<font size="1"><a href="', $linha);
  if (isset($achei[1]))
  {
        $achei = $achei[1];
        $link = explode('" class="menu1"><b>', $achei);
        $URL = "http://atibaia.com.br/vagas/" . $link[0];
        $VAGA = trim(strip_tags($link[1]));    
        $VAGA = str_replace('"',' ', $VAGA);  
   }    
  $achei2 = explode('<td width="35%" bgcolor="#FFFFFF"><center><font size="1" color="#606060"><b>', $linha);    
  if (isset($achei2[1]))    
  {
        $EMPRESA = trim(strip_tags($achei2[1]));
        if ($StringJson != "[") {$StringJson .= ",";}
        $StringJson .= '{"VAGA":"' . $VAGA . '",';
        $StringJson .= '"URL":"' . $URL . '",';
		$StringJson .= '"EMPRESA":"' . $EMPRESA . '"}';    
  } 
}
    //echo $StringJson . "]"; 
    $fp = fopen("json-atibaia.php", "w");
    $escreve = fwrite($fp, '<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=windows-1252"); ?>');
    $escreve = fwrite($fp, ($StringJson . "]"));
    fclose($fp);
	fclose ($ponteiro);
?>
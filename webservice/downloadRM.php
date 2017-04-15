<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=iso-8859-1"); 
$ponteiro = 0;
$ponteiro = fopen("http://www.softwarerh.com.br/empregos/rmrecursoshumanos", "r");
/*
    TESTES:
    http://www.softwarerh.com.br/empregos/rmrecursoshumanos
    http://www.softwarerh.com.br/empregos/partner-rh    
    http://www.softwarerh.com.br/empregos/lavoropiudobrasil
*/
$StringJson = "[";
while (!feof ($ponteiro)) 
{
    $exibe = 1;
    $linha = fgets($ponteiro,9000);
    $posicao = strripos($linha,'trunk_30 desc');

    if (strripos($linha,'trunk_30 desc')) 
    {	
        if ($exibe > 0) 
        { 
            $linha = str_replace('imagens/ico_urgente.gif', 'http://www.softwarerh.com.br/empregos/imagens/ico_urgente.gif', $linha ); 
            //$linha = str_replace('../api/vaga-de-emprego.php?de=', 'https://www.softwarerh.com.br/api/vaga-de-emprego.php?de=', $linha );
            
            $link = explode("?de=", $linha);
            $link = $link[1];
            $link = explode('"', $link);
            $link = "https://www.softwarerh.com.br/api/vaga-de-emprego.php?de=" . $link[0];
            
            $separa = explode("</td>", $linha);
            $vaga = trim(strip_tags($separa[0]));
            $salario = strip_tags($separa[1]);
            $local = strip_tags($separa[2]);

            if ($StringJson != "[") {$StringJson .= ",";}
			$StringJson .= '{"VAGA":"' . $vaga . '",';
            $StringJson .= '"SALARIO":"' . $salario . '",';
            $StringJson .= '"URL":"' . $link . '",';
			$StringJson .= '"LOCAL":"' . $local . '"}';            
        }
    }
}
    //echo $StringJson . "]"; 
    $fp = fopen("json-rmrh.php", "w");
    $escreve = fwrite($fp, '<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=utf-8"); ?>');
    $escreve = fwrite($fp, ($StringJson . "]"));
    fclose($fp);
    fclose ($ponteiro);
?>
<?php
ini_set("max_execution_time",10);

$ch = curl_init();
curl_setopt($ch, CURLOPT_COOKIE, 'PHPSESSID=9c85353dc6f8bf99e0a0f6f155dbbdf962840c73');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "http://wow.sinfocol.org/wargame/captchas/captcha_cinco.php");
//Código para decodificar las entidades, codificar la url y enviar los datos
 $result = curl_exec($ch);
 $posic = strpos($result,"digo es = ")+7;
$codigo = trim(strip_tags(mb_substr(html_entity_decode($result),$posic,600)));



curl_setopt($ch, CURLOPT_POST, true );
curl_setopt($ch, CURLOPT_POSTFIELDS, "codigo=".urlencode($codigo) );
$result2 = curl_exec($ch);

echo $result;
echo "<br><br><br><br>";
echo $result2;
die;


/*
El c�digo es = ­äèêØÕ¬âÆØéÀÃåÈî®¾ÏèÐÓ¼ï



La respuesta del reto es Entidades_HTML_8859
The answer is Entidades_HTML_8859
*/


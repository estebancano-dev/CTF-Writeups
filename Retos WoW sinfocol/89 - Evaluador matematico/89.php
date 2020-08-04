<?php
include('math.php');
$m = new EvalMath;
ini_set("max_execution_time",10);

$ch = curl_init();
curl_setopt($ch, CURLOPT_COOKIE, 'PHPSESSID=9c85353dc6f8bf99e0a0f6f155dbbdf962840c73');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "http://wow.sinfocol.org/wargame/captchas/captcha_seis.php");
 $cadena = curl_exec($ch);

$posic = strpos($cadena,"<pre>");
$posic2 = strpos($cadena,"</pre>");
$codigo = trim(strip_tags(substr($cadena,$posic+6,$posic2-$posic)));
$result = (int)$m->evaluate($codigo); // parte entera

curl_setopt($ch, CURLOPT_POST, true );
curl_setopt($ch, CURLOPT_POSTFIELDS, "codigo=".urlencode($result) );
$result2 = curl_exec($ch);

echo $result;
echo "<br><br><br><br>";
echo $result2;
die;
/*

Notice: Undefined offset: -1 in D:\Dropbox\dev\math.php on line 384
-1764245



La respuesta del reto es CaptchA_MATH_Eval
The answer is CaptchA_MATH_Eval
*/
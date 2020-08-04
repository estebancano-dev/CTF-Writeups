<?php
ini_set("max_execution_time",100);

$ch = curl_init();
curl_setopt($ch, CURLOPT_COOKIE, 'PHPSESSID=865475e291ddf9994d931f89d57ef1035973bed1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_ENCODING,  'gzip');
$final="";
$result=$result2=$result3=$codigo="";
for($i=0;$i<4;$i++){
	curl_setopt($ch, CURLOPT_URL, "http://wow.sinfocol.org/wargame/captchas/captcha_cuatro.php");
	$result = curl_exec($ch);
	$codigo = trim(substr($result,strpos($result,"digo es = ")+10,15));
	curl_setopt($ch, CURLOPT_URL, "http://wow.sinfocol.org/wargame/captchas/captcha_cuatro.php?codigo=".urlencode(str_replace("\r", " ", str_replace("\n", " ", $codigo))));
	$result2 = curl_exec($ch);
	$codigo = trim(substr($result2,strpos($result,"digo es = ")+10,15));
	curl_setopt($ch, CURLOPT_URL, "http://wow.sinfocol.org/wargame/captchas/captcha_cuatro.php?codigo=".urlencode(str_replace("\r", " ", str_replace("\n", " ", $codigo))));
	$result3 = curl_exec($ch);	
	$codigo = trim(substr($result3,strpos($result,"digo es = ")+10,15));
	curl_setopt($ch, CURLOPT_URL, "http://wow.sinfocol.org/wargame/captchas/captcha_cuatro.php?codigo=".urlencode(str_replace("\r", " ", str_replace("\n", " ", $codigo))));
	$result4 = curl_exec($ch);
	
	$final.=$result.$result2.$result3.$result4."<br><br><br><br>";
}

echo $final;

/*
El código es = 34 3 0 5 24 1 La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_CaptchaEl código es = 3 21 278 71La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_Captcha



El código es = 1703620 39La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_CaptchaEl código es = 019423 4 3 2La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_Captcha



El código es = 4 3 936 684 La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_CaptchaEl código es = 95 4738009La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_Captcha



El código es = 5 37 65 968La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_CaptchaEl código es = 5 89 9366 43La respuesta del reto es Fast_And_Furious_Captcha
The answer is Fast_And_Furious_Captcha




*/


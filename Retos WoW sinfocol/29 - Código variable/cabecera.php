<?
$fp = fsockopen("wow.sinfocol.org", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET /wargame/captchas/captcha_tres.php HTTP/1.1\r\n";
    $out .= "Host: wow.sinfocol.org\r\n";
    $out .= "Referer: http://wow.sinfocol.org/?page=retos&id=28\r\n";
    $out .= "Cookie: scripts=si; __utma=218910495.1406696169.1334341160.1334364997.1334367050.7; __utmz=218910495.1334341160.1.1.utmcsr=yashira.org|utmccn=(referral)|utmcmd=referral|utmcct=/; PHPSESSID=93cc8cfb8173dfa7c937de836bdb0b30; __utmc=218910495; __utmb=218910495.20.10.1334367050\r\n";
    $out .= "Connection: close\r\n\r\n";
    fwrite($fp, $out);
	$cadena = "";
    while (($cad = fgets($fp, 128)) !== false) {
		$cadena .= $cad;
    }
    fclose($fp);
}
// obtengo el codigo
$posic = strpos($cadena,"El código es = ")+15;
$codigo = trim(substr($cadena,$posic,150));
$codigo = substr($codigo,0,strlen($codigo)-1);
echo $cadena." y el cod es: ".$codigo;
echo "<br>";
//echo "<br>";
//echo  "GET /wargame/captchas/captcha_tres.php?codigo=$codigo".urlencode(":").strlen($codigo)." HTTP/1.1\r\n";
//sleep(1);

//llamo de nuevo con ..php?codigo=$codigo
$fp = fsockopen("wow.sinfocol.org", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET /wargame/captchas/captcha_tres.php?codigo=".trim($codigo).":".strlen(trim($codigo))." HTTP/1.1\r\n";
    $out .= "Host: wow.sinfocol.org\r\n";
    $out .= "Referer: http://wow.sinfocol.org/?page=retos&id=28\r\n";
    $out .= "Cookie: scripts=si; __utma=218910495.1406696169.1334341160.1334364997.1334367050.7; __utmz=218910495.1334341160.1.1.utmcsr=yashira.org|utmccn=(referral)|utmcmd=referral|utmcct=/; PHPSESSID=93cc8cfb8173dfa7c937de836bdb0b30; __utmc=218910495; __utmb=218910495.20.10.1334367050\r\n";
    $out .= "Connection: close\r\n\r\n";
	echo $out;
    fwrite($fp, $out);
	$cadena = "";
    while (($cad = fgets($fp, 128)) !== false) {
		$cadena .= $cad;
    }
    fclose($fp);
}

// obtengo el codigo de nuevo y lo muestro
echo "resultado: $cadena";

// respuesta : Captcha_De_Longitud_Variable
?>

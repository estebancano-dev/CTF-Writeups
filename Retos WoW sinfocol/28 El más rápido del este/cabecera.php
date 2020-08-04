<?
$fp = fsockopen("wow.sinfocol.org", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET /wargame/captchas/captcha_dos.php HTTP/1.1\r\n";
    $out .= "Host: wow.sinfocol.org\r\n";
    $out .= "Referer: http://wow.sinfocol.org/?page=retos&id=28\r\n";
    $out .= "Cookie: scripts=si; __utma=218910495.1406696169.1334341160.1334364997.1334367050.7; __utmz=218910495.1334341160.1.1.utmcsr=yashira.org|utmccn=(referral)|utmcmd=referral|utmcct=/; PHPSESSID=93cc8cfb8173dfa7c937de836bdb0b30; __utmc=218910495; __utmb=218910495.6.10.1334367050\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
	$cadena = "";
    while (($cad = fgets($fp, 128)) !== false) {
		$cadena .= $cad;
    }
    fclose($fp);
}
// obtengo el codigo
$posic = strpos($cadena,"es = ")+5;
$codigo = substr($cadena,$posic,7);
echo $cadena."<br><br><br>";

//sleep(1);

// llamo de nuevo con ..php?codigo=$codigo
$fp = fsockopen("wow.sinfocol.org", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET /wargame/captchas/captcha_dos.php?codigo=$codigo HTTP/1.1\r\n";
    $out .= "Host: wow.sinfocol.org\r\n";
    $out .= "Referer: http://wow.sinfocol.org/?page=retos&id=28\r\n";
    $out .= "Cookie:scripts=si; __utma=218910495.1406696169.1334341160.1334364997.1334367050.7; __utmz=218910495.1334341160.1.1.utmcsr=yashira.org|utmccn=(referral)|utmcmd=referral|utmcct=/; PHPSESSID=93cc8cfb8173dfa7c937de836bdb0b30; __utmc=218910495; __utmb=218910495.6.10.1334367050\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
	$cadena = "";
    while (($cad = fgets($fp, 128)) !== false) {
		$cadena .= $cad;
    }
    fclose($fp);
}

// obtengo el codigo de nuevo y lo muestro
echo "resultado: $cadena";

// respuesta : Captcha_D0SsS
?>

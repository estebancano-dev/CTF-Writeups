<?php
//© 2010 Kratos
$str = '';
$newst = ' ';
for ($i = 0; $i < strlen($str); $i++) {
    $newst .= str_pad(decbin(ord($str[$i])), 8, '0', STR_PAD_LEFT);
}

$matriz = str_split($newst, 7);
$matriz[count($matriz) - 1] = str_pad($matriz[count($matriz) - 1], 7, '1', STR_PAD_RIGHT);

$cifrado = ' ';
foreach ($matriz as $binario) {
    $cifrado .= chr(bindec($binario));
}
echo $cifrado;
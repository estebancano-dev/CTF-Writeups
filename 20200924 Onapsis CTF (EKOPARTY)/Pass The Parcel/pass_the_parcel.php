<?php

// run this shit in linux, windows does not scape characters well lol
exec("7z x pass_the_parcel.zip;mv flag.txt flag0.txt");

$i = 0;
while (true) {
    $arre = explode(chr(10), file_get_contents("flag$i.txt"));
    if (count($arre) != 3) {
        echo "\nEKO{" . trim(file_get_contents("flag$i.txt")) . "}\n\n";
        exec("rm flag*");
        die;
    }
    $i++;
    $nuevo = "flag$i.zip";
    file_put_contents($nuevo, base64_decode($arre[2]));
    $pass = escapeshellarg($arre[0]); // get rid of the escaping nightmare
    exec("7z x -p$pass $nuevo;mv flag.txt flag$i.txt");
}
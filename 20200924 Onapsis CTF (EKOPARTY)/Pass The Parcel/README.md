> Pass the Parcel: In this game, the parcel is the flag. Will you be able to unwrap it?

File: [pass_the_parcel.zip](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200924%20Onapsis%20CTF%20(EKOPARTY)/Pass%20The%20Parcel/pass_the_parcel.zip?raw=true "pass_the_parcel.zip")

If we extract it we have a file called flag.txt with the format

```
%<Yl3H~VFxcJpr[
----------------
UEsDBBQAAwAIAG+CC....

```

The first line is a password, the second is useless and the third its a base64 encoded string

Decoding it we get `PK   o........` thats the magic bytes for a zip file, so i copied that to a new file and renamed it to `flag.zip`

When i tried to extract it, it asks me for a passwod, luckily we have `%<Yl3H~VFxcJpr[`

Its correct, and we get another `flag.txt` file with the same format...  I did the last steps one more time to confirm, and yes, we can spend all day doing this shit and we only get flag.txt with no flag inside.

So here comes the escaping nightmare: i made a script to automatize this in PHP and python (just to learn)

```php
<?php

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
```

```python
import os
import base64
import shlex # to escape shell args

os.system('7z x pass_the_parcel.zip > /dev/null 2>&1;mv flag.txt flag0.txt')
i = 0
while True:
    with open(f'flag{str(i)}.txt', 'rb') as f:
        Lines = f.readlines()

    if len(Lines) != 3:
        os.system(f'rm flag*');
        print('EKO{' + Lines[0].strip().decode() + '}')
        break
    Pass = shlex.quote(Lines[0].strip().decode())  # get rid of the escaping nightmare
    data = Lines[2]

    i += 1
    nuevo = f'flag{str(i)}.zip'
    g = open(nuevo, 'wb')
    g.write(base64.b64decode(data))
    g.close()
    os.system(f'7z x -p{Pass} {nuevo}> /dev/null 2>&1;mv flag.txt flag{str(i)}.txt');
```

Give both of them the original file and will solve the challenge extracting 250 times the file. 

The tricky part of this challenge was the escaping nightmare when calling 7z with the password: it has so many special characters, so in php i solved it with `escapeshellarg()` function and in python with ` shlex.quote()` function

#### ONA{i_hope_you_found_me_with_a_script} -> ONA{1bcdce133fa69cc9ef5a653663a4608514641e12b913063687d34fb18271e1b1}

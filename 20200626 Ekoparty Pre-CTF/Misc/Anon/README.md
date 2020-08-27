> This group es too paranoid
http://paste.ubuntu.com/p/HnGHwGk4rQ/

nos dan un pastebin con 5 links, uno da HTTP Response 200, el resto no. Hacer un script q parsee y vaya entrando a cada uno, si es 200, parsea otra vez

php
```php
<?php
	$url = "http://paste.ubuntu.com/p/HnGHwGk4rQ/";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$resul = curl_exec($ch);
	while (1) {
		if (empty($resul)) {
			curl_close($ch);
			die("vacio");
		}
		preg_match_all('!https?://\S+!', utf8_decode($resul), $listaurls);
		foreach ($listaurls[0] as $v) {
			if (substr($v, 0, 26) === 'http://paste.ubuntu.com/p/') {
				curl_setopt($ch, CURLOPT_URL, $v);
				$sigue = utf8_decode(curl_exec($ch));
				if (strpos($sigue, "does not currently exist") === false) {
					echo "Correct: " . $v . "<br>";
					$resul = $sigue;
					break;
				}
			} else {
				$resul = [];
			}
		}
	}
```
python (provisto por [@josefigueredo](https://twitter.com/josefigueredo "@josefigueredo"))
```python
import requests
from urlextract import URLExtract

url = 'http://paste.ubuntu.com/p/HnGHwGk4rQ/'
extractor = URLExtract()

while True:
	page = requests.get(url)
	urls = extractor.find_urls(page.content.decode('utf-8'))

	for url_ in urls:
		try:
			if 'paste' in url_:
				page = requests.get(url_)
				if page.status_code == 200:
					print('Trying: ' + url_)
					url = url_
					break
		except Exception as e:
			pass
```

en la ultima iteracion, nos devuelve 4 pastes + un base64

`UlV0UGUzQmhjM1JsY0dGemRHVndZWE4wWlM0dUxuQmhjM1JsTGk0dWMzVjRmUT09Cg==`

`RUtPe3Bhc3RlcGFzdGVwYXN0ZS4uLnBhc3RlLi4uc3V4fQ==`

#### EKO{pastepastepaste...paste...sux}

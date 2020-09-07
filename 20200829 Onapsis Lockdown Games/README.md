#### Writeups de ONAPSIS LOCKDOWN GAMES

>Nos dan 6 retos en 7z. Los podemos resolver jugando los juegos o hackeandolos.
La respuesta de cada uno es la clave del 7z siguiente. El formato de la flag es ONA{}. Enviar la flag en un twitt como sigue:

>\#OnaChallenge_Flag
sha3-512(twitter_handle+flag)

Ej: Twitter: \_BrOoDkIlLeR\_
Flag: ONA{This\_is\_FUN}

Twittear:
\#OnaChallenge_Flag
240c12764774682c313184b54f9d5b08d50f769c7e2a6662927586bbdd153b8dd750a6ba37262336b50d288a15d7679a280418b3dbdf866f56d0a29ef9274bc7

------------
------------

## LVL 1
>Archivo: [LVL 1](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/Niveles/Lvl1.7z?raw=true "LVL 1")

En el código, el string HASH es lmhash (era  ONA{0NEW4YF()}). Traté de bruteforcear el código, pero no me funcionó. Luego vi que la gente de Onapsis envió este mensaje:

>Todos aquellos que esten resolviendo el challenge 1, por favor, vuelvan a descargar el archivo. El anterior contenia un error en el hash que ya se encuentra solucionado. Les pedimos disculpas por el error.

Vuelvo a probar de crackear el hash de la variable HASH del principio
crackear en http://rainbowtables.it64.com/

#### Flag: ONA{HASH||GO~}

\#OnaChallenge_Flag 
a149cb7eb23404afc85b7f2c481772f50603d34c1ce6c07a2c1067c34e4b488b0308a175f3db3fe93632a493040733b49b6d014be1756e4de17eb12fdd9a3993

## LVL 2
>Archivo: [LVL 2](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/Niveles/Lvl2.7z?raw=true "LVL 2")

Abrir comprimido. El archivo .music es un mp3 codificado en base64.

Decodificarlo y guardarlo como archivo.mp3
Lo abrí con el Winamp (Si, todavia lo uso) y en file info (Alt+3) vi que tenia un comentario sospechoso. 

`SGVsbG8gR3V5cywgaGVyZSBhcmUg` que decodifica en base 64 a `Hello Guys, here are`

parecia incompleto asi que busqué extraer la 'exif information'. Yo tengo una utilidad que al apretar boton derecho en el archivo me la muestra (MediaInfo, viene con el klite codec pack). Sino utilizar https://mediaarea.net/MediaInfoOnline

Puedo ver lo que muestra la siguiente imagen: [exif.jpg](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/exif.jpg?raw=true "exif.jpg")

Abajo de todo el choclo completo en base 64 hay un tag FLAG. 

T05Be0tuMChraW5fSW50UjBfSGU0dmVOfQ== (base64)

#### Flag: ONA{Kn0(kin_IntR0_He4veN}

\#OnaChallenge_Flag 
7840235e32cce7866592f46d8ed329052cbec0e1ba6c2af989b0e4ddf5bf2890dc4a62d03cdd3aa35e3eb7e6f2f6ae046d707c78fffa8623443a6589c1784a89


## LVL 3
>Archivo: [LVL 3](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/Niveles/Lvl3.7z?raw=true "LVL 3")

un jar (buscaminas)
decompilar con jadx
hay un array con enteros en la clase 'e' 

```
package game;

public final class e {
	private int[] a = {116, 104, 101, 32, 102, 108, 97, 103, 32, 105, 115, 32, 104, 105, 100, 100, 101, 110, 32, 117, 115, 105, 110, 103, 32, 116, 104, 105, 115, 32, 115, 101, 99, 114, 101, 116, 32, 83, 116, 114, 105, 110, 103, 44, 32, 112, 108, 101, 97, 115, 101, 32, 115, 116, 111, 114, 101, 32, 116, 104, 105, 115, 32, 115, 111, 109, 101, 119, 104, 101, 114, 101, 32, 115, 97, 102, 101, 46, 46, 46, 55, 7, 11, 71, 20, 13, 21, 18, 76, 8, 7, 73, 7, 7, 23, 68, 28, 1, 85, 85, 36, 38, 32, 70, 1, 85, 72, 29, 27, 69, 83, 35, 15, 19, 2, 84, 73, 32, 78, 82, 38, 32, 38, 87, 77, 65, 2, 86, 69, 93, 75, 14, 7, 28, 10, 32, 86, 127, 52, 26, 12, 44, 109, 26, 33, 8, 80, 40, 45, 19, 65, 23, 89, 4, 85, 3, 23, 75, 15, 83};
	...
```


```php
<?php

$cad="116 104 101 32 102 108 97 103 32 105 115 32 104 105 100 100 101 110 32 117 115 105 110 103 32 116 104 105 115 32 115 101 99 114 101 116 32 83 116 114 105 110 103 44 32 112 108 101 97 115 101 32 115 116 111 114 101 32 116 104 105 115 32 115 111 109 101 119 104 101 114 101 32 115 97 102 101 46 46 46 55 7 11 71 20 13 21 18 76 8 7 73 7 7 23 68 28 1 85 85 36 38 32 70 1 85 72 29 27 69 83 35 15 19 2 84 73 32 78 82 38 32 38 87 77 65 2 86 69 93 75 14 7 28 10 32 86 127 52 26 12 44 109 26 33 8 80 40 45 19 65 23 89 4 85 3 23 75 15 83";
$arre=explode(" ",$cad);
$salida="";
foreach($arre as $v){
	$salida.=chr($v);
}
echo base64_encode($salida);
```

dGhlIGZsYWcgaXMgaGlkZGVuIHVzaW5nIHRoaXMgc2VjcmV0IFN0cmluZywgcGxlYXNlIHN0b3JlIHRoaXMgc29tZXdoZXJlIHNhZmUuLi43BwtHFA0VEkwIB0kHBxdEHAFVVSQmIEYBVUgdG0VTIw8TAlRJIE5SJiAmV01BAlZFXUsOBxwKIFZ/NBoMLG0aIQhQKC0TQRdZBFUDF0sPUw==

```
the flag is hidden using this secret String, please store this somewhere safe...7G
LIDUU$& FUHES#TI NR& &WMAVE]K
 V4,m!P(-AYUKS
```
En la misma clase 'e', muestra como decodificar esos valores en la linea `this.c[i3 % 80] = (char) (iArr2[i3 % 80] ^ this.b[i2]);`

El simbolo ^ corresponde a XOR en Java, por lo tanto utilizando Cyberchef, realizo XOR de `7G
LIDUU$& FUHES#TI NR& &WMAVE]K
 V4,m!P(-AYUKS` con el texto plano `the flag is hidden using this secret String, please store this somewhere safe...`

`Congrftulations you WON!!! the Flag is: ONA{m1n3$...theR3_@ re_MiNe5_Ev3ryw4ere!}`

#### Flag: ONA{m1n3$...theR3_@ re_MiNe5_Ev3ryw4ere!}
Nota: (Agregué Un Espacio Despues Del @ Para Que No Genere Un Handle)

\#OnaChallenge_Flag 
ad173c3a444ab6c3300c8683bed3254053bc22c912935acbbae312a41a435586eb513c6e7d2117d824b7062d80897b503c73b23631203c5f465590d27648f6ff

## LVL 4 - MazeRuner
>Archivo: [LVL 4](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/Niveles/Lvl4.7z?raw=true "LVL 4")

En la funcion printPath, hay una variable _SYS_DEV_SIGN que permite al binario ejecutarse en modo "debug". 
Tambien probé el parámetro -Debug (creo q era asi) pero no me funcionó del todo, porque faltaban los parches.

Parcheo las instrucciones como indico en la siguiente imagen [patch.jpg](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/patch.jpg?raw=true "patch.jpg")

Al ejecutar el proceso, se muestra el maze pero en vez de blanco, en color verde los caminos posibles.
Busco manualmente la mejor ruta al cuadrado azul y lo recorro, como muestra la imagen (la ruta la pinté de blanco)
[maze.png](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/maze.png?raw=true "maze.png")


#### Flag: ONA{1\_tr0pez0n_!=_ca1d4?}

\#OnaChallenge_Flag 
f704036f10df45ea26ee15b9790c21b5dd5bbbe02b4c4e6355520768fc89b9d978f69a1a3b6678b0af0ce3042ff69dea3bb5756efe9cbffa90a38abf8833c93c

## LVL 5 - sudoku
>Archivo: [LVL 5](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/Niveles/Lvl5.7z?raw=true "LVL 5")

Pasos para resolver el reto (seguirlos al pie de la letra sino no funciona):
1. Abrir Cutter y el archivo sudoku
2. Perder horas dando vuelta sin sentido y que te diga que pasaste el reto y no te muestre la flag
3. Cerrar el Cutter a la mierda
4. Jugar al juego 2 veces usando https://www.sudoku-puzzles-online.com/hexadoku/enter-a-solution-hexadoku-solution.php

En la primera vez que jugamos nos da una parte de la flag, y en la segunda el resto. Es el único reto que pasé "jugando"

#### Flag: ONA{sUd0_5uDO_5Ud0KUuu!!!}

\#OnaChallenge_Flag
3a5cd7a672f0fa1ad7b9ae1259294d6a1f7e8ef0e9cd97a5c98aff936f72fc6800b92b524806d12b7c6b1f41a337bf803747ab4080458ed3accbef261895ad0f

## LVL 6 - CLIENT/SERVER
>Archivo: [LVL 6](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/Niveles/Lvl6.7z?raw=true "LVL 6")

*Primero que nada aclarar que nunca pude ejecutar el Cliente, me tiraba "Exception: java.lang.NullPointerException thrown from the UncaughtExceptionHandler in thread "main"", 
asi que todo el reto lo hice a ojo (ciego). Era parte del reto?*

Un cliente servidor (mismo archivo, cambia el manifest que dice client o server) y 2 archivos de log.
En uno de los archivos de log hay strings codificados y cifrados que no sabemos que son, y tenemos que tratar de descifrarlos (supongo de antemano que ahi esta la flag, salvo que encuentre alguna otra cosa en el camino).
Tiene varios packages interrelacionados, el package Crypto me llama la atención.

Al llamar a `Crypto.key()` puede recibir Long o String como parámetro. Si recibe Long, la key es el timestamp. Tomo los strings codificados y los agrego a la variable `String[] data=`.

Con los strings codificados y tomando partes del codigo realizo este código Java (lo guardo como `HelloWorld.java` y lo ejecuto con `java HelloWorld.java > a.txt`). No estoy haciendo nada raro, solo tratando de seguir la lógica de las funciones Crypto que me permitan descifrar el texto.  No me acuerdo un pomo de Java, pero es cuestión de tener ganas y usar un compilador online como [este](https://www.tutorialspoint.com/compile_java_online.php "este") o [este](https://www.jdoodle.com/online-java-compiler/ "este"). **Ojo** con los output, porque a veces los trunca (cuando son muy largos)

Notar la linea 8 que muestra `long seed = 79824387432L;`. Ese seed es el que utiliza el servidor (está en el código fuente)

### Si alguien sabe porque a veces ejecuto `java HelloWorld.java > a.txt` en windows y me da una cosa, y el mismo script mas tarde me da otra cosa distinta, que me avise por favor!
### En debian no me pasaba eso!
### perdi horas dando vueltas en un codigo que me funcionaba (y lo tenia en el writeup) y al volver a ejecutarlo no descifraba lo mismo! WTF!

```
import java.util.Random;
import java.util.Base64;

public class HelloWorld{

	public static void main(String []args){
         
		long seed = 79824387432L;
		Random r = new Random(seed);
		double uid = r.nextDouble();
		StringBuilder sb = new StringBuilder();
		for (int i = 0; i < 26; i++) {
		    sb.append((char) ((int) (r.nextDouble() * 256.0d)));
		}
		String key = sb.toString();
		String[] data= {"wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnVXCmMKxScKv","wodtBMOPRH/CrloFXMK4w73CrigaE1/DjcKDbzPCm2jDgxvDksKbehHDnldgwqpQAVbCs8O3wqIoGgFXw4rClX0kwpdsw5kMw5vCkHcKw4VIesKgQgk=","wq9AKQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnFHCnMKzScKg","G8KbM1F2bsOBZVbDhsOew5V7eh3Dr8OxwonCo0vDgGQJYwNTF8KHNl96ZsOTZV7Dl8OVw4V2Zh3Dv8OowpXCuF7Dkm8J","M8K2Hg==","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnFbCncKzSMKj","swpg5HcKywr5/IsKbEcOUw71zSMOFDUlsIcKNw75CB8K6w5/DkxfCgzgFwq3CvncwwoYcw57DvXlew4sNT3shwozDplMXwqvDn8OSEcKeNBrCucKjbDrCkQrDnsO2YEvDmQ1dZDbCisO8TAbCvcOEw4UPwo81HsKzwqlkLMKDF8OFw7RoVcOQHkZpLMKOw7BTBcKj","wrAUMA==","swpg5HcKywr5/IsKbEcOUw71zSMOFDUlsIcKNw75CHcKgw57DjxDCjzYWwrzCoX0wwpEZw4XDuH9Uw5kAWXwswoTDvE8cwrHDncOMDMKDPhTCrsKjbDHCih/DksO+aFU=","wp84CMKjwql8IMKOCsOcw7J/XsOYA1R7NsKAw7xXG8Kgw5bDjB/CjSs=","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCn1TCm8KzS8Kk","w4HDpMOENMKvO8KSwrTDi8OwbMOTw4rDtwEbRBMHcsOswrEpb8O0EsOJw77DnDLCrijChsKuw4bDunDDk8Obw7EDCVkBDWLDtw==","w6nDicOp","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCn1nCncK1R8Km","NE5BCgPDqWJsMW1vwq9wwr1ZKSvCqcKOS8Odw6DDsDNhMA==","BgIGC0HCgQQxZCc+w6gYwo5cPznCvMKDD8KAwo3DuDdrLgYKCQ5HwoU=","BlxUAQXDik9kO2x5wrJAwoNGOCrCv8KXVsOHw5vCpHIhKRVPTwEUw5NVeix+f8KvQMKfUSA5wqrCiFbDlw==","ClJCHBjDmV93On58wr5RwopKPz3CsMKfVcOQw5jCqXU=","FV5AGhTDhUVgPHh0wq9Owp9fPyzCoMKNUMOKw4s=","E1paCg/Dkl5+PGF+wrpdwopdLivCosKfSsOXw57CqmQuMgtUWgYNw4hFYTdhYcKyQcKKRCQ/wrLCgF3DkMOewrVuIA==","KcO6YsOmwqU3w4fCj8Onw6HCusKew5HDpcKOGBZ3w544AcKZVTsXwpQ=","PMKkIsO8wrHDssKCw6/Dm8KZw442wp9uw5M8JsOGSnLDnVjDvVQjwrc8wqwyw73CvcOuwpg=","IsKuMMOiwrDDrsKBw6jDi8KXw4M7woxtw5cmN8OXXnXDhkPDol83wr88wqQ2w6fCqMO/wo/DqcOAwoDDhyzCkmTDiCwrw4xbf8OMTsOxRCPCtC/Cpi/Dt8Kzw67CmcOiw4vCksOFJsKV","OsKpNsO3wqfDpMKVw7TDkMKKw44jwpJpw5E8J8OaQU7DtmfDr0c=","OsKpNsO3wqfDpMKVw7TDkMKKw44jwpJpw5E8J8OaQW7DlkfDr1IkwrslwqQhw7rCqMOtwpnDsMOQwoLDgiTCkGzDmS89w5Q=","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCkVXCnMKzR8Kh","ZsOHOCIUwpvCh1jDosKiLsOxwp8EwpwkwrMOTcKkMDDCqjlFw6Z7w5c9IgLCk8KYQsOqwqAlw7HCmAPCiSzCpBRWwqYiNMK4PF/DrWjDlyolA8KIwoVNw6zCqA==","TsOqFQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCkVjClcKzScKv","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDlMOFcV46w6dEUcKIw5XCs8OpwrvCh8OBFUM=","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDlMOFcV46w6dEUcKIw5XCs8OpwrvCl8OIF0M=","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDn8OGcVoyw7pfVcKZw5zCtcO5wq3Ck8OA","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDnsOFeVs3w6JVRsKIw5TCpcOpwrzCnsOIFA==","w69AXcKVw5XCssOhwrzCiMOFBUlaw7dDdMOyw4QJWXvDg8Odakwiw7ZEXcKTw5zCvsO7wrDClsOBCQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCmVHCmMKxRsKg","e8KkdcK4WsOVT2TDnMKzIMKEwoxUwqFxwq3Cglg4WsKaNcKyVUg=","ScOoMsK5GMK9KTnCicO5ccODw6RnwqRnwr/Cl1V8B8O3PcK2X1ZJw6A9wrwewrk=","wrHDiMOfOMOOwqBoYwF7LMK8XMOgG8OONG/DkWhgwofDgU3Dp8Kr","w7h+wr/Ci8KSVgoNw47Dnxstw7vCjcK0wqLClMOpwpJNLC/Cu8K5w7PDvsOpZ8KywoTClVQWB8Obw5QXL8OgwonCq8K+woXDt8KPUTsm","w6l1wr/ChMKVTwoSw4zDlR8lw6vCgcKlwqXChMO8wolQMyPCscKkw67DscOneMK4worCk14KAcOfw4kcLcOjwpDCssKpwpk=","w792wq/Cl8KYSRURw4vDmwU4w6bCgcKowrLCiMOjwphHMCfCqMK0w7/DucOwa8K/","w7x3wr/CiMKPTwccw53Dmxo5w67CiMKvwqXCj8Op","w79wwqzCgMKYQRoNw4nDlBUyw7vCjMKpwqnCj8OkwpNMNSzCqsK6w6/Do8OnasKywoDCj0EcHMOfw5YAOsOq","w6lrwrXChsKDTxAcw4nDkx0kw7HCh8K6wrnCnsOzwolM","w7x3wr/CiMKfVB0Mw53DiAwtw7zCjcK1wqvClMO0wpNPPCfCtw==","w6t8wq7CkMKURAoWw5HDhB0kw6rCmsK5wq3CmcO/wppcJy3CsMKzw7bDtsO1dcKkwovCg08QHMOKw5IMMsOpwojCusKrwpbDpMKITSAkwrDCv8O1w7fDvGvCpMKMwohZABDDi8OZHSXDoMKKwqjCssKfw7TCkksyPMKgwrXDtcOtw7h6wq7CjMKJRA==","w61xwr/Cm8KVTxcQw5vDjhcqw6PChcK8wrLCg8OpwphtEAPCvsKw","w61xwr/Cm8KVTxcQw5vDjhcqw6PChcK8wrLCg8OpwphNMCPCvsKlw6DDvMOyfMKowpbCmkYbFMObw4YbLcOhwoDCtMKhwpnDpw==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCmlTCmcK2TsKg","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCi1GAMOgBmYEFcKJw6/CuinDgwMNaQfDsXrCgVfCpwJxGh0hQBrDrQ51CRHClsOvwro=","ehMFwoXDuMK+OcOFGw9lBsOwYsKJXMKnFGM=","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCipJAcOzGG0UFcKJw6nCrTPDhRsPZRbDunrCnlfCtx5mGAYxUwzDux91EQfCkA==","dREHwpDDo8K2OcOSBRp0FsOwZ8KYV8Kw","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCjtGD8O3D3QDE8KZw7nCujjDjxoefhA=","Uj4t","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnVXCm8K4T8Ki","swpHCjMK+cMO3JHjDpz8GVcKfw7J7I8KCw5zDrMOJwrwqw73DqVVcRsKdwpzCvnPDpC5l","wojCjsK9fsO2LGfDoyQGTcKKw6huMcKLw5zDscOLwrc7w6jDow==","swpHCjMK+cMO3JHjDpz8GVcKdw6llKMKLw5TDrMOEwr4kw7/DqkZUUcKdwpzCqG3Dqj9ww7czF13Cj8OtbDM=","wp7CjsK5eMO7IGrDrTkHV8Kaw7JqOcKGw5TDs8ONwqA2w6rDuFdaXMKLwofCu23DoD1nw7IxDFXCl8O/","swpHCjMK+cMO3JHjDpz8GVcKdw6llKMKLw5TDrMOEwr4kw7/DqkZUUcKdwpzCqG3Dqj9ww7czF1/ChsO4aibCi8OOw6HDjcKgNcO6w7JdQUrCncKcwrZ6w709Z8O+PxpIworDo2Uz","wpfCjMK0ZsO7OnzDsCQMT8Kdw61sKsKJw4nDrMOSwqE7w6HDuFFQU8KNwofCq2vDuy92w6EoBFLCkMO/YiDCicODw7vDicK2O8Omw6pQ","swp/CjcK3e8O7K2DDtioXUsKdw7tiI8KLw4PDvcOJwrw4w67DpUhJXsKE","wrnCocKT","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnFPCmMKyRsKh","sbEwsQsKZwr0vR8O0wrfCpMK0w4LDhcKyw6x3GiMuIwjCsMOyw4kGb0c0TMKFwqQrQMOjwqHCtMKmw57Di8K3w6t5BjU2OBrCscO5w4gZag==","RGEB","sbEwsQsKZwr0vR8O0wrfCpMK0w4LDhcKyw6x3GiMuIwjCvsOyw4kKaE0pX8KKwrMnUsOjwqvCo8Knw4HDmcK2w697Bz83IwrCsMOyw4saa0EjQsKFwrE=","YEw0WcKOwr88WsO8wqbCr8Kmw4/DlsK8w69rByIhMAvCocOqw5gBZkslQ8KK","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnljClcK1S8Ki","sCcKBwqfDkiEewofDog==","sCsKFwrfDkzMF","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7w=","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7zCv35v","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7zCvX5t","sCsKVwqTDhCQhwpTDtTnCtsOHAsOS","sCcKBwqfDkiEewofDohnCtMOYFcOE","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjw=","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjwkw4Z/","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpB9w4nDpA==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKO","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVA==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVGw=","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVGzDlg==","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjwkw4Z/w4/Dog==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOHA==","OMOZw6PDhWZGw4DCvnzDucKcQ8KBw7vDqCk/Ejojw41+w4LDocKEAjjDkcOsw4BgQg==","saMONw6XCjGRcw4bCq3/DrMKQXcKHwqvCoX5vXWshw5l5w47DusKFWQ==","sWENXQkBAUllcQlZTVF1KXlheW0hTRVlIWUpUU0FfXVtaSVBTXEhFUkReQlNSVkJAQVNWXElZT0BbXkBEWkM=","Ql1UTltLSlNZQltMRVpCXA==","sWENXQkBAUllcQlZTVF1KXlheW0hTUF5CSFhDWUhRTExBSlBDTERfUg==","XUJeRkxLXF9LXVdZVF1ZW1BBTVVKUFtZS0dFQk9PV1NBSFZfTURF","sWENXQkBAUllcQlZTVF1KXlheW0hTV1lMW1JPRVBZTEVSTl5ISl4=","RkVYWVdTW0xBU0xCXg==","sX0hUSUxeUktQU1BCREBITFBLR1FfS1hES0pYQl8=","QkxXSExFXFhGSEZEQk1MRk9dUlhIR1hCREdIQkRTRURfQUtDXUhVTVlaVFNVWExSSVNfVl5JT0FHTlg=","sRUVUU0FIUF9QWUZLXVJKTFheTVtDVE5Q","RUVUU0FIUF9QWUZLXVJKTFheTVtDVE5FWVpaSENeTkFcW1BRSkxfV0JfQlA=","sVkJeSUxPSkhJU1lDVU1KXV5JTVhYVl5RRkBeWE9aW0FfU1tIXUlPWllOTVE=","cG56"};
        
		System.out.println("Key = " + key);

		String decData = "";
		for (String s: data) {
			sb = new StringBuilder();
			try{
				decData = new String(Base64.getDecoder().decode(s));
			}catch(Exception e) {
				decData = "";
			}
			for (int i = 0; i < decData.length(); i++) {
		   		sb.append((char) (decData.charAt(i) ^ key.charAt(i % 26)));
			}
			System.out.println("Decrypted = " + sb.toString().replace("~", " ").replace("|", "."));
		}
	}
}
```

En el archivo [resultado1.txt](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/resultado1.txt?raw=true "resultado1.txt") aparecen varios timestamp descifrados. Esto quiere decir que tenemos algunas "claves" que se utilizaron para cifrar algunos mensajes, y puede que alguno de esos mensajes estén en el archivo crypto.Key.log.

Los extraigo y agrego (junto con el 79824387432L original) al codigo siguiente

```
import java.util.Random; 
import java.util.Base64;

public class HelloWorld{

	public static void main(String []args){
		String[] data= {"wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnVXCmMKxScKv","wodtBMOPRH/CrloFXMK4w73CrigaE1/DjcKDbzPCm2jDgxvDksKbehHDnldgwqpQAVbCs8O3wqIoGgFXw4rClX0kwpdsw5kMw5vCkHcKw4VIesKgQgk=","wq9AKQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnFHCnMKzScKg","G8KbM1F2bsOBZVbDhsOew5V7eh3Dr8OxwonCo0vDgGQJYwNTF8KHNl96ZsOTZV7Dl8OVw4V2Zh3Dv8OowpXCuF7Dkm8J","M8K2Hg==","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnFbCncKzSMKj","swpg5HcKywr5/IsKbEcOUw71zSMOFDUlsIcKNw75CB8K6w5/DkxfCgzgFwq3CvncwwoYcw57DvXlew4sNT3shwozDplMXwqvDn8OSEcKeNBrCucKjbDrCkQrDnsO2YEvDmQ1dZDbCisO8TAbCvcOEw4UPwo81HsKzwqlkLMKDF8OFw7RoVcOQHkZpLMKOw7BTBcKj","wrAUMA==","swpg5HcKywr5/IsKbEcOUw71zSMOFDUlsIcKNw75CHcKgw57DjxDCjzYWwrzCoX0wwpEZw4XDuH9Uw5kAWXwswoTDvE8cwrHDncOMDMKDPhTCrsKjbDHCih/DksO+aFU=","wp84CMKjwql8IMKOCsOcw7J/XsOYA1R7NsKAw7xXG8Kgw5bDjB/CjSs=","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCn1TCm8KzS8Kk","w4HDpMOENMKvO8KSwrTDi8OwbMOTw4rDtwEbRBMHcsOswrEpb8O0EsOJw77DnDLCrijChsKuw4bDunDDk8Obw7EDCVkBDWLDtw==","w6nDicOp","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCn1nCncK1R8Km","NE5BCgPDqWJsMW1vwq9wwr1ZKSvCqcKOS8Odw6DDsDNhMA==","BgIGC0HCgQQxZCc+w6gYwo5cPznCvMKDD8KAwo3DuDdrLgYKCQ5HwoU=","BlxUAQXDik9kO2x5wrJAwoNGOCrCv8KXVsOHw5vCpHIhKRVPTwEUw5NVeix+f8KvQMKfUSA5wqrCiFbDlw==","ClJCHBjDmV93On58wr5RwopKPz3CsMKfVcOQw5jCqXU=","FV5AGhTDhUVgPHh0wq9Owp9fPyzCoMKNUMOKw4s=","E1paCg/Dkl5+PGF+wrpdwopdLivCosKfSsOXw57CqmQuMgtUWgYNw4hFYTdhYcKyQcKKRCQ/wrLCgF3DkMOewrVuIA==","KcO6YsOmwqU3w4fCj8Onw6HCusKew5HDpcKOGBZ3w544AcKZVTsXwpQ=","PMKkIsO8wrHDssKCw6/Dm8KZw442wp9uw5M8JsOGSnLDnVjDvVQjwrc8wqwyw73CvcOuwpg=","IsKuMMOiwrDDrsKBw6jDi8KXw4M7woxtw5cmN8OXXnXDhkPDol83wr88wqQ2w6fCqMO/wo/DqcOAwoDDhyzCkmTDiCwrw4xbf8OMTsOxRCPCtC/Cpi/Dt8Kzw67CmcOiw4vCksOFJsKV","OsKpNsO3wqfDpMKVw7TDkMKKw44jwpJpw5E8J8OaQU7DtmfDr0c=","OsKpNsO3wqfDpMKVw7TDkMKKw44jwpJpw5E8J8OaQW7DlkfDr1IkwrslwqQhw7rCqMOtwpnDsMOQwoLDgiTCkGzDmS89w5Q=","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCkVXCnMKzR8Kh","ZsOHOCIUwpvCh1jDosKiLsOxwp8EwpwkwrMOTcKkMDDCqjlFw6Z7w5c9IgLCk8KYQsOqwqAlw7HCmAPCiSzCpBRWwqYiNMK4PF/DrWjDlyolA8KIwoVNw6zCqA==","TsOqFQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCkVjClcKzScKv","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDlMOFcV46w6dEUcKIw5XCs8OpwrvCh8OBFUM=","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDlMOFcV46w6dEUcKIw5XCs8OpwrvCl8OIF0M=","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDn8OGcVoyw7pfVcKZw5zCtcO5wq3Ck8OA","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDnsOFeVs3w6JVRsKIw5TCpcOpwrzCnsOIFA==","w69AXcKVw5XCssOhwrzCiMOFBUlaw7dDdMOyw4QJWXvDg8Odakwiw7ZEXcKTw5zCvsO7wrDClsOBCQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCmVHCmMKxRsKg","e8KkdcK4WsOVT2TDnMKzIMKEwoxUwqFxwq3Cglg4WsKaNcKyVUg=","ScOoMsK5GMK9KTnCicO5ccODw6RnwqRnwr/Cl1V8B8O3PcK2X1ZJw6A9wrwewrk=","wrHDiMOfOMOOwqBoYwF7LMK8XMOgG8OONG/DkWhgwofDgU3Dp8Kr","w7h+wr/Ci8KSVgoNw47Dnxstw7vCjcK0wqLClMOpwpJNLC/Cu8K5w7PDvsOpZ8KywoTClVQWB8Obw5QXL8OgwonCq8K+woXDt8KPUTsm","w6l1wr/ChMKVTwoSw4zDlR8lw6vCgcKlwqXChMO8wolQMyPCscKkw67DscOneMK4worCk14KAcOfw4kcLcOjwpDCssKpwpk=","w792wq/Cl8KYSRURw4vDmwU4w6bCgcKowrLCiMOjwphHMCfCqMK0w7/DucOwa8K/","w7x3wr/CiMKPTwccw53Dmxo5w67CiMKvwqXCj8Op","w79wwqzCgMKYQRoNw4nDlBUyw7vCjMKpwqnCj8OkwpNMNSzCqsK6w6/Do8OnasKywoDCj0EcHMOfw5YAOsOq","w6lrwrXChsKDTxAcw4nDkx0kw7HCh8K6wrnCnsOzwolM","w7x3wr/CiMKfVB0Mw53DiAwtw7zCjcK1wqvClMO0wpNPPCfCtw==","w6t8wq7CkMKURAoWw5HDhB0kw6rCmsK5wq3CmcO/wppcJy3CsMKzw7bDtsO1dcKkwovCg08QHMOKw5IMMsOpwojCusKrwpbDpMKITSAkwrDCv8O1w7fDvGvCpMKMwohZABDDi8OZHSXDoMKKwqjCssKfw7TCkksyPMKgwrXDtcOtw7h6wq7CjMKJRA==","w61xwr/Cm8KVTxcQw5vDjhcqw6PChcK8wrLCg8OpwphtEAPCvsKw","w61xwr/Cm8KVTxcQw5vDjhcqw6PChcK8wrLCg8OpwphNMCPCvsKlw6DDvMOyfMKowpbCmkYbFMObw4YbLcOhwoDCtMKhwpnDpw==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCmlTCmcK2TsKg","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCi1GAMOgBmYEFcKJw6/CuinDgwMNaQfDsXrCgVfCpwJxGh0hQBrDrQ51CRHClsOvwro=","ehMFwoXDuMK+OcOFGw9lBsOwYsKJXMKnFGM=","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCipJAcOzGG0UFcKJw6nCrTPDhRsPZRbDunrCnlfCtx5mGAYxUwzDux91EQfCkA==","dREHwpDDo8K2OcOSBRp0FsOwZ8KYV8Kw","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCjtGD8O3D3QDE8KZw7nCujjDjxoefhA=","Uj4t","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnVXCm8K4T8Ki","swpHCjMK+cMO3JHjDpz8GVcKfw7J7I8KCw5zDrMOJwrwqw73DqVVcRsKdwpzCvnPDpC5l","wojCjsK9fsO2LGfDoyQGTcKKw6huMcKLw5zDscOLwrc7w6jDow==","swpHCjMK+cMO3JHjDpz8GVcKdw6llKMKLw5TDrMOEwr4kw7/DqkZUUcKdwpzCqG3Dqj9ww7czF13Cj8OtbDM=","wp7CjsK5eMO7IGrDrTkHV8Kaw7JqOcKGw5TDs8ONwqA2w6rDuFdaXMKLwofCu23DoD1nw7IxDFXCl8O/","swpHCjMK+cMO3JHjDpz8GVcKdw6llKMKLw5TDrMOEwr4kw7/DqkZUUcKdwpzCqG3Dqj9ww7czF1/ChsO4aibCi8OOw6HDjcKgNcO6w7JdQUrCncKcwrZ6w709Z8O+PxpIworDo2Uz","wpfCjMK0ZsO7OnzDsCQMT8Kdw61sKsKJw4nDrMOSwqE7w6HDuFFQU8KNwofCq2vDuy92w6EoBFLCkMO/YiDCicODw7vDicK2O8Omw6pQ","swp/CjcK3e8O7K2DDtioXUsKdw7tiI8KLw4PDvcOJwrw4w67DpUhJXsKE","wrnCocKT","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnFPCmMKyRsKh","sbEwsQsKZwr0vR8O0wrfCpMK0w4LDhcKyw6x3GiMuIwjCsMOyw4kGb0c0TMKFwqQrQMOjwqHCtMKmw57Di8K3w6t5BjU2OBrCscO5w4gZag==","RGEB","sbEwsQsKZwr0vR8O0wrfCpMK0w4LDhcKyw6x3GiMuIwjCvsOyw4kKaE0pX8KKwrMnUsOjwqvCo8Knw4HDmcK2w697Bz83IwrCsMOyw4saa0EjQsKFwrE=","YEw0WcKOwr88WsO8wqbCr8Kmw4/DlsK8w69rByIhMAvCocOqw5gBZkslQ8KK","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnljClcK1S8Ki","sCcKBwqfDkiEewofDog==","sCsKFwrfDkzMF","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7w=","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7zCv35v","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7zCvX5t","sCsKVwqTDhCQhwpTDtTnCtsOHAsOS","sCcKBwqfDkiEewofDohnCtMOYFcOE","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjw=","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjwkw4Z/","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpB9w4nDpA==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKO","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVA==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVGw=","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVGzDlg==","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjwkw4Z/w4/Dog==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOHA==","OMOZw6PDhWZGw4DCvnzDucKcQ8KBw7vDqCk/Ejojw41+w4LDocKEAjjDkcOsw4BgQg==","saMONw6XCjGRcw4bCq3/DrMKQXcKHwqvCoX5vXWshw5l5w47DusKFWQ==","sWENXQkBAUllcQlZTVF1KXlheW0hTRVlIWUpUU0FfXVtaSVBTXEhFUkReQlNSVkJAQVNWXElZT0BbXkBEWkM=","Ql1UTltLSlNZQltMRVpCXA==","sWENXQkBAUllcQlZTVF1KXlheW0hTUF5CSFhDWUhRTExBSlBDTERfUg==","XUJeRkxLXF9LXVdZVF1ZW1BBTVVKUFtZS0dFQk9PV1NBSFZfTURF","sWENXQkBAUllcQlZTVF1KXlheW0hTV1lMW1JPRVBZTEVSTl5ISl4=","RkVYWVdTW0xBU0xCXg==","sX0hUSUxeUktQU1BCREBITFBLR1FfS1hES0pYQl8=","QkxXSExFXFhGSEZEQk1MRk9dUlhIR1hCREdIQkRTRURfQUtDXUhVTVlaVFNVWExSSVNfVl5JT0FHTlg=","sRUVUU0FIUF9QWUZLXVJKTFheTVtDVE5Q","RUVUU0FIUF9QWUZLXVJKTFheTVtDVE5FWVpaSENeTkFcW1BRSkxfV0JfQlA=","sVkJeSUxPSkhJU1lDVU1KXV5JTVhYVl5RRkBeWE9aW0FfU1tIXUlPWllOTVE=","cG56"};
		
		long seeds[] = {987654321L,79824387432L,1597766000000L,1597868455069L,1597868560275L,1597868646242L,1597868690480L,1597868851287L,987654321L,1597869015096L,1597869344716L,1597869456904L,1597869535397L,1597869788444L};
		for (long ss: seeds) {
			Random r = new Random(ss);
			double uid = r.nextDouble();
			StringBuilder sb = new StringBuilder();
			for (int i = 0; i < 26; i++) {
				sb.append((char) ((int) (r.nextDouble() * 256.0d)));
			}
			String key = sb.toString();
			System.out.println("Key = " + key);

			String decData = "";
			for (String s: data) {
				sb = new StringBuilder();
				try{
					decData = new String(Base64.getDecoder().decode(s));
				}catch(Exception e) {
					decData = "";
				}
				for (int i = 0; i < decData.length(); i++) {
					sb.append((char) (decData.charAt(i) ^ key.charAt(i % 26)));
				}
				System.out.println("Decrypted = " + sb.toString().replace("~", " ").replace("|", "."));
			}
		}
	}
}
```

Como resultado obtengo el archivo [resultado2.txt](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200829%20Onapsis%20Lockdown%20Games/resultado2.txt?raw=true "resultado2.txt"), con más cadenas descifradas como por ejemplo:

```
Decrypted = Super_Secret_Password_123.
Decrypted = a97d075868437cdeabb692969ba18a63
Decrypted = agent. mission bravo dessert needs autorization
Decrypted = mission have green light
Decrypted = requesting target list
Decrypted = take down targets. snake. loki. the king. gladiator
```

o tambien

```
Decrypted = information english. bad guys recovered messaging software
Decrypted = increasing defenses
Decrypted = information english. enemy is trying to recover the flag
Decrypted = flag is protected
Decrypted = information english. taking undercover
Decrypted = ACK
```

o tambien este hash que está solito y no se que para que carajo sirve (o que es, en google no sale nada). Probé usarlo como key pero nop..

```
a97d075868437cdeabb692969ba18a63
```

Por ahora, la flag brilla por su ausencia.

Que puedo hacer? Primero dormir, porque limé con esto (escribiendo el writeup tambien) y no dormí un carajo

Bruteforce de timestamps? alla fui. 

Ejecuto este codigo bruteforceando los timestamp desde 1597769033592 18 agosto al 1597969033592 21 agosto. Al utilizar milisegundos para el timestamp son un montón, y el proceso tarda un rato

```
import java.util.Random;
import java.util.Base64;

public class HelloWorld {

	public static void main(String[] args) {// el q decodifica a ONA{} es 1597869033592L. 1597769033592 18 agosto, 1597969033592 21 agosto
		String[] data= {"wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnVXCmMKxScKv","wodtBMOPRH/CrloFXMK4w73CrigaE1/DjcKDbzPCm2jDgxvDksKbehHDnldgwqpQAVbCs8O3wqIoGgFXw4rClX0kwpdsw5kMw5vCkHcKw4VIesKgQgk=","wq9AKQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnFHCnMKzScKg","G8KbM1F2bsOBZVbDhsOew5V7eh3Dr8OxwonCo0vDgGQJYwNTF8KHNl96ZsOTZV7Dl8OVw4V2Zh3Dv8OowpXCuF7Dkm8J","M8K2Hg==","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCnFbCncKzSMKj","swpg5HcKywr5/IsKbEcOUw71zSMOFDUlsIcKNw75CB8K6w5/DkxfCgzgFwq3CvncwwoYcw57DvXlew4sNT3shwozDplMXwqvDn8OSEcKeNBrCucKjbDrCkQrDnsO2YEvDmQ1dZDbCisO8TAbCvcOEw4UPwo81HsKzwqlkLMKDF8OFw7RoVcOQHkZpLMKOw7BTBcKj","wrAUMA==","swpg5HcKywr5/IsKbEcOUw71zSMOFDUlsIcKNw75CHcKgw57DjxDCjzYWwrzCoX0wwpEZw4XDuH9Uw5kAWXwswoTDvE8cwrHDncOMDMKDPhTCrsKjbDHCih/DksO+aFU=","wp84CMKjwql8IMKOCsOcw7J/XsOYA1R7NsKAw7xXG8Kgw5bDjB/CjSs=","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCn1TCm8KzS8Kk","w4HDpMOENMKvO8KSwrTDi8OwbMOTw4rDtwEbRBMHcsOswrEpb8O0EsOJw77DnDLCrijChsKuw4bDunDDk8Obw7EDCVkBDWLDtw==","w6nDicOp","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCn1nCncK1R8Km","NE5BCgPDqWJsMW1vwq9wwr1ZKSvCqcKOS8Odw6DDsDNhMA==","BgIGC0HCgQQxZCc+w6gYwo5cPznCvMKDD8KAwo3DuDdrLgYKCQ5HwoU=","BlxUAQXDik9kO2x5wrJAwoNGOCrCv8KXVsOHw5vCpHIhKRVPTwEUw5NVeix+f8KvQMKfUSA5wqrCiFbDlw==","ClJCHBjDmV93On58wr5RwopKPz3CsMKfVcOQw5jCqXU=","FV5AGhTDhUVgPHh0wq9Owp9fPyzCoMKNUMOKw4s=","E1paCg/Dkl5+PGF+wrpdwopdLivCosKfSsOXw57CqmQuMgtUWgYNw4hFYTdhYcKyQcKKRCQ/wrLCgF3DkMOewrVuIA==","KcO6YsOmwqU3w4fCj8Onw6HCusKew5HDpcKOGBZ3w544AcKZVTsXwpQ=","PMKkIsO8wrHDssKCw6/Dm8KZw442wp9uw5M8JsOGSnLDnVjDvVQjwrc8wqwyw73CvcOuwpg=","IsKuMMOiwrDDrsKBw6jDi8KXw4M7woxtw5cmN8OXXnXDhkPDol83wr88wqQ2w6fCqMO/wo/DqcOAwoDDhyzCkmTDiCwrw4xbf8OMTsOxRCPCtC/Cpi/Dt8Kzw67CmcOiw4vCksOFJsKV","OsKpNsO3wqfDpMKVw7TDkMKKw44jwpJpw5E8J8OaQU7DtmfDr0c=","OsKpNsO3wqfDpMKVw7TDkMKKw44jwpJpw5E8J8OaQW7DlkfDr1IkwrslwqQhw7rCqMOtwpnDsMOQwoLDgiTCkGzDmS89w5Q=","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCkVXCnMKzR8Kh","ZsOHOCIUwpvCh1jDosKiLsOxwp8EwpwkwrMOTcKkMDDCqjlFw6Z7w5c9IgLCk8KYQsOqwqAlw7HCmAPCiSzCpBRWwqYiNMK4PF/DrWjDlyolA8KIwoVNw6zCqA==","TsOqFQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5LCkVjClcKzScKv","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDlMOFcV46w6dEUcKIw5XCs8OpwrvCh8OBFUM=","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDlMOFcV46w6dEUcKIw5XCs8OpwrvCl8OIF0M=","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDn8OGcVoyw7pfVcKZw5zCtcO5wq3Ck8OA","w4JiaA==","w6pPRcKZw4LCrcO2wq3Cm8OLFVJaw7lPe8Oow4kHUGDDnsOFeVs3w6JVRsKIw5TCpcOpwrzCnsOIFA==","w69AXcKVw5XCssOhwrzCiMOFBUlaw7dDdMOyw4QJWXvDg8Odakwiw7ZEXcKTw5zCvsO7wrDClsOBCQ==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCmVHCmMKxRsKg","e8KkdcK4WsOVT2TDnMKzIMKEwoxUwqFxwq3Cglg4WsKaNcKyVUg=","ScOoMsK5GMK9KTnCicO5ccODw6RnwqRnwr/Cl1V8B8O3PcK2X1ZJw6A9wrwewrk=","wrHDiMOfOMOOwqBoYwF7LMK8XMOgG8OONG/DkWhgwofDgU3Dp8Kr","w7h+wr/Ci8KSVgoNw47Dnxstw7vCjcK0wqLClMOpwpJNLC/Cu8K5w7PDvsOpZ8KywoTClVQWB8Obw5QXL8OgwonCq8K+woXDt8KPUTsm","w6l1wr/ChMKVTwoSw4zDlR8lw6vCgcKlwqXChMO8wolQMyPCscKkw67DscOneMK4worCk14KAcOfw4kcLcOjwpDCssKpwpk=","w792wq/Cl8KYSRURw4vDmwU4w6bCgcKowrLCiMOjwphHMCfCqMK0w7/DucOwa8K/","w7x3wr/CiMKPTwccw53Dmxo5w67CiMKvwqXCj8Op","w79wwqzCgMKYQRoNw4nDlBUyw7vCjMKpwqnCj8OkwpNMNSzCqsK6w6/Do8OnasKywoDCj0EcHMOfw5YAOsOq","w6lrwrXChsKDTxAcw4nDkx0kw7HCh8K6wrnCnsOzwolM","w7x3wr/CiMKfVB0Mw53DiAwtw7zCjcK1wqvClMO0wpNPPCfCtw==","w6t8wq7CkMKURAoWw5HDhB0kw6rCmsK5wq3CmcO/wppcJy3CsMKzw7bDtsO1dcKkwovCg08QHMOKw5IMMsOpwojCusKrwpbDpMKITSAkwrDCv8O1w7fDvGvCpMKMwohZABDDi8OZHSXDoMKKwqjCssKfw7TCkksyPMKgwrXDtcOtw7h6wq7CjMKJRA==","w61xwr/Cm8KVTxcQw5vDjhcqw6PChcK8wrLCg8OpwphtEAPCvsKw","w61xwr/Cm8KVTxcQw5vDjhcqw6PChcK8wrLCg8OpwphNMCPCvsKlw6DDvMOyfMKowpbCmkYbFMObw4YbLcOhwoDCtMKhwpnDpw==","wqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCmlTCmcK2TsKg","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCi1GAMOgBmYEFcKJw6/CuinDgwMNaQfDsXrCgVfCpwJxGh0hQBrDrQ51CRHClsOvwro=","ehMFwoXDuMK+OcOFGw9lBsOwYsKJXMKnFGM=","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCipJAcOzGG0UFcKJw6nCrTPDhRsPZRbDunrCnlfCtx5mGAYxUwzDux91EQfCkA==","dREHwpDDo8K2OcOSBRp0FsOwZ8KYV8Kw","ehMAwpjDr8KyK8OYHAd1HMOwasKLXsK9AngBCjtGD8O3D3QDE8KZw7nCujjDjxoefhA=","Uj4t","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnVXCm8K4T8Ki","swpHCjMK+cMO3JHjDpz8GVcKfw7J7I8KCw5zDrMOJwrwqw73DqVVcRsKdwpzCvnPDpC5l","wojCjsK9fsO2LGfDoyQGTcKKw6huMcKLw5zDscOLwrc7w6jDow==","swpHCjMK+cMO3JHjDpz8GVcKdw6llKMKLw5TDrMOEwr4kw7/DqkZUUcKdwpzCqG3Dqj9ww7czF13Cj8OtbDM=","wp7CjsK5eMO7IGrDrTkHV8Kaw7JqOcKGw5TDs8ONwqA2w6rDuFdaXMKLwofCu23DoD1nw7IxDFXCl8O/","swpHCjMK+cMO3JHjDpz8GVcKdw6llKMKLw5TDrMOEwr4kw7/DqkZUUcKdwpzCqG3Dqj9ww7czF1/ChsO4aibCi8OOw6HDjcKgNcO6w7JdQUrCncKcwrZ6w709Z8O+PxpIworDo2Uz","wpfCjMK0ZsO7OnzDsCQMT8Kdw61sKsKJw4nDrMOSwqE7w6HDuFFQU8KNwofCq2vDuy92w6EoBFLCkMO/YiDCicODw7vDicK2O8Omw6pQ","swp/CjcK3e8O7K2DDtioXUsKdw7tiI8KLw4PDvcOJwrw4w67DpUhJXsKE","wrnCocKT","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnFPCmMKyRsKh","sbEwsQsKZwr0vR8O0wrfCpMK0w4LDhcKyw6x3GiMuIwjCsMOyw4kGb0c0TMKFwqQrQMOjwqHCtMKmw57Di8K3w6t5BjU2OBrCscO5w4gZag==","RGEB","sbEwsQsKZwr0vR8O0wrfCpMK0w4LDhcKyw6x3GiMuIwjCvsOyw4kKaE0pX8KKwrMnUsOjwqvCo8Knw4HDmcK2w697Bz83IwrCsMOyw4saa0EjQsKFwrE=","YEw0WcKOwr88WsO8wqbCr8Kmw4/DlsK8w69rByIhMAvCocOqw5gBZkslQ8KK","swqZUwpECEsOAw5nCm1E=","wq5Zwp8DH8OCw5PCnljClcK1S8Ki","sCcKBwqfDkiEewofDog==","sCsKFwrfDkzMF","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7w=","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7zCv35v","sCsKFwrfDkzMFwqXDpznCssOfH8OEw7zCvX5t","sCsKVwqTDhCQhwpTDtTnCtsOHAsOS","sCcKBwqfDkiEewofDohnCtMOYFcOE","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjw=","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjwkw4Z/","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpB9w4nDpA==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKO","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVA==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVGw=","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOVGzDlg==","sCsKVwqTDhCQiwpDDpTjCpMOcIMOXw6vDvzsxAjwkw4Z/w4/Dog==","sCsKVwqTDhCQuwqbDoynCs8ONBMOpw4jDrT8tBzdnwpATw4rDpcKOHA==","OMOZw6PDhWZGw4DCvnzDucKcQ8KBw7vDqCk/Ejojw41+w4LDocKEAjjDkcOsw4BgQg==","saMONw6XCjGRcw4bCq3/DrMKQXcKHwqvCoX5vXWshw5l5w47DusKFWQ==","sWENXQkBAUllcQlZTVF1KXlheW0hTRVlIWUpUU0FfXVtaSVBTXEhFUkReQlNSVkJAQVNWXElZT0BbXkBEWkM=","Ql1UTltLSlNZQltMRVpCXA==","sWENXQkBAUllcQlZTVF1KXlheW0hTUF5CSFhDWUhRTExBSlBDTERfUg==","XUJeRkxLXF9LXVdZVF1ZW1BBTVVKUFtZS0dFQk9PV1NBSFZfTURF","sWENXQkBAUllcQlZTVF1KXlheW0hTV1lMW1JPRVBZTEVSTl5ISl4=","RkVYWVdTW0xBU0xCXg==","sX0hUSUxeUktQU1BCREBITFBLR1FfS1hES0pYQl8=","QkxXSExFXFhGSEZEQk1MRk9dUlhIR1hCREdIQkRTRURfQUtDXUhVTVlaVFNVWExSSVNfVl5JT0FHTlg=","sRUVUU0FIUF9QWUZLXVJKTFheTVtDVE5Q","RUVUU0FIUF9QWUZLXVJKTFheTVtDVE5FWVpaSENeTkFcW1BRSkxfV0JfQlA=","sVkJeSUxPSkhJU1lDVU1KXV5JTVhYVl5RRkBeWE9aW0FfU1tIXUlPWllOTVE=","cG56"};
		
		for (long hh = 1597969033592L; hh >= 1597769033592L; hh--) {
			Random r = new Random(hh);
			double uid = r.nextDouble();
			StringBuilder sb = new StringBuilder();
			for (int i = 0; i < 26; i++) {
				sb.append((char)((int)(r.nextDouble() * 256.0d)));
			}
			String key = sb.toString().substring(0,26);

			String decData = "";
			for (String s: data) {
				sb = new StringBuilder();
				try {
					decData = new String(Base64.getDecoder().decode(s));
				} catch (Exception e) {
					decData = "";
				}
				for (int i = 0; i < decData.length(); i++) {
					sb.append((char)(decData.charAt(i) ^ key.charAt(i % 26)));
				}
				String aaa = sb.toString().replace("~", " ").replace("|", ".");
				if (aaa.contains("ONA{") || aaa.contains("ona{")) {
					System.out.println("Decrypted= " + aaa);
				}
			}
		}
	}
}
```

Hice bruteforce de todo el rango entre el menor y mayor de los timestamps que encontré. En una de las iteraciones obtengo lo siguiente:

`Timestamp=1597869033592 - Key=ÃšÃ¥Ã¦*tbÂ¾ÂºiLÃ¤Ã›ÃŒÃª"^BÃ…Ã	Ã”Ã¶ÂµÃ¾Â°EÂ¶BNÂ©?Â¸&:EÃ˜ - Decrypted = the secret flag is ONA{}`

la flag es ONA{} vacia??? Probé enviar ONA{} como flag y no anduvo! Me dijeron que siga buscando

Luego de 10000 idas y vueltas, comparé el hash de nullp0inter (que ya solucionó este reto) y no da ni en pedo, volvi a ejecutar el script con timestamp 1597869033592L (EL MISMO Q ME DIO ONA{}), y debajo de la linea `the secret flag is ONA{}` está la flag. Peeeeeeeeerooooooooo.... en minuscula?? quiero llorar

Cabe destacar que la flag final la encontré mientras escribía esta linea anterior a la que estas leyendo!!

```
Decrypted= agent. operation storm trap has been compromised
Decrypted= please provide information about casualties
Decrypted= four casualties by enemy fire
Decrypted= enemies casualties
Decrypted= five known. three unknown. sheikh alive
Decrypted= proceed with caution
Decrypted= enemy increasing number
Decrypted= return to the base. you will need the flag. no further instructions until extraction
Decrypted= the secret flag is ONA{}
Decrypted= the secret flag is ona{hackers.love.randoms}
```

#### Flag: ona{hackers.love.randoms}        
mayuscula? minuscula? ayudaaaaaaaa (lo mando asi _BrOoDkIlLeR_ona{hackers.love.randoms})

PD1: lo comparé con el de nullp0inter y es correcto!

PD2: hackers.love.randoms, no mucho, el script lo tuve q modificar agregando la deteccion de lowercase ona{ porq se ve que lo pasé de largo

\#OnaChallenge_Flag
76d5b47693dc69ab3292d91c151447140178ec0d5b2e55bd0e2947618debe7ab48b2f4d236c177e350bbebc06ca24a18fe45c5d71fe1c7aeb53c7813a407555b

## PD RECIEN VEO LA DESCRIPCION DE LOS CHALLENGES CIFRADOS CON RC4 !!!!!!!!!!!!!
## LEI EL DEL ULTIMO Y ME DA LA SENSACIÓN QUE ME COMPLICABA MAS SABER ESO

# FIN
Cualquier cosa que quieras saber, preguntá que no molesta!

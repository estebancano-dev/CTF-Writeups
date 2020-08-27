> Could you find the first IP address that tried to exploit the vulnerability discovered by Roberto Paleari? FLAG format: EKO{IP}
Archivo: [Logs](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200626%20Ekoparty%20Pre-CTF/Files/Logs?raw=true "Logs")

`binwalk Logs`: gzip compressed data

extraer el archivo y renombrar a log.txt

abrir el txt. Es un access.log de apache. 

`cat log.txt | grep -oE "\b([0-9]{1,3}\.){3}[0-9]{1,3}\b" | sort -u | wc -l`

Tiene 384 IPs unicas

busco Roberto Paleari - http://roberto.greyhats.it/hacking.html
http://roberto.greyhats.it/advisories/20130603-netgear-dgn.txt

207.136.9.198 - - [02/Aug/2020:15:38:47 -0300] "GET /setup.cgi?next_file=netgear.cfg&todo=syscmd&cmd=busybox&curpath=/&currentsetting.htm=1 HTTP/1.1" 400 0 "-" "Mozilla/5.0"

#### EKO{207.136.9.198}
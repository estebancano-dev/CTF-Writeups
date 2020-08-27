> A DBA dumped his old disk, FLAG format: EKO{upper(text)}
Archivo: [Data](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200626%20Ekoparty%20Pre-CTF/Files/DBA?raw=true "Data")

nos dan un archivo comprimido, lo extraigo con 7z

el archivo .mysql_history tiene cadenas del tipo
`SELECT DECRYPT(usermame, 'cYViPMEIflaWy') from users;`
entre otras

hago un archivo solo con los hash entre '' (aproximadamente 77k lineas)

en otro archivo hay un dump de mysql (dba.dmp)

creo una base de datos, y tabla data, con campo id autonumerico y b de tipo BLOB

restauro el archivo

`select * from data` y descargo el BLOB (data.bin)

ese archivo no tiene forma de nada (probé con el cyberchef de todo)

la funcion `DECRYPT` no existe en mysql, pero existen `aes_decrypt, decode, des_decrypt, uncompress` https://dev.mysql.com/doc/refman/5.6/en/encryption-functions.html

pruebo descifrar el contenido del binario con aes_decrypt utilizando cada uno de los hashes 'cYViPMEIflaWy' como key

ejecuto `select aes_decrypt(b,'8YtNukU9ceaqs') from data;` para cada una de las 77k hash

`mysql -u root -p123456 asd2 < aaa.txt > salida.txt`

me genera el archivo salida.txt de 170MB (767k lineas)

ejecuto
`strings -n 5 salida.txt | sort -u > stringdecrs.txt`

me genera el archivo stringdecrs.txt de 2.5MB (100k lineas)

una de las lineas muestra esto (la mayoría son pocos caracteres) :

`524946467002020057415645666D742010000000010001002A2B00002A2B00000100080064617461500202008............ (257KB)`

La clave utilizada para esa linea fue `8SWlYBgjqZ7Dh`

Con cyberchef utilizo "From Hex" y me muestra un texto con cabecera `RIFFp...WAVEfmt...`

Lo descargo y renombro a wav, lo escucho y es un codigo morse

Utilizo https://morsecode.world/international/decoder/audio-decoder-adaptive.html para decodificar el codigo

#### EKO{M111SQLBL000B}
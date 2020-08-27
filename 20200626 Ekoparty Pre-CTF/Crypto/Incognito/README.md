> We have no idea about this file. May you help us?
Archivo: [Incognito](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200626%20Ekoparty%20Pre-CTF/Files/Incognito?raw=true "Incognito")

Descargar el archivo. Extraerlo (esta comprimido con gzip).

Al abrirlo se ven un montón de caracteres ASCII. Busqué una parte de esos caracteres en google (MCG4DC), y devuelve

> "Base91" Data "vuk:eJs4+BAAN

En linux Instalé http://downloads.sourceforge.net/base91/base91-0.6.0-linux-i386.tar.gz

Ejecutar: 
```bash
./base91 -d Incognito
```

Genera un PNG, cambio la extensión y en la imagen se ve la flag

#### EKO{B91_just_another_encoder}
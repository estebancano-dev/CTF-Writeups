> Where is the flag?
Archivo: [Deep](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200626%20Ekoparty%20Pre-CTF/Files/Deep?raw=true "Deep")

Descargar Archivo Deep. Es una imagen (cabecera comienza con ÿØÿà)

En la imagen se pueden ver unos caracteres binarios que decodifican a Hi_Baby en ASCII

Utilizo https://futureboy.us/stegano/decinput.html

seleccionar la imagen y "View raw output as MIME-type"

devuelve una imagen en base64

Decodificar (ojo con los primeros bytes ÿØÿà, que no los toma). Hacerlo con el CyberChef

Tenemos otra imagen que dice WTF?. 

Volver a la pagina con esta nueva imagen y en password ingresar Hi_Baby

#### EKO{H1DD3N^2}
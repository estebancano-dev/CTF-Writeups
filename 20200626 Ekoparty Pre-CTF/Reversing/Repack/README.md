> The flag is in memory, good luck!
Archivo: [Repack](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200626%20Ekoparty%20Pre-CTF/Files/Repack?raw=true "Repack")

Es un ejecutable de windows. Por el nombre del reto podemos inferir que el binario se encuentra [empaquetado](https://es.wikipedia.org/wiki/Empaquetador_de_ejecutables "empaquetado")

Esto quiere decir que para poder "ver" el codigo real del ejecutable del reto, primero debemos desempacar su codigo. Si no lo hacemos, el primer entry point que vemos es del "packer" y todo lo
que le sigue son funciones repetitivas que lo único que realizan es extraer el codigo real del reto.

Es más, si al iniciar el debugging busco Intermodular calls (llamadas a librerias de sistema, etc), solo aparecen 3 (normalmente deberían aparecer muchas)

Utilizo x64dbg y [este](https://github.com/x64dbg/Scripts/blob/master/UPX%20X.XX%20OEP%20Finder.txt "este") script que encuentra el OEP (Original Entry Point) del código real

El OEP se encuentra en 00000000001C5480 y salta a 00000000001C1E00

Establezco breakpoint en kernel32.ExitProcess (search for->intermodular calls)

la flag está ahi en el dump (4 instrucciones más abajo del ExitProcess)

#### EKO{G0Ool4ngCh4LL}
>Can you recover the flag?
Archivo: [2Much](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200626%20Ekoparty%20Pre-CTF/Files/2Much?raw=true "2Much")

Descargar el archivo

```bash
binwalk 2Much
gzip compressed data, has original file name: "for0.img", from Unix, last modified: 2020-06-25 02:45:23
mv 2Much 2Much.gz
gunzip 2Much.gz
mv 2Much for0.img
xfs_db -x for0.img
```

ingresamos
```bash
sb 0
p
```

nos muestra el superblock, informando que el rootinode es el numero `19328`

ingresamos

```bash
inode 19328
p
```
nos muestra info del inode. Vamos incrementando de a 1 el 19328 e ingresando p

Al llegar al 19335 nos muestra atributos extendidos del inode y se puede visualizar lo siguiente

```
a.sfattr.list[0].name = "f"
a.sfattr.list[0].value = "R"
```

Para listar todos los atributos extendidos de los inode, hacer un archivo x.txt con lo que sigue, sumando 1 al inode en cada vez (hasta el 30000)

```
inode 19335
p
inode 19336
p
```
etc

```bash
xfs_db -x for0.img
log start salida.txt
source x.txt
```

esto ejecutará inode y p en cada inode. A veces da Segmentation fault. Por lo tanto, dividir el proceso de a menos inodes/p

al llegar al inode 30000, salir de xfs_db con quit y obtener cada caracter

`cat salida.txt | grep ".value =" | grep -Po '.(?=.{1}$)' | tr -d "\n"`

Resultado: `RUtPe0RvX3lvdV9jaGVja19leHRlbmRlZF9hdHRyaWJ1dGVzP30`

Es base 64 ya que el encode de `EKO{` es `RUtPew`

#### EKO{Do_you_check_extended_attributes?}

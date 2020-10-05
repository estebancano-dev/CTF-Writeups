> 7/11Can you find the flag?
>
> ![Fig 1.- A meme](C:\Dropbox\dev\Github\CTF-Writeups\20201003 Tasteless CTF\2ugJxK3.png)
>
> **Update:** The meme in the challenge description is NOT part of the challenge.
>
>   [challenge.7z](challenge.7z)  is the only file you need to obtain the flag.

We are given  a 7z file. It has a file inside called `password.txt`, extract it and open. It has the text `give_me_the_flag` in ascci art.

Its weird that original fila is 150KB and the extracted file is 486 bytes, so I run `binwalk challenge.7z`

```
DECIMAL       HEXADECIMAL     DESCRIPTION
--------------------------------------------------------------------------------
0             0x0             7-zip archive data, version 0.4
194           0xC2            7-zip archive data, version 0.4
```

So at offset 0xC2 there is another 7z file.

Open the original 7z file with notepad++ for example and search for `7z`

![image-20201003123750398](C:\Users\USER\AppData\Roaming\Typora\typora-user-images\image-20201003123750398.png)

You can see selected the start of the other file. Delete all characters before that and save the file as `challenge2.7z`

Open it and it asks for a password. We can use `give_me_the_flag` and it extracts OK.

There is a `flag.txt` file and a `part2` folder.

Open `flag.txt` and there is the flag.

PS: the other folder was all junk for this challenge, but its used in 7/12 chall.

#### tstlss{next_header_offset_is_a_nice_feature}
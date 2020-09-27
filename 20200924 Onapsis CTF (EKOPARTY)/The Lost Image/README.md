> lost image

File: [image.txt](https://raw.githubusercontent.com/estebancano-dev/CTF-Writeups/master/20200924%20Onapsis%20CTF%20(EKOPARTY)/The%20Lost%20Image/thelostimage.txt "image.txt")

The file format is

```
1:0slbzoP...
2:AxkhkZc...
3:isoOmQv...
4:/9j/4AA...
5:Fl42qxw...
6:zyN2ymh...
...
```

where we have a number of line, then : and a base64 encoded string

if we decode it all we can see `Created with GIMP` string (line 4). Its the header of the image

I made a script to concatenate every other line to this header and write it to a file, just to see what happens


```php
<?php
$cabecera = "/9j/4AAQSkZJRgABAQIAHAAcAAD//gATQ3JlYXRlZCB3aXRoIEdJTVD/2wBDACgcHiMeGSgjISMtKygwPGRBPDc3PHtYXUlkkYCZlo+AjIqgtObDoKrarYqMyP/L2u71////m8H////6/+b9//j/2wBDASstLTw1PHZBQXb4pYyl+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj4+Pj/wAARCAHCAVIDASIAAhEBAxEB/8QAGgABAQEBAQEBAAAAAAAAAAAAAAECAwQFBv/EADQQAAICAQMDAgUDBAIBBQAAAAABAhEDEiExBEFRE2EFIjJxgRRCoSMzUpE0sWIkU8Hh8P/EABgBAQEBAQEAAAAAAAAAAAAAAAABAgME/8QAHxEBAQEBAQEBAQEAAwAAAAAAAAERAjEhEhNBA1Fx/9oADAMBAAIRAxEAPwD7IAAAAAAAAB5MubqcebHDTifqNpO34sD1kPM+qeLP6efSvk1fIm97Or6nEsUcutaJcNdwOoMYs0M0W4O6dNVTRnL1OLFJRnJ6mrpJt1+AOoOWTqsOPTqk7krSSbdeRPqcUIRm52p/TSuwOpLPNi6uE45pykljhKk/wjpiz481qDdrlNNMDrZDKnH1PTv5quvYxLqcUYanPbVp2XL8AdGQwuoxSx61P5b08cPwTLlUFNLecYuWkqNkOUuoxwUVN1OUb0pNsS6nDGelz3Wz2dL7sDqDGWThinNcxi2Y/UQhjxvI6lON0lYHYHN9RiWJZNa0y4rezE+pj6Knial86i77WwO5TjkzRjHJpnHVBb3wvuXJ1OLHJxlL5krpJt0B0ZkxPqMUYRm5Wp/TSuxjywypuErSdMDRDg+ob6r0o0lFK209zUepxTmoxlbfG2z+xUdSHOOfHOemLt8OlwVzrLGNqmm67gbBzx58eSVQbfvTpm4yU46otNeUEaAAVAAEAAAAAHrAIZbUEsAUAADz9RCUup6aUU2oybb8bHoAHBQl+veTT8vppX72eR9PlWPDLTP+nkm3GL3pt7o+kAPN0sUnkmo5U5Vbycsw9eHq8mT05zjkiqcVbVdj2NEA8jc8XVSzelOcckEvlVtNdjliw5en/T5JY3LSpKUY7uNuz6AoD50sGXJiyy9OUX6yyKN02qX8nfp4J5nk059WmrynXLn9K28c3Fd1VD1t4qUJR1Ot/sNX831x67VjjDPjVzi9KXm9v+6MywSwLppRi5rFepLndcnpePHknHI0pOPD8G9UabTTrmgjwSxZZwzZVjacskZKD5aVHTHrydY8jxyhD06Tl5s6rqYuKm4TjB/ua2NPLFZHB7fLqsat5sctD/Xa6+X06v3s8noygsmPJHPJSk38jVNM+i2krbVEtVd7FZc8sW+nnGKbehpL8HnUZ4cuPI8cpL0lBqO7TPXq";
$handle = fopen("image.txt", "r");
while (($line = fgets($handle)) !== false) {
	$arre = explode(":", $line);
	$cad = base64_decode($arre[1]);
	file_put_contents($arre[0] . ".jpg", base64_decode($cabecera) . $cad);
}
```

In image 8.jpg we can see the flag
TheDharmaInitiative

#### EKO{TheDharmaInitiative}
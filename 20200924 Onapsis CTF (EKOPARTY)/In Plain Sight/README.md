> In plain sight: I hope you brought your Swiss Army Knife
	
File: [in_plain_sight.tar.xz](https://github.com/estebancano-dev/CTF-Writeups/blob/master/20200924%20Onapsis%20CTF%20%28EKOPARTY%29/In%20Plain%20Sight/in_plain_sight.tar.xz?raw=true "in_plain_sight.tar.xz")
	
Download and extract the file

Use https://aperisolve.fr/ to check it.

In the blue decoding, we can see the string `th1s_1s_n0t_th3_fl4g`, but thats not the flag yet
descargar imagen

Use https://futureboy.us/stegano/decinput.html with original image and `th1s_1s_n0t_th3_fl4g` as password, and click on "Prompt to save"

we get this text
```
What?!			 	    	      	       	   	  	       
Flag was right here next to me!	     	    	 	      		    
I promise!      	       	   		     	 	     	    
It was super happy when Snow White and the 7 dwarfs visited   		    
Wonder what happenned...    	   	       	   	       	       	 
I know it's a little bit shy...    		  	     	  	       
Maybe it's hiding...       	 	 	  	 	     	     
There aren't that many places to hide, though...	  	  	   
Maybe in plain sight?    	      	     	     	       	       
After all, it's said to be one of the best places to hide	 
```								   

If we show all characters, we can see blank spaces and tabs at the end of every line. From past CTFs i know its encoded with `stegsnow`

So i executed `stegsnow -C out.txt` where `out.txt` has the above text

#### EKO{s0_m4ny_w4yZ_0f_h1d1ng_d4t4}
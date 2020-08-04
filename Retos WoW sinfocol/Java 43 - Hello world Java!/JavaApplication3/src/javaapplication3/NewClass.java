/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication3;

import java.math.BigInteger;

/**
 *
 * @author esteban
 */
class Generador{
    
    private String semilla = "";

    public void setSemilla(String semilla) {
        this.semilla = semilla;
    }
    private long magicNumber = 0;
    private final BigInteger CERO = BigInteger.ZERO;
    private final BigInteger UNO = BigInteger.ONE;
    private final BigInteger D6 = BigInteger.valueOf(16);
    private final static char[] cambExp =  {'f', 'd', 'e', 'c', 'b', 'a', '9', '8', '7', '6', '5', '4', '3', '2', '1', '0'};
    //10113961485fe29c prueba
    public Generador(long magicNumber){
        this.magicNumber = magicNumber;
    }
 
    public String wowHash(String str){
        long tmp = this.magicNumber;
        str += semilla;
        int i = 0;
        int len = str.length();
        while(i < len) {
            System.out.println(i+" "+str.codePointAt(i)+" "+str.charAt(i));
            tmp += (tmp << 3) + str.codePointAt(i);
            i++;
            
        }
        return Int2BaseR(BigInteger.valueOf(tmp), D6);
    }
 
    private String Int2BaseR(BigInteger num, BigInteger base){
        if(num.compareTo(base.subtract(UNO)) < 0){
            return (num.mod(base).compareTo(CERO) == 0)? "": num.mod(base).toString();
        }else{
            return Int2BaseR( num.divide( base ), base) + cambBase( num.mod( base ).toString() );
        }
    }
 
    private String cambBase(String num){
        return String.valueOf(cambExp[Integer.parseInt(num)]);
    }
}

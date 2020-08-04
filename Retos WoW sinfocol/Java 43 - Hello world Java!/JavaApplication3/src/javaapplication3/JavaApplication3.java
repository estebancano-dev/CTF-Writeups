/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication3;

/**
 *
 * @author esteban
 */
public class JavaApplication3 {



    public static void main(String[] args){
        //Tanto el número mágico como la semilla son correctos
        Generador gen = new Generador(49374); //Iniciamos el generador con el número mágico
        gen.setSemilla("wow.sinfocol.org"); //Inicializamos la semilla
        System.out.println(gen.wowHash("prueba wowHash")); //Imprimimos el hash
        //Probando con "prueba wowHash" el resultado bueno es 10113961485fe29c
    }

 



}

package com.example.proiectus;

import android.util.Log;

import java.util.ArrayList;
import java.util.Iterator;

public class LlistaInstituts {
    public static ArrayList <Institut> array = new ArrayList<>();


    public void afegirInstitut (String nom, String codi, String ciutat) {
        Institut i = new Institut(nom, codi, ciutat);
        array.add(i);
    }

    public void dadesProva(){
        Institut ins1 = new Institut("IES Montsià", "C012345", "Amposta");
        Institut ins2 = new Institut("Ramon Berenguer IV", "C345713", "Amposta");
        Institut ins3 = new Institut("IES Tecnificació", "C561004", "Amposta");
        Institut ins4 = new Institut("IES Camarles", "C092773", "Camarles");

        array.add(ins1);
        array.add(ins2);
        array.add(ins3);
        array.add(ins4);
    }

    public String [] getInstitut(String nom){
        String [] x = new String[2];

        Iterator<Institut> iter = array.iterator();

        while (iter.hasNext()) {

            if (iter.next().getNom().equals(nom)){
                x[0] = iter.next().getNom();
                x[1] = iter.next().getCodi();
                x[2] = iter.next().getCiutat();
            }
        }
        return x;

    }

    public void modificarInstitut (String nom, String codi, String ciutat){


    }

}

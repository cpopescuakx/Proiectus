package com.example.proiectus;

import android.util.Log;

import java.util.ArrayList;
import java.util.Iterator;

public class LlistaInstituts {
    public static ArrayList<Institut> array = new ArrayList<>();
    public int nextId = 1;


    public void afegirInstitut(String nom, String codi, String ciutat) {
        Institut i = new Institut(nextId, nom, codi, ciutat);
        array.add(i);
    }

    public void dadesProva() {
        Institut ins1 = new Institut(nextId, "IES Montsià", "C012345", "Amposta");
        nextId++;
        Institut ins2 = new Institut(nextId, "Ramon Berenguer IV", "C345713", "Amposta");
        nextId++;
        Institut ins3 = new Institut(nextId, "IES Tecnificació", "C561004", "Amposta");
        nextId++;
        Institut ins4 = new Institut(nextId, "IES Camarles", "C092773", "Camarles");
        nextId++;

        array.add(ins1);
        array.add(ins2);
        array.add(ins3);
        array.add(ins4);
    }

    public String[] getInstitut(int id) {
        String[] x = new String[2];

        Iterator<Institut> iter = array.iterator();

        while (iter.hasNext()) {

            if (iter.next().getId() == id) {
                x[0] = iter.next().(Integer.par)getId();
                x[1] = iter.next().getNom();
                x[2] = iter.next().getCodi();
                x[3] = iter.next().getCiutat();
            }
        }
        return x;
    }

    public void modificarInstitut(int id, String nom, String codi, String ciutat) {
        Iterator<Institut> iter = array.iterator();

        while (iter.hasNext()) {
            if (iter.next().getId() == id) {
                iter.next().setNom(nom);
                iter.next().setCodi(codi);
                iter.next().setCiutat(ciutat);
            }
        }
        System.out.println(iter.next());
    }

}

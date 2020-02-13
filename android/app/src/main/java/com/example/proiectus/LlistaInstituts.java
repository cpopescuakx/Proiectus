package com.example.proiectus;

import java.util.ArrayList;

public class LlistaInstituts {
    public ArrayList <Institut> array = new ArrayList<>();


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

    public void modificarInstitut (int id, String nom, String codi, String ciutat){


    }

}

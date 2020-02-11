package com.example.proiectus;

import java.util.ArrayList;

public class LlistaInstituts {
    public ArrayList <Institut> array = new ArrayList<Institut>();


    public void afegirInstitut (String nom, String codi, String ciutat) {
        Institut i = new Institut(nom, codi, ciutat);
        array.add(i);
    }

}

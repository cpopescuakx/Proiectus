package com.example.proiectus;

import android.util.Log;

import java.util.ArrayList;

public class LlistaInstituts {
    public static ArrayList <Institut> array = new ArrayList<>();


    public void afegirInstitut (String nom, String codi, String ciutat) {
        Institut i = new Institut(nom, codi, ciutat);
        array.add(i);
    }

}

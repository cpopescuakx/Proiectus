package com.example.proiectus;

import android.os.Bundle;
import android.util.Log;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.Iterator;

public class LlistaInstituts extends AppCompatActivity {
    public final ArrayList<Institut> array = new ArrayList<>();
    public int nextId = 0;

    public ArrayList<String> idInsti = new ArrayList<>();
    public ArrayList<String> nomInsti = new ArrayList<>();
    public ArrayList<String> codiInsti = new ArrayList<>();
    public ArrayList<String> ciutatInsti = new ArrayList<>();

    public LlistaInstituts () {

    }

    public LlistaInstituts (int nextId, ArrayList idInsti, ArrayList nomInsti, ArrayList codiInsti, ArrayList ciutatInsti) {
        this.nextId = nextId;
        this.idInsti = idInsti;
        this.nomInsti = nomInsti;
        this.codiInsti = codiInsti;
        this.ciutatInsti = ciutatInsti;
    }

    public ArrayList<Institut> getDades(){
        return array;
    }

    public void afegirInstitut(String nom, String codi, String ciutat) {
        Institut i = new Institut(nextId, nom, codi, ciutat);
        idInsti.add(""+nextId);
        nomInsti.add(nom);
        codiInsti.add(codi);
        ciutatInsti.add(ciutat);
        array.add(i);
        nextId++;
    }

    public void dadesProva() {

        afegirInstitut("IES Montsia", "C012345", "Amposta");
        afegirInstitut("Ramon Berenguer IV", "C012345", "Amposta");
        afegirInstitut("IES Camarles", "C012345", "Amposta");
        afegirInstitut("IES L'aldea", "C012345", "Amposta");
        afegirInstitut("IES Rumania", "C012345", "Amposta");
    }

    public String[] getInstitut(int id) {
        String[] x = new String[4];

        Iterator<Institut> iter = array.iterator();


        while (iter.hasNext()) {
            Institut ins = iter.next();

            if (ins.getId() == id) {
                x[0] = String.valueOf(ins.getId());
                x[1] = ins.getNom();
                x[2] = ins.getCodi();
                x[3] = ins.getCiutat();
            }
        }
        return x;
    }

    public void actualitzarLlistes(ArrayList<String> idIns, ArrayList<String> nomIns, ArrayList<String> codiIns, ArrayList<String> ciutatIns) {
        idInsti = idIns;
        nomInsti = nomIns;
        codiInsti = codiIns;
        ciutatInsti = ciutatIns;
    }

    public void modificarInstitut(int id, String nom, String codi, String ciutat) {
        Iterator<String> iterId = idInsti.iterator();

        while (iterId.hasNext()) {

            int insId = Integer.parseInt(iterId.next());

            if (insId == id) {
                nomInsti.set(id, nom);
                codiInsti.set(id, codi);
                ciutatInsti.set(id, ciutat);

            }
        }

    }

}

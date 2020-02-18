package com.example.proiectus;

import android.os.Bundle;
import android.util.Log;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;
import java.util.Iterator;

public class LlistaInstituts extends AppCompatActivity {
    public static ArrayList<Institut> array = new ArrayList<>();
    public int nextId = 1;
    private static final String TAG = "LlistarInstituts";
    //    vars
    private ArrayList<String> idInsti = new ArrayList<>();
    private ArrayList<String> nomInsti = new ArrayList<>();
    private ArrayList<String> codiInsti = new ArrayList<>();
    private ArrayList<String> ciutatInsti = new ArrayList<>();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.layout_listitem);
        Log.d(TAG,"onCreate:Started.");
        initTot();


    }
    private void initTot() {
        Log.d(TAG, "initIdInstis: Preparant");
        idInsti.add("1");
        nomInsti.add("IES Montsia");
        codiInsti.add("C012345");
        ciutatInsti.add("Amposta");
        idInsti.add("2");
        nomInsti.add("IES Cezar");
        codiInsti.add("C543210");
        ciutatInsti.add("Tortosa");
        initRecyclerView();
    }
    private void initRecyclerView() {
        Log.d(TAG, "initIdInstis: Done");
        RecyclerView recyclerView = findViewById(R.id.recycler_view);
        RecyclerViewAdapter adapter = new RecyclerViewAdapter(this, idInsti, nomInsti, codiInsti, ciutatInsti);
        recyclerView.setAdapter(adapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
    }


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

    public void modificarInstitut(int id, String nom, String codi, String ciutat) {
        Iterator<Institut> iter = array.iterator();

        while (iter.hasNext()) {

            Institut ins = iter.next();

            if (ins.getId() == id) {
                ins.setNom(nom);
                ins.setCodi(codi);
                ins.setCiutat(ciutat);

                array.set(id, ins);

            }
        }

    }

}

package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

public class ModificarInstitut extends AppCompatActivity {

    LlistaInstituts llistaInstituts = new LlistaInstituts();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modificar_instituts);

        String nom = "IES Camarles";

        if (getIntent().hasExtra("nom")){
            nom = getIntent().getExtras().getString("nom");
        }

        String [] dades = llistaInstituts.getInstitut(1);

        System.out.println(dades);

        llistaInstituts.modificarInstitut(dades[0], dades[1], dades[2]);
    }
}

package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

public class ModificarInstitut extends AppCompatActivity {

    LlistaInstituts llistaInstituts = new LlistaInstituts();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modificar_instituts);

        int id = 2;

        if (getIntent().hasExtra("id")){
            id = Integer.parseInt(getIntent().getExtras().getString("id"));
        }

        String [] dades = llistaInstituts.getInstitut(id);

        System.out.println(dades);

        llistaInstituts.modificarInstitut(1, dades[0], dades[1], dades[2]);
    }
}

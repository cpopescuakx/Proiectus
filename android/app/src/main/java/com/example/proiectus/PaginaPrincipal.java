package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class PaginaPrincipal extends Activity {
    Button btnAfegir;
    Button btnModificar;
    LlistaInstituts llistaInstituts = new LlistaInstituts();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pagina_principal);
        btnAfegir = (Button)findViewById(R.id.btnAfegir);
        btnModificar = (Button)findViewById(R.id.btnModificar);

        // Dades de prova
        //llistaInstituts.dadesProva();

        //llistaInstituts.llistarProjectes();

        btnAfegir.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                Intent i  = new Intent(PaginaPrincipal.this, CrearInstitut.class);
                startActivity(i);
            }
        });

        btnModificar.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                Intent i  = new Intent(PaginaPrincipal.this, ModificarInstitut.class);
                i.putExtra("id", "1");
                startActivity(i);
            }
        });

    }



}

package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class PaginaPrincipal extends Activity {
    Button btnAfegir;
    Button btnModificar;
    LlistaInstituts llistaInstituts = new LlistaInstituts();
    TextView text;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pagina_principal);
        btnAfegir = (Button)findViewById(R.id.btnAfegir);
        btnModificar = (Button)findViewById(R.id.btnModificar);

        String [] dades = llistaInstituts.getInstitut(2);
        text = (TextView)findViewById(R.id.txtTest);
        text.setText(dades[0] + " - " + dades[1] +" - " + dades[2] +" - " + dades[3]);

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

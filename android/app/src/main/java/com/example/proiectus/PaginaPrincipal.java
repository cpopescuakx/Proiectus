package com.example.proiectus;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import androidx.recyclerview.widget.RecyclerView;

public class PaginaPrincipal extends Activity {
    Button btnAfegir;
    Button btnModificar;
    LlistaInstituts llistaInstituts = new LlistaInstituts();
    LlistarInstituts llistarInstituts = new LlistarInstituts();

    EditText idModificar;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pagina_principal);
        btnAfegir = (Button)findViewById(R.id.btnAfegir);
        btnModificar = (Button)findViewById(R.id.btnModificar);
        idModificar = (EditText) findViewById(R.id.txtModificar);



        btnAfegir.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                Intent i  = new Intent(PaginaPrincipal.this, CrearInstitut.class);
                startActivity(i);
            }
        });

        btnModificar.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                Intent i  = new Intent(PaginaPrincipal.this, ModificarInstitut.class);
                i.putExtra("id", idModificar.getText().toString());
                startActivity(i);
            }
        });

    }



}

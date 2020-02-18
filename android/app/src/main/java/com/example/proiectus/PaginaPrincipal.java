package com.example.proiectus;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class PaginaPrincipal extends AppCompatActivity {
    Button btnAfegir;
    Button btnModificar;
    LlistaInstituts llistaInstituts = new LlistaInstituts();

    EditText idModificar;
    private static final String TAG = "LlistaInstituts";
    //    vars

    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.layout_listitem);
        Log.d(TAG,"onCreate:Started.");
        setContentView(R.layout.activity_pagina_principal);

        initTot();

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

    private void initTot() {
        Log.d(TAG, "initIdInstis: Preparant");

        llistaInstituts.dadesProva();

        initRecyclerView();
    }
    private void initRecyclerView() {
        Log.d(TAG, "initIdInstis: Done");
        RecyclerView recyclerView = findViewById(R.id.recycler_view);
        RecyclerViewAdapter adapter = new RecyclerViewAdapter(this, llistaInstituts.idInsti, llistaInstituts.nomInsti, llistaInstituts.codiInsti, llistaInstituts.ciutatInsti);
        recyclerView.setAdapter(adapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
    }
}





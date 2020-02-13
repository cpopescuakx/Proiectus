package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class PaginaPrincipal extends Activity {
    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pagina_principal);

    }

    /** Inicia l'activitat de crear Instituts */

    public void actAfegir (View view) {
        Intent i  = new Intent(PaginaPrincipal.this, CrearInstitut.class);
        startActivity(i);
    }

    LlistaInstituts ll = new LlistaInstituts();

}

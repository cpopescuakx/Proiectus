package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import java.util.ArrayList;

public class ModificarInstitut extends AppCompatActivity {
    Button botoModificar;
    Button botoTornar;
    EditText nom;
    EditText codi;
    EditText ciutat;
    LlistaInstituts llistaInstituts = new LlistaInstituts();




    @Override
    protected void onCreate(Bundle savedInstanceState) {

        //llistaInstituts.dadesProva();

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modificar_instituts);
        botoModificar = (Button)findViewById(R.id.botoModificar);
        botoTornar = (Button)findViewById(R.id.botoTornarModificar);
        nom = (EditText)findViewById(R.id.txtNom);
        codi = (EditText)findViewById(R.id.txtCodi);
        ciutat = (EditText)findViewById(R.id.txtCiutat);

        int id = -1;

        if (getIntent().hasExtra("id")){
            id = Integer.parseInt(getIntent().getExtras().getString("id"));
        }

    if (id >= 0) {
        final String[] dades = llistaInstituts.getInstitut(id);

        nom.setText(dades[1]);
        codi.setText(dades[2]);
        ciutat.setText(dades[3]);


        botoModificar.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                llistaInstituts.modificarInstitut(Integer.parseInt(dades[0]), nom.getText().toString(), codi.getText().toString(), ciutat.getText().toString());
                Intent i = new Intent(ModificarInstitut.this, PaginaPrincipal.class);
                startActivity(i);
            }

        });

        botoTornar.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                Intent i = new Intent(ModificarInstitut.this, PaginaPrincipal.class);
                startActivity(i);
            }
        });
    }
    }
}

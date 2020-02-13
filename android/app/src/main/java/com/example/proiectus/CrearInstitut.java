package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class CrearInstitut extends Activity {
    Button botoAfegir;
    Button botoTornar;
    EditText nom;
    EditText codi;
    EditText ciutat;
    LlistaInstituts llistaInstituts = new LlistaInstituts();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_crear_institut);
        botoAfegir = (Button)findViewById(R.id.botoAfegir);
        botoTornar = (Button)findViewById(R.id.botoTornar);
        nom = (EditText)findViewById(R.id.xnom);
        codi = (EditText)findViewById(R.id.xcodi);
        ciutat = (EditText)findViewById(R.id.xciutat);

        botoAfegir.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                llistaInstituts.afegirInstitut(nom.getText().toString(), codi.getText().toString(), ciutat.getText().toString());
                Intent i  = new Intent(CrearInstitut.this, PaginaPrincipal.class);
                startActivity(i);
            }

        });

        botoTornar.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                Intent i  = new Intent(CrearInstitut.this, PaginaPrincipal.class);
                startActivity(i);
            }

        });

    }

}

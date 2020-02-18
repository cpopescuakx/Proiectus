package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import java.util.ArrayList;

public class CrearInstitut extends Activity {
    Button botoAfegir;
    Button botoTornar;
    EditText nom;
    EditText codi;
    EditText ciutat;
    LlistaInstituts llistaInstituts;

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
                Bundle extras = getIntent().getExtras();
                int nextId = extras.getInt("nextId");
                ArrayList idInsti = extras.getStringArrayList("idInsti");
                ArrayList nomInsti = extras.getStringArrayList("nomInsti");
                ArrayList codiInsti = extras.getStringArrayList("codiInsti");
                ArrayList ciutatInsti = extras.getStringArrayList("ciutatInsti");

                llistaInstituts = new LlistaInstituts(nextId, idInsti, nomInsti, codiInsti, ciutatInsti);
                llistaInstituts.afegirInstitut(nom.getText().toString(), codi.getText().toString(), ciutat.getText().toString());
                Intent i  = new Intent(CrearInstitut.this, PaginaPrincipal.class);
                i.putExtra("nextId", llistaInstituts.nextId);
                i.putExtra("idInsti", idInsti);
                i.putExtra("nomInsti", nomInsti);
                i.putExtra("codiInsti", codiInsti);
                i.putExtra("ciutatInsti", ciutatInsti);
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

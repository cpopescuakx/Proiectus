package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class CrearInstitut extends AppCompatActivity {
    Button botoAfegir;
    EditText nom;
    EditText codi;
    EditText ciutat;
    LlistaInstituts llistaInstituts;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_crear_institut);
        botoAfegir = (Button)findViewById(R.id.botoAfegir);
        nom = (EditText)findViewById(R.id.nom);
        codi = (EditText)findViewById(R.id.codi);
        ciutat = (EditText)findViewById(R.id.ciutat);

        botoAfegir.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                llistaInstituts.afegirInstitut(nom.getText().toString(), codi.getText().toString(), ciutat.getText().toString());
                TextView prova = (TextView)findViewById(R.id.prova);
                prova.setText(llistaInstituts.array.get(0).getNom());
                
            }
        });


    }
}

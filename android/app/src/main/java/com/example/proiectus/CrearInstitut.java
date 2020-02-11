package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class CrearInstitut extends Activity {
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
        nom = (EditText)findViewById(R.id.xnom);
        codi = (EditText)findViewById(R.id.xcodi);
        ciutat = (EditText)findViewById(R.id.xciutat);

    }


}

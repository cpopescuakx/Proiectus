package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import java.util.ArrayList;
import java.util.Iterator;

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

        Bundle extras = getIntent().getExtras();
        final ArrayList idInsti = extras.getStringArrayList("idInsti");
        final ArrayList nomInsti = extras.getStringArrayList("nomInsti");
        final ArrayList codiInsti = extras.getStringArrayList("codiInsti");
        final ArrayList ciutatInsti = extras.getStringArrayList("ciutatInsti");


    if (id >= 0) {
        final String[] dades = getInstitut(id, idInsti, nomInsti, codiInsti, ciutatInsti);

        nom.setText(dades[1]);
        codi.setText(dades[2]);
        ciutat.setText(dades[3]);


        botoModificar.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                llistaInstituts.actualitzarLlistes(idInsti, nomInsti, codiInsti, ciutatInsti);
                llistaInstituts.modificarInstitut(Integer.parseInt(dades[0]), nom.getText().toString(), codi.getText().toString(), ciutat.getText().toString());
                Intent i = new Intent(ModificarInstitut.this, PaginaPrincipal.class);

                i.putExtra("idInsti", idInsti);
                i.putExtra("nomInsti", nomInsti);
                i.putExtra("codiInsti", codiInsti);
                i.putExtra("ciutatInsti", ciutatInsti);

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

    public String[] getInstitut(int id, ArrayList<String> idIns, ArrayList<String> nomIns, ArrayList<String> codiIns, ArrayList<String> ciutatIns) {
        String[] x = new String[4];

        Iterator<String> iter = idIns.iterator();


        while (iter.hasNext()) {
            int idModificar = Integer.parseInt(iter.next());

            if (idModificar == id) {
                x[0] = String.valueOf(idModificar);
                x[1] = nomIns.get(idModificar);
                x[2] = codiIns.get(idModificar);
                x[3] = ciutatIns.get(idModificar);
            }
        }
        return x;
    }
}

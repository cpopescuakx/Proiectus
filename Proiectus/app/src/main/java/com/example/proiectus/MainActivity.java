package com.example.proiectus;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;


public class MainActivity extends AppCompatActivity {
    EditText usuari;
    EditText contrassenya;
    Button boto;
    TextView text;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        usuari = (EditText)findViewById(R.id.xUsuari);
        contrassenya = (EditText)findViewById(R.id.xContrassenya);
        boto = (Button)findViewById(R.id.xBoto);
        text = (TextView)findViewById(R.id.xText);
        ImageView icono = (ImageView) findViewById(R.id.imageView2);
        icono.setImageResource(R.drawable.icono);
        boto.setOnClickListener(new View.OnClickListener() {
            String [][] array = carregarDades();
            @Override
            public void onClick(View v) {
                login(usuari.getText().toString(), contrassenya.getText().toString(), array);
            }
        });

    }

    public String [][] carregarDades () {
        String [] [] usuaris = new String [10][2];
        for (int i = 0; i < usuaris.length; i++) {
            usuaris [i][0] = "usuari" + i;
            usuaris [i][1] = "usuari" + i;
            //usuaris [i][0] = "usuari" + i;
            //usuaris [i][1] = "pass" + i;
        }
        return usuaris;
    }

    public void login (String usuari, String contrassenya, String [][] usuaris) {
        text.setText("");
        int comptador = 0;
        for (int i = 0; i < usuaris.length; i++) {
            if (usuari.equals(usuaris[i][0])  && contrassenya.equals(usuaris[i][1])) {
                Intent intent = new Intent(MainActivity.this, CrearInstitut.class);
                startActivity(intent);
            }
            else {
                comptador++;
            }
        }
        if (comptador == usuaris.length) {
            text.setText("Usuari i/o contrassenya incorrectes");
        }
    }
}

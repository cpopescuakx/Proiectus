package com.example.ticketsg1;

import androidx.appcompat.app.AppCompatActivity;

import android.content.ContentValues;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {


    EditText et_assumpte, et_descripcio;
    Button bt_guardar, bt_mostrar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        et_assumpte = (EditText) findViewById(R.id.et_assumpte);
        et_descripcio = (EditText) findViewById(R.id.et_descripcio);

        bt_guardar = (Button) findViewById(R.id.bt_guardar);
        bt_mostrar = (Button) findViewById(R.id.bt_mostrar);


        bt_guardar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                guardar(et_assumpte.getText().toString(), et_descripcio.getText().toString());
            }
        });


        bt_mostrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, Listado.class));
            }
        });



    }




    private void guardar(String Assumpte, String Descripcio){

        BaseHelper helper = new BaseHelper(this,"Demo",null,1);
        SQLiteDatabase db = helper.getWritableDatabase();

        try {

            ContentValues c = new ContentValues();
            c.put("ASSUMPTE", Assumpte);
            c.put("DESCRIPCIO", Descripcio);
            db.insert("TICKETS",null,c);
            db.close();
            Toast.makeText(this, "Registro INSERTADO", Toast.LENGTH_SHORT).show();


        }catch (Exception e){

            Toast.makeText(this, "Error:"+ e.getMessage(), Toast.LENGTH_SHORT).show();

        }


    }


}

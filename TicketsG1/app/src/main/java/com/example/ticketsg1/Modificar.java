package com.example.ticketsg1;

import androidx.appcompat.app.AppCompatActivity;

import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Modificar extends AppCompatActivity {


    EditText et_assumpte, et_descripcio;
    Button bt_modificar, bt_borrar;
    int id;
    String assumpte;
    String descripcio;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modificar);



        Bundle b = getIntent().getExtras();

        if (b!=null){

            id = b.getInt("Id");
            assumpte = b.getString("Assumpte");
            descripcio = b.getString("Descripcio");

        }






        et_assumpte = (EditText) findViewById(R.id.et_assumpte);
        et_descripcio = (EditText) findViewById(R.id.et_descripcio);


        et_assumpte.setText(assumpte);
        et_descripcio.setText(descripcio);



        bt_modificar = (Button) findViewById(R.id.bt_modificar);
        bt_borrar = (Button) findViewById(R.id.bt_borrar);




        bt_borrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                eliminar(id);
                onBackPressed();
            }
        });



        bt_modificar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //MOLT IMPORTANT (passar param)
                modificar(id,et_assumpte.getText().toString(),et_descripcio.getText().toString());
                onBackPressed();
            }
        });




    }



    private void modificar(int Id, String Assumpte, String Descripcio){

        BaseHelper helper = new BaseHelper(this,"Demo",null,1);
        SQLiteDatabase db = helper.getWritableDatabase();

        String sql = "update TICKETS set ASSUMPTE='" + Assumpte + "', DESCRIPCIO='" + Descripcio + "' where Id=" + Id;
        db.execSQL(sql);
        db.close();

    }

    private void eliminar(int Id){

        BaseHelper helper = new BaseHelper(this,"Demo",null,1);
        SQLiteDatabase db = helper.getWritableDatabase();

        String sql = "delete from TICKETS where Id=" + Id;
        db.execSQL(sql);
        db.close();

    }






}

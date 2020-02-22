package com.example.ticketsg1;

import androidx.appcompat.app.AppCompatActivity;

import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;

public class Modificar extends AppCompatActivity {


    EditText et_assumpte, et_descripcio;
    Button bt_modificar;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modificar);


        et_assumpte = (EditText) findViewById(R.id.et_assumpte);
        et_descripcio = (EditText) findViewById(R.id.et_descripcio);

        bt_modificar = (Button) findViewById(R.id.bt_modificar);
    }



    private void modificar(int Id, String Assumpte, String Descripcio){

        BaseHelper helper = new BaseHelper(this,"Demo",null,1);
        SQLiteDatabase db = helper.getWritableDatabase();

        String sql = "update TICKETS set ASSUMPTE='" + Assumpte + "', DESCRIPCIO='" + Descripcio + "' where Id=" + Id;
        db.execSQL(sql);
        db.close();

    }






}

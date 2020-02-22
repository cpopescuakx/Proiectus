package com.example.ticketsg1;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;

public class Listado extends AppCompatActivity {



    ListView listView;
    ArrayList<String> listado;

    @Override
    protected void onPostResume() {
        super.onPostResume();
        CargarListado();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listado);

        listView = (ListView) findViewById(R.id.listView);





        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(Listado.this,listado.get(position),Toast.LENGTH_SHORT ).show();
                int clave=Integer.parseInt(listado.get(position).split(" ")[0]);
                String assumpte = listado.get(position).split(" ")[1];
                String descripcio = listado.get(position).split(" ")[2];

                Intent intent = new Intent(Listado.this, Modificar.class);
                intent.putExtra("Id", clave);
                intent.putExtra("Assumpte", assumpte);
                intent.putExtra("Descripcio", descripcio);
                startActivity(intent);

            }
        });


        //BOTO CAP ATRAS DESPRES DE MOSTRAR
        if (getSupportActionBar()!=null){
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
            getSupportActionBar().setDisplayShowHomeEnabled(true);
        }

    }

    //BOTO CAP ATRAS DESPRES DE MOSTRAR
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        if(item.getItemId()==android.R.id.home){
            finish();
        }

        return super.onOptionsItemSelected(item);
    }



    private void CargarListado(){
        listado = ListaTickets();
        ArrayAdapter adapter = new ArrayAdapter(this, android.R.layout.simple_list_item_1, listado);
        listView.setAdapter(adapter);
    }







    private ArrayList<String> ListaTickets(){

        ArrayList<String> datos = new ArrayList<String>();

        BaseHelper helper = new BaseHelper(this,"Demo",null,1);
        SQLiteDatabase db = helper.getReadableDatabase();

        String sql = "select id, ASSUMPTE, DESCRIPCIO from TICKETS";
        Cursor c = db.rawQuery(sql,null);

        if (c.moveToFirst()){

            do{

                String linea = c.getInt(0)+" "+ c.getString(1)+" "+ c.getString(2);
                datos.add(linea);

            }while(c.moveToNext());

        }
        db.close();
        return datos;


    }



}

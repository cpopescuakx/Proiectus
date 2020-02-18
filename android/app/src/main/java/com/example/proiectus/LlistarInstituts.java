package com.example.proiectus;

import android.os.Bundle;
import android.util.Log;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class LlistarInstituts extends AppCompatActivity {
    private static final String TAG = "LlistarInstituts";
//    vars
    private ArrayList<String> idInsti = new ArrayList<>();
    private ArrayList<String> nomInsti = new ArrayList<>();
    private ArrayList<String> codiInsti = new ArrayList<>();
    private ArrayList<String> ciutatInsti = new ArrayList<>();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.layout_listitem);
        Log.d(TAG,"onCreate:Started.");
        initRecyclerView();


    }
    private void initTot() {
        Log.d(TAG, "initIdInstis: Preparant");
        initRecyclerView();
    }
    private void initRecyclerView() {
        Log.d(TAG, "initIdInstis: Done");
        RecyclerView recyclerView = findViewById(R.id.recycler_view);
        RecyclerViewAdapter adapter = new RecyclerViewAdapter(this, idInsti, nomInsti, codiInsti, ciutatInsti);
        recyclerView.setAdapter(adapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
    }
}

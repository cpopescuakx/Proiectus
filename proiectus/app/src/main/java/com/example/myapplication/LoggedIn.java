package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.TextView;

public class LoggedIn extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_logged_in);

        String username = getIntent().getStringExtra("username");
        int userid = getIntent().getIntExtra("userid", -1);

        TextView welcome = findViewById(R.id.welcome);
        welcome.setText("Logged in as: " + username + " with id: " + userid);
    }
}

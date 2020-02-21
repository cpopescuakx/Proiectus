package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.TextView;

import com.example.myapplication.Classes.User;

public class LoggedIn extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_logged_in);

        User user = (User) getIntent().getSerializableExtra("user");

        TextView welcome = findViewById(R.id.welcome);
        welcome.setText("Logged in as: " + user.getUsername() + " with id: " + user.getUserId());
    }
}

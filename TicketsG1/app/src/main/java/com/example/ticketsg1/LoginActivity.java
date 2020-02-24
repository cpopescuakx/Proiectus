package com.example.ticketsg1;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.NoConnectionError;
import com.android.volley.ParseError;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.Volley;
import com.example.ticketsg1.Classes.User;

import org.json.JSONException;
import org.json.JSONObject;

public class LoginActivity extends AppCompatActivity {

    Button loginBtn;
    EditText usrname, pwd;
    private static final String REQUEST_URL = "https://proiectus.cat/g1_android/requests.php";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        loginBtn = findViewById(R.id.loginBtn);
        usrname = findViewById(R.id.usrname);
        pwd = findViewById(R.id.pwd);

        usrname.setText("prova");
        pwd.setText("alumne");
        loginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final String username = usrname.getText().toString();
                final String password = pwd.getText().toString();


                Response.Listener<JSONObject> responseListener = new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        System.out.println(response);
                        try {
                            User user = new User(response.getInt("id_user"), response.getString("username"));

                            Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                            intent.putExtra("user", user);
                            LoginActivity.this.startActivity(intent);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                };

                Response.ErrorListener errorListener = new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        String errorMSG = "Something went wrong!";

                        if (error instanceof NoConnectionError) {
                            errorMSG = "No connection!";
                        } else {
                            if (username.isEmpty() && password.isEmpty()) {
                                errorMSG = "Missing credentials";
                            } else if (error instanceof ParseError) {
                                errorMSG = "Wrong username or password!";
                            }
                        }

                        Toast.makeText(getApplicationContext(), errorMSG, Toast.LENGTH_LONG).show();
                    }
                };

                String req_URL = REQUEST_URL + "?r=login" + "&u=" + username + "&p=" + password;
                Request request = new Request(req_URL, responseListener, errorListener);
                RequestQueue queue = Volley.newRequestQueue(LoginActivity.this);
                queue.add(request);
            }
        });
    }
}

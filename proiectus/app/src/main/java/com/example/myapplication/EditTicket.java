package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.ContextCompat;

import android.content.Intent;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.Toast;

import com.android.volley.NoConnectionError;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.Volley;
import com.example.myapplication.Classes.Ticket;
import com.example.myapplication.Classes.User;

import org.json.JSONException;
import org.json.JSONObject;

import java.lang.reflect.Method;
import java.util.Map;

public class EditTicket extends AppCompatActivity {

    private static final String REQUEST_URL = "https://proiectus.cat/g1_android/requests.php";

    Button modificar, borrar;
    EditText assumpte, tipus;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_ticket);

        final User user = (User) getIntent().getSerializableExtra("user");


        assumpte    = findViewById(R.id.et_assumpte);
        tipus  = findViewById(R.id.et_tipus);
        modificar   = findViewById(R.id.bt_modificar);
        borrar      = findViewById(R.id.bt_borrar);

        modificar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final Response.Listener<JSONObject> responseListener = new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        try {
                            if (response.has("error")) {
                                Toast.makeText(getApplicationContext(), response.getString("error"), Toast.LENGTH_LONG).show();
                            } else {
                                Toast.makeText(getApplicationContext(), "yaaaaas", Toast.LENGTH_LONG).show();
                            }


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
                        }

                        Toast.makeText(getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
                    }
                };

                String req_URL = REQUEST_URL + "?r=updateTicket";
                Request request = new Request(req_URL, responseListener, errorListener);
                RequestQueue queue = Volley.newRequestQueue(EditTicket.this);
                queue.add(request);
            }
        });
    }
}

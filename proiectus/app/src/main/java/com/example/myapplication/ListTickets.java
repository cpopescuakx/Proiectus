package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.ContextCompat;

import android.content.Intent;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
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

import java.util.ArrayList;
import java.util.List;

public class ListTickets extends AppCompatActivity {

    private static final String REQUEST_URL = "https://proiectus.cat/g1_android/requests.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_tickets);

        final User user = (User) getIntent().getSerializableExtra("user");
        final ArrayList<Button> buttons = new ArrayList<>();
        final LinearLayout layout = findViewById(R.id.layout);
        final ArrayList<Ticket> tickets = new ArrayList<>();

        final Response.Listener<JSONObject> responseListener = new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                try {
                    //System.out.println(response.getString("error"));

                    System.out.println();
                    System.out.println();
                    System.out.println(response.has("error"));
                    System.out.println();
                    System.out.println();

                    if (response.has("error")) {
                        Toast.makeText(getApplicationContext(), response.getString("error"), Toast.LENGTH_LONG).show();
                    } else {
                        JSONObject object;
                        for (int i = 0; i < response.length(); i++) {
                            object = response.getJSONObject("" + i);
                            tickets.add(new Ticket(object.getInt("id"), object.getString("topic")));
                            buttons.add(new Button(layout.getContext()));
                        }


                        for (int i = 0; i < buttons.size(); i++) {
                            Button btn = buttons.get(i);
                            LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, ViewGroup.LayoutParams.WRAP_CONTENT);
                            layoutParams.setMargins(15, 30, 15, 30);
                            btn.setGravity(Gravity.LEFT);
                            btn.setPadding(20, 15, 20, 0);
                            btn.setTransformationMethod(null);
                            btn.setLayoutParams(layoutParams);

                            btn.setBackground(ContextCompat.getDrawable(btn.getContext(), R.drawable.button_rounded_border));
                            btn.setText(tickets.get(i).getTopic());
                            btn.setTextSize(20);
                            btn.setId(tickets.get(i).getId());

                            btn.setOnClickListener(new View.OnClickListener() {
                                @Override
                                public void onClick(View v) {
                                    Intent intent = new Intent(ListTickets.this, EditTicket.class);
                                    intent.putExtra("user", user);
                                    intent.putExtra("ticket", v.getId());
                                    ListTickets.this.startActivity(intent);
                                }
                            });
                            layout.addView(btn);
                        }
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

                Toast.makeText(getApplicationContext(), errorMSG, Toast.LENGTH_SHORT).show();
            }
        };

        String req_URL = REQUEST_URL + "?r=getTickets" + "&u=" + user.getUserId();
        Request request = new Request(req_URL, responseListener, errorListener);
        RequestQueue queue = Volley.newRequestQueue(ListTickets.this);
        queue.add(request);

    }

    /*@Override
    public void onBackPressed() {
        // Do Here what ever you want do on back press;
    }*/
}

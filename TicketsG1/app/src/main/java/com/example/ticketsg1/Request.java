package com.example.ticketsg1;

import com.android.volley.Response;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class Request extends JsonObjectRequest {

    public Request(String req_URL, Response.Listener<JSONObject> listener, Response.ErrorListener errorListener) {
        super(Method.GET, req_URL, null, listener, errorListener);
    }

    @Override
    public Map<String, String> getHeaders() {
        Map<String, String> headers = new HashMap<>();
        headers.put("Content-Type", "application/json");
        headers.put("Accept", "application/json");
        return headers;
    }
}

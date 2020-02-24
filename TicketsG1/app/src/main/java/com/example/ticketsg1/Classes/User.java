package com.example.ticketsg1.Classes;

import java.io.Serializable;

public class User implements Serializable {
    private int userId;
    private String username;

    public User() {}

    public User(int uid, String uname) {
        this.userId = uid;
        this.username = uname;
    }


    public int getUserId() {
        return userId;
    }

    public String getUsername() {
        return username;
    }
}

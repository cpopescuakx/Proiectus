package com.example.myapplication.Classes;

public class Ticket {
    private int id;
    private String topic;
    private String type;
    private String priority;
    private String creationdate;
    private String solveddate;
    private int id_assigned_user;
    private int id_author;
    private String status;

    public Ticket() {}

    public Ticket(int id, String topic) {
        this.id = id;
        this.topic = topic;
    }

    public Ticket(int id, String topic, String type, String priority, String creationdate, String solveddate, int id_assigned_user, int id_author, String status) {
        this.id = id;
        this.topic = topic;
        this.type = type;
        this.priority = priority;
        this.creationdate = creationdate;
        this.solveddate = solveddate;
        this.id_assigned_user = id_assigned_user;
        this.id_author = id_author;
        this.status = status;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTopic() {
        return topic;
    }

    public void setTopic(String topic) {
        this.topic = topic;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getPriority() {
        return priority;
    }

    public void setPriority(String priority) {
        this.priority = priority;
    }

    public String getCreationdate() {
        return creationdate;
    }

    public void setCreationdate(String creationdate) {
        this.creationdate = creationdate;
    }

    public String getSolveddate() {
        return solveddate;
    }

    public void setSolveddate(String solveddate) {
        this.solveddate = solveddate;
    }

    public int getId_assigned_user() {
        return id_assigned_user;
    }

    public void setId_assigned_user(int id_assigned_user) {
        this.id_assigned_user = id_assigned_user;
    }

    public int getId_author() {
        return id_author;
    }

    public void setId_author(int id_author) {
        this.id_author = id_author;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}

package com.example.proiectus;

public class Institut {
    private String nom;
    private String codi;
    private String ciutat;

    public Institut (String nom, String codi, String ciutat) {
        this.nom = nom;
        this.codi = codi;
        this.ciutat = ciutat;
    }

    public void setNom (String nom) {
        this.nom = nom;
    }

    public  void setCodi (String codi) {
        this.codi = codi;
    }

    public void setCiutat (String ciutat) {
        this.ciutat = ciutat;
    }

    public String getNom () {
        return nom;
    }

    public String getCodi () {
        return codi;
    }

    public String getCiutat () {
        return ciutat;
    }

}
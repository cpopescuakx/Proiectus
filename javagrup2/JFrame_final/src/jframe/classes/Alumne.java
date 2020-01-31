package jframe.classes;

import java.text.SimpleDateFormat;
import java.util.Date;

public class Alumne {
    
    /* Atributs */
    
    private int id;
    private String nom;
    private String cognom;
    private String email;
    private String dni;
    private String data_naixement;
    private String data_alta;
    private String escola;
    private double mitjana;
    private String estat;

    /* Constructors */
    
    public Alumne(int id, String nom, String cognom, String email, String dni, String data_naixement, String escola, double mitjana, String estat) {
        this.id = id;
        this.nom = nom;
        this.cognom = cognom;
        this.email = email;
        this.dni = dni;
        this.data_naixement = data_naixement;
        this.data_alta = agafarDataActual();;
        this.escola = escola;
        this.mitjana = mitjana;
        this.estat = estat;
    }
    
    public Alumne(String nom, String cognom, String email, String dni, String data_naixement, String escola, double mitjana, String estat) {
        this.nom = nom;
        this.cognom = cognom;
        this.email = email;
        this.dni = dni;
        this.data_naixement = data_naixement;
        this.data_alta = agafarDataActual();;
        this.escola = escola;
        this.mitjana = mitjana;
        this.estat = estat;
    }
    
    /* Agafa la data i la hora del sistema */
    
    public static String agafarDataActual () {
      SimpleDateFormat formatador = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
      Date actual = new Date(System.currentTimeMillis());
      return formatador.format(actual);
    }

    /* Setters / Getters */
   
    public int getId () {
        return id;
    }
    
    public void setId (int id) {
        this.id = id;
    }
    
    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getCognom() {
        return cognom;
    }

    public void setCognom(String cognom) {
        this.cognom = cognom;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getData_naixement() {
        return data_naixement;
    }

    public void setData_naixement(String data_naixement) {
        this.data_naixement = data_naixement;
    }

    public String getData_alta() {
        return data_alta;
    }

    public void setData_alta(String data_alta) {
        this.data_alta = data_alta;
    }

    public String getEscola() {
        return escola;
    }

    public void setEscola(String escola) {
        this.escola = escola;
    }
    
    public double getMitjana() {
        return this.mitjana;
    }
    public void setMitjana(double mitjana) {
        this.mitjana = mitjana;
    }
    
    public String getEstat () {
        return estat;
    }
    
    public void setEstat (String estat) {
        this.estat = estat;
    }
    
    /* Retorna una String amb els atributs de l'objecte */
    
    public String toString() {
        return getNom() + " " + getCognom() + " " + getEmail() + " " + getDni() + " " + getData_alta() + " " + getEscola() + " " + getEstat();
    }

    public void imprimir() {
    }
}

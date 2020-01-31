/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.classes;

/**
 *
 * @author josep
 */
public class Matricula {

    //Atributs
    private int ID;
    private String institut;
    private Alumne alumne;
    private Grup grup;
    private String data_alta;
    private String data_baixa;
    private String estat;

    //Constructor
    public Matricula(int ID, String institut, Alumne alumne, Grup grup, String data_alta, String data_baixa, String estat) {
        this.ID = ID;
        this.institut = institut;
        this.alumne = alumne;
        this.grup = grup;
        this.data_alta = data_alta;
        this.data_baixa = data_baixa;
        this.estat = estat;
    }

    //Setters i getters
    public Alumne getUsuari() {
        return alumne;
    }

    public void setAlumne(Alumne alumne) {
        this.alumne = alumne;
    }

    public Grup getGrup() {
        return grup;
    }

    public void setGrup(Grup grup) {
        this.grup = grup;
    }

    public String getInstitut() {
        return institut;
    }

    public void setInstitut(String institut) {
        this.institut = institut;
    }

    public String getData_alta() {
        return data_alta;
    }

    public void setData_alta(String data_alta) {
        this.data_alta = data_alta;
    }

    public String getData_baixa() {
        return data_baixa;
    }

    public void setData_baixa(String data_baixa) {
        this.data_baixa = data_baixa;
    }

    public String getEstat() {
        return estat;
    }

    public void setEstat(String estat) {
        this.estat = estat;
    }

    public void setID(int ID) {
        this.ID = ID;
    }

    public int getID() {
        return ID;
    }

    //Metode toString
    @Override
    public String toString() {
        return this.getID() + " " + this.getInstitut() + this.getGrup() + " " + this.getUsuari() + " " + this.getData_alta() + " " + this.getData_baixa() + " " + this.getEstat();
    }

}

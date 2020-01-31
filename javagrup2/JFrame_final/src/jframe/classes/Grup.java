/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.classes;

/**
 *
 * @author alumne
 */
public class Grup {
    private int id;
    private String nomGrup;
    private String nomCurtGrup;
    private String familiaProfessional;
    
    //Constructor
    public Grup(int id, String ng, String nc, String fp){
        this.id = id;
        nomGrup = ng;
        nomCurtGrup = nc;
        familiaProfessional = fp;
    }
    
    //Getters
    public String getNomGrup(){
        return nomGrup;
    }
    public String getNomCurtGrup(){
        return nomCurtGrup;
    }
    public String getFamiliaProfessional(){
        return familiaProfessional;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
    
    //Setters
    public void setNomGrup(String ng){
        nomGrup = ng;
    }
    public void setNomCurtGrup(String nc){
        nomCurtGrup = nc;
    }
    public void setFamiliaProfessional(String fp){
        familiaProfessional = fp;
    }

    @Override
    public String toString() {
        return nomGrup + " " + nomCurtGrup + " " + familiaProfessional;
    }
}

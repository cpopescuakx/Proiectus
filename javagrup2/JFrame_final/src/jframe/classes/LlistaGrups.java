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
public class LlistaGrups {

    public final int maxGrups = 10;
    private final Grup[] m = new Grup[maxGrups];
    private int numGrupsActuals = 0;

    public void alta(String nom, String nomcurt, String fp) {
        if (numGrupsActuals < maxGrups) {
            this.m[numGrupsActuals] = new Grup(numGrupsActuals + 1, nom, nomcurt, fp);
            numGrupsActuals++;
        }
    }

    public void populate() {
        this.alta("pepito", "ppt", "Informàtica");
        this.alta("sksksk", "sk", "Informàtica");
    }

    public int getNumGrupsActuals() {
        return numGrupsActuals;
    }

    public LlistaGrups consulta(String s) {
        LlistaGrups temp_consulta = new LlistaGrups();
        for (int i = 0; i < numGrupsActuals; i++) {
            if (m[i].toString().toLowerCase().contains(s.toLowerCase())) {
                temp_consulta.m[temp_consulta.numGrupsActuals] = m[i];
                temp_consulta.numGrupsActuals++;
            }
        }
        if (temp_consulta.numGrupsActuals == 0) {
            System.out.println("No s'han trobat resultats");
        }
        return temp_consulta;
    }

    public Grup[] returnList() {
        return m;
    }

    public void borrar(int selectedItem) {
        for (int i = selectedItem; i < numGrupsActuals; i++) {
            m[i] = m[i + 1];
        }
        numGrupsActuals--;

        for (int i = selectedItem; i < numGrupsActuals; i++) {
            m[i].setId(m[i].getId() - 1);
        }
    }

    public void modificar(int selectedItem, String nom, String nomcurt, String fp) {
        m[selectedItem].setNomGrup(nom);
        m[selectedItem].setNomCurtGrup(nomcurt);
        m[selectedItem].setFamiliaProfessional(fp);
    }

    public Grup buscarPerNom(String nom) {
        Grup grup = null;
        for (int i = 0; i < numGrupsActuals; i++) {
            if (m[i].getNomGrup().equals(nom)) {
                grup = m[i];
            }
        }

        return grup;
    }
}

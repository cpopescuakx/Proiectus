/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.classes;

import java.time.LocalDateTime;
import java.util.ArrayList;
import java.util.Iterator;

/**
 *
 * @author alumne
 */
public class LlistaGrups {

    private final ArrayList<Grup> m = new ArrayList<Grup>();
    private int numGrupsActuals = 0;
    Log log = new Log();

    public void alta(String nom, String nomcurt, String fp) {
        try {
            LocalDateTime actual = LocalDateTime.now();
            Grup grup = new Grup(numGrupsActuals + 1, nom, nomcurt, fp);
            this.m.add(grup);
            numGrupsActuals++;
            log.generarInfoLog("dist/info.log", "S'ha inserit el grup " + grup.getNomGrup() + " (" + grup.getNomCurtGrup() + ") amb família professional: " + grup.getFamiliaProfessional() + ".\n");

        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());

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
        try {
            Iterator iter = m.iterator();

            while (iter.hasNext()) {
                Grup grup = (Grup) iter.next();
                if (grup.toString().toLowerCase().contains(s.toLowerCase())) {
                    temp_consulta.m.add(grup);
                    temp_consulta.numGrupsActuals++;
                }
            }

            if (temp_consulta.numGrupsActuals == 0) {
                System.out.println("No s'han trobat resultats");
            }

        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());

        }
        return temp_consulta;
    }

    public Grup returnList(int index) {
        return m.get(index);
    }

    public void borrar(int selectedItem) {
        try {
            //Guardar les dades del grup per a registrar-ho al log
            String nomVell = m.get(selectedItem).getNomGrup();
            String nomCurtVell = m.get(selectedItem).getNomCurtGrup();
            String fpVell = m.get(selectedItem).getFamiliaProfessional();

            // S'esborra l'element seleccionat
            m.remove(selectedItem);
            // Es decrementa el contador de grups
            numGrupsActuals--;
            log.generarInfoLog("dist/info.log", "El grup amb nom " + nomVell + " (" + nomCurtVell + ") de la família professional " + fpVell + " ha estat eliminat. \n");

            // Es resta 1 a les ID que estaven per dalt de la que hem esborrat
            for (int i = selectedItem; i < numGrupsActuals; i++) {
                m.get(i).setId(m.get(i).getId() - 1);
            }

        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());

        }
    }

    public void modificar(int selectedItem, String nom, String nomcurt, String fp) {
        try {
            //Guardar les dades del grup per a registrar-ho al log

            String nomVell = m.get(selectedItem).getNomGrup();
            String nomCurtVell = m.get(selectedItem).getNomCurtGrup();
            String fpVell = m.get(selectedItem).getFamiliaProfessional();
            // Fer les modificacions
            m.get(selectedItem).setNomGrup(nom);
            m.get(selectedItem).setNomCurtGrup(nomcurt);
            m.get(selectedItem).setFamiliaProfessional(fp);
            //Registrar els canvis
            log.generarInfoLog("dist/info.log", "El grup amb nom " + nomVell + " (" + nomCurtVell + ") de la família professional " + fpVell + " ha estat modificat amb les dades:\n"
                    + "Nom: " + m.get(selectedItem).getNomGrup() +"("+ m.get(selectedItem).getNomCurtGrup() + ")\nFamília professional: "+ m.get(selectedItem).getFamiliaProfessional() + "\n");

        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());

        }
    }

    public Grup buscarPerNom(String nom) {
        Grup grup = null;
        for (int i = 0; i < numGrupsActuals; i++) {
            if (m.get(i).getNomGrup().equals(nom)) {
                grup = m.get(i);
            }
        }

        return grup;
    }
}

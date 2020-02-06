package jframe.classes;

import java.util.ArrayList;
import java.util.Iterator;
import static jframe.classes.LlistaMatricules.actualData;

public class LlistaAlumnes {

/* Atributs */
    public ArrayList<Alumne> llistaAlumnes = new ArrayList<Alumne>();
    public int comptadorAlumnes = 0;
    Log log = new Log();

    /* Setters / Getters */
    public int getComptadorAlumnes() {
        return this.comptadorAlumnes;
    }

    //Consulta 
    public LlistaAlumnes consulta(String s) {
        LlistaAlumnes temp_consulta = new LlistaAlumnes();
        try {
            Iterator iter = llistaAlumnes.iterator();

            while (iter.hasNext()) {
                Alumne alumne = (Alumne) iter.next();
                if (alumne.toString().toLowerCase().contains(s.toLowerCase())) {
                    temp_consulta.llistaAlumnes.add(alumne);
                    temp_consulta.comptadorAlumnes++;
                }
            }

            if (temp_consulta.getComptadorAlumnes() == 0) {
                System.out.println("No s'han trobat resultats");
            }
        } catch (Exception e) {
            //Exception
        }
        return temp_consulta;
    }

    /* Afegeix un alumne a la llista */
    public void afegirAlumne(String nom, String cognom, String email, String dni, String centre, String data) {
        try {

            Alumne alumne = new Alumne(comptadorAlumnes, nom, cognom, email, dni, data, centre, "Actiu");
            this.llistaAlumnes.add(alumne);
            this.comptadorAlumnes++;
            log.generarInfoLog("dist/info.log", "S'ha inserit l'alumne " + alumne + ".\n");

        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());

        }
    }

    /* Modifica els atributs d'un alumne */
    public void modificarAlumne(int id, String nom, String cognom, String email, String dni, String data, String centre) {

        try {
            String nomAntic = llistaAlumnes.get(id).getNom();
            String cognomAntic = llistaAlumnes.get(id).getCognom();
            String emailAntic = llistaAlumnes.get(id).getEmail();
            String dniAntic = llistaAlumnes.get(id).getDni();
            String dataAntiga = llistaAlumnes.get(id).getData_naixement();
            String centreAntic = llistaAlumnes.get(id).getEscola();

            llistaAlumnes.get(id).setNom(nom);
            llistaAlumnes.get(id).setCognom(cognom);
            llistaAlumnes.get(id).setEmail(email);
            llistaAlumnes.get(id).setDni(dni);
            llistaAlumnes.get(id).setData_naixement(data);
            llistaAlumnes.get(id).setEscola(centre);
            log.generarInfoLog("dist/info.log", "L'alumne amb dades " + " " + id + " " + nomAntic + " " + cognomAntic + " "  + emailAntic + " "  + dniAntic + " "  + dataAntiga + " " + centreAntic + " ha estat modificat: " + id + " " + nom + " " + email + " " + dni + " " + data + " " + centre + "\n");
        
        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());

        }
    }

    /* Posa en estat innactiu l'alumne seleccionat */
    public void eliminarAlumne(int index) {

        try {
            Alumne alumne = llistaAlumnes.get(index);
            llistaAlumnes.get(index).setEstat("Innactiu");
            log.generarInfoLog("dist/info.log", "L'alumne " + alumne + " ha estat donat de baixa. \n");

        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());
        }
    }

    /* (Per a tornar a donar d'alta) Canvia l'estat d'un alumne a Actiu */
    public void donarAlta(int index) {
        try {
            Alumne alumne = llistaAlumnes.get(index);
            llistaAlumnes.get(index).setEstat("Actiu");
            log.generarInfoLog("dist/info.log", "L'alumne " + alumne + " torna a estar donat d'alta. \n");

        } catch (Exception e) {
            //Exception
        }
    }

    public Alumne buscarPerNom(String nom) {
        Alumne alumne = null;
        for (int i = 0; i < comptadorAlumnes; i++) {
            if (llistaAlumnes.get(i).getNom().equals(nom)) {
                alumne = llistaAlumnes.get(i);
            }
        }

        return alumne;
    }

    //Metoder per a retornar l'array d'objectes
    public Alumne returnList(int index) {
        return llistaAlumnes.get(index);
    }
}

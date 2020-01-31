package jframe.classes;

import static jframe.classes.LlistaMatricules.actualData;

public class LlistaAlumnes {

    /* Atributs */
    public int maxAlumnes = 50;
    public Alumne[] llistaAlumnes = new Alumne[maxAlumnes];
    public int comptadorAlumnes = 0;

    /* Setters / Getters */
    public int getComptadorAlumnes() {
        return this.comptadorAlumnes;
    }

    //Consulta 
    public LlistaAlumnes consulta(String s) {
        LlistaAlumnes temp_consulta = new LlistaAlumnes();
        for (int i = 0; i < comptadorAlumnes; i++) {
            if (llistaAlumnes[i].toString().toLowerCase().contains(s.toLowerCase())) {
                temp_consulta.llistaAlumnes[temp_consulta.comptadorAlumnes] = llistaAlumnes[i];
                temp_consulta.comptadorAlumnes++;
            }
        }
        if (temp_consulta.comptadorAlumnes == 0) {
            System.out.println("No s'han trobat resultats");
        }
        return temp_consulta;
    }

    /* Afegeix un alumne a la llista */
    public void afegirAlumne(String nom, String cognom, String email, String dni, String centre, String data) {
        this.llistaAlumnes[comptadorAlumnes] = new Alumne(comptadorAlumnes, nom, cognom, email, dni, data, centre, 0.0, "Actiu");
        this.comptadorAlumnes++;
    }

    /* Modifica els atributs d'un alumne */
    public void modificarAlumne(int id, String nom, String cognom, String email, String dni, String data, String centre) {
        this.llistaAlumnes[id].setNom(nom);
        this.llistaAlumnes[id].setCognom(cognom);
        this.llistaAlumnes[id].setEmail(email);
        this.llistaAlumnes[id].setDni(dni);
        this.llistaAlumnes[id].setData_naixement(data);
        this.llistaAlumnes[id].setEscola(centre);
    }

    /* Posa en estat innactiu l'alumne seleccionat */
    public void eliminarAlumne(int index) {

        llistaAlumnes[index].setEstat("Innactiu");
    }

    /* (Per a tornar a donar d'alta) Canvia l'estat d'un alumne a Actiu */
    public void donarAlta(int index) {
        llistaAlumnes[index].setEstat("Actiu");
    }
    
    public Alumne buscarPerNom(String nom) {
        Alumne alumne = null;
        for (int i = 0; i < comptadorAlumnes; i++) {
            if (llistaAlumnes[i].getNom().equals(nom)) {
                alumne = llistaAlumnes[i];
            }
        }
        
        return alumne;
    }
    

    //Metoder per a retornar l'array d'objectes
    public Alumne[] returnList() {
        return llistaAlumnes;
    }
}

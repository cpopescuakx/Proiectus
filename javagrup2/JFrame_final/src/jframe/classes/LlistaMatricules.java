/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.classes;

import java.io.IOException;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.logging.*;
import java.util.ArrayList;
import java.util.Iterator;

public class LlistaMatricules {

    Log log = new Log();

    //Atributs de classe
    public int contador = 0;
    private final ArrayList<Matricula> M = new ArrayList<Matricula>();
    static LocalDate date = LocalDate.now();
    static DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
    static String actualData = date.format(formatter);
    
    
    public int getComptadorMatricules () {
        return contador;
    }
    //Metode per a inserir matricules en l'array de matricules
    public void inserirMatricula(String institut, Alumne alumne, Grup grup) {
        try {
            Matricula m = new Matricula((contador), institut, alumne, grup, actualData, " ", "Actiu");
            this.M.add(m);
            contador++;
            log.generarInfoLog("dist/info.log", "S'ha inserit la matricula " + m + "\n");
        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());
        }

    }

    //Metode per a consultar Matricules
    public LlistaMatricules consulta(String s) {
        LlistaMatricules temp_consulta = new LlistaMatricules();
        Iterator iter = M.iterator();

        while (iter.hasNext()) {
            Matricula matricula = (Matricula) iter.next();
            if (matricula.toString().toLowerCase().contains(s.toLowerCase())) {
                temp_consulta.M.add(matricula);
                temp_consulta.contador++;
            }
        }
        if (temp_consulta.contador == 0) {
            System.out.println("No s'ha trobat cap matricula");
        }
        return temp_consulta;
    }

    //Metode per a donar de baixa matricules
    public void baixaMatricula(int item) {
        try {
            M.get(item).setData_baixa(actualData);
            M.get(item).setEstat("Inactiva");
            System.out.println(M.get(item));
            log.generarInfoLog("dist/info.log", "S'ha inserit la matricula " + M.get(item) + "\n");
        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());
        }

    }

    //Metode per a modificar matricules
    public void modificarMatricula(int item, String institut, Alumne alumne, Grup grup) {
        try {
            M.get(item).setGrup(grup);
            M.get(item).setInstitut(institut);
            M.get(item).setAlumne(alumne);
            log.generarInfoLog("dist/info.log", "S'ha modificat la matricula " + M.get(item) + "\n");
        } catch (Exception e) {
            log.generarErrorLog("dist/error.log", e.toString());
        }

    }

    //Metode per a retornar l'array d'objectes
    public Matricula returnList(int index) {
        return M.get(index);
    }
}

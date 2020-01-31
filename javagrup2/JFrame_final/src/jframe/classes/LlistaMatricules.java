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


public class LlistaMatricules {
    Log log = new Log();
    
    //Atributs de classe
    public int contador = 0;
    private final static int MAXIM = 10;
    private final Matricula[] M = new Matricula[MAXIM];
    static LocalDate date = LocalDate.now();
    static DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
    static String actualData = date.format(formatter);

    //Metode per a inserir matricules en l'array de matricules
    public void inserirMatricula(String institut, Alumne alumne, Grup grup){

        try {
            if (contador == MAXIM) {
                System.out.println("Ja no es poden donar més matricules d'alta");
                return;
            }
            Matricula m = new Matricula((contador), institut, alumne, grup, actualData, " ", "Actiu");
            this.M[contador] = m;
            contador++;
            log.generarInfoLog("dist/info.log", "S'ha inserit la matricula " + m + "\n");
        } catch (Exception e) {
            log.generarErrorLog("dist/error.log",e.toString());
        }

    }

    //Metode per a consultar Matricules
    public LlistaMatricules consulta(String s) {
        LlistaMatricules temp_consulta = new LlistaMatricules();
        for (int i = 0; i < contador; i++) {
            if (M[i].toString().toLowerCase().contains(s.toLowerCase())) { //Comparem que les dades inserides estiguin en l'array
                temp_consulta.M[temp_consulta.contador] = M[i];
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
        M[item].setData_baixa(actualData);
        M[item].setEstat("Inactiva");
        System.out.println(M[item]);
        log.generarInfoLog("dist/info.log", "S'ha inserit la matricula " + M[item] + "\n");
    } catch (Exception e) {
        log.generarErrorLog("dist/error.log",e.toString());
    }

}

    //Metode per a modificar matricules
    public void modificarMatricula(int item, String institut, Alumne alumne, Grup grup) {
        try {
        M[item].setGrup(grup);
        M[item].setInstitut(institut);
        M[item].setAlumne(alumne);
        log.generarInfoLog("dist/info.log", "S'ha modificat la matricula " + M[item] + "\n");
    } catch (Exception e) {
        log.generarErrorLog("dist/error.log",e.toString());
    }

}

    //Metode per a retornar l'array d'objectes
    public Matricula[] returnList() {
        return M;
    }
}

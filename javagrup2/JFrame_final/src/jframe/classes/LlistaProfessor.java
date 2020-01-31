package jframe.classes;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

public class LlistaProfessor {
    Log log = new Log();

    //Atributs de la classe
    private int contador = 0;
    private final static int maxim = 10;
    public final Professor[] p = new Professor[maxim];
    LocalDate date = LocalDate.now();
    DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
    String dataActual = date.format(formatter);
    
    //Getter per a agafar el número de professors que hi ha actualment a l'array de Professors
    public int getNumProfessorsActuals(){
       return contador; 
    }
    
    //Mètode per a inserir professors
    public void inserirProfessor(String nom, String cognom, String email, String DNI, String data_naixement, String escola, String departament, float salari, String data_baixa, String estat){
        try {
        if(contador == maxim){
            System.out.println("Ja no hi caben més professors!");
            return;
        }
        
        Professor p = new Professor((contador+1), nom, cognom, email, DNI, data_naixement, dataActual, escola, departament, salari, data_baixa, estat);
        this.p[contador] = p;
        contador++;
        log.generarInfoLog("dist/info.log", "S'ha inserit el professor " + p + "\n");
    } catch (Exception e) {
        log.generarErrorLog("dist/error.log",e.toString());
    }
    }
    
    //Mètode per a donar de baixa professors
    public void baixaProfessor(int item){
        try {
        p[item].setData_baixa(dataActual);
        p[item].setEstat("Inactiu");
        log.generarInfoLog("dist/info.log", "S'ha eliminat el professor " + p[item] + "\n");
        } catch (Exception e) {
            log.generarErrorLog("dist/error.log",e.toString());
        }
    }
    
    //Mètode per a mostrar professors segons la consulta que hem fet 
    public LlistaProfessor consulta(String s){
        LlistaProfessor temp_consulta = new LlistaProfessor();
        for(int i = 0; i<getNumProfessorsActuals(); i++){
            if(p[i].toString().toLowerCase().contains(s.toLowerCase())){
                temp_consulta.p[temp_consulta.getNumProfessorsActuals()] = p[i];
                temp_consulta.contador++;
            }
        }
        if(temp_consulta.contador == 0){
            System.out.println("No s'han trobat resultats");
        }
        return temp_consulta;
    }
    
    
    //Mètode per a modificar les dades d'un professor
    public void modificarProfessor(int item, String nom, String cognom, String email, String DNI, String data_naixement, String escola, String departament, float salari, String data_baixa, String estat){
        try {
        p[item].setNom(nom);
        p[item].setCognom(cognom);
        p[item].setEmail(email);
        p[item].setDni(DNI);
        p[item].setData_naixement(data_naixement);
        p[item].setEscola(escola);
        p[item].setDepartament(departament);
        p[item].setSalari(salari);
        p[item].setData_baixa("");
        p[item].setEstat("Actiu");
        log.generarInfoLog("dist/info.log", "S'ha modificat el professor " + p[item] + "\n");
        } catch (Exception e) {
            log.generarErrorLog("dist/error.log",e.toString());
        }
    }
    
    //Mètode per a imprimir dades inicials
    public void imprimir(){
        
        this.p[contador] = new Professor((contador+1), "Albert", "Tomàs", "alberttomaspla@gmail.com", "47936788G", "18/06/2000", dataActual, "INS Montsià", "Informàtica", 2500, "", "Actiu");
        contador++;
        this.p[contador] = new Professor((contador+1), "Josep", "Barberà", "jbarbera@gmail.com", "47936888G", "23/06/2000", dataActual, "INS Montsià", "Informàtica", 2500, "", "Actiu");
        contador++;
    }
    
    
    //Mètode per a retornar l'array de Professors
    public Professor[] returnList(){
        return p;
    }

}
package jframe.classes;

public class Professor{
    
    private int ID;
    private String nom;
    private String cognom;
    private String email;
    private String DNI;
    private String data_naixement;
    private String data_alta;
    private String escola;
    private String departament;
    private float salari;
    private String data_baixa;
    private String estat;

    public Professor(int ID, String nom, String cognom, String email, String dni, String data_naixement, String data_alta, String escola, String departament, float salari, String data_baixa, String estat) {
        this.ID = ID;
        this.nom = nom;
        this.cognom = cognom;
        this.email = email;
        this.DNI = dni;
        this.data_naixement = data_naixement;
        this.data_alta = data_alta;
        this.escola = escola;
        this.departament = departament;
        this.salari = salari;
        this.data_baixa = data_baixa;
        this.estat = estat;
    }
    
    
    //Getters
    
    public int getID(){
        return ID;
    }
    
    public String getDepartament() {
        return departament;
    }
    
     public float getSalari() {
        return salari;
    }
     
    public String getNom(){
        return nom;
    }
    
    public String getCognom(){
        return cognom;
    }
    
    public String getEmail(){
        return email;
    }
    
    public String getDni(){
        return DNI;
    }
    
    public String getData_naixement(){
        return data_naixement;
    }
    
    public String getData_alta(){
        return data_alta;
    }
    
    public String getEscola(){
        return escola;
    }
    
    public String getData_baixa(){
        return data_baixa;
    }
    
    public String getEstat(){
        return estat;
    }
    
     
     //Setters
    
    public void setID(int ID){
        this.ID = ID;
    }
    
    public void setDepartament(String departament) {
        this.departament = departament;
    }

    public void setSalari(float salari) {
        this.salari = salari;
    }
    
    public void setNom(String nom){
        this.nom = nom;
    }
    
    public void setCognom(String cognom){
        this.cognom = cognom;
    }
    
    public void setEmail(String email){
        this.email = email;
        }
    
    public void setDni(String dni){
        this.DNI = dni;
        }
    
    public void setData_naixement(String data_naixement){
        this.data_naixement = data_naixement;
        }
    
    public void setData_alta(String data_alta){
        this.data_alta = data_alta;
        }
    
    public void setEscola(String escola){
        this.escola = escola;
        }
    
    public void setData_baixa(String data_baixa){
        this.data_baixa = data_baixa;
    }
    
    public void setEstat(String estat){
        this.estat = estat;
    }

    
   /* public void imprimir() {
        String s = "\t" + this.getNom()
                + "\t\t" + this.getCognom()
                + "\t\t"+ this.getEmail()
                + "\t" + this.getDni()
                + "\t" + this.getData_naixement()
                + "\t" + this.getData_alta()
                + "\t" + this.getEscola()
                + "\t\t\t" + getDepartament()
                + "\t" + getSalari();
        System.out.println(s);
    }*/
    
    @Override
    public String toString(){
        return ID + " " + nom + " " + cognom + " " + email + " " + DNI + " " + data_naixement + " " + data_alta + " " + escola + " " + departament + " " + salari + " " + data_baixa + " " + estat;
    }
    
    public String toStringComes(){
        return ID + "," + nom + "," + cognom + "," + email + "," + DNI + "," + data_naixement + "," + data_alta + "," + escola + "," + departament + "," + salari + "," + data_baixa + "," + estat;
    }

}
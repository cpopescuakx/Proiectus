/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.forms;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import javax.swing.JFileChooser;
import jframe.classes.LlistaAlumnes;
import jframe.classes.LlistaGrups;
import jframe.classes.LlistaMatricules;
import jframe.classes.LlistaProfessor;
import static jframe.forms.alta.JFrameAltaAlumnes.ll_a;

/**
 *
 * @author alumne
 */
public class JFrameCSVImport extends javax.swing.JFrame {

    public static LlistaMatricules ll_m;
    public static LlistaAlumnes ll_a;
    public static LlistaGrups ll_g;
    public static LlistaProfessor ll_p;
    public static int tipusDades;
    private int row = -1;
    public static String [] llistaImport;
    /**
     * Creates new form JFrameCSV
     */
    public JFrameCSVImport() {
        initComponents();
        this.setLocationRelativeTo(null);
        TextRuta.setText("Tria un fitxer...");
    }
    
    public JFrameCSVImport(LlistaMatricules llista_m, LlistaAlumnes llista_a, LlistaGrups llista_g, LlistaProfessor llista_p, int tipusDades) {
        this.ll_a = llista_a;
        this.ll_m = llista_m;
        this.ll_g = llista_g;
        this.ll_p = llista_p;
        this.tipusDades = tipusDades;

        initComponents();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        botoAfegir = new javax.swing.JButton();
        botoTornar = new javax.swing.JButton();
        LabelRuta = new javax.swing.JLabel();
        TextRuta = new javax.swing.JTextField();
        BtnExaminar = new javax.swing.JButton();
        botoAfegir1 = new javax.swing.JButton();
        botoTornar1 = new javax.swing.JButton();
        jLabel2 = new javax.swing.JLabel();

        botoAfegir.setText("Acceptar");
        botoAfegir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoAfegirActionPerformed(evt);
            }
        });

        botoTornar.setText("Cancel·lar");
        botoTornar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoTornarActionPerformed(evt);
            }
        });

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        LabelRuta.setText("Ruta:");

        TextRuta.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                TextRutaActionPerformed(evt);
            }
        });

        BtnExaminar.setText("Examinar...");
        BtnExaminar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BtnExaminarActionPerformed(evt);
            }
        });

        botoAfegir1.setText("Acceptar");
        botoAfegir1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoAfegir1ActionPerformed(evt);
            }
        });

        botoTornar1.setText("Cancel·lar");
        botoTornar1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoTornar1ActionPerformed(evt);
            }
        });

        jLabel2.setFont(new java.awt.Font("Tahoma", 0, 30)); // NOI18N
        jLabel2.setText("Importar desde .csv");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(109, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel2)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                .addComponent(botoTornar1, javax.swing.GroupLayout.DEFAULT_SIZE, 177, Short.MAX_VALUE)
                                .addComponent(botoAfegir1, javax.swing.GroupLayout.DEFAULT_SIZE, 177, Short.MAX_VALUE))
                            .addGap(167, 167, 167))
                        .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                            .addComponent(LabelRuta)
                            .addGap(18, 18, 18)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                .addComponent(BtnExaminar, javax.swing.GroupLayout.PREFERRED_SIZE, 177, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(TextRuta, javax.swing.GroupLayout.PREFERRED_SIZE, 246, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGap(100, 100, 100)))))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(53, Short.MAX_VALUE)
                .addComponent(jLabel2)
                .addGap(18, 18, 18)
                .addComponent(BtnExaminar, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(TextRuta, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(LabelRuta))
                .addGap(18, 18, 18)
                .addComponent(botoAfegir1, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(botoTornar1, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void TextRutaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_TextRutaActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_TextRutaActionPerformed

    private void BtnExaminarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BtnExaminarActionPerformed
        // Creem un lector de fitxers i el mostrem
        JFileChooser jf = new JFileChooser();
        jf.showOpenDialog(this);
        
        // Creem un objecte de tipus File i li assignem el fitxer que acabem de triar
        File fitxer = jf.getSelectedFile();
        String ruta = fitxer.getAbsolutePath();
        String ext = ruta.substring(ruta.lastIndexOf(".")+1);
        
        // Si el fitxer existeix i és un .csv mostrarem la ruta absoluta d'aquest
        if(fitxer != null && ext.equals("csv")){
            TextRuta.setText(ruta);          
        }
        // Si no hi ha ningun fitxer sel·leccionat mostrarem "Fitxer no sel·leccionat"
        else if (fitxer == null){
            TextRuta.setText("Fitxer no sel·leccionat");
        }
        // Sinó vol dir que el fitxer no és un csv, per tant imprimirem "El fitxer no és un csv!"
        else {
            TextRuta.setText("El fitxer no és un csv!");
        }
        
        try{
        // Creem un lector per a determinar el # de línies que té el fitxer csv
        BufferedReader lectorLinies = new BufferedReader(new FileReader(fitxer));
        int linies = 0;
        while (lectorLinies.readLine() != null){
            linies++;
        }
        
        // Tanquem el lector
        lectorLinies.close();
        
        // Creem un Array amb la mateixa llargada que el fitxer csv
        String [] llistaprova = new String [linies];

        // Creem un lector per a conseguir el contingut del fitxer csv
        BufferedReader lectorContingut = new BufferedReader(new FileReader(fitxer));
        
        // Bucle per a guardar el contingut del fitxer csv a l'Array
        for (int i = 0; i < llistaprova.length; i++) {
            llistaprova[i] = lectorContingut.readLine();
            
        }
        
        llistaImport = llistaprova;

        // Tanquem el lector
        lectorContingut.close();
        
        // Si hi ha alguna excepció la imprimim
        }catch(IOException e){
            System.out.println("Error: "+e);
        }
    }//GEN-LAST:event_BtnExaminarActionPerformed

    private void botoAfegirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoAfegirActionPerformed
        
        
    }//GEN-LAST:event_botoAfegirActionPerformed

    private void botoTornarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoTornarActionPerformed
        
    }//GEN-LAST:event_botoTornarActionPerformed

    private void botoTornar1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoTornar1ActionPerformed
        
        this.setVisible(false);
        JFrameMenuPrincipal fll = new JFrameMenuPrincipal(ll_m, ll_a, ll_g, ll_p);
        fll.setVisible(true);
        fll.setTitle("Gestió d'instituts");
        fll.setLocationRelativeTo(null);
        dispose();
        
    }//GEN-LAST:event_botoTornar1ActionPerformed

    private void botoAfegir1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoAfegir1ActionPerformed

        for (int i = 0; i < llistaImport.length -1; i++) {
                
                String[] contingutLinia = llistaImport[i+1].split(",");
                 
                /** ID,Institut,Usuari,Grup,Data Alta,Data Baixa,Estat
                 * Switch que determinara el tipus de dades que conté el csv i on s'inserirà
                 */
                switch (tipusDades) {
                    // Cas Professors
                    case 0:
                        if(llistaImport[0].equals("ID,Nom,Cognom,Email,DNI,Data naixement,Data d’alta,Escola,Departament,Salari,Data de baixa,Estat")){
                            ll_p.inserirProfessor(contingutLinia[1], contingutLinia[2], contingutLinia[3], contingutLinia[4], contingutLinia[5], contingutLinia[7], contingutLinia[8], Float.parseFloat(contingutLinia[9]), "", "Actiu");
                            
                        }
                        else{
                        System.out.println("Aquest fitxer no conté dades de Professors!");
                        }
                    break;
                     
                    // Cas Grups
                    case 1:  
                        if(llistaImport[0].equals("#,Nom curt,Nom,Familia professional")){
                            ll_g.alta(contingutLinia[1], contingutLinia[2], contingutLinia[3]);
                            
                        }
                        else{
                        System.out.println("Aquest fitxer no conté dades de Grups!");
                        }
                    break;
                     
                    // Cas Matrícules
                    case 2:  
                        if(llistaImport[0].equals("ID,Institut,Usuari,Grup,Data Alta,Data Baixa,Estat")){
                        }
                        else{
                        System.out.println("Aquest fitxer no conté dades de Matrícules!");
                        }
                    break;
                     
                    // Cas Alumnes
                    case 3:  
                        if(llistaImport[0].equals("ID,Nom,Cognom,DNI,Email,Data naixement,Centre,Estat")){
                            ll_a.afegirAlumne(contingutLinia[1], contingutLinia[2], contingutLinia[3], contingutLinia[4], contingutLinia[5], contingutLinia[6]);
                            
                        }
                        else{
                        System.out.println("Aquest fitxer no conté dades de Alumnes!");
                        }
                    break;
                     
                    default: 
                        System.out.println("Tipus de dada Incorrecta");
                        
                    break;
                }
            
            }
        
        this.setVisible(false);
            JFrameMenuPrincipal fll = new JFrameMenuPrincipal(ll_m, ll_a, ll_g, ll_p);
            fll.setVisible(true);
            fll.setLocationRelativeTo(null);
        fll.setTitle("Gestió d'instituts");
            dispose();
    }//GEN-LAST:event_botoAfegir1ActionPerformed

    
    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(JFrameCSVImport.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(JFrameCSVImport.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(JFrameCSVImport.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(JFrameCSVImport.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new JFrameCSVImport().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton BtnExaminar;
    private javax.swing.JLabel LabelRuta;
    private javax.swing.JTextField TextRuta;
    private javax.swing.JButton botoAfegir;
    private javax.swing.JButton botoAfegir1;
    private javax.swing.JButton botoTornar;
    private javax.swing.JButton botoTornar1;
    private javax.swing.JLabel jLabel2;
    // End of variables declaration//GEN-END:variables

    private void importar(){
    }
    
}

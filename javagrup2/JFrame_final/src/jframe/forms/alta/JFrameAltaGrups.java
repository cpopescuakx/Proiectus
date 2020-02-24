/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.forms.alta;

import javax.swing.UIManager;
import jframe.classes.LlistaAlumnes;
import jframe.classes.LlistaGrups;
import jframe.classes.LlistaMatricules;
import jframe.classes.LlistaProfessor;
import jframe.forms.JFrameGrups;

/**
 *
 * @author alumne
 */
public class JFrameAltaGrups extends javax.swing.JFrame {

    public static LlistaMatricules ll_m;
    public static LlistaAlumnes ll_a;
    public static LlistaGrups ll_g;
    public static LlistaProfessor ll_p;

    /**
     * Creates new form grups_alta
     */
    public JFrameAltaGrups(LlistaMatricules llista_m, LlistaAlumnes llista_a, LlistaGrups llista_g, LlistaProfessor llista_p) {
        try {
            UIManager.setLookAndFeel("com.sun.java.swing.plaf.gtk.GTKLookAndFeel");
        } catch (Exception e) {
            e.printStackTrace();
        }
        this.ll_a = llista_a;
        this.ll_m = llista_m;
        this.ll_g = llista_g;
        this.ll_p = llista_p;
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

        jLabel1 = new javax.swing.JLabel();
        altaGrup = new javax.swing.JButton();
        altaNomGrup = new javax.swing.JTextField();
        jLabel2 = new javax.swing.JLabel();
        altaNomCurtGrup = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        altaFamiProfGrup = new javax.swing.JTextField();
        enrere = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jLabel1.setText("Nom");

        altaGrup.setText("Acceptar");
        altaGrup.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                altaGrupMouseClicked(evt);
            }
        });
        altaGrup.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                altaGrupActionPerformed(evt);
            }
        });

        altaNomGrup.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                altaNomGrupActionPerformed(evt);
            }
        });

        jLabel2.setText("Nom curt");

        altaNomCurtGrup.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                altaNomCurtGrupActionPerformed(evt);
            }
        });

        jLabel3.setText("Familia professional");

        enrere.setText("Cancel·lar");
        enrere.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                enrereMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(30, 30, 30)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel3)
                        .addGap(18, 18, 18)
                        .addComponent(altaFamiProfGrup))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel2)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(altaNomCurtGrup, javax.swing.GroupLayout.PREFERRED_SIZE, 133, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel1)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(altaNomGrup, javax.swing.GroupLayout.PREFERRED_SIZE, 260, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addGap(30, 30, 30))
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(142, 142, 142)
                        .addComponent(altaGrup, javax.swing.GroupLayout.PREFERRED_SIZE, 78, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(128, 128, 128)
                        .addComponent(enrere, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(34, 34, 34)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(altaNomGrup, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(altaNomCurtGrup, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(altaFamiProfGrup, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addComponent(altaGrup)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(enrere)
                .addContainerGap(57, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void altaNomGrupActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_altaNomGrupActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_altaNomGrupActionPerformed

    private void altaNomCurtGrupActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_altaNomCurtGrupActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_altaNomCurtGrupActionPerformed

    private void altaGrupMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_altaGrupMouseClicked
        ll_g.alta(altaNomGrup.getText(), altaNomCurtGrup.getText(), altaFamiProfGrup.getText());
        enrereMouseClicked(evt);
    }//GEN-LAST:event_altaGrupMouseClicked

    private void enrereMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_enrereMouseClicked
        JFrameGrups pp = new JFrameGrups(ll_m, ll_a, ll_g, ll_p);
        pp.setVisible(true);
        dispose();
    }//GEN-LAST:event_enrereMouseClicked

    private void altaGrupActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_altaGrupActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_altaGrupActionPerformed

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
            java.util.logging.Logger.getLogger(JFrameAltaGrups.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(JFrameAltaGrups.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(JFrameAltaGrups.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(JFrameAltaGrups.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new JFrameAltaGrups(ll_m, ll_a, ll_g, ll_p).setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextField altaFamiProfGrup;
    private javax.swing.JButton altaGrup;
    private javax.swing.JTextField altaNomCurtGrup;
    private javax.swing.JTextField altaNomGrup;
    private javax.swing.JButton enrere;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    // End of variables declaration//GEN-END:variables
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.forms;

import jframe.forms.modificar.JFrameModificarMatricula;
import jframe.forms.alta.JFrameAltaMatricula;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;
import jframe.classes.*;

/**
 *
 * @author josep
 */
public final class JFrameMatricula extends javax.swing.JFrame {

    public static LlistaMatricules ll_m;
    public static LlistaAlumnes ll_a;
    public static LlistaGrups ll_g;
    public static LlistaProfessor ll_p;

    private int selectedItem = -1; //Variable per agafar la ID de la matricula seleccionada

    /**
     * Creates new form Matricula
     *
     * @param ll_m
     */
    public JFrameMatricula(LlistaMatricules llista_m, LlistaAlumnes llista_a, LlistaGrups llista_g, LlistaProfessor llista_p) {
        this.ll_a = llista_a;
        this.ll_m = llista_m;
        this.ll_g = llista_g;
        this.ll_p = llista_p;
        this.setTitle("Administració de Matricules");//Establim el titol de l pantalla
        initComponents();
        //Tooltips
        botoBaixa.setToolTipText("Per a donar de baixa, selecciona la matricula, fent un click a sobre");
        botoModificar.setToolTipText("Premer per a visualitzar i modificar l'informació i l'estat de la Matricula");
        BotoSortir.setToolTipText("Premer per a tornar al menu principal");
        this.setLocationRelativeTo(null);
        emplenarTaula("");
    }

    //Mètode per a emplenar la taula
    public void emplenarTaula(String s) {
        //Establim el nom de les columnes de la nostra taula
        Object columnNames[] = {"ID", "Institut", "Usuari", "Grup", "Data Alta", "Data Baixa", "Estat"};
        //Definim la taula passantli els noms de les columnes
        DefaultTableModel model = new DefaultTableModel(columnNames, 0);
        //Fem la creació d'un nou objecte el qual igualem a el resultat d'un metode
        LlistaMatricules consulta = ll_m.consulta(s);
        //Establim el for per a passarli tantes columnes i les seves dades com hi hagin
        for (int i = 0; i < consulta.contador; i++) {
            Matricula m = consulta.returnList()[i];
            Object rowData[] = {m.getID(), m.getInstitut(), m.getUsuari().getNom(), m.getGrup().getNomGrup(), m.getData_alta(), m.getData_baixa(), m.getEstat()};
            model.addRow(rowData);//Passem l'informació de la fila
        }
        jTable1.setModel(model);//Emplenem la taula passantli les columnes i files
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        searchMatricules = new javax.swing.JTextField();
        jLabel1 = new javax.swing.JLabel();
        jButton4 = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        BotoSortir = new javax.swing.JButton();
        botoBaixa = new javax.swing.JButton();
        botoModificar = new javax.swing.JButton();
        botoImportar = new javax.swing.JButton();
        botoExportar = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBackground(java.awt.Color.white);

        searchMatricules.setText("Cercar....");
        searchMatricules.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                searchMatriculesActionPerformed(evt);
            }
        });
        searchMatricules.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                searchMatriculesKeyTyped(evt);
            }
        });

        jLabel1.setFont(new java.awt.Font("Ubuntu Mono", 1, 36)); // NOI18N
        jLabel1.setText("Matricules");

        jButton4.setText("Alta");
        jButton4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton4ActionPerformed(evt);
            }
        });

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {},
                {},
                {},
                {},
                {}
            },
            new String [] {

            }
        ));
        jTable1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jTable1MouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(jTable1);

        BotoSortir.setFont(new java.awt.Font("Ubuntu", 0, 18)); // NOI18N
        BotoSortir.setText("Menu principal");
        BotoSortir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BotoSortirActionPerformed(evt);
            }
        });

        botoBaixa.setText("Baixa");
        botoBaixa.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoBaixaActionPerformed(evt);
            }
        });

        botoModificar.setText("Modificar");
        botoModificar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoModificarActionPerformed(evt);
            }
        });

        botoImportar.setText("Importar");
        botoImportar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoImportarActionPerformed(evt);
            }
        });

        botoExportar.setText("Exportar");
        botoExportar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                botoExportarActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(60, 60, 60)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jScrollPane1, javax.swing.GroupLayout.Alignment.TRAILING)
                                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                            .addGroup(layout.createSequentialGroup()
                                                .addComponent(jButton4, javax.swing.GroupLayout.PREFERRED_SIZE, 105, javax.swing.GroupLayout.PREFERRED_SIZE)
                                                .addGap(106, 106, 106)
                                                .addComponent(botoBaixa, javax.swing.GroupLayout.PREFERRED_SIZE, 166, javax.swing.GroupLayout.PREFERRED_SIZE))
                                            .addGroup(layout.createSequentialGroup()
                                                .addGap(202, 202, 202)
                                                .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 192, javax.swing.GroupLayout.PREFERRED_SIZE)))
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                        .addComponent(botoModificar, javax.swing.GroupLayout.PREFERRED_SIZE, 126, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addGap(26, 26, 26))))
                            .addGroup(layout.createSequentialGroup()
                                .addContainerGap()
                                .addComponent(BotoSortir)
                                .addGap(535, 535, 535)))
                        .addGap(39, 39, 39))
                    .addGroup(javax.swing.GroupLayout.Alignment.LEADING, layout.createSequentialGroup()
                        .addGap(551, 551, 551)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(12, 12, 12)
                                .addComponent(botoImportar)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(botoExportar)
                                .addGap(0, 0, Short.MAX_VALUE))
                            .addComponent(searchMatricules))))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(searchMatricules, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(BotoSortir))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                        .addComponent(botoExportar)
                        .addComponent(botoImportar)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 35, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton4)
                    .addComponent(botoBaixa)
                    .addComponent(botoModificar))
                .addGap(47, 47, 47)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 201, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton4ActionPerformed
        //Redireccionem a la finestra per donar d'alta
        JFrameAltaMatricula altaWindow = new JFrameAltaMatricula(ll_m, ll_a, ll_g, ll_p);
        altaWindow.setVisible(true);       //la fem visible
        this.dispose();                         //eliminem la finestra actual    }//GEN-LAST:event_jButton4ActionPerformed
    }
    private void BotoSortirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BotoSortirActionPerformed
        //Redireccionem al menu principal
        JFrameMenuPrincipal m = new JFrameMenuPrincipal(ll_m, ll_a, ll_g, ll_p);
        m.setVisible(true);
        this.dispose();
    }//GEN-LAST:event_BotoSortirActionPerformed

    private void searchMatriculesKeyTyped(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_searchMatriculesKeyTyped
        emplenarTaula(searchMatricules.getText());//Cridem al metode emplenarTaula indicant-li només l'suari a mostrar
    }//GEN-LAST:event_searchMatriculesKeyTyped

    private void jTable1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTable1MouseClicked
        selectedItem = ((int) jTable1.getValueAt(jTable1.getSelectedRow(), 0));//Guardem la ID de l'usuari seleccionat
    }//GEN-LAST:event_jTable1MouseClicked

    private void botoBaixaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoBaixaActionPerformed
        if (selectedItem != -1) {//Comprovem que s'hagi seleccionat una matricula
            //Mostrem missatge de confirmació
            int confirm = JOptionPane.showConfirmDialog(this, "Esteu segurs de donar de baixa aquesta matricula?");
            if (confirm == JOptionPane.YES_OPTION) {
                ll_m.baixaMatricula(selectedItem);
                emplenarTaula("");
                selectedItem = -1;

            }

        } else {
            //Mostrem error si no selecciona res
            JOptionPane.showMessageDialog(this, "Perfavor selecciona un usuari de la taula", "Error", JOptionPane.WARNING_MESSAGE);
        }
    }//GEN-LAST:event_botoBaixaActionPerformed

    private void botoModificarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoModificarActionPerformed
        System.out.println(selectedItem);
        if (selectedItem != -1) {//Comprovem que s'hagi seleccionat una matricula
            int confirm2 = JOptionPane.showConfirmDialog(this, "Esteu segurs de modificar aquesta matrícula?", "Confirmar", JOptionPane.YES_NO_OPTION);
            if(confirm2 == JOptionPane.YES_OPTION){
                JFrameModificarMatricula modificarWindow = new JFrameModificarMatricula(ll_m, ll_a, ll_g, ll_p, selectedItem);
                modificarWindow.setVisible(true);       //la fem visible
                this.dispose();//eliminem la finestra actual
                selectedItem = -1;
            }
            
        } else {
            //Mostrem error si no selecciona res
            JOptionPane.showMessageDialog(this, "Per favor, selecciona una matrícula de la taula", "Error", JOptionPane.WARNING_MESSAGE);
        }
    }//GEN-LAST:event_botoModificarActionPerformed

    private void searchMatriculesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_searchMatriculesActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_searchMatriculesActionPerformed

    private void botoImportarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoImportarActionPerformed
        JFrameCSVImport csv = new JFrameCSVImport(ll_m,ll_a, ll_g, ll_p, 2);
        csv.setVisible(true);
        dispose();
    }//GEN-LAST:event_botoImportarActionPerformed

    private void botoExportarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_botoExportarActionPerformed
        JFrameCSVExport csv = new JFrameCSVExport(ll_m,ll_a, ll_g, ll_p, 2);
        csv.setVisible(true);
        dispose();    }//GEN-LAST:event_botoExportarActionPerformed

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
            java.util.logging.Logger.getLogger(JFrameMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(JFrameMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(JFrameMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(JFrameMatricula.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(() -> {
            new JFrameMatricula(ll_m, ll_a, ll_g, ll_p).setVisible(true);
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton BotoSortir;
    private javax.swing.JButton botoBaixa;
    private javax.swing.JButton botoExportar;
    private javax.swing.JButton botoImportar;
    private javax.swing.JButton botoModificar;
    private javax.swing.JButton jButton4;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    private javax.swing.JTextField searchMatricules;
    // End of variables declaration//GEN-END:variables
}

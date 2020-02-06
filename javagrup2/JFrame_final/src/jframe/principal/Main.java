/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jframe.principal;

import jframe.classes.*;
import jframe.forms.JFrameMenuPrincipal;

/**
 *
 * @author josep
 */
public class Main {

    public static void main(String[] args) {
        LlistaMatricules ll_m = new LlistaMatricules();
        LlistaAlumnes ll_a = new LlistaAlumnes();
        LlistaGrups ll_g = new LlistaGrups();
        LlistaProfessor ll_p = new LlistaProfessor();

        JFrameMenuPrincipal m = new JFrameMenuPrincipal(ll_m, ll_a, ll_g, ll_p);
        m.setVisible(true);//Mostrem la pantalla principal
    }
}

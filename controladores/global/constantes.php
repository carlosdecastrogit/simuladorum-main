<?php 

    //  --------------Tabla tienda ------------------
    //----------------------------------------------
    //  TIENDA          Nro     A
    //----------------------------------------------
    //  TIENDA          Nro     A
    //  Armadillo       1       ARM
    //  Ciudadela       2       CIU
    //  San Fierro      3       SFI
    //  Los Santos      4       LSA
    // ---------------------------------------------

    //  -------------- Tabla Queso -----------------
    //----------------------------------------------
    //  QUESO          Nro      A
    //----------------------------------------------
    //  Duro Blanco     1       DUB
    //  Mozarella       2       MOZ
    //  Gouda           3       GOU
    //  Dietético       4       DIE
    // ---------------------------------------------


    // Constantes Globales almacén de materia prima AMP
        $cant_capmax_lc=255000.00;
        $cant_existencia_lc=0.00;
        $cant_capdisp_lc=255000.00;
        $cant_capmax_ad=195000.00;
        $cant_existencia_ad=0.00;
        $cant_capdisp_ad=195000.00;
    
    // Constantes globales de almacén de productos terminados
        $cant_cmax_qd=12000.00;
        $cant_e_qd=0.00;
        $cant_disp_qd=12000.00;
        $cant_cmax_moz=12000.00;
        $cant_e_moz=0.00;
        $cant_disp_moz=12000.00;
        $cant_cmax_gou=12000.00;
        $cant_e_gou=0.00;
        $cant_disp_gou=12000.00;
        $cant_cmax_die=12000.00;
        $cant_e_die=0.00;
        $cant_disp_die=12000.00;

    // Costo de transporte despacho tienda
        $cto_trans_arm=0.080;
        $cto_trans_ciu=0.090;
        $cto_trans_sfi=0.075;
        $cto_trans_lsa=0.085;

?>
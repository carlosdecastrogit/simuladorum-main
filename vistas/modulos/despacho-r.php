<?php
  include('../controladores/global/sesiones.php');
  include('../controladores/global/conexion.php');
  include('../controladores/global/constantes.php');


  //Datos del Usuario
    $usuariosesion=($_SESSION['usuario']);
    $txtUsuario=$usuariosesion['nro'];
    $txtIdUsuario=$usuariosesion['id'];
    $txtUsuarioTipo=$usuariosesion['tipo'];
  
  // Variables de Acción
    $procesar="ok"; //Muestra Vista normal
    $error_accion=0; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
    $mensaje_usuario=""; // Vacío en inicalización
    $calcular="NO";
    
// Variables de Datos ---------- -------------------------------------------------------------------------
    // $txtFecha=date("y/m/d");
    $txtFecha="";
    $txtCiclo=1;
    // Variables tabla de despacho
    $txtCant_dub=0.00; $txtCant_dub_arm=0.00; $txtCant_dub_ciu=0.00; $txtCant_dub_sfi=0.00; $txtCant_dub_lsa=0.00;
    $txtCant_moz=0.00; $txtCant_moz_arm=0.00; $txtCant_moz_ciu=0.00; $txtCant_moz_sfi=0.00; $txtCant_moz_lsa=0.00;
    $txtCant_gou=0.00; $txtCant_gou_arm=0.00; $txtCant_gou_ciu=0.00; $txtCant_gou_sfi=0.00; $txtCant_gou_lsa=0.00;
    $txtCant_die=0.00; $txtCant_die_arm=0.00; $txtCant_die_ciu=0.00; $txtCant_die_sfi=0.00; $txtCant_die_lsa=0.00;

    // Variables costo de transporte
    $txtCto_trans_dub_arm=0.00; $txtCto_trans_dub_ciu=0.00; $txtCto_trans_dub_sfi=0.00; $txtCto_trans_dub_lsa=0.00;
    $txtCto_trans_moz_arm=0.00; $txtCto_trans_moz_ciu=0.00; $txtCto_trans_moz_sfi=0.00; $txtCto_trans_moz_lsa=0.00;
    $txtCto_trans_gou_arm=0.00; $txtCto_trans_gou_ciu=0.00; $txtCto_trans_gou_sfi=0.00; $txtCto_trans_gou_lsa=0.00;
    $txtCto_trans_die_arm=0.00; $txtCto_trans_die_ciu=0.00; $txtCto_trans_die_sfi=0.00; $txtCto_trans_die_lsa=0.00;

    $txtCto_trans_dub_total=0.00; $txtCto_trans_moz_total=0.00; $txtCto_trans_gou_total=0.00; $txtCto_trans_die_total=0.00;




    // Selección de Empresa - Entorno -------------------------------------------------------------------------
    if ($txtUsuarioTipo=="A") {
      $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A'");
      $sentencia->execute();
      $listado_entorno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

      $cant_entorno=$sentencia->rowCount();
      // echo "<script> alert('El usuario es ADMINISTRADOR...'); </script>";
      //print_r($cant_entorno);

    }else{
      // Selección de empresa del usuario -------------------------------------------------------------------------
        $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A' AND usuario=$txtUsuario");
        $sentencia->execute();
        $listado_empresa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        $cant_empresa=$sentencia->rowCount(); 

        foreach($listado_empresa as $empresa){
            $txtNro_empresa=$empresa['nro'];
            $txtNombre_empresa=$empresa['nombre'];
        }
        // print_r($txtNombre_empresa);
        // print_r("</br>");
        // print_r($txtNro_empresa);
        // print_r("</br>");
      // /. Fin selección de empresa del usuario -------------------------------------------------------------------------

      
      // Selecciono los despachos de la empresa empresa ---------------------------------------------------------------
      $sentencia=$pdo->prepare("SELECT * FROM `apt_dtienda` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
      $sentencia->execute();
      $listado_apt_dtienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      $cant_apt_dtienda=$sentencia->rowCount();

      //print_r($listado_apt_dtienda);
      
      
      // Selecciono el almacén tiendas ---------------------------------------------------------------
      $sentencia=$pdo->prepare("SELECT * FROM `tiendas` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
      $sentencia->execute();
      $listado_tiendas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      $cant_tiendas=$sentencia->rowCount();

      foreach($listado_tiendas as $tiendas){
        $nro_tiendas=$tiendas['nro'];
        $cant_cap_almacen_actual=$tiendas['cant_cap_almacen'];
        $cant_existencia_actual=$tiendas['cant_existencia'];
        $cant_cap_disp_actual=$tiendas['cant_cap_disp'];

      }
      //print_r($listado_tiendas);
      //print_r("</br>");
      
      // Selecciono las existencias de tiendas ---------------------------------------------------------------
      $sentencia=$pdo->prepare("SELECT * FROM `tiendas_existe` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
      $sentencia->execute();
      $listado_tiendas_existe=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      $cant_tiendas_existe=$sentencia->rowCount();

      foreach($listado_tiendas_existe as $existencias){
            $nro_tiendas_existe=$existencias['nro'];

            $cant_dub_arm_actual=$existencias['cant_dub_arm'];	
            $cant_dub_ciu_actual=$existencias['cant_dub_ciu'];	
            $cant_dub_sfi_actual=$existencias['cant_dub_sfi'];	
            $cant_dub_lsa_actual=$existencias['cant_dub_lsa'];	
            
            $cant_moz_arm_actual=$existencias['cant_moz_arm'];	
            $cant_moz_ciu_actual=$existencias['cant_moz_ciu'];	
            $cant_moz_sfi_actual=$existencias['cant_moz_sfi'];
            $cant_moz_lsa_actual=$existencias['cant_moz_lsa'];

            $cant_gou_arm_actual=$existencias['cant_gou_arm'];
            $cant_gou_ciu_actual=$existencias['cant_gou_ciu'];
            $cant_gou_sfi_actual=$existencias['cant_gou_sfi'];
            $cant_gou_lsa_actual=$existencias['cant_gou_lsa'];

            $cant_die_arm_actual=$existencias['cant_die_arm'];
            $cant_die_ciu_actual=$existencias['cant_die_ciu'];
            $cant_die_sfi_actual=$existencias['cant_die_sfi'];
            $cant_die_lsa_actual=$existencias['cant_die_lsa'];

      }

      //print_r($listado_tiendas_existe);
    }
  // /. Fin selección empresa--------------------------------------------------------------------------------

  //Recepción de Post  --------------------------------------------------------------------------------------
    if(isset($_POST["btn_accion"])){

      $accion=($_POST["btn_accion"]);
      $txtNro_empresa=($_POST["txtEmpresa"]);
      $txtCiclo=($_POST["txtPedido"]);
      $txtFecha=($_POST["txtFecha"]);
      

    // Variables tabla de despacho---------------------------------
        $txtCant_dub=($_POST["txtCant_dub"]); 
        $txtCant_dub_arm=($_POST["txtCant_dub_arm"]); $txtCant_dub_ciu=($_POST["txtCant_dub_ciu"]); 
        $txtCant_dub_sfi=($_POST["txtCant_dub_sfi"]); $txtCant_dub_lsa=($_POST["txtCant_dub_lsa"]);

        $txtCant_moz=($_POST["txtCant_moz"]); 
        $txtCant_moz_arm=($_POST["txtCant_moz_arm"]); $txtCant_moz_ciu=($_POST["txtCant_moz_ciu"]); 
        $txtCant_moz_sfi=($_POST["txtCant_moz_sfi"]); $txtCant_moz_lsa=($_POST["txtCant_moz_lsa"]);

        $txtCant_gou=($_POST["txtCant_gou"]); 
        $txtCant_gou_arm=($_POST["txtCant_gou_arm"]); $txtCant_gou_ciu=($_POST["txtCant_gou_ciu"]); 
        $txtCant_gou_sfi=($_POST["txtCant_gou_sfi"]); $txtCant_gou_lsa=($_POST["txtCant_gou_lsa"]);

        $txtCant_die=($_POST["txtCant_die"]); 
        $txtCant_die_arm=($_POST["txtCant_die_arm"]); $txtCant_die_ciu=($_POST["txtCant_die_ciu"]); 
        $txtCant_die_sfi=($_POST["txtCant_die_sfi"]); $txtCant_die_lsa=($_POST["txtCant_die_lsa"]);
    // -------------------------------------------------------------

    // Variables costo de transporte---------------------------------
        $txtCto_trans_dub_arm=($_POST["txtCto_trans_dub_arm"]); $txtCto_trans_dub_ciu=($_POST["txtCto_trans_dub_ciu"]); 
        $txtCto_trans_dub_sfi=($_POST["txtCto_trans_dub_sfi"]); $txtCto_trans_dub_lsa=($_POST["txtCto_trans_dub_lsa"]);

        $txtCto_trans_moz_arm=($_POST["txtCto_trans_moz_arm"]); $txtCto_trans_moz_ciu=($_POST["txtCto_trans_moz_ciu"]); 
        $txtCto_trans_moz_sfi=($_POST["txtCto_trans_moz_sfi"]); $txtCto_trans_moz_lsa=($_POST["txtCto_trans_moz_lsa"]);

        $txtCto_trans_gou_arm=($_POST["txtCto_trans_gou_arm"]); $txtCto_trans_gou_ciu=($_POST["txtCto_trans_gou_ciu"]); 
        $txtCto_trans_gou_sfi=($_POST["txtCto_trans_gou_sfi"]); $txtCto_trans_gou_lsa=($_POST["txtCto_trans_gou_lsa"]);
        
        $txtCto_trans_die_arm=($_POST["txtCto_trans_die_arm"]); $txtCto_trans_die_ciu=($_POST["txtCto_trans_die_ciu"]); 
        $txtCto_trans_die_sfi=($_POST["txtCto_trans_die_sfi"]); $txtCto_trans_die_lsa=($_POST["txtCto_trans_die_lsa"]);
    // -------------------------------------------------------------

    // Variables costo total
        $txtCto_trans_dub_total=($_POST["txtCto_trans_dub_total"]); 
        $txtCto_trans_moz_total=($_POST["txtCto_trans_moz_total"]); 
        $txtCto_trans_gou_total=($_POST["txtCto_trans_gou_total"]); 
        $txtCto_trans_die_total=($_POST["txtCto_trans_die_total"]); 
    // -------------------------------------------------------------

      switch($accion){

        case "Ver";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            // Selección los despachos de la empresa empresa ---------------------------------------------------------------
            $ciclo=($_POST["txtPedido"]);
            $sentencia=$pdo->prepare("SELECT * FROM `apt_dtienda` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND ciclo=$ciclo");
            $sentencia->execute();
            $listado_apt_dtienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            $cant_apt_dtienda=$sentencia->rowCount();

            if ($cant_apt_dtienda>=1){
                foreach($listado_apt_dtienda as $apt_dtienda){
                    $txtFecha=$apt_dtienda['fecha'];
                    $txtCant_dub=$apt_dtienda['cant_dub'];
                    $txtCant_moz=$apt_dtienda['cant_moz'];
                    $txtCant_gou=$apt_dtienda['cant_gou'];
                    $txtCant_die=$apt_dtienda['cant_die'];
                }
            }else{
                $txtFecha="";
                $txtCant_dub=0.00;
                $txtCant_moz=0.00;
                $txtCant_gou=0.00;
                $txtCant_die=0.00;
                echo "<script> alert('No se encontraron registros...'); </script>";
            }
            $procesar="ok";

        break;
        
        case "Calcular";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            $ciclo=($_POST["txtPedido"]);
            $sentencia=$pdo->prepare("SELECT * FROM `apt_dtienda` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND ciclo=$ciclo");
            $sentencia->execute();
            $listado_apt_dtienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            $cant_apt_dtienda=$sentencia->rowCount();

            if ($cant_apt_dtienda>=1){
                foreach($listado_apt_dtienda as $apt_dtienda){
                    $txtFecha=$apt_dtienda['fecha'];
                    $txtCant_dub=$apt_dtienda['cant_dub'];
                    $txtCant_moz=$apt_dtienda['cant_moz'];
                    $txtCant_gou=$apt_dtienda['cant_gou'];
                    $txtCant_die=$apt_dtienda['cant_die'];
                }
            }else{
                $txtFecha="";
                $txtCant_dub=0.00;
                $txtCant_moz=0.00;
                $txtCant_gou=0.00;
                $txtCant_die=0.00;
                echo "<script> alert('No se encontraron registros...'); </script>";
            }

            // Costos de transporte
            $cto_trans_arm=0.080;
            $cto_trans_ciu=0.090;
            $cto_trans_sfi=0.075;
            $cto_trans_lsa=0.085;

            // Costo transporte queso duro
            $txtCto_trans_dub_arm=$txtCant_dub_arm*$cto_trans_arm; 
            $txtCto_trans_dub_ciu=$txtCant_dub_ciu*$cto_trans_ciu; 
            $txtCto_trans_dub_sfi=$txtCant_dub_sfi*$cto_trans_sfi; 
            $txtCto_trans_dub_lsa=$txtCant_dub_lsa*$cto_trans_lsa;
            
            // Costo transporte mozarella
            $txtCto_trans_moz_arm=$txtCant_moz_arm*$cto_trans_arm; 
            $txtCto_trans_moz_ciu=$txtCant_moz_ciu*$cto_trans_ciu; 
            $txtCto_trans_moz_sfi=$txtCant_moz_sfi*$cto_trans_sfi; 
            $txtCto_trans_moz_lsa=$txtCant_moz_lsa*$cto_trans_lsa;
            
            // Costo transporte gouda
            $txtCto_trans_gou_arm=$txtCant_gou_arm*$cto_trans_arm; 
            $txtCto_trans_gou_ciu=$txtCant_gou_ciu*$cto_trans_ciu; 
            $txtCto_trans_gou_sfi=$txtCant_gou_sfi*$cto_trans_sfi; 
            $txtCto_trans_gou_lsa=$txtCant_gou_lsa*$cto_trans_lsa;
            
            // Costo transporte dietético
            $txtCto_trans_die_arm=$txtCant_die_arm*$cto_trans_arm; 
            $txtCto_trans_die_ciu=$txtCant_die_ciu*$cto_trans_ciu; 
            $txtCto_trans_die_sfi=$txtCant_die_sfi*$cto_trans_sfi; 
            $txtCto_trans_die_lsa=$txtCant_die_lsa*$cto_trans_lsa;

            $txtCto_trans_dub_total=$txtCto_trans_dub_arm+$txtCto_trans_dub_ciu+$txtCto_trans_dub_sfi+$txtCto_trans_dub_lsa;
            $txtCto_trans_moz_total=$txtCto_trans_moz_arm+$txtCto_trans_moz_ciu+$txtCto_trans_moz_sfi+$txtCto_trans_moz_lsa;
            $txtCto_trans_gou_total=$txtCto_trans_gou_arm+$txtCto_trans_gou_ciu+$txtCto_trans_gou_sfi+$txtCto_trans_gou_lsa;
            $txtCto_trans_die_total=$txtCto_trans_die_arm+$txtCto_trans_die_ciu+$txtCto_trans_die_sfi+$txtCto_trans_die_lsa;


            $calcular="SI";
            $procesar="ok";
        break;

        case "Guardar";

            // echo "<script> alert('Quieres Guardar Operación...'); </script>";
            // header('Location:usuarios.php');

            // Asigno Variables de Datos --------------------------------------------------------------
                // Tabla de quesos
                $txtNro_queso_dub=1;
                $txtNombre_queso_dub="Queso Duro Blanco";
                $txtNro_queso_moz=2;
                $txtNombre_queso_moz="Queso Mozarella";
                $txtNro_queso_gou=3;
                $txtNombre_queso_gou="Queso Gouda";
                $txtNro_queso_die=4;
                $txtNombre_queso_die="Queso Dietético";
                
                // Tabla de Tiendas
                $txtNro_tienda_arm=1;
                $txtNombre_tienda_arm="Armadillo";
                $txtNro_tienda_ciu=2;
                $txtNombre_tienda_ciu="Ciudadela";
                $txtNro_tienda_sfi=3;
                $txtNombre_tienda_sfi="San Fierro";
                $txtNro_tienda_lsa=4;
                $txtNombre_tienda_lsa="Los Santos";
                

                $txtEstatus="A";
                $txtFecha_reg=date("y/m/d");
                $txtUsuario_reg=$txtUsuario;
                $txtEstatus_reg="A";
            // -------------------------------------------------------------------------------

            // Calculo la nueva existencia de mercancia ---------------------------------------
                $cant_dub_arm=$cant_dub_arm_actual+$txtCant_dub_arm;	
                $cant_dub_ciu=$cant_dub_ciu_actual+$txtCant_dub_ciu;	
                $cant_dub_sfi=$cant_dub_sfi_actual+$txtCant_dub_sfi;	
                $cant_dub_lsa=$cant_dub_lsa_actual+$txtCant_dub_lsa;

                $cant_moz_arm=$cant_moz_arm_actual+$txtCant_moz_arm;	
                $cant_moz_ciu=$cant_moz_ciu_actual+$txtCant_moz_ciu;	
                $cant_moz_sfi=$cant_moz_sfi_actual+$txtCant_moz_sfi;	
                $cant_moz_lsa=$cant_moz_lsa_actual+$txtCant_moz_lsa;

                $cant_gou_arm=$cant_gou_arm_actual+$txtCant_gou_arm;	
                $cant_gou_ciu=$cant_gou_ciu_actual+$txtCant_gou_ciu;	
                $cant_gou_sfi=$cant_gou_sfi_actual+$txtCant_gou_sfi;	
                $cant_gou_lsa=$cant_gou_lsa_actual+$txtCant_gou_lsa;

                $cant_die_arm=$cant_die_arm_actual+$txtCant_die_arm;	
                $cant_die_ciu=$cant_die_ciu_actual+$txtCant_die_ciu;	
                $cant_die_sfi=$cant_die_sfi_actual+$txtCant_die_sfi;	
                $cant_die_lsa=$cant_die_lsa_actual+$txtCant_die_lsa;
            // -------------------------------------------------------------------------------- 

            // Registro Despacho Queso Duro
                if(($txtCant_dub_arm>0) or ($txtCant_dub_ciu>0) or ($txtCant_dub_sfi>0) or ($txtCant_dub_lsa>0) ){

                    $sentencia=$pdo->prepare("INSERT INTO despacho(nro,nro_empresa,ciclo,fecha,nro_queso,nombre_queso,
                    cant_xdespacho,cant_desp_arm,cant_desp_ciu,cant_desp_sfi,cant_desp_lsa,cost_t_arm,cost_t_ciu,cost_t_sfi,
                    cost_t_lsa,cost_t_total,estatus,fecha_reg,usuario_reg,estatus_reg) 
                    VALUES (NULL, :nro_empresa, :ciclo, :fecha, :nro_queso, :nombre_queso, :cant_xdespacho, :cant_desp_arm,
                    :cant_desp_ciu, :cant_desp_sfi, :cant_desp_lsa, :cost_t_arm, :cost_t_ciu, :cost_t_sfi, :cost_t_lsa, 
                    :cost_t_total, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                    $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                    $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha',$txtFecha);
                    $sentencia->bindParam(':nro_queso',$txtNro_queso_dub,PDO::PARAM_STR);
                    $sentencia->bindParam(':nombre_queso',$txtNombre_queso_dub,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_xdespacho',$txtCant_dub,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_arm',$txtCant_dub_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_ciu',$txtCant_dub_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_sfi',$txtCant_dub_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_lsa',$txtCant_dub_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_arm',$txtCto_trans_dub_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_ciu',$txtCto_trans_dub_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_sfi',$txtCto_trans_dub_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_lsa',$txtCto_trans_dub_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_total',$txtCto_trans_dub_total,PDO::PARAM_STR);
                    $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                    $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                    $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                    $sentencia->execute();

                    // Registro movimiento tienda de queso duro Armadillo ----------------------------------------------
                        if($txtCant_dub_arm>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_arm;
                            $nombre_tienda=$txtNombre_tienda_arm;
                            $nro_queso=$txtNro_queso_dub;
                            $nombre_queso=$txtNombre_queso_dub;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_dub_arm;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_dub_arm;

                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------
                    
                    // Registro movimiento tienda de queso duro ciudadela ----------------------------------------------
                        if($txtCant_dub_ciu>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_ciu;
                            $nombre_tienda=$txtNombre_tienda_ciu;
                            $nro_queso=$txtNro_queso_dub;
                            $nombre_queso=$txtNombre_queso_dub;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_dub_ciu;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_dub_ciu;


                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------

                    // Registro movimiento tienda de queso duro San Fierro ----------------------------------------------
                        if($txtCant_dub_sfi>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_sfi;
                            $nombre_tienda=$txtNombre_tienda_sfi;
                            $nro_queso=$txtNro_queso_dub;
                            $nombre_queso=$txtNombre_queso_dub;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_dub_sfi;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_dub_sfi;


                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------

                    // Registro movimiento tienda de queso duro Los Santos ----------------------------------------------
                        if($txtCant_dub_lsa>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_lsa;
                            $nombre_tienda=$txtNombre_tienda_lsa;
                            $nro_queso=$txtNro_queso_dub;
                            $nombre_queso=$txtNombre_queso_dub;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_dub_lsa;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_dub_lsa;


                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------
                    
                    // Actualizo la existencia de queso duro
                        $nro=$nro_tiendas_existe;             
                        $sentencia=$pdo->prepare("UPDATE tiendas_existe SET
                        cant_dub_arm=:cant_dub_arm,
                        cant_dub_ciu=:cant_dub_ciu,
                        cant_dub_sfi=:cant_dub_sfi,
                        cant_dub_lsa=:cant_dub_lsa WHERE
                        nro=:nro");
                        
                        $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_dub_arm',$cant_dub_arm,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_dub_ciu',$cant_dub_ciu,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_dub_sfi',$cant_dub_sfi,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_dub_lsa',$cant_dub_lsa,PDO::PARAM_STR);
                        $sentencia->execute();
                    //----------------------------------------------------------------------------------------------------

                } 
            // Fin despacho tiendas Queso Duro
                
            // Registro Despacho Queso Mozarella
                if(($txtCant_moz_arm>0) or ($txtCant_moz_ciu>0) or ($txtCant_moz_sfi>0) or ($txtCant_moz_lsa>0) ){

                    
                    $sentencia=$pdo->prepare("INSERT INTO despacho(nro,nro_empresa,ciclo,fecha,nro_queso,nombre_queso,
                    cant_xdespacho,cant_desp_arm,cant_desp_ciu,cant_desp_sfi,cant_desp_lsa,cost_t_arm,cost_t_ciu,cost_t_sfi,
                    cost_t_lsa,cost_t_total,estatus,fecha_reg,usuario_reg,estatus_reg) 
                    VALUES (NULL, :nro_empresa, :ciclo, :fecha, :nro_queso, :nombre_queso, :cant_xdespacho, :cant_desp_arm,
                    :cant_desp_ciu, :cant_desp_sfi, :cant_desp_lsa, :cost_t_arm, :cost_t_ciu, :cost_t_sfi, :cost_t_lsa, 
                    :cost_t_total, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                    $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                    $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha',$txtFecha);
                    $sentencia->bindParam(':nro_queso',$txtNro_queso_moz,PDO::PARAM_STR);
                    $sentencia->bindParam(':nombre_queso',$txtNombre_queso_moz,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_xdespacho',$txtCant_moz,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_arm',$txtCant_moz_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_ciu',$txtCant_moz_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_sfi',$txtCant_moz_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_lsa',$txtCant_moz_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_arm',$txtCto_trans_moz_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_ciu',$txtCto_trans_moz_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_sfi',$txtCto_trans_moz_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_lsa',$txtCto_trans_moz_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_total',$txtCto_trans_moz_total,PDO::PARAM_STR);
                    $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                    $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                    $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                    $sentencia->execute();

                    // Registro movimiento tienda de queso mozarella Armadillo ----------------------------------------------
                        if($txtCant_moz_arm>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_arm;
                            $nombre_tienda=$txtNombre_tienda_arm;
                            $nro_queso=$txtNro_queso_moz;
                            $nombre_queso=$txtNombre_queso_moz;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_moz_arm;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_moz_arm;

                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------
                    
                    // Registro movimiento tienda de queso mozarella ciudadela ----------------------------------------------
                        if($txtCant_moz_ciu>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_ciu;
                            $nombre_tienda=$txtNombre_tienda_ciu;
                            $nro_queso=$txtNro_queso_moz;
                            $nombre_queso=$txtNombre_queso_moz;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_moz_ciu;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_moz_ciu;


                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------

                    // Registro movimiento tienda de queso mozarella San Fierro ----------------------------------------------
                        if($txtCant_moz_sfi>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_sfi;
                            $nombre_tienda=$txtNombre_tienda_sfi;
                            $nro_queso=$txtNro_queso_moz;
                            $nombre_queso=$txtNombre_queso_moz;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_moz_sfi;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_moz_sfi;


                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------

                    // Registro movimiento tienda de queso mozarella Los Santos ----------------------------------------------
                        if($txtCant_moz_lsa>0){
                            $nro_almacen_tienda=$nro_tiendas;
                            $nro_tienda=$txtNro_tienda_lsa;
                            $nombre_tienda=$txtNombre_tienda_lsa;
                            $nro_queso=$txtNro_queso_moz;
                            $nombre_queso=$txtNombre_queso_moz;
                            $tipo_operacion="R";
                            $cant_entrada=$txtCant_moz_lsa;
                            $cant_venta=0.00;
                            $cant_monto_pvp=0.00;
                            $cant_ingreso=0.00;
                            $cant_disponible=$cant_moz_lsa;


                            $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                            fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                            :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                            $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha',$txtFecha);
                            $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                            $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                            $sentencia->execute();
                        }
                    // --------------------------------------------------------------------------------------------

                    // Actualizo la existencia de queso mozarella --------------------------------------------------------------------------
                        $nro=$nro_tiendas_existe;
                        
                        $sentencia=$pdo->prepare("UPDATE tiendas_existe SET
                        cant_moz_arm=:cant_moz_arm,
                        cant_moz_ciu=:cant_moz_ciu,
                        cant_moz_sfi=:cant_moz_sfi,
                        cant_moz_lsa=:cant_moz_lsa WHERE
                        nro=:nro");
                        
                        $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_moz_arm',$cant_moz_arm,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_moz_ciu',$cant_moz_ciu,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_moz_sfi',$cant_moz_sfi,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_moz_lsa',$cant_moz_lsa,PDO::PARAM_STR);
                        $sentencia->execute();
                    // ---------------------------------------------------------------------------------------------------------------------
                } 
            // Fin Registro Despacho mozarella

            // Registro Despacho Queso Gouda
                if(($txtCant_gou_arm>0) or ($txtCant_gou_ciu>0) or ($txtCant_gou_sfi>0) or ($txtCant_gou_lsa>0) ){

                    
                    $sentencia=$pdo->prepare("INSERT INTO despacho(nro,nro_empresa,ciclo,fecha,nro_queso,nombre_queso,
                    cant_xdespacho,cant_desp_arm,cant_desp_ciu,cant_desp_sfi,cant_desp_lsa,cost_t_arm,cost_t_ciu,cost_t_sfi,
                    cost_t_lsa,cost_t_total,estatus,fecha_reg,usuario_reg,estatus_reg) 
                    VALUES (NULL, :nro_empresa, :ciclo, :fecha, :nro_queso, :nombre_queso, :cant_xdespacho, :cant_desp_arm,
                    :cant_desp_ciu, :cant_desp_sfi, :cant_desp_lsa, :cost_t_arm, :cost_t_ciu, :cost_t_sfi, :cost_t_lsa, 
                    :cost_t_total, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                    $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                    $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha',$txtFecha);
                    $sentencia->bindParam(':nro_queso',$txtNro_queso_gou,PDO::PARAM_STR);
                    $sentencia->bindParam(':nombre_queso',$txtNombre_queso_gou,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_xdespacho',$txtCant_gou,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_arm',$txtCant_gou_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_ciu',$txtCant_gou_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_sfi',$txtCant_gou_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_lsa',$txtCant_gou_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_arm',$txtCto_trans_gou_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_ciu',$txtCto_trans_gou_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_sfi',$txtCto_trans_gou_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_lsa',$txtCto_trans_gou_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_total',$txtCto_trans_gou_total,PDO::PARAM_STR);
                    $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                    $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                    $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                    $sentencia->execute();

                // Registro movimiento tienda de queso gouda Armadillo ----------------------------------------------
                    if($txtCant_gou_arm>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_arm;
                        $nombre_tienda=$txtNombre_tienda_arm;
                        $nro_queso=$txtNro_queso_gou;
                        $nombre_queso=$txtNombre_queso_gou;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_gou_arm;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_gou_arm;

                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------
                
                // Registro movimiento tienda de queso gouda ciudadela ----------------------------------------------
                    if($txtCant_gou_ciu>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_ciu;
                        $nombre_tienda=$txtNombre_tienda_ciu;
                        $nro_queso=$txtNro_queso_gou;
                        $nombre_queso=$txtNombre_queso_gou;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_gou_ciu;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_gou_ciu;


                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------

                // Registro movimiento tienda de queso gou San Fierro ----------------------------------------------
                    if($txtCant_gou_sfi>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_sfi;
                        $nombre_tienda=$txtNombre_tienda_sfi;
                        $nro_queso=$txtNro_queso_gou;
                        $nombre_queso=$txtNombre_queso_gou;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_gou_sfi;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_gou_sfi;


                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------

                // Registro movimiento tienda de queso gouda Los Santos ----------------------------------------------
                    if($txtCant_gou_lsa>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_lsa;
                        $nombre_tienda=$txtNombre_tienda_lsa;
                        $nro_queso=$txtNro_queso_gou;
                        $nombre_queso=$txtNombre_queso_gou;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_gou_lsa;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_gou_lsa;


                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------

                    // Actualizo la existencia de queso Gouda ----------------------------------------------------------------------------
                        $nro=$nro_tiendas_existe;
                        
                        $sentencia=$pdo->prepare("UPDATE tiendas_existe SET
                        cant_gou_arm=:cant_gou_arm,
                        cant_gou_ciu=:cant_gou_ciu,
                        cant_gou_sfi=:cant_gou_sfi,
                        cant_gou_lsa=:cant_gou_lsa WHERE
                        nro=:nro");
                        
                        $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_gou_arm',$cant_gou_arm,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_gou_ciu',$cant_gou_ciu,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_gou_sfi',$cant_gou_sfi,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_gou_lsa',$cant_gou_lsa,PDO::PARAM_STR);
                        $sentencia->execute();
                    // ------------------------------------------------------------------------------------------------------------------
                } 
            // Fin Registro Despacho Gouda
                
            // Registro Despacho Queso dietético
                if(($txtCant_die_arm>0) or ($txtCant_die_ciu>0) or ($txtCant_die_sfi>0) or ($txtCant_die_lsa>0) ){

                    
                    $sentencia=$pdo->prepare("INSERT INTO despacho(nro,nro_empresa,ciclo,fecha,nro_queso,nombre_queso,
                    cant_xdespacho,cant_desp_arm,cant_desp_ciu,cant_desp_sfi,cant_desp_lsa,cost_t_arm,cost_t_ciu,cost_t_sfi,
                    cost_t_lsa,cost_t_total,estatus,fecha_reg,usuario_reg,estatus_reg) 
                    VALUES (NULL, :nro_empresa, :ciclo, :fecha, :nro_queso, :nombre_queso, :cant_xdespacho, :cant_desp_arm,
                    :cant_desp_ciu, :cant_desp_sfi, :cant_desp_lsa, :cost_t_arm, :cost_t_ciu, :cost_t_sfi, :cost_t_lsa, 
                    :cost_t_total, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                    $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                    $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha',$txtFecha);
                    $sentencia->bindParam(':nro_queso',$txtNro_queso_die,PDO::PARAM_STR);
                    $sentencia->bindParam(':nombre_queso',$txtNombre_queso_die,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_xdespacho',$txtCant_die,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_arm',$txtCant_die_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_ciu',$txtCant_die_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_sfi',$txtCant_die_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_desp_lsa',$txtCant_die_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_arm',$txtCto_trans_die_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_ciu',$txtCto_trans_die_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_sfi',$txtCto_trans_die_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_lsa',$txtCto_trans_die_lsa,PDO::PARAM_STR);
                    $sentencia->bindParam(':cost_t_total',$txtCto_trans_die_total,PDO::PARAM_STR);
                    $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                    $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                    $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                    $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                    $sentencia->execute();

                // Registro movimiento tienda de queso dietético Armadillo ----------------------------------------------
                    if($txtCant_die_arm>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_arm;
                        $nombre_tienda=$txtNombre_tienda_arm;
                        $nro_queso=$txtNro_queso_die;
                        $nombre_queso=$txtNombre_queso_die;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_die_arm;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_die_arm;

                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------
                
                // Registro movimiento tienda de queso dietético ciudadela ----------------------------------------------
                    if($txtCant_die_ciu>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_ciu;
                        $nombre_tienda=$txtNombre_tienda_ciu;
                        $nro_queso=$txtNro_queso_die;
                        $nombre_queso=$txtNombre_queso_die;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_die_ciu;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_die_ciu;


                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------

                // Registro movimiento tienda de queso dietético San Fierro ----------------------------------------------
                    if($txtCant_die_sfi>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_sfi;
                        $nombre_tienda=$txtNombre_tienda_sfi;
                        $nro_queso=$txtNro_queso_die;
                        $nombre_queso=$txtNombre_queso_die;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_die_sfi;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_die_sfi;


                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------

                // Registro movimiento tienda de queso gouda Los Santos ----------------------------------------------
                    if($txtCant_die_lsa>0){
                        $nro_almacen_tienda=$nro_tiendas;
                        $nro_tienda=$txtNro_tienda_lsa;
                        $nombre_tienda=$txtNombre_tienda_lsa;
                        $nro_queso=$txtNro_queso_die;
                        $nombre_queso=$txtNombre_queso_die;
                        $tipo_operacion="R";
                        $cant_entrada=$txtCant_die_lsa;
                        $cant_venta=0.00;
                        $cant_monto_pvp=0.00;
                        $cant_ingreso=0.00;
                        $cant_disponible=$cant_die_lsa;

                        $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,ciclo,nro_queso,nombre_queso,
                        fecha,tipo_operacion,cant_entrada,cant_venta,cant_monto_pvp,cant_ingreso,cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                        VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso, :fecha, :tipo_operacion, 
                        :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_tienda',$nro_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_tienda',$nombre_tienda,PDO::PARAM_STR);
                        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                        $sentencia->bindParam(':nro_queso',$nro_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':nombre_queso',$nombre_queso,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha',$txtFecha);
                        $sentencia->bindParam(':tipo_operacion',$tipo_operacion,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_entrada',$cant_entrada,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_venta',$cant_venta,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_monto_pvp',$cant_monto_pvp,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_ingreso',$cant_ingreso ,PDO::PARAM_STR);
                        $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                        $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                        $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                        $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                        $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                        $sentencia->execute();
                    }
                // --------------------------------------------------------------------------------------------

                // Actualizo la existencia de queso Gouda --------------------------------------------------------------------------
                    $nro=$nro_tiendas_existe;
                    
                    $sentencia=$pdo->prepare("UPDATE tiendas_existe SET
                    cant_die_arm=:cant_die_arm,
                    cant_die_ciu=:cant_die_ciu,
                    cant_die_sfi=:cant_die_sfi,
                    cant_die_lsa=:cant_die_lsa WHERE
                    nro=:nro");
                    
                    $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_die_arm',$cant_die_arm,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_die_ciu',$cant_die_ciu,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_die_sfi',$cant_die_sfi,PDO::PARAM_STR);
                    $sentencia->bindParam(':cant_die_lsa',$cant_die_lsa,PDO::PARAM_STR);
                    $sentencia->execute();
                // ----------------------------------------------------------------------------------------------------------------
                } 
            // Fin Registro Despacho queso dietético

            // Actualizo saldos de tienda ---------------------------------------------------------------------------
                $nro=$nro_tiendas;

                $cant_existencia=$cant_existencia_actual+$cant_dub_arm+$cant_dub_ciu+$cant_dub_sfi+$cant_dub_lsa+$cant_moz_arm+
                $cant_moz_ciu+$cant_moz_sfi+$cant_moz_lsa+$cant_gou_arm+$cant_gou_ciu+$cant_gou_sfi+$cant_gou_lsa+$cant_die_arm+
                $cant_die_ciu+$cant_die_sfi+$cant_die_lsa;
                
                $cant_cap_disp=$cant_cap_almacen_actual-$cant_existencia;
                
                $sentencia=$pdo->prepare("UPDATE tiendas SET
                cant_existencia=:cant_existencia,
                cant_cap_disp=:cant_cap_disp WHERE
                nro=:nro");
                
                $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_existencia',$cant_existencia,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_cap_disp',$cant_cap_disp,PDO::PARAM_STR);
                $sentencia->execute();
            // ------------------------------------------------------------------------------------------------------

            // Asigno Variables de control ---------------------------------------------------------------------------

                $procesar="listo"; //Muestra Vista normal
                $error_accion=0; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
                $mensaje_usuario="Registro realizado satisfactoriamente"; // Vacío en inicalización
                
                //echo "<script> alert('Entorno Creado Satisfactoriamente...'); </script>";
            // ------------------------------------------------------------------------------------------------------

        break;

        case "Cancelar";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            $procesar="ok";
            header('Location:despacho.php');
        break;

        case "Aceptar";
            // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
            $procesar="ok";
            header('Location:despacho.php');
        break;

        case "Actualizar";
            // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
            if ($password1==$password2){

                $sentencia=$pdo->prepare("UPDATE Tblusuarios SET 
                clave=:clave,
                nombre=:nombre WHERE
                nro=:nro");
                
                $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
                $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
                $sentencia->bindParam(':clave',$password1,PDO::PARAM_STR);
                $sentencia->execute();

                // echo "<script> alert('Los Password son iguales...'); </script>";
                $accion="C";
                $mensaje_usuario="Usuario Actualizado Satisfactoriamente";
                $procesar="listo";
            }else{
                // echo "<script> alert('Los Password no son iguales...'); </script>";
                $accion="E";
                $mensaje_usuario="No se pudo actualizar, claves no coinciden";
                $error_accion=2;
                $procesar="ok";
            }

        break;

        case "Eliminar";
            // echo "<script> alert('Quieres Eliminar Registro...'); </script>";
            // echo "<script> alert('Usuario Eliminado Satisfactoriamente...'); </script>";
            // header('Location:usuarios.php');

            $sentencia=$pdo->prepare("DELETE FROM Tblusuarios WHERE nro=:nro");
            $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
            $sentencia->execute();

            $procesar="listo";
            $accion="C";
            $error_accion=2;
            $mensaje_usuario="Usuario Eliminado Satisfactoriamente...";
            $nro=0;
            $id="";
            $nombre="";
            $usuario="";
            $tipousuario="";
            $fecha_reg="";
            $password1="";
            $password2="";
        break;
      }
    }
// . Fin recepción de Post  ---------------------------------------------------------------------------------

?>
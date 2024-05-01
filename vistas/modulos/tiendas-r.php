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
    $procesar_queso="SI";
    $mensaje_disponibilidad="";
    $disponibilidad="SI";

// Inicialización de Variable
    $txtCiclo=1;
    $txtCantidad=0.00;
    $txtPvp=0.00;
    $txtTotal=0.00;
    $txtFecha=date("d/m/Y");
    $txtTienda_actual=1;
    $txtQueso_actual=1;
    //print_r($txtFecha);

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

        if ($cant_empresa>=1){
          foreach($listado_empresa as $empresa){
            $txtNro_empresa=$empresa['nro'];
            $txtNombre_empresa=$empresa['nombre'];
          }
          // Selecciono el almacén tiendas ---------------------------------------------------------------
            $sentencia=$pdo->prepare("SELECT * FROM `tiendas` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
            $sentencia->execute();
            $listado_tiendas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            $cant_tiendas=$sentencia->rowCount();

            if($cant_tiendas>=1){
              foreach($listado_tiendas as $tiendas){
                $nro_tiendas=$tiendas['nro'];
                $txtCant_cap_almacen=$tiendas['cant_cap_almacen'];
                $txtCant_existencia=$tiendas['cant_existencia'];
                $txtCant_cap_disp=$tiendas['cant_cap_disp'];
              }
              // Selecciono los movimientos de las tiendas ---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
              $sentencia->execute();
              $listado_tiendas_mov=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov=$sentencia->rowCount();
              
              if($cant_tiendas_mov>=1){
                // Selecciono las existencias de queso ---------------------------------------------------------------
                  $sentencia=$pdo->prepare("SELECT * FROM `tiendas_existe` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
                  $sentencia->execute();
                  $listado_tiendas_existe=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                  $cant_tiendas_existe=$sentencia->rowCount();
                  if($listado_tiendas_existe>=1){
                    foreach($listado_tiendas_existe as $existencia){
                        $nro_tiendas_existe=$existencia['nro'];	
                        $cant_dub_arm=$existencia['cant_dub_arm'];	
                        $cant_dub_ciu=$existencia['cant_dub_ciu'];		
                        $cant_dub_sfi=$existencia['cant_dub_sfi'];		
                        $cant_dub_lsa=$existencia['cant_dub_lsa'];	
    
                        $cant_moz_arm=$existencia['cant_moz_arm'];		
                        $cant_moz_ciu=$existencia['cant_moz_ciu'];		
                        $cant_moz_sfi=$existencia['cant_moz_sfi'];		
                        $cant_moz_lsa=$existencia['cant_moz_lsa'];		
                        
                        $cant_gou_arm=$existencia['cant_gou_arm'];		
                        $cant_gou_ciu=$existencia['cant_gou_ciu'];		
                        $cant_gou_sfi=$existencia['cant_gou_sfi'];		
                        $cant_gou_lsa=$existencia['cant_gou_lsa'];		
                        
                        $cant_die_arm=$existencia['cant_die_arm'];		
                        $cant_die_ciu=$existencia['cant_die_ciu'];		
                        $cant_die_sfi=$existencia['cant_die_sfi'];		
                        $cant_die_lsa=$existencia['cant_die_lsa'];	
                    }

                    $temporal="SI";
                  }else{
                    $procesar="listo"; //Muestra Vista normal
                    $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
                    $mensaje_usuario="No se encontraron las existencias de la empresa"; // Vacío en inicalización
                  }

              }else{
                $procesar="listo"; //Muestra Vista normal
                $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
                $mensaje_usuario="No se encontraron movimientos de tiendas de la empresa"; // Vacío en inicalización
              }

            }else{
              $procesar="listo"; //Muestra Vista normal
              $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
              $mensaje_usuario="No se encontró tiendas para la empresa"; // Vacío en inicalización
            } 
          // ----------------------------------------------------------------------------------------------------

        }else{
          $procesar="listo"; //Muestra Vista normal
          $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
          $mensaje_usuario="No se encontró una empresa para el usuario"; // Vacío en inicalización
        }
        
        
      // /. Fin selección de empresa del usuario -------------------------------------------------------------------------

  
    }
  // /. Fin selección empresa--------------------------------------------------------------------------------

  //Recepción de Post  --------------------------------------------------------------------------------------
    if(isset($_POST["btn_accion"])){

      $accion=($_POST["btn_accion"]);

      // Variables de Datos
      $txtCant_cap_almacen=($_POST["txtCant_cap_almacen"]);
      $txtCant_existencia=($_POST["txtCant_existencia"]);
      $txtCant_cap_disp=($_POST["txtCant_cap_disp"]);
      $txtNro_empresa=($_POST["txtEmpresa"]);
      $txtTienda_actual=($_POST["txtTienda_actual"]);
      $txtCiclo=($_POST["txtCiclo"]);
      $txtFecha=($_POST["txtFecha"]);
      $txtQueso_actual=($_POST["txtQueso_actual"]);
      $txtCantidad=($_POST["txtCantidad"]);
      $txtPvp=($_POST["txtPvp"]);
      $txtTotal=($_POST["txtTotal"]);
      $nro_tiendas=($_POST["nro_tiendas"]);
      $cant_disponible=0.00;
      $txtTipo_Operacion="V";
      $txtCant_entrada=0.00;
      $txtEstatus="A";
      $txtFecha_reg=date("y/m/d");
      $txtUsuario_reg=$txtUsuario;
      $txtEstatus_reg="A";


      // Nombre Tienda --------------------------------------------
      switch($txtTienda_actual){
        case 1;
            $txtNombre_Tienda="Armadillo";
        break;
        case 2;
            $txtNombre_Tienda="Ciudadela";
        break;
        case 3;
            $txtNombre_Tienda="San Fierro";
        break;
        case 4;
            $txtNombre_Tienda="Los Santos";
        break;
      }
      // ----------------------------------------------------------

      // Nombre Queso ---------------------------------------------
      switch($txtQueso_actual){
        case 1;
            $txtNombre_queso="Queso Duro Blanco";
        break;
        case 2;
            $txtNombre_queso="Queso Mozarella";
        break;
        case 3;
            $txtNombre_queso="Queso Gouda";
        break;
        case 4;
            $txtNombre_queso="Queso Dietético";
        break;
      }

      // ----------------------------------------------------------
  

      switch($accion){

        case "Procesar";
            // echo "<script> alert('Entró a procesar...'); </script>";

            // Verifica la disponibilidad de existencia de queso -----------------------------------------------------
            switch($txtTienda_actual){
                case 1; // Armadillo
                    switch($txtQueso_actual){
                        case 1; // Queso Blanco
                            if($txtCantidad>$cant_dub_arm){ $procesar_queso="NO";}
                        break;
                        case 2; // Queso Mozarella
                            if($txtCantidad>$cant_moz_arm){ $procesar_queso="NO";}
                        break;
                        case 3; // Queso Gouda
                            if($txtCantidad>$cant_gou_arm){ $procesar_queso="NO";}
                        break;
                        case 4; // Queso Dietético
                            if($txtCantidad>$cant_die_arm){ $procesar_queso="NO";}
                        break;
                    }
                break;

                case 2; // Ciudadela
                    switch($txtQueso_actual){
                        case 1; // Queso Blanco
                            if($txtCantidad>$cant_dub_ciu){ $procesar_queso="NO";}
                        break;
                        case 2; // Queso Mozarella
                            if($txtCantidad>$cant_moz_ciu){ $procesar_queso="NO";}
                        break;
                        case 3; // Queso Gouda
                            if($txtCantidad>$cant_gou_ciu){ $procesar_queso="NO";}
                        break;
                        case 4; // Queso Dietético
                            if($txtCantidad>$cant_die_ciu){ $procesar_queso="NO";}
                        break;
                    }
                break;

                case 3; // San Fierro
                    switch($txtQueso_actual){
                        case 1; // Queso Blanco
                            if($txtCantidad>$cant_dub_sfi){ $procesar_queso="NO";}
                        break;
                        case 2; // Queso Mozarella
                            if($txtCantidad>$cant_moz_sfi){ $procesar_queso="NO";}
                        break;
                        case 3; // Queso Gouda
                            if($txtCantidad>$cant_gou_sfi){ $procesar_queso="NO";}
                        break;
                        case 4; // Queso Dietético
                            if($txtCantidad>$cant_die_sfi){ $procesar_queso="NO";}
                        break;
                    }
                break;

                case 4; // Los Santos
                    switch($txtQueso_actual){
                        case 1; // Queso Blanco
                            if($txtCantidad>$cant_dub_lsa){ $procesar_queso="NO";}
                        break;
                        case 2; // Queso Mozarella
                            if($txtCantidad>$cant_moz_lsa){ $procesar_queso="NO";}
                        break;
                        case 3; // Queso Gouda
                            if($txtCantidad>$cant_gou_lsa){ $procesar_queso="NO";}
                        break;
                        case 4; // Queso Dietético
                            if($txtCantidad>$cant_die_lsa){ $procesar_queso="NO";}
                        break;
                    }
                break;
            }
            // -------------------------------------------------------------------------------------------------------
        
            // Valida el proceso y el monto de las variables
            if ($procesar_queso=="SI"){
                if(($txtCantidad>0) AND ($txtPvp>0)){
                    $txtTotal=$txtCantidad*$txtPvp;

                    $calcular="SI";
                }else{
                    $mensaje_disponibilidad="Cantidad y PVP deben ser mayor a CERO";
                    $disponibilidad="NO";
                }
            }else{
                $mensaje_disponibilidad="Tienda no cuenta con inventario suficiente";
                $disponibilidad="NO";
            }
            // -------------------------------------------------------------------------------------------------------

            // $procesar="ok";
            // header('Location:entorno.php');
        break;

        case "Guardar";
            // echo "<script> alert('Quieres Guardar Operación...'); </script>";
            // header('Location:usuarios.php');

            // Actualiza Inventario de Tienda --------------------------------------------------------------------
                
                $txtCant_existencia=$txtCant_existencia-$txtCantidad;
                $txtCant_cap_disp=$txtCant_cap_almacen-$txtCant_existencia;

                $sentencia=$pdo->prepare("UPDATE tiendas SET 
                cant_existencia=:cant_existencia,
                cant_cap_disp=:cant_cap_disp WHERE
                nro=:nro");
                
                $sentencia->bindParam(':nro',$nro_tiendas,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_existencia',$txtCant_existencia,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_cap_disp',$txtCant_cap_disp,PDO::PARAM_STR);
                $sentencia->execute();

                //echo "<script> alert('Actualizó el inventario degeneral de tienda...'); </script>";

            // ---------------------------------------------------------------------------------------------------
            
            // Actualiza existencia ------------------------------------------------------------------------------
                switch($txtTienda_actual){
                    case 1; // Armadillo
                        switch($txtQueso_actual){
                            case 1; // Queso Blanco
                                $cant_dub_arm=$cant_dub_arm-$txtCantidad;
                                $cant_disponible=$cant_dub_arm;
                            break;
                            case 2; // Queso Mozarella
                                $cant_moz_arm=$cant_moz_arm-$txtCantidad;
                                $cant_disponible=$cant_moz_arm;
                            break;
                            case 3; // Queso Gouda
                                $cant_gou_arm=$cant_gou_arm-$txtCantidad;
                                $cant_disponible=$cant_gou_arm;
                            break;
                            case 4; // Queso Dietético
                                $cant_die_arm=$cant_die_arm-$txtCantidad;
                                $cant_disponible=$cant_die_arm;
                            break;
                        }
                    break;

                    case 2; // Ciudadela
                        switch($txtQueso_actual){
                            case 1; // Queso Blanco
                                $cant_dub_ciu=$cant_dub_ciu-$txtCantidad;
                                $cant_disponible=$cant_dub_ciu;
                            break;
                            case 2; // Queso Mozarella
                                $cant_moz_ciu=$cant_moz_ciu-$txtCantidad;
                                $cant_disponible=$cant_moz_ciu;
                            break;
                            case 3; // Queso Gouda
                                $cant_gou_ciu=$cant_gou_ciu-$txtCantidad;
                                $cant_disponible=$cant_gou_ciu;
                            break;
                            case 4; // Queso Dietético
                                $cant_die_ciu=$cant_die_ciu-$txtCantidad;
                                $cant_disponible=$cant_die_ciu;
                            break;
                        }
                    break;

                    case 3; // San Fierro
                        switch($txtQueso_actual){
                            case 1; // Queso Blanco
                                $cant_dub_sfi=$cant_dub_sfi-$txtCantidad;
                                $cant_disponible=$cant_dub_sfi; 
                            break;
                            case 2; // Queso Mozarella
                                $cant_moz_sfi=$cant_moz_sfi-$txtCantidad;
                                $cant_disponible=$cant_moz_sfi; 
                            break;
                            case 3; // Queso Gouda
                                $cant_gou_sfi=$cant_gou_sfi-$txtCantidad;
                                $cant_disponible=$cant_gou_sfi; 
                            break;
                            case 4; // Queso Dietético
                                $cant_die_sfi=$cant_die_sfi-$txtCantidad;
                                $cant_disponible=$cant_die_sfi; 
                            break;
                        }
                    break;

                    case 4; // Los Santos
                        switch($txtQueso_actual){
                            case 1; // Queso Blanco
                                $cant_dub_lsa=$cant_dub_lsa-$txtCantidad;
                                $cant_disponible=$cant_dub_lsa;  
                            break;
                            case 2; // Queso Mozarella
                                $cant_moz_lsa=$cant_moz_lsa-$txtCantidad;
                                $cant_disponible=$cant_moz_lsa;  
                            break;
                            case 3; // Queso Gouda
                                $cant_gou_lsa=$cant_gou_lsa-$txtCantidad;
                                $cant_disponible=$cant_gou_lsa;  
                            break;
                            case 4; // Queso Dietético
                                $cant_die_lsa=$cant_die_lsa-$txtCantidad;
                                $cant_disponible=$cant_die_lsa;  
                            break;
                        }
                    break;
                }

                $sentencia=$pdo->prepare("UPDATE tiendas_existe SET 
                cant_dub_arm=:cant_dub_arm,	
                cant_dub_ciu=:cant_dub_ciu,	
                cant_dub_sfi=:cant_dub_sfi,	
                cant_dub_lsa=:cant_dub_lsa,
                cant_moz_arm=:cant_moz_arm,	
                cant_moz_ciu=:cant_moz_ciu,	
                cant_moz_sfi=:cant_moz_sfi,
                cant_moz_lsa=:cant_moz_lsa,
                cant_gou_arm=:cant_gou_arm,	
                cant_gou_ciu=:cant_gou_ciu,
                cant_gou_sfi=:cant_gou_sfi,	
                cant_gou_lsa=:cant_gou_lsa,
                cant_die_arm=:cant_die_arm,	
                cant_die_ciu=:cant_die_ciu,	
                cant_die_sfi=:cant_die_sfi,	
                cant_die_lsa=:cant_die_lsa WHERE
                nro=:nro");
                
                $sentencia->bindParam(':nro',$nro_tiendas_existe,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_dub_arm',$cant_dub_arm,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_dub_ciu',$cant_dub_ciu,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_dub_sfi',$cant_dub_sfi,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_dub_lsa',$cant_dub_lsa,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_moz_arm',$cant_moz_arm,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_moz_ciu',$cant_moz_ciu,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_moz_sfi',$cant_moz_sfi,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_moz_lsa',$cant_moz_lsa,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_gou_arm',$cant_gou_arm,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_gou_ciu',$cant_gou_ciu,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_gou_sfi',$cant_gou_sfi,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_gou_lsa',$cant_gou_lsa,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_die_arm',$cant_die_arm,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_die_ciu',$cant_die_ciu,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_die_sfi',$cant_die_sfi,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_die_lsa',$cant_die_lsa,PDO::PARAM_STR);
                $sentencia->execute();

                //echo "<script> alert('Actualizó el existencias de producto...'); </script>";
            
            // ---------------------------------------------------------------------------------------------------
            
            // Inserta movimiento de tienda---------------------------------------------------------------------
            
                $sentencia=$pdo->prepare("INSERT INTO tiendas_mov(nro,nro_empresa,nro_almacen_tienda,nro_tienda,nombre_tienda,
                ciclo,nro_queso,nombre_queso,fecha,tipo_operacion,cant_entrada,cant_venta, cant_monto_pvp,cant_ingreso,
                cant_disponible,estatus,fecha_reg,usuario_reg,estatus_reg) 
                VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :nro_tienda, :nombre_tienda, :ciclo, :nro_queso, :nombre_queso,
                :fecha, :tipo_operacion, :cant_entrada, :cant_venta, :cant_monto_pvp, :cant_ingreso, :cant_disponible,
                :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_almacen_tienda',$nro_tiendas,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_tienda',$txtTienda_actual,PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_tienda',$txtNombre_Tienda,PDO::PARAM_STR);
                $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_queso',$txtQueso_actual,PDO::PARAM_STR);
                $sentencia->bindParam(':nombre_queso',$txtNombre_queso,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha',$txtFecha,PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_operacion',$txtTipo_Operacion,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_entrada',$txtCant_entrada,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_venta',$txtCantidad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_monto_pvp',$txtPvp,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_ingreso',$txtTotal,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_disponible',$cant_disponible,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_reg',$txtFecha_reg,PDO::PARAM_STR);
                $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                $sentencia->execute();

                //echo "<script> alert('Insertó movimiento...'); </script>";

            // ---------------------------------------------------------------------------------------------------

            // Asigna variables de control ------------------------------------------------------------------
                $procesar="listo"; //Muestra Vista normal
                $error_accion=1; // Valor 0 si todo va normal
                $mensaje_usuario=" Los registros se realizaron satisfactoriamente"; // Vacío en inicalización
            // -----------------------------------------------------------------------------------------------

        break;

        case "Cancelar";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            $procesar="ok";
            header('Location:tiendas.php');
        break;

        case "Aceptar";
            // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
            $procesar="ok";
            header('Location:tiendas.php');
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

        case "Otro";
            //Variables de Datos
                $txtNro=0;
                $txtId="";
                $txtFechaCreacion=($_POST["txtFecha_reg"]);   
                $txtNombre=($_POST['txtNombre']);
                $txtEstructura="Estandar";
                $txtDepartamentos="Estandar";
                $txtOrganigrama="Estandar";
                $txtMontoPresupuesto=0.00;
                $txtMontoSaldoActual=0.00;
                $txtMontoMultas=0.00;
                $txtEstatus="A";
                $txtFecha_reg=($_POST["txtFecha_reg"]);
                $txtUsuario_reg=$txtUsuario;
                $txtEstatus_reg="A";
                // ----------------------------
        break;
      }
    }
// . Fin recepción de Post  ---------------------------------------------------------------------------------

?>
<?php
    include('../controladores/global/sesiones.php');
    include('../controladores/global/conexion.php');
    include('../controladores/global/constantes.php');


    //Datos del Usuario
    $usuariosesion=($_SESSION['usuario']);
    $txtUsuario=$usuariosesion['nro'];
    $txtIdUsuario=$usuariosesion['id'];
    $txtUsuarioTipo=$usuariosesion['tipo'];

    // Selección de entorno

    // --------------------------------------------------------------------------------

  
    // Variables de Acción
    $procesar="ok"; //Muestra Vista normal
    $error_accion=0; // Valor 0 si todo va normal
    $mensaje_usuario=""; // Vacío en inicalización

  //Recepción de Post
  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);

    //Variables de Datos
    $txtNro=0;
    $txtId=($_POST['txtId']);
    // El Usuario es el mismo usuario de sesión
    // La Id del usuario es la misma que el usuario de sesión
    //$txtUsuarioe=$txtUsuario;
    //print_r($txtUsuario);
    //$txtIdUsuarioe=$txtIdUsuario;
    $txtFechaCreacion=date("Y/m/d");   
    $txtNombre=($_POST['txtNombre']);
    $txtEstructura="Estandar";
    $txtDepartamentos="Estandar";
    $txtOrganigrama="Estandar";
    $txtMontoPresupuesto=0.00;
    $txtMontoSaldoActual=0.00;
    $txtMontoMultas=0.00;
    $txtEstatus="A";
    $txtIntegrantes="Vacio";
    $txtFecha_reg=date("Y/m/d");
    $txtUsuario_reg=$txtUsuario;
    $txtEstatus_reg="A";
    // ----------------------------


    switch($accion){

      case "Guardar";
          // echo "<script> alert('Quieres Guardar Operación...'); </script>";
          // header('Location:usuarios.php');

        // Insertar Empresa -----------------------------------------------------------------------------------------

          $sentencia=$pdo->prepare("INSERT INTO empresa(nro,id,usuario,id_usuario,fecha_creacion,nombre,estructura,departamentos,organigrama,monto_presupuesto,monto_saldo_actual,monto_multas,estatus,integrantes,fecha_reg,usuario_reg,estatus_reg) 
          VALUES (NULL, :id, :usuario, :id_usuario, :fecha_creacion, :nombre, :estructura, :departamentos,:organigrama, :monto_presupuesto,:monto_saldo_actual, :monto_multas, :estatus, :integrantes, :fecha_reg, :usuario_reg, :estatus_reg)");

          $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
          $sentencia->bindParam(':usuario',$txtUsuario,PDO::PARAM_STR);
          $sentencia->bindParam(':id_usuario',$txtIdUsuario,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_creacion',$txtFechaCreacion);
          $sentencia->bindParam(':nombre',$txtNombre,PDO::PARAM_STR);
          $sentencia->bindParam(':estructura',$txtEstructura,PDO::PARAM_STR);
          $sentencia->bindParam(':departamentos',$txtDepartamentos,PDO::PARAM_STR);
          $sentencia->bindParam(':organigrama',$txtOrganigrama,PDO::PARAM_STR);
          $sentencia->bindParam(':monto_presupuesto',$txtMontoPresupuesto,PDO::PARAM_STR);
          $sentencia->bindParam(':monto_saldo_actual',$txtMontoSaldoActual,PDO::PARAM_STR);
          $sentencia->bindParam(':monto_multas',$txtMontoMultas,PDO::PARAM_STR);
          $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
          $sentencia->bindParam(':integrantes',$txtIntegrantes,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
          $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
          $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
          $sentencia->execute();

          $IdEmpresa=$pdo->lastInsertID(); // Último Nro de empresa insertado (campo clave)

          echo "<script> alert('Insertó empresa...'); </script>";


        // -----------------------------------------------------------------------------------------

        // Crea de almacén de materia prima AMP ------------------------------------------------------

            $IdAMP="AMP-".strval($IdEmpresa);
            $EmpresAMP=$IdEmpresa;
            $IdEmpresaAMP=($_POST['txtId']);
            //print_r($IdEmpresaAMP);
            $CapMaxlcAMP=$cant_capmax_lc;
            $ExistencialcAMP=0.00;
            $CapDisplcAMP=$cant_capmax_lc;
            $CapMaxadAMP=$cant_capmax_ad;
            $ExistenciaadAMP=0.00;
            $CapDispadAMP=$cant_capmax_ad;
            $EstatusAMP="A";
            $fecha_regAMP=date("Y/m/d");
            $Usuario_regAMP=$txtUsuario_reg;
            $estatus_regAMP="A";


            $sentencia=$pdo->prepare("INSERT INTO amp(nro,id,nro_empresa,id_empresa,cant_capmax_lc,cant_existencia_lc,cant_capdisp_lc,cant_capmax_ad,cant_existencia_ad,cant_capdisp_ad,estatus,fecha_reg,usuario_reg,estatus_reg) 
            VALUES (NULL, :id, :nro_empresa, :id_empresa, :cant_capmax_lc, :cant_existencia_lc, :cant_capdisp_lc, :cant_capmax_ad, :cant_existencia_ad, :cant_capdisp_ad, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

            $sentencia->bindParam(':id',$IdAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':nro_empresa',$EmpresAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':id_empresa',$txtId,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_capmax_lc',$CapMaxlcAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_existencia_lc',$ExistencialcAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_capdisp_lc',$CapDisplcAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_capmax_ad',$CapMaxadAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_existencia_ad',$ExistenciaadAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_capdisp_ad',$CapDispadAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$EstatusAMP,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_reg',$fecha_regAMP);
            $sentencia->bindParam(':usuario_reg',$Usuario_regAMP,PDO::PARAM_INT);
            $sentencia->bindParam(':estatus_reg',$estatus_regAMP,PDO::PARAM_STR);
            $sentencia->execute();

            //echo "<script> alert('Insertó almacén de materia prima AMP...'); </script>";
        // ---------------------------------------------------------------------------------------------------------

        // Crea de almacén de Productos terminados APT--------------------------------------------------------------

            $Id_APT="APT-".strval($IdEmpresa);
            $nro_empresa_APT=$IdEmpresa;
            $cant_cmax_qd=12000;
            $cant_e_qd=0.00;
            $cant_disp_qd=12000;
            $cant_cmax_moz=12000;
            $cant_e_moz=0.00;
            $cant_disp_moz=12000;
            $cant_cmax_gou=12000;
            $cant_e_gou=0.00;
            $cant_disp_gou=12000;
            $cant_cmax_die=12000;
            $cant_e_die=0.00;
            $cant_disp_die=12000;

            $Estatus_APT="A";
            $fecha_reg_APT=date("Y/m/d");
            $Usuario_reg_APT=$txtUsuario_reg;
            $estatus_reg_APT="A";


            $sentencia=$pdo->prepare("INSERT INTO apt(nro,id,nro_empresa,cant_cmax_qd,cant_e_qd,cant_disp_qd,cant_cmax_moz,
            cant_e_moz,cant_disp_moz,cant_cmax_gou,cant_e_gou,cant_disp_gou,cant_cmax_die,cant_e_die,cant_disp_die,
            estatus,fecha_reg,usuario_reg,estatus_reg ) 
            VALUES (NULL, :id, :nro_empresa, :cant_cmax_qd, :cant_e_qd, :cant_disp_qd, :cant_cmax_moz,
            :cant_e_moz, :cant_disp_moz, :cant_cmax_gou, :cant_e_gou, :cant_disp_gou, :cant_cmax_die, 
            :cant_e_die, :cant_disp_die, :estatus, :fecha_reg, :usuario_reg, :estatus_reg )");

            $sentencia->bindParam(':id',$Id_APT,PDO::PARAM_STR);
            $sentencia->bindParam(':nro_empresa',$nro_empresa_APT,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_cmax_qd',$cant_cmax_qd,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_qd',$cant_e_qd,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_qd',$cant_disp_qd,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_cmax_moz',$cant_cmax_moz,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_moz',$cant_e_moz,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_moz',$cant_disp_moz,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_cmax_gou',$cant_cmax_gou,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_gou',$cant_e_gou,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_gou',$cant_disp_gou,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_cmax_die',$cant_cmax_die,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_die',$cant_e_die,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_die',$cant_disp_die,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$Estatus_APT,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_reg',$fecha_reg_APT);
            $sentencia->bindParam(':usuario_reg',$Usuario_reg_APT,PDO::PARAM_INT);
            $sentencia->bindParam(':estatus_reg',$estatus_reg_APT,PDO::PARAM_STR);
            $sentencia->execute();

            //echo "<script> alert('Insertó almacén de productos terminados APT...'); </script>";
        // --------------------------------------------------------------------------------------------
        
        // Crea el almacén de tiendas -----------------------------------------------------------------

            $nro_empresa=$IdEmpresa;
            $cant_cap_almacen=300000;
            $cant_existencia=0.00;
            $cant_cap_disp=300000;
            $monto_a_arm=1500.00;
            $monto_a_ciu=2500.00;
            $monto_a_sfi=1480.00;
            $monto_a_lsa=2400.00;

            $Estatus="A";
            $Fecha_reg=date("Y/m/d");
            $Usuario_reg=$txtUsuario_reg;
            $Estatus_reg="A";

            $sentencia=$pdo->prepare("INSERT INTO tiendas(nro,nro_empresa,cant_cap_almacen,cant_existencia,cant_cap_disp,
            monto_a_arm,monto_a_ciu,monto_a_sfi,monto_a_lsa,estatus,fecha_reg,usuario_reg,estatus_reg) 
            VALUES (NULL, :nro_empresa, :cant_cap_almacen, :cant_existencia, :cant_cap_disp,
            :monto_a_arm, :monto_a_ciu, :monto_a_sfi, :monto_a_lsa, :estatus, :fecha_reg, :usuario_reg, :estatus_reg )");

            $sentencia->bindParam(':nro_empresa',$nro_empresa,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_cap_almacen',$cant_cap_almacen,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_existencia',$cant_existencia,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_cap_disp',$cant_cap_disp,PDO::PARAM_STR);
            $sentencia->bindParam(':monto_a_arm',$monto_a_arm,PDO::PARAM_STR);
            $sentencia->bindParam(':monto_a_ciu',$monto_a_ciu,PDO::PARAM_STR);
            $sentencia->bindParam(':monto_a_sfi',$monto_a_sfi,PDO::PARAM_STR);
            $sentencia->bindParam(':monto_a_lsa',$monto_a_lsa,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$Estatus,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_reg',$Fecha_reg);
            $sentencia->bindParam(':usuario_reg',$Usuario_reg,PDO::PARAM_INT);
            $sentencia->bindParam(':estatus_reg',$Estatus_reg,PDO::PARAM_STR);
            $sentencia->execute();

            $Nro_almacen_tienda_empresa=$pdo->lastInsertID(); // Último Nro de empresa insertado (campo clave)
            
            //print_r($Nro_almacen_tienda_empresa);
            //echo "<script> alert('Insertó almacén de tienda...'); </script>";


        // --------------------------------------------------------------------------------------------
       
        // Crea el almacén de existencias de quesos de la tienda---------------------------------------

            $nro_empresa=$IdEmpresa;
            $nro_almacen_tienda=$Nro_almacen_tienda_empresa;

            $cant_dub_arm=0.00;		
            $cant_dub_ciu=0.00;	
            $cant_dub_sfi=0.00;	
            $cant_dub_lsa=0.00;	

            $cant_moz_arm=0.00;	
            $cant_moz_ciu=0.00;	
            $cant_moz_sfi=0.00;
            $cant_moz_lsa=0.00;

            $cant_gou_arm=0.00;
            $cant_gou_ciu=0.00;
            $cant_gou_sfi=0.00;
            $cant_gou_lsa=0.00;

            $cant_die_arm=0.00;
            $cant_die_ciu=0.00;
            $cant_die_sfi=0.00;
            $cant_die_lsa=0.00;

            $Estatus="A";
            $Fecha_reg=date("Y/m/d");
            $Usuario_reg=$txtUsuario_reg;
            $Estatus_reg="A";

            $sentencia=$pdo->prepare("INSERT INTO tiendas_existe(nro,nro_empresa,nro_almacen_tienda,cant_dub_arm,cant_dub_ciu,
            cant_dub_sfi,cant_dub_lsa,cant_moz_arm,cant_moz_ciu,cant_moz_sfi,cant_moz_lsa,cant_gou_arm,cant_gou_ciu,
            cant_gou_sfi,cant_gou_lsa,cant_die_arm,cant_die_ciu,cant_die_sfi,cant_die_lsa,estatus,fecha_reg,usuario_reg,
            estatus_reg) 
            VALUES (NULL, :nro_empresa, :nro_almacen_tienda, :cant_dub_arm, :cant_dub_ciu, :cant_dub_sfi,
            :cant_dub_lsa, :cant_moz_arm, :cant_moz_ciu, :cant_moz_sfi, :cant_moz_lsa, :cant_gou_arm, :cant_gou_ciu,
            :cant_gou_sfi, :cant_gou_lsa, :cant_die_arm, :cant_die_ciu, :cant_die_sfi, :cant_die_lsa, :estatus, 
            :fecha_reg, :usuario_reg, :estatus_reg)");

            $sentencia->bindParam(':nro_empresa',$nro_empresa,PDO::PARAM_STR);
            $sentencia->bindParam(':nro_almacen_tienda',$nro_almacen_tienda,PDO::PARAM_STR);
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
            $sentencia->bindParam(':estatus',$Estatus,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_reg',$Fecha_reg);
            $sentencia->bindParam(':usuario_reg',$Usuario_reg,PDO::PARAM_INT);
            $sentencia->bindParam(':estatus_reg',$Estatus_reg,PDO::PARAM_STR);
            $sentencia->execute();
            
            //echo "<script> alert('Insertó tabla de existencias tiendas...'); </script>";

        // --------------------------------------------------------------------------------------------

          //echo "<script> alert('Entorno Creado Satisfactoriamente...'); </script>";

          $procesar="listo"; //Muestra Vista normal
          $error_accion=1; // Valor 0 si todo va normal
          $mensaje_usuario="Entorno Creado Satisfactoriamente (Empresa,AMP,APT,Tiendas)"; // Vacío en inicalización

      break;

      case "Cancelar";
          // echo "<script> alert('Quieres cancelar Operación...'); </script>";
          $procesar="ok";
          header('Location:entorno.php');
      break;

      case "Aceptar";
          // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
          $procesar="ok";
          header('Location:entorno.php');
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


?>
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

        if($cant_empresa>=1){
          foreach($listado_empresa as $empresa){
              $txtNro_empresa=$empresa['nro'];
              $txtNombre_empresa=$empresa['nombre'];
          }

          // Selecciono productos por despachar del almacén de productos terminados APT por ciclo -------------
          $sentencia=$pdo->prepare("SELECT * FROM `apt_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
          $sentencia->execute();
          $listado_apt_mov=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          $cant_apt_mov=$sentencia->rowCount();


          if($cant_apt_mov>=1){
            $dub_ciclo_1=0.00;  $moz_ciclo_1=0.00;  $gou_ciclo_1=0.00;  $die_ciclo_1=0.00;
            $dub_ciclo_2=0.00;  $moz_ciclo_2=0.00;  $gou_ciclo_2=0.00;  $die_ciclo_2=0.00;
            $dub_ciclo_3=0.00;  $moz_ciclo_3=0.00;  $gou_ciclo_3=0.00;  $die_ciclo_3=0.00;
            $dub_ciclo_4=0.00;  $moz_ciclo_4=0.00;  $gou_ciclo_4=0.00;  $die_ciclo_4=0.00;
            $dub_ciclo_5=0.00;  $moz_ciclo_5=0.00;  $gou_ciclo_5=0.00;  $die_ciclo_5=0.00;
            $dub_ciclo_6=0.00;  $moz_ciclo_6=0.00;  $gou_ciclo_6=0.00;  $die_ciclo_6=0.00;
            $dub_ciclo_7=0.00;  $moz_ciclo_7=0.00;  $gou_ciclo_7=0.00;  $die_ciclo_7=0.00;
            $dub_ciclo_8=0.00;  $moz_ciclo_8=0.00;  $gou_ciclo_8=0.00;  $die_ciclo_8=0.00;
            $dub_ciclo_9=0.00;  $moz_ciclo_9=0.00;  $gou_ciclo_9=0.00;  $die_ciclo_9=0.00;
            $dub_ciclo_10=0.00;  $moz_ciclo_10=0.00;  $gou_ciclo_10=0.00;  $die_ciclo_10=0.00;
            $dub_ciclo_11=0.00;  $moz_ciclo_11=0.00;  $gou_ciclo_11=0.00;  $die_ciclo_11=0.00;
            $dub_ciclo_12=0.00;  $moz_ciclo_12=0.00;  $gou_ciclo_12=0.00;  $die_ciclo_12=0.00;

            foreach($listado_apt_mov as $apt_mov){

              if($apt_mov['ciclo']==1){
                if($apt_mov['nro_queso']==1){$dub_ciclo_1=$dub_ciclo_1+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_1=$moz_ciclo_1+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_1=$gou_ciclo_1+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_1=$die_ciclo_1+$apt_mov['cant_entrada']; } 
              }
              
              if($apt_mov['ciclo']==2){
                if($apt_mov['nro_queso']==1){$dub_ciclo_2=$dub_ciclo_2+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_2=$moz_ciclo_2+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_2=$gou_ciclo_2+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_2=$die_ciclo_2+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==3){
                if($apt_mov['nro_queso']==1){$dub_ciclo_3=$dub_ciclo_3+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_3=$moz_ciclo_3+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_3=$gou_ciclo_3+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_3=$die_ciclo_3+$apt_mov['cant_entrada']; } 
              }
              
              if($apt_mov['ciclo']==4){
                if($apt_mov['nro_queso']==1){$dub_ciclo_4=$dub_ciclo_4+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_4=$moz_ciclo_4+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_4=$gou_ciclo_4+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_4=$die_ciclo_4+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==5){
                if($apt_mov['nro_queso']==1){$dub_ciclo_5=$dub_ciclo_5+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_5=$moz_ciclo_5+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_5=$gou_ciclo_5+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_5=$die_ciclo_5+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==6){
                if($apt_mov['nro_queso']==1){$dub_ciclo_6=$dub_ciclo_6+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_6=$moz_ciclo_6+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_6=$gou_ciclo_6+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_6=$die_ciclo_6+$apt_mov['cant_entrada']; } 
              }

              // Consulto los despachos preparados
              $sentencia=$pdo->prepare("SELECT * FROM `apt_dtienda` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
              $sentencia->execute();
              $listado_apt_dtienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_apt_dtienda=$sentencia->rowCount(); 

            }

          }else {
            $procesar="Listo"; //Muestra Vista normal
            $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
            $mensaje_usuario="No hay productos para esta empresa"; // Vacío en inicalización      
          } 

        }else{
          $procesar="Listo"; //Muestra Vista normal
          $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
          $mensaje_usuario="No se encontró empresa para el usuario"; // Vacío en inicalización   

        }
      


      // /. Fin selección Depósito APT de la empresa ---------------------------------------------------------
    }
  // /. Fin selección empresa--------------------------------------------------------------------------------

  //Recepción de Post  --------------------------------------------------------------------------------------
    if(isset($_POST["btn_accion"])){

      $accion=($_POST["btn_accion"]);
      
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
      $txtIntegrantes=" ";
      //$txtFecha_reg=date("Y/m/d");
      $txtFecha_reg=($_POST["txtFecha_reg"]);
      //print_r($txtFecha_reg);
      $txtUsuario_reg=$txtUsuario;
      $txtEstatus_reg="A";
      // ----------------------------


      switch($accion){

        case "Guardar";
            // echo "<script> alert('Quieres Guardar Operación...'); </script>";
            // header('Location:usuarios.php');

            $sentencia=$pdo->prepare("INSERT INTO empresa(nro,id,usuario,id_usuario,fecha_creacion,nombre,estructura,departamentos,organigrama,monto_presupuesto,monto_saldo_actual,monto_multas,estatus,integrantes,fecha_reg,usuario_reg,estatus_reg) 
            VALUES (NULL, :id, :usuario, :id_usuario, :fecha_creacion, :nombre, :estructura, :departamentos,:organigrama, :monto_presupuesto,:monto_saldo_actual, :monto_multas, :estatus, :integrantes, :fecha_reg, :usuario_reg, :estatus_reg)");

            $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
            $sentencia->bindParam(':usuario',$txtUsuario,PDO::PARAM_STR);
            $sentencia->bindParam(':id_usuario',$txtIdUsuario,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_creacion',$txtFechaCreacion);
            $sentencia->bindParam(':nombre',$txtNombreEmpresa,PDO::PARAM_STR);
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

            echo "<script> alert('Entorno Creado Satisfactoriamente...'); </script>";

        break;

        case "Cancelar";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            $procesar="ok";
            header('Location:entorno.php');
        break;

        case "Aceptar";
            // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
            $procesar="ok";
            header('Location:inicio.php');
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
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

// Variables de Acción -------------------------------------------------------------------------------------
    $txtCiclo=1;
    $txtCant_dub=0.00;
    $txtCant_moz=0.00;
    $txtCant_gou=0.00;
    $txtCant_die=0.00;
// .Fin Variables de acción --------------------------------------------------------------------------------

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

              if($apt_mov['ciclo']==7){
                if($apt_mov['nro_queso']==1){$dub_ciclo_7=$dub_ciclo_7+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_7=$moz_ciclo_7+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_7=$gou_ciclo_7+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_7=$die_ciclo_7+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==8){
                if($apt_mov['nro_queso']==1){$dub_ciclo_8=$dub_ciclo_8+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_8=$moz_ciclo_8+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_8=$gou_ciclo_8+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_8=$die_ciclo_8+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==9){
                if($apt_mov['nro_queso']==1){$dub_ciclo_9=$dub_ciclo_9+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_9=$moz_ciclo_9+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_9=$gou_ciclo_9+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_9=$die_ciclo_9+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==10){
                if($apt_mov['nro_queso']==1){$dub_ciclo_10=$dub_ciclo_10+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_10=$moz_ciclo_10+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_10=$gou_ciclo_10+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_10=$die_ciclo_10+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==11){
                if($apt_mov['nro_queso']==1){$dub_ciclo_11=$dub_ciclo_11+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_11=$moz_ciclo_11+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_11=$gou_ciclo_11+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_11=$die_ciclo_11+$apt_mov['cant_entrada']; } 
              }

              if($apt_mov['ciclo']==12){
                if($apt_mov['nro_queso']==1){$dub_ciclo_12=$dub_ciclo_12+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==2){$moz_ciclo_12=$moz_ciclo_12+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==3){$gou_ciclo_12=$gou_ciclo_12+$apt_mov['cant_entrada']; } 
                if($apt_mov['nro_queso']==4){$die_ciclo_12=$die_ciclo_12+$apt_mov['cant_entrada']; } 
              }
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
      
      //Variables de Datos---------------------
      $txtNro_empresa=($_POST["txtEmpresa"]);
      $txtCiclo=($_POST["txtCiclo"]);
      $txtFecha=($_POST["txtFecha"]);
      $txtCant_dub=($_POST["txtCant_dub"]);
      $txtCant_moz=($_POST["txtCant_moz"]);
      $txtCant_gou=($_POST["txtCant_gou"]);
      $txtCant_die=($_POST["txtCant_die"]);
      $txtTotal=($_POST["txtTotal"]);

      $txtEstatus="A";
      $txtFecha_reg=date("y/m/d");
      $txtUsuario_reg=$txtUsuario;
      $txtEstatus_reg="A";
      // ----------------------------------------


      switch($accion){

        case "Guardar";
            // echo "<script> alert('Quieres Guardar Operación...'); </script>";
            // header('Location:usuarios.php');

            // Selecciono productos por despachar del almacén de productos terminados APT por ciclo -------------
            $sentencia=$pdo->prepare("SELECT * FROM `apt_dtienda` WHERE estatus='A' AND ciclo=$txtCiclo AND nro_empresa=$txtNro_empresa");
            $sentencia->execute();
            $listado_apt_dtienda=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            $cant_apt_dtienda=$sentencia->rowCount();

            if($cant_apt_dtienda>=1){
                echo "<script> alert('El registro ya existe se actualizó...'); </script>";

            }else{
                //echo "<script> alert('El registro no existe y lo registra...'); </script>";
                $sentencia=$pdo->prepare("INSERT INTO apt_dtienda(nro,nro_empresa,ciclo,fecha,cant_dub,cant_moz,
                cant_gou,cant_die,cant_total,estatus,fecha_reg,usuario_reg,estatus_reg) 
                VALUES (NULL, :nro_empresa, :ciclo, :fecha, :cant_dub, :cant_moz, :cant_gou, :cant_die, 
                :cant_total, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha',$txtFecha);
                $sentencia->bindParam(':cant_dub',$txtCant_dub,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_moz',$txtCant_moz,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_gou',$txtCant_gou,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_die',$txtCant_die,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_total',$txtTotal,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
                $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
                $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
                $sentencia->execute();
                 //echo "<script> alert('El registro se realizó satisfactoriamente...'); </script>";
            }

            $procesar="listo"; //Muestra Vista normal
            $error_accion=0; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
            $mensaje_usuario="Registro realizado satisfactoriamente"; // Vacío en inicalización

        break;

        case "Calcular";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            //cho "<script> alert('Quieres Ver...'); </script>";
            if($txtCiclo=="1"){
                $txtCant_dub=$dub_ciclo_1;
                $txtCant_moz=$moz_ciclo_1;
                $txtCant_gou=$gou_ciclo_1;
                $txtCant_die=$die_ciclo_1;
            }
              
            if($txtCiclo==2){
                $txtCant_dub=$dub_ciclo_2;
                $txtCant_moz=$moz_ciclo_2;
                $txtCant_gou=$gou_ciclo_2;
                $txtCant_die=$die_ciclo_2;
            }

            if($txtCiclo==3){
                $txtCant_dub=$dub_ciclo_3;
                $txtCant_moz=$moz_ciclo_3;
                $txtCant_gou=$gou_ciclo_3;
                $txtCant_die=$die_ciclo_3;
            }
              
            if($txtCiclo==4){
                $txtCant_dub=$dub_ciclo_4;
                $txtCant_moz=$moz_ciclo_4;
                $txtCant_gou=$gou_ciclo_4;
                $txtCant_die=$die_ciclo_4;
            }

            if($txtCiclo==5){
                $txtCant_dub=$dub_ciclo_5;
                $txtCant_moz=$moz_ciclo_5;
                $txtCant_gou=$gou_ciclo_5;
                $txtCant_die=$die_ciclo_5;
            }

            if($txtCiclo==6){
                $txtCant_dub=$dub_ciclo_6;
                $txtCant_moz=$moz_ciclo_6;
                $txtCant_gou=$gou_ciclo_6;
                $txtCant_die=$die_ciclo_6;
            }

            if($txtCiclo==7){
                $txtCant_dub=$dub_ciclo_7;
                $txtCant_moz=$moz_ciclo_7;
                $txtCant_gou=$gou_ciclo_7;
                $txtCant_die=$die_ciclo_7;
            }

            if($txtCiclo==8){
                $txtCant_dub=$dub_ciclo_8;
                $txtCant_moz=$moz_ciclo_8;
                $txtCant_gou=$gou_ciclo_8;
                $txtCant_die=$die_ciclo_8;
            }
            if($txtCiclo==9){
                $txtCant_dub=$dub_ciclo_9;
                $txtCant_moz=$moz_ciclo_9;
                $txtCant_gou=$gou_ciclo_9;
                $txtCant_die=$die_ciclo_9;
            }
            if($txtCiclo==10){
                $txtCant_dub=$dub_ciclo_10;
                $txtCant_moz=$moz_ciclo_10;
                $txtCant_gou=$gou_ciclo_10;
                $txtCant_die=$die_ciclo_10;
            }
            if($txtCiclo==11){
                $txtCant_dub=$dub_ciclo_11;
                $txtCant_moz=$moz_ciclo_11;
                $txtCant_gou=$gou_ciclo_11;
                $txtCant_die=$die_ciclo_11;
            }
            if($txtCiclo==12){
                $txtCant_dub=$dub_ciclo_12;
                $txtCant_moz=$moz_ciclo_12;
                $txtCant_gou=$gou_ciclo_12;
                $txtCant_die=$die_ciclo_12;
            }

            $txtTotal=$txtCant_dub+$txtCant_moz+$txtCant_gou+$txtCant_die;
            $calcular="SI";

        break;

        case "Actualizar";
            echo "<script> alert('Quieres Actualizar Registro...'); </script>";
        break;

        case "Eliminar";
            // echo "<script> alert('Quieres Eliminar Registro...'); </script>";
            // echo "<script> alert('Usuario Eliminado Satisfactoriamente...'); </script>";
            // header('Location:usuarios.php');
        break;

        case "Cancelar";
              // echo "<script> alert('Quieres cancelar Operación...'); </script>";
              $procesar="ok";
              header('Location:apt-despacho-tienda.php');
          break;

          case "Aceptar";
              // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
              $procesar="ok";
              header('Location:inicio.php');
          break;
      }
    }
// . Fin recepción de Post  ---------------------------------------------------------------------------------

?>
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

  // Verifica los registros activos en simulación ---------------------------------------
    $sentencia=$pdo->prepare("SELECT * FROM `simulacion` WHERE estatus='A' ");
    $sentencia->execute();
    $listasimulacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
  
    $cantRegistros=$sentencia->rowCount();
    //print_r($cantRegistros);
    //print_r($listasimulacion);

    if($cantRegistros>=1){
      //echo "<script> alert('Es mayor a uno...'); </script>";

      foreach ($listasimulacion as $simulacion){  
        $txtNro=($simulacion['nro']);
        $txtId=($simulacion['id']);
        $txtFechaInicio=($simulacion['fecha_inicio']);
        $txtEstatus=($simulacion['estatus']);
        $txtDescripcion=($simulacion['descripcion']);
      }

    }else{
      // echo "<script> alert('Es menor a uno...'); </script>";
      $txtNro=0;
      $txtId="";
      $txtFechaInicio="";
      $txtEstatus="";
      $txtDescripcion="";
    }
  // ------------------------------------------------------------------------------------
  

  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);
    $nro=($_POST['txtNro']);

    switch($accion){

      case "Cancelar";
          // echo "<script> alert('Quieres cancelar Operación...'); </script>";
          $procesar="ok";
          header('Location:usuarios.php');
      break;

      case "Aceptar";
          // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
          $procesar="ok";
          header('Location:usuarios.php');
      break;

      case "Finalizar";
        // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
        $estatus="I";

        $sentencia=$pdo->prepare("UPDATE simulacion SET 
        estatus=:estatus WHERE
        nro=:nro");
              
        $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
        $sentencia->bindParam(':estatus',$estatus,PDO::PARAM_STR);
        $sentencia->execute();

        // echo "<script> alert('Simulación Finalizada Satisfactoriamente...'); </script>";
        // $accion="C";
        $cantRegistros=0;
        $txtNro=0;
        $txtId="";
        $txtFechaInicio="";
        $txtEstatus="";
        $txtDescripcion="";
        //header('Location:simulacion.php');

        $mensaje_usuario="Simulación Finalizada Satisfactoriamente";
        $procesar="listo";
        $error_accion=0;

      break;
      case "Finalizarr";
        // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
        
        // Actualizamos los montos y estatus de la tabla de almacén de materia prima (AMP)
            $estatus_actual="A";
            $estatus="F";

            $sentencia=$pdo->prepare("UPDATE amp SET cant_existencia_lc=:cant_existencia_lc,
            cant_capdisp_lc=:cant_capdisp_lc,cant_existencia_ad=:cant_existencia_ad, 
            cant_capdisp_ad=;cant_capdisp_ad, estatus=:estatus WHERE
            estatus=:estatus_actual");
                
            $sentencia->bindParam(':estatus_actual',$estatus_actual,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$estatus,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_existencia_lc',$cant_existencia_lc,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_capdisp_lc',$cant_capdisp_lc,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_existencia_ad',$cant_existencia_ad,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_capdisp_ad',$cant_capdisp_ad,PDO::PARAM_STR);
            $sentencia->execute();

            $cant_cambiosAMP=$sentencia->rowCount();

        // Fin de actualizar AMP----------------------------------------------------------------------------

        // Actualizamos los montos y estatus de la tabla de almacén de productos terminados (AMP)
        
            $sentencia=$pdo->prepare("UPDATE apt SET 
            cant_e_qd=:cant_e_qd, cant_disp_qd=:cant_disp_qd,
            cant_e_moz=:cant_e_moz, cant_disp_moz=:cant_disp_moz,
            cant_e_gou=:cant_e_gou, cant_disp_gou=:cant_disp_gou,
            cant_e_die=:cant_e_die, cant_disp_die=:cant_disp_die,
            estatus=:estatus WHERE
            estatus=:estatus_actual");
                
            $sentencia->bindParam(':estatus_actual',$estatus_actual,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$estatus,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_qd',$cant_e_qd,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_qd',$cant_disp_qd,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_moz',$cant_e_moz,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_moz',$cant_disp_moz,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_gou',$cant_e_gou,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_gou',$cant_disp_gou,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_e_die',$cant_e_die,PDO::PARAM_STR);
            $sentencia->bindParam(':cant_disp_die',$cant_disp_die,PDO::PARAM_STR);

            $sentencia->execute();

            $cant_cambiosAPT=$sentencia->rowCount();

        // Fin de Actualizamos los montos y estatus de la tabla de almacén de productos terminados (AMP)



        // echo "<script> alert('Simulación Finalizada Satisfactoriamente...'); </script>";
        // $accion="C";
        $cantRegistros=0;
        $txtNro=0;
        $txtId="";
        $txtFechaInicio="";
        $txtEstatus="";
        $txtDescripcion="";
        //header('Location:simulacion.php');

        $mensaje_usuario="Simulación Finalizada Satisfactoriamente";
        $procesar="listo";
        $error_accion=0;

      break;

    }
  
  }

?>
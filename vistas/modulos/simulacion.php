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

      case "Eliminar";
          // echo "<script> alert('Quieres Eliminar Registro...'); </script>";
          // echo "<script> alert('Usuario Eliminado Satisfactoriamente...'); </script>";
          // header('Location:usuarios.php');

          $sentencia=$pdo->prepare("DELETE FROM Tblusuarios WHERE nro=:nro");
          $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
          $sentencia->execute();
      break;

      case "Actualizar";
          echo "<script> alert('Quieres Finalizar Simulación...'); </script>";
          // echo "<script> alert('Usuario Eliminado Satisfactoriamente...'); </script>";
          // header('Location:usuarios.php');
      break;
    }
  
  }

?>
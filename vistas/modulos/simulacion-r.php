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

  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);

    switch($accion){

      case "Guardar";
          // echo "<script> alert('Quieres cancelar Operación...'); </script>";

          $idsimulacion=($_POST["txtidsimulacion"]);
          $fechainicio=($_POST["fechainicio"]);
          $descrip=($_POST["txtdescrip"]);
          $estatus="A";
          $fechareg=($_POST["fechainicio"]);
          $usuario_reg=$usuariosesion['nro'];
          $estatus_reg="A";

          $sentencia=$pdo->prepare("INSERT INTO simulacion(nro,id,fecha_inicio,descripcion,estatus,fecha_reg,usuario_reg,estatus_reg) 
          VALUES (NULL, :id, :fecha_inicio, :descripcion, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

          $sentencia->bindParam(':id',$idsimulacion,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_inicio',$fechainicio);
          $sentencia->bindParam(':descripcion',$descrip,PDO::PARAM_STR);
          $sentencia->bindParam(':estatus',$estatus,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_reg',$fechareg);
          $sentencia->bindParam(':usuario_reg',$usuario_reg,PDO::PARAM_INT);
          $sentencia->bindParam(':estatus_reg',$estatus_reg);
          $sentencia->execute();

          $procesar="Listo";
          $mensaje_usuario="Simulación Creada Satisfactoriamente";
          $error_accion=1;

      break;

      case "Cancelar";
          // echo "<script> alert('Quieres cancelar Operación...'); </script>";
          $procesar="ok";
          header('Location:simulacion.php');
      break;

      case "Aceptar";
          // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
          $procesar="ok";
          header('Location:simulacion.php');
      break;

    }
  }
?>
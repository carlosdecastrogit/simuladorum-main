<?php
  include('../controladores/global/conexion.php');
  include('../controladores/global/sesiones.php');
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

  // Selección de Almacén
  if ($txtUsuarioTipo=="A") {
    $sentencia=$pdo->prepare("SELECT * FROM `amp` WHERE estatus='A'");
    $sentencia->execute();
    $listado_amp=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $cant_amp=$sentencia->rowCount();
    // echo "<script> alert('El usuario es ADMINISTRADOR...'); </script>";
    //print_r($cant_amp);

  }else{
    // Selecciona almacen del usuario
    $sentencia=$pdo->prepare("SELECT * FROM `amp` WHERE estatus='A' AND usuario_reg=$txtUsuario");
    $sentencia->execute();
    $listado_amp=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    $cant_amp=$sentencia->rowCount(); 

    if ($cant_amp>=1){
      foreach($listado_amp as $amp){
        $NroEmpresa= $amp['nro_empresa'];
        $NroAMP=$amp['nro'];
        $txtCant_capmax_lc=$amp['cant_capmax_lc'];
        $txtCant_existencia_lc=$amp['cant_existencia_lc'];
        $txtCant_capdisp_lc=$amp['cant_capdisp_lc'];
        $txtCant_capmax_ad=$amp['cant_capmax_ad'];
        $txtCant_existencia_ad=$amp['cant_existencia_ad'];
        $txtCant_capdisp_ad=$amp['cant_capdisp_ad'];
      }
      // Rescata Nombre de la Empresa
      $sentencia=$pdo->prepare("SELECT nombre FROM `empresa` WHERE estatus='A' AND usuario=$txtUsuario");
      $sentencia->execute();
      $listado_empresa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      foreach($listado_empresa as $empresa){
        $txtEmpresa=$empresa['nombre'];
      }
      // selecciona movimientos de almacen
      $sentencia=$pdo->prepare("SELECT * FROM `amp_mov` WHERE estatus='A' AND nro_empresa=$NroEmpresa AND usuario_reg=$txtUsuario");
      $sentencia->execute();
      $listado_amp_mov=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      $cant_amp_mov=$sentencia->rowCount();                           

    }else {
      $encontrado="NO";
      $txtEmpresa="";
      $procesar="ok"; //Muestra Vista normal
      $error_accion=0; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
      $mensaje_usuario="NO HAY MOVIMIENTOS";
    }
  }
  // --------------------------------------------------------------------------------



?>
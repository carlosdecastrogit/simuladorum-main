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
    $error_accion=0; // Valor 0 si todo va normal
    $mensaje_usuario=""; // Vacío en inicalización

 // Selección de Empresa / Entorno
 if ($txtUsuarioTipo=="A") {
    $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A'");
    $sentencia->execute();
    $listado_entorno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $cant_entorno=$sentencia->rowCount();
    // echo "<script> alert('El usuario es ADMINISTRADOR...'); </script>";
    //print_r($cant_entorno);

    // Selecciona los registro de bitacora para todas las empresas
    $sentencia=$pdo->prepare("SELECT * FROM `bitacora` WHERE estatus='A' ");
    $sentencia->execute();
    $listabitacora=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    // print_r($listausuarios);

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

      // Selecciona los registro de bitacora para todas las empresas
      $sentencia=$pdo->prepare("SELECT * FROM `bitacora` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
      $sentencia->execute();
      $listabitacora=$sentencia->fetchAll(PDO::FETCH_ASSOC);
      // print_r($listausuarios);
      // print_r($txtNombre_empresa);
      // print_r("</br>");
      // print_r($txtNro_empresa);
      // print_r("</br>");
      
    }else{
       // Variables de Acción
       $procesar="listo"; //Muestra Vista normal
       $error_accion=2; // Valor 0 si todo va normal
       $mensaje_usuario="NO HAY ENTORNO CREADO"; // Vacío en inicalización
    }
        
  }

?>
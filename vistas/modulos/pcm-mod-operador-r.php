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
  $calcular="NO";

// Valores iniciales
  $txtCant_horas_sem=1.00;
  $txtCant_horas_max_sem=1.00;
  
// Selección de Empresa / Entorno
  if ($txtUsuarioTipo=="A") {
    $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A'");
    $sentencia->execute();
    $listado_empresa=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $listado_empresa=$sentencia->rowCount();
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
  }
//----------------------------------------------------------------------------------------------

//Recepción de Post-----------------------------------------------------------------------------
  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);
    

    // Variables de Datos---------------------------------------------
    $txtNro=0;
    $txtId=($_POST["txtId"]);
    $txtNro_empresa=($_POST["txtEmpresa"]);
    $txtNombre=($_POST["txtNombre"]);
    $txtCargo=($_POST["txtCargo"]);
    $txtCant_horas_sem=($_POST["txtCant_horas_sem"]);
    $txtCant_horas_max_sem=($_POST["txtCant_horas_max_sem"]);
    $txtCant_total_horas_trab=0.00;
    $txtEstatus="A";
    $txtFecha_reg=date("Y/m/d");
    $txtUsuario_reg=$txtUsuario;
    $txtEstatus_reg="A";

    // -----------------------------------------------------------------

    switch($accion){

      case "Guardar";
          // echo "<script> alert('Quieres Guardar Operación...'); </script>";
          // header('Location:usuarios.php');

          $sentencia=$pdo->prepare("INSERT INTO pcm_mod_operador (nro,id,nro_empresa,nombre,cargo,cant_horas_sem,
          cant_horas_max_sem,cant_total_horas_trab,estatus,fecha_reg,usuario_reg,estatus_reg)  
          VALUES (NULL, :id, :nro_empresa, :nombre, :cargo, :cant_horas_sem, :cant_horas_max_sem, 
          :cant_total_horas_trab, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

          $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
          $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_INT);
          $sentencia->bindParam(':nombre',$txtNombre,PDO::PARAM_STR);
          $sentencia->bindParam(':cargo',$txtCargo,PDO::PARAM_STR);
          $sentencia->bindParam(':cant_horas_sem',$txtCant_horas_sem,PDO::PARAM_STR);
          $sentencia->bindParam(':cant_horas_max_sem',$txtCant_horas_max_sem,PDO::PARAM_STR);
          $sentencia->bindParam(':cant_total_horas_trab',$txtCant_total_horas_trab,PDO::PARAM_STR);
          $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
          $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
          $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
          $sentencia->execute();

          // echo "<br>";
          // print_r("Nro: ".$txtNro);
          // echo "<br>";
          // print_r("ID: ".$txtId);
          // echo "<br>";
          // print_r("Fecha: ".$txtFecha);
          // echo "<br>";
          // print_r("Empresa: ".$txtEmpresa);
          // echo "<br>";
          // print_r("ID Empresa: ".$txtIdEmpresa);
          // echo "<br>";
          // print_r("Observación: ".$txtObservacion);
          // echo "<br>";
          // print_r("Monto Multa: ".$txtMontoMulta);
          // echo "<br>";
          // print_r("Fecha de Pago: ".$txtFechaPago);
          // echo "<br>";
          // print_r("Estatus: ".$txtEstatus);
          // echo "<br>";
          // print_r("Fecha de Registro: ".$txtFecha_reg);
          // echo "<br>";
          // print_r("Usuario del Registro: ".$txtUsuario_reg);
          // echo "<br>";
          // print_r("Estatus de Registro: ".$txtEstatus_reg);
          // echo "<br>";
          // print_r("Ciclo: ".$txtCiclo);
          // echo "<br>";
          
          // echo "<script> alert('Bitacora Registrada Satisfactoriamente...'); </script>";
          $procesar="Listo";
          $error_accion=1; 
          $mensaje_usuario="Registro Satisfactorio...";

      break;

      case "Cancelar";
          // echo "<script> alert('Quieres cancelar Operación...'); </script>";
          $procesar="ok";
          header('Location:pcm-mod-operador.php');
      break;

      case "Aceptar";
          // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
          $procesar="ok";
          header('Location:pcm-mod-operador.php');
      break;

      case "Actualizar";
          // echo "<script> alert('Quieres Actualizar Registro...'); </script>";

              $sentencia=$pdo->prepare("UPDATE Tblusuarios SET 
              clave=:clave,
              nombre=:nombre WHERE
              nro=:nro");
              
              $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
              $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
              $sentencia->bindParam(':clave',$password1,PDO::PARAM_STR);
              $sentencia->execute();

              $accion="C";
              $mensaje_usuario="Usuario Actualizado Satisfactoriamente";
              $procesar="listo";

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
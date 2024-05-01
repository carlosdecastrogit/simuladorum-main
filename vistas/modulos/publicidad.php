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

// Variables de datos ---------------------------------------
  $txtpub_dub_arm=0.00;
  $txtpub_dub_ciu=0.00;
  $txtpub_dub_sfi=0.00;
  $txtpub_dub_lsa=0.00;
  
  $txtpub_moz_arm=0.00;
  $txtpub_moz_ciu=0.00;
  $txtpub_moz_sfi=0.00;
  $txtpub_moz_lsa=0.00;

  $txtpub_gou_arm=0.00;
  $txtpub_gou_ciu=0.00;
  $txtpub_gou_sfi=0.00;
  $txtpub_gou_lsa=0.00;
  
  $txtpub_die_arm=0.00;
  $txtpub_die_ciu=0.00;
  $txtpub_die_sfi=0.00;
  $txtpub_die_lsa=0.00;

// ----------------------------------------------------------

 

// inicialización de variables
  $txtTotal_inversion=0.00;
  
// Selección de Empresa / Entorno y operador
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

    if ($cant_empresa>=1){
      foreach($listado_empresa as $empresa){
          $txtNro_empresa=$empresa['nro'];
          $txtNombre_empresa=$empresa['nombre'];
      }
      // Selecciono publicidad de la empresa  ---------------------------------------------------------
        $sentencia=$pdo->prepare("SELECT * FROM `publicidad` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
        $sentencia->execute();
        $listado_publicidad=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        $cant_publicidad=$sentencia->rowCount();
        
        if($cant_publicidad>=1){
          $txtNombre_publicidad=" encontró publicidad";
        }else{
          $txtNombre_publicidad="No se encontró publicidad";
        }
      // -----------------------------------------------------------------------------------------------
    }else{
      $procesar="listo"; //Muestra Vista normal
      $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
      $mensaje_usuario="No se encontró empresa asociada"; // Vacío en inicalización
    }
  }
//----------------------------------------------------------------------------------------------

//Recepción de Post-----------------------------------------------------------------------------
if(isset($_POST["btn_accion"])){

  $accion=($_POST["btn_accion"]);
  

  // Variables de Datos---------------------------------------------
  
  $txtNro=0;

  $txtNro_empresa=($_POST["txtEmpresa"]);
  $txtNro_operador=($_POST["txtOperador"]);


  // -----------------------------------------------------------------

  switch($accion){
    case "Ver";
        // echo "<script> alert('Quieres Guardar Operación...'); </script>";
        // header('Location:usuarios.php');
        
        // Selección de movimientos por usuario, empresa y operador
        $sentencia=$pdo->prepare("SELECT * FROM `pcm_mod_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_operador=$txtNro_operador ORDER BY ciclo ");
        $sentencia->execute();
        $listado_pcm_mod=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    break;
    case "Calcular";
        // echo "<script> alert('Quieres Guardar Operación...'); </script>";
        // header('Location:usuarios.php');
        

        $calcular="SI";
              
    break;
    case "Guardar";
        // echo "<script> alert('Quieres Guardar Operación...'); </script>";
        // header('Location:usuarios.php');

        $sentencia=$pdo->prepare("INSERT INTO pcm_mod_mov (nro,id,nro_empresa,nro_operador,ciclo,fecha,
        cant_total_horas_trab,monto_pago_hora,monto_pago_adicional,monto_total_jornada,cant_porcentaje_trab,
        emoji1,emoji2,estatus,fecha_reg,usuario_reg,estatus_reg)  
        VALUES (NULL, :id, :nro_empresa, :nro_operador, :ciclo, :fecha, :cant_total_horas_trab,
        :monto_pago_hora, :monto_pago_adicional, :monto_total_jornada, :cant_porcentaje_trab,
        :emoji1, :emoji2, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

        $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
        $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_INT);
        $sentencia->bindParam(':nro_operador',$txtNro_operador,PDO::PARAM_STR);
        $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
        $sentencia->bindParam(':fecha',$txtFecha,PDO::PARAM_STR);
        $sentencia->bindParam(':cant_total_horas_trab',$txtCant_total_horas_trab,PDO::PARAM_STR);
        $sentencia->bindParam(':monto_pago_hora',$txtMonto_pago_hora,PDO::PARAM_STR);
        $sentencia->bindParam(':monto_pago_adicional',$txtMonto_pago_adicional,PDO::PARAM_STR);
        $sentencia->bindParam(':monto_total_jornada',$txtMonto_total_jornada,PDO::PARAM_STR);
        $sentencia->bindParam(':cant_porcentaje_trab',$txtCant_porcentaje_trab,PDO::PARAM_STR);
        $sentencia->bindParam(':emoji1',$txtEmoji1,PDO::PARAM_STR);
        $sentencia->bindParam(':emoji2',$txtEmoji2,PDO::PARAM_STR);
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
// -------------------------------------------------------------------------------------------
?>
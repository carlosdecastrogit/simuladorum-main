<?php
  include('../controladores/global/sesiones.php');
  include('../controladores/global/conexion.php');

    //Datos del Usuario
    $usuariosesion=($_SESSION['usuario']);
    $txtUsuario=$usuariosesion['nro'];
    $txtIdUsuario=$usuariosesion['id'];
    $txtUsuarioTipo=$usuariosesion['tipo'];
    //----------------------------------------

    // Variables de Acción
    $procesar="ok"; //Muestra Vista normal
    $error_accion=0; // Valor 0 si todo va normal
    $mensaje_usuario=""; // Vacío en inicalización

    // Selección de Empresa / Entorno
    if ($txtUsuarioTipo=="A") {
      $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A'");
      $sentencia->execute();
      $listado_empresa=$sentencia->fetchAll(PDO::FETCH_ASSOC);

      $cant_entorno=$sentencia->rowCount();
      //echo "<script> alert('El usuario es ADMINISTRADOR...'); </script>";
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
    }

    // Variables de Datos
    $txtId=" ";
    $txtObservacion="";
    $txtFecha=date("Y/m/d");
    $txtMontoMulta=0.00;
    $txtFechaPago=date("Y/m/d");

  //Recepción de Post
  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);
    

    // Variables de Datos
    $txtNro=($_POST["txtNro"]);
    $txtId="Sin Id";
    $txtFecha=($_POST["txtFecha"]);
    $txtNro_empresa=($_POST["txtNro_empresa"]); 
    //print_r($txtNro_empresa);
    $txtObservacion=($_POST["txtObservacion"]);
    $txtMontoMulta=($_POST["txtMontoMulta"]);
    $txtFechaPago=($_POST["txtFechaPago"]);
    $txtEstatus=($_POST["txtEstatus"]);
    $txtFecha_reg=($_POST["txtFecha_reg"]);
    $txtUsuario_reg=($_POST["txtUsuario_reg"]);
    $txtEstatus_reg=($_POST["txtEstatus_reg"]);
    $txtCiclo=($_POST["txtCiclo"]);

    switch($accion){

        case "C";
            //echo "<script> alert('Quieres Consultar...'); </script>";
            $procesar="ok";
        break;
    
        case "E";
            //echo "<script> alert('Quieres Editar...'); </script>";
            $procesar="ok";
        break;
    
        case "X";
            //echo "<script> alert('Quieres Eliminar...'); </script>";
            $procesar="ok";
        break;

        case "Guardar";
            // echo "<script> alert('Quieres Guardar Operación...'); </script>";
            // header('Location:usuarios.php');

            $sentencia=$pdo->prepare("INSERT INTO bitacora (nro,id,fecha,nro_empresa,observacion,monto_multa,fecha_pago,estatus,fecha_reg,usuario_reg,estatus_reg,ciclo)  
            VALUES (NULL, :id, :fecha, :nro_empresa, :observacion, :monto_multa, :fecha_pago, :estatus, :fecha_reg, :usuario_reg, :estatus_reg, :ciclo)");

            $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha',$txtFecha);
            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_INT);
            $sentencia->bindParam(':observacion',$txtObservacion,PDO::PARAM_STR);
            $sentencia->bindParam(':monto_multa',$txtMontoMulta,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_pago',$txtFechaPago,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
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

        case "Actualizar";
            // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
            
            $sentencia=$pdo->prepare("UPDATE bitacora SET 
            ciclo=:ciclo,
            nro_empresa=:nro_empresa,
            fecha=:fecha,
            monto_multa=:monto_multa,
            fecha_pago=:fecha_pago,
            observacion=:observacion
            WHERE
            nro=:nro");
                
            $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
            $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_INT);
            $sentencia->bindParam(':fecha',$txtFecha);
            $sentencia->bindParam(':monto_multa',$txtMontoMulta,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_pago',$txtFechaPago,PDO::PARAM_STR);
            $sentencia->bindParam(':observacion',$txtObservacion,PDO::PARAM_STR);
            $sentencia->execute();

            // echo "<script> alert('Los Password son iguales...'); </script>";
            $accion="C";
            $mensaje_usuario="Usuario Actualizado Satisfactoriamente";
            $procesar="listo";
            $error_accion=1; 

        break;

        case "Eliminar";
            // echo "<script> alert('Quieres Eliminar Registro...'); </script>";
            // echo "<script> alert('Usuario Eliminado Satisfactoriamente...'); </script>";
            // header('Location:usuarios.php');

            $sentencia=$pdo->prepare("DELETE FROM bitacora WHERE nro=:nro");
            $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
            $sentencia->execute();

            $procesar="listo";
            $accion="C";
            $error_accion=1;
            $mensaje_usuario="Registro Eliminado Satisfactoriamente...";

        break;

        case "Cancelar";
        // echo "<script> alert('Quieres cancelar Operación...'); </script>";
        $procesar="ok";
        header('Location:bitacora.php');
        break;

        case "Aceptar";
            // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
            $procesar="ok";
            header('Location:bitacora.php');
        break;
    }
  }
    

?>
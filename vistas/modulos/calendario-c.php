<?php
  include('../controladores/global/sesiones.php');
  include('../controladores/global/conexion.php');

    //Datos del Usuario
    $usuariosesion=($_SESSION['usuario']);
    $txtUsuario=$usuariosesion['nro'];
    $txtIdUsuario=$usuariosesion['id'];
    //----------------------------------------

    // Variables de Acción
    $procesar="ok"; //Muestra Vista normal
    $error_accion=0; // Valor 0 si todo va normal
    $mensaje_usuario=""; // Vacío en inicalización



    // Selección de Empresas
    // $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A'");
    // $sentencia->execute();
    // $listaempresa=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    // Variables de Datos
    $txtId=" ";
    $txtFecha=date("d/m/Y");
    $txtObservacion="";


  //Recepción de Post
  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);
    
    // Variables de Datos
    $txtNro=($_POST["txtNro"]);
    $txtId=($_POST["txtId"]);
    $txtFecha=($_POST["txtFecha"]);
    $txtObservacion=($_POST["txtObservacion"]);
    $txtEstatus=($_POST["txtEstatus"]);
    $txtFecha_reg=($_POST["txtFecha_reg"]);
    $txtUsuario_reg=($_POST["txtUsuario_reg"]);
    $txtEstatus_reg=($_POST["txtEstatus_reg"]);


    switch($accion){
        case "Consultar";
            // echo "<script> alert('Quieres Consultar...'); </script>";
            $procesar="ok";
        break;
    
        case "Editar";
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

            $sentencia=$pdo->prepare("INSERT INTO calendario (nro,id,fecha,observacion,estatus,fecha_reg,usuario_reg,estatus_reg)  
            VALUES (NULL, :id, :fecha, :observacion, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

            $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha',$txtFecha);
            $sentencia->bindParam(':observacion',$txtObservacion,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
            $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
            $sentencia->execute();
            
            // echo "<script> alert('Bitacora Registrada Satisfactoriamente...'); </script>";
            $procesar="Listo";
            $error_accion=1; 
            $mensaje_usuario="Registro Satisfactorio...";

        break;

        case "Cancelar";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            $procesar="ok";
            header('Location:calendario.php');
        break;

        case "Aceptar";
            // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
            $procesar="ok";
            header('Location:calendario.php');
        break;

        case "Actualizar";
            // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
            $sentencia=$pdo->prepare("UPDATE calendario SET 
            id=:id,
            fecha=:fecha,
            observacion=:observacion WHERE
            nro=:nro");
                    
            $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
            $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
            $sentencia->bindParam(':fecha',$txtFecha);
            $sentencia->bindParam(':observacion',$txtObservacion,PDO::PARAM_STR);
            $sentencia->execute();

            $procesar="Listo";
            $error_accion=1; 
            $mensaje_usuario="Registro Actualizado Satisfactoriamente...";

        break;

        case "Eliminar";
            // echo "<script> alert('Quieres Eliminar Registro...'); </script>";
            // echo "<script> alert('Usuario Eliminado Satisfactoriamente...'); </script>";
            // header('Location:usuarios.php');
            $txtEstatus="F";
            $txtEstatus_reg="E";

            $sentencia=$pdo->prepare("UPDATE calendario SET 
            estatus=:estatus,
            estatus_reg=:estatus_reg WHERE
            nro=:nro");
                    
            $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
            $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
            $sentencia->execute();

            $procesar="Listo";
            $error_accion=2; 
            $mensaje_usuario="Registro Eliminado Satisfactoriamente...";
        break;
    }
  }
    


?>
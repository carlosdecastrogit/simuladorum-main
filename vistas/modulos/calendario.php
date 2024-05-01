<?php
    include('../controladores/global/sesiones.php');
    include('../controladores/global/conexion.php');

    //Datos del Usuario
    $usuariosesion=($_SESSION['usuario']);
    $txtUsuario=$usuariosesion['nro']; // código del usuario
    $txtIdUsuario=$usuariosesion['id'];
    $txtUsuarioTipo=$usuariosesion['tipo'];
    //-------------------------------------------------------------------------------

    // Selección de calendario activo
    $sentencia=$pdo->prepare("SELECT * FROM `calendario` WHERE estatus='A'");
    $sentencia->execute();
    $calendario_activo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $cant_calendario=$sentencia->rowCount();
    // --------------------------------------------------------------------------------

    // Obtener datos del calendario
   if ($cant_calendario>0) {
        foreach ($calendario_activo as $calendario){
            // Obtener fecha
            $fecha_calendario=$calendario['fecha'];
            $fecha_str=strtotime($fecha_calendario);
            $dia_calendario=date( "j", $fecha_str);
            $mes_calendario=date("n", $fecha_str);
            $ano_calendario=date("Y", $fecha_str);
            // Obtener datos
            $txtNro=$calendario['nro'];
            $txtId=$calendario['id'];
            $txtFecha=$calendario['fecha'];
            $txtObservacion=$calendario['observacion'];
            $txtEstatus=$calendario['estatus'];
            $txtFecha_reg=$calendario['fecha_reg'];
            $txtUsuario_reg=$calendario['usuario_reg'];
            $txtEstatus_reg=$calendario['estatus_reg'];
        }
  

        switch($mes_calendario){

            case "1";
                $mes_texto="Enero";
                $mes_texto2="Febrero";
            break;
            case "2";
                $mes_texto="Febrero";
                $mes_texto2="Marzo";
            break;
            case "3";
                $mes_texto="Marzo";
                $mes_texto2="Abril";
            break;
            case "4";
                $mes_texto="Abril";
                $mes_texto2="Mayo";
            break;
            case "5";
                $mes_texto="Mayo";
                $mes_texto2="Junio";
            break;
            case "6";
                $mes_texto="Junio";
                $mes_texto2="Julio";
            break;
            case "7";
                $mes_texto="Julio";
                $mes_texto2="Agosto";
            break;
            case "8";
                $mes_texto="Agosto";
                $mes_texto2="Septiembre";
            break;
            case "9";
                $mes_texto="Septiembre";
                $mes_texto2="Actubre";
            break;
            case "10";
                $mes_texto="Octubre";
                $mes_texto2="Noviembre";
            break;
            case "11";
                $mes_texto="Noviembre";
                $mes_texto2="Diciembre";
            break;
            case "12";
                $mes_texto="Diciembre";
                $mes_texto2="Enero";
            break;

        }
    }
    // --------------------------------------------------------------------------------



    // Variables de Acción
    $procesar="ok"; //Muestra Vista normal
    $error_accion=0; // Valor 0 si todo va normal
    $mensaje_usuario=""; // Vacío en inicalización
    //-------------------------------------------------------------------------------



    // Variables de Datos

    //-------------------------------------------------------------------------------

  //Recepción de Post
  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);

    // Variables de Datos
    $txtNro=($_POST["txtNro"]);
    $txtId="Sin Id";
    $txtFecha=($_POST["txtFecha"]);
    $txtEmpresa=($_POST["txtEmpresa"]); 
    $txtIdEmpresa=($_POST["txtIdEmpresa"]);
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
        break;

        case "Guardar";
            // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
            
            $sentencia=$pdo->prepare("UPDATE bitacora SET 
            ciclo=:ciclo,
            empresa=:empresa,
            fecha=:fecha,
            monto_multa=:monto_multa,
            fecha_pago=:fecha_pago,
            observacion=:observacion
            WHERE
            nro=:nro");
                
            $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
            $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
            $sentencia->bindParam(':empresa',$txtEmpresa,PDO::PARAM_INT);
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
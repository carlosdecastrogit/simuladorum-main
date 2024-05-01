<?php
    include('../controladores/global/sesiones.php');
    include('../controladores/global/conexion.php');

    //Datos del Usuario
    $usuariosesion=($_SESSION['usuario']);
    $txtUsuario=$usuariosesion['nro'];
    $txtIdUsuario=$usuariosesion['id'];
    $txtUsuarioTipo=$usuariosesion['tipo'];

    // Variables de Acción
    $procesar="ok"; //Muestra Vista normal
    $error_accion=0; // Valor 0 si todo va normal
    $mensaje_usuario=""; // Vacío en inicalización

  //Recepción de Post
  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);

    if ($accion=="Actualizar") {
        $txtNro=($_POST["txtNro"]);
        $txtNro_empresa_activa=($_POST["txtEmpresa"]);
    }else{
        $txtNro=($_POST["txtEmpresa"]);
    }

    switch($accion){

        case "Guardar";
            // echo "<script> alert('Quieres Guardar Operación...'); </script>";
            // header('Location:usuarios.php');
            
        break;
        

        case "Consultar";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            // header('Location:entorno.php');
            $varEstatus="A";
            $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus=:estatus and nro=:nro");
            $sentencia->bindParam("estatus",$varEstatus,PDO::PARAM_STR);
            $sentencia->bindParam("nro",$txtNro,PDO::PARAM_STR);
            $sentencia->execute();
            $EntornoSeleccionado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        
            $cant_entorno=$sentencia->rowCount();
          
            if ($cant_entorno>=1){
        
                foreach ($EntornoSeleccionado as $entorno){
        
                    //Variables de Datos ------------------------------------- |
                    $txtId=$entorno['id'];
                    $txtUsuarioe=$entorno['usuario'];
                    $txtIdUsuarioe=$entorno['id_usuario'];
                    $txtFecha_Creacion=$entorno['fecha_creacion'];   
                    $txtNombre=$entorno['nombre'];
                    $txtEstructura=$entorno['estructura'];
                    $txtDepartamentos=$entorno['departamentos'];
                    $txtOrganigrama=$entorno['organigrama'];
                    $txtMonto_Presupuesto=$entorno['monto_presupuesto'];
                    $txtMonto_Saldo_Actual=$entorno['monto_saldo_actual'];
                    $txtMonto_Multas=$entorno['monto_multas'];
                    $txtEstatus=$entorno['estatus'];
                    $txtIntegrantes=$entorno['integrantes'];
                    $txtFecha_reg=$entorno['fecha_reg'];
                    $txtUsuario_reg=$entorno['usuario_reg'];
                    $txtEstatus_reg=$entorno['estatus_reg'];
                    // ------------------------------------------------------- |
        
                }

                // Sumar Multas ----------------------------------------------------------------------------
                
                $sentencia=$pdo->prepare("SELECT sum(monto_multa) FROM `bitacora` WHERE estatus='A' AND nro_empresa=$txtNro");
                $sentencia->execute();
                $suma_multas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                print_r($suma_multas);

                $cant_registros=$sentencia->rowCount();

                if ($cant_registros>=1){
                    foreach($suma_multas as $multas){
                        $txtMonto_Multas=$multas['sum(monto_multa)'];
                    }
                }
                
                // ----------------------------------------------------------------------------------------

                $sentenciaSQL=$pdo->prepare("SELECT `nombre` FROM tblusuarios WHERE nro=:nro");
                $sentenciaSQL->bindParam("nro",$txtUsuarioe,PDO::PARAM_STR);
                $sentenciaSQL->execute();
                $txtNombreUsuario=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
                //print_r($txtNombreUsuario);
        
            }
          $procesar="ok";
          $error_accion=0; // Valor 0 si todo va normal
          $mensaje_usuario=""; // Vacío en inicalización

        break;

        case "Cancelar";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            $procesar="ok";
            header('Location:entorno.php');
        break;

        case "Aceptar";
            // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
            $procesar="ok";
            header('Location:entorno.php');
        break;

        case "Modificar";
                // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
                $varEstatus="A";
                $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus=:estatus and nro=:nro");
                $sentencia->bindParam("estatus",$varEstatus,PDO::PARAM_STR);
                $sentencia->bindParam("nro",$txtNro,PDO::PARAM_STR);
                $sentencia->execute();
                $EntornoSeleccionado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
                $cant_entorno=$sentencia->rowCount();
            
                if ($cant_entorno>=1){
            
                    foreach ($EntornoSeleccionado as $entorno){
            
                        //Variables de Datos ------------------------------------- |
                        $txtId=$entorno['id'];
                        $txtUsuarioe=$entorno['usuario'];
                        $txtIdUsuarioe=$entorno['id_usuario'];
                        $txtFecha_Creacion=$entorno['fecha_creacion'];   
                        $txtNombre=$entorno['nombre'];
                        $txtEstructura=$entorno['estructura'];
                        $txtDepartamentos=$entorno['departamentos'];
                        $txtOrganigrama=$entorno['organigrama'];
                        $txtMonto_Presupuesto=$entorno['monto_presupuesto'];
                        $txtMonto_Saldo_Actual=$entorno['monto_saldo_actual'];
                        $txtMonto_Multas=$entorno['monto_multas'];
                        $txtEstatus=$entorno['estatus'];
                        $txtIntegrantes=$entorno['integrantes'];
                        $txtFecha_reg=$entorno['fecha_reg'];
                        $txtUsuario_reg=$entorno['usuario_reg'];
                        $txtEstatus_reg=$entorno['estatus_reg'];
                        // ------------------------------------------------------- |
            
                    }

                    $sentenciaSQL=$pdo->prepare("SELECT `nombre` FROM tblusuarios WHERE nro=:nro");
                    $sentenciaSQL->bindParam("nro",$txtUsuarioe,PDO::PARAM_STR);
                    $sentenciaSQL->execute();
                    $txtNombreUsuario=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
                    //print_r($txtNombreUsuario);

                    // Sumar Multas ----------------------------------------------------------------------------
                    $sentencia=$pdo->prepare("SELECT sum(monto_multa) FROM `bitacora` WHERE estatus='A' AND nro_empresa=$txtNro");
                    $sentencia->execute();
                    $suma_multas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    //print_r($suma_multas);

                    $cant_registros=$sentencia->rowCount();

                    if ($cant_registros>=1){
                        foreach($suma_multas as $multas){
                            $txtMonto_Multas=$multas['sum(monto_multa)'];
                        }
                    }
            
                }
                $procesar="ok";
                $error_accion=0; // Valor 0 si todo va normal
                $mensaje_usuario=""; // Vacío en inicalización
            

        break;

        case "Actualizar";
            //echo "<script> alert('Quieres Actualizar el Registro...'); </script>";
            // header('Location:usuarios.php');
            
            $txtId=($_POST["txtId"]);
            $txtNombre=($_POST["txtNombre"]);

            //print_r("Número:".$txtNro." ");
            //print_r("ID: ".$txtId." ");
            //print_r("Nombre: ".$txtNombre." ");
            
            $sentencia=$pdo->prepare("UPDATE empresa SET 
            id=:id,
            nombre=:nombre WHERE
            nro=:nro");
                    
            $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
            $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
            $sentencia->bindParam(':nombre',$txtNombre,PDO::PARAM_STR);
            $sentencia->execute();

            $procesar="listo";
            $error_accion=1; // Valor 0 si todo va normal
            $mensaje_usuario="Entorno Actualizado Satisfactoriamente"; // Vacío en inicalización

        break;

        case "Eliminar";
            // echo "<script> alert('Quieres Eliminar Registro...'); </script>";
            // echo "<script> alert('Usuario Eliminado Satisfactoriamente...'); </script>";
            // header('Location:usuarios.php');

            //$sentencia=$pdo->prepare("DELETE FROM Tblusuarios WHERE nro=:nro");
            //$sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
            //$sentencia->execute();
            
            // Verificar si la empresa tiene movimientos ----------------------------------------------------
            $sentenciaSQL=$pdo->prepare("SELECT * FROM empresa WHERE estatus='A' AND nro=:nro");
            $sentenciaSQL->bindParam('nro',$txtNro,PDO::PARAM_STR);
            $sentenciaSQL->execute();
            $MovimientosEmpresa=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
            //print_r($txtNombreUsuario);

            $cant_MovimientosEmpresa=$sentenciaSQL->rowCount();

            if ($cant_MovimientosEmpresa>=1){
                echo "<script> alert('Empresa tiene movimientos...'); </script>";
                $procesar="listo";
                $error_accion=2;
                $mensaje_usuario="NO SE PUEDE ELIMINAR. Empresa inició el proceso...";
            }else{
                echo "<script> alert('Empresa NO tiene movimientos...'); </script>";
                $txtEstatus="F";
                $txtEstatus_reg="E";

                // Elimina empresa
                $sentencia=$pdo->prepare("UPDATE empresa SET 
                estatus=:estatus,
                estatus_reg=:estatus_reg WHERE
                nro=:nro");
                        
                $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
                $sentencia->execute();
                //-----------------------------------------------------------------------

                // Elimina AMP
                $sentencia=$pdo->prepare("UPDATE amp SET 
                estatus=:estatus,
                estatus_reg=:estatus_reg WHERE
                nro_empresa=:nro");
                        
                $sentencia->bindParam(':nro',$txtNro,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
                $sentencia->execute();

                $procesar="listo";
                $error_accion=2;
                $mensaje_usuario="Registro Eliminado Satisfactoriamente...";
            }
            
            // ----------------------------------------------------------------------------------------------
            



            
        break;
    }
  }


?>
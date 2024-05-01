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
    $mensaje_entorno=""; // mensaje cuando entorno está vacío
    $entorno="SI"; 

    
  // Verifica los registros activos en simulación ---------------------------------------
    $sentencia=$pdo->prepare("SELECT * FROM `simulacion` WHERE estatus='A' ");
    $sentencia->execute();
    $lista_simulacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $cantsimulacion=$sentencia->rowCount();
    //print_r($cantRegistros);
    //print_r($listasimulacion);
// ------------------------------------------------------------------------------------

    // Selección de entorno
    if ($txtUsuarioTipo=="A") {
        $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A'");
        $sentencia->execute();
        $listado_entorno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        $cant_entorno=$sentencia->rowCount();
        // echo "<script> alert('El usuario es ADMINISTRADOR...'); </script>";
        //print_r($cant_entorno);

        if ($cant_entorno<=0){
            $entorno="NO";
            $mensaje_entorno="NO HAY EMPRESAS ACTIVAS PARA LA SIMULACIÓN";
        }else{
            foreach ($listado_entorno as $empresa){
                $txtNombre=$empresa['nombre'];
                //print_r($txtNombre);
            }
        }

    }else{
        $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A' AND usuario=$txtUsuario");
        $sentencia->execute();
        $listado_entorno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        $cant_entorno=$sentencia->rowCount(); 
        //print_r($cant_entorno);
        //print_r("|");
        //print_r($listado_entorno);

        if ($cant_entorno<=0){
            $entorno="NO";
            $mensaje_entorno="USUARIO NO TIENE EMPRESA REGISTRADA";
        }else{
            foreach ($listado_entorno as $empresa){
                $txtNombre=$empresa['nombre'];
                // print_r($txtNombre);
            }
        }
        // echo "<script> alert('El usuario es PARTICIPANTE...'); </script>";
    }
    // --------------------------------------------------------------------------------

  


  // Variables de Datos
  //$txtNombre="";
  //$txtFecha_reg=date("Y/m/d");
  $txtFecha_reg=date("Y/m/d");

  //$txtFecha_reg="2024/03/28";
  //print_r($txtFecha_reg);

  
//Recepción de Post  --------------------------------------------------------------------------------------
  if(isset($_POST["btn_accion"])){

    $accion=($_POST["btn_accion"]);
    
    //Variables de Datos
    $txtNro=0;
    $txtId="";
    $txtFechaCreacion=($_POST["txtFecha_reg"]);   
    $txtNombre=($_POST['txtNombre']);
    $txtEstructura="Estandar";
    $txtDepartamentos="Estandar";
    $txtOrganigrama="Estandar";
    $txtMontoPresupuesto=0.00;
    $txtMontoSaldoActual=0.00;
    $txtMontoMultas=0.00;
    $txtEstatus="A";
    $txtIntegrantes=" ";
    //$txtFecha_reg=date("Y/m/d");
    $txtFecha_reg=($_POST["txtFecha_reg"]);
    //print_r($txtFecha_reg);
    $txtUsuario_reg=$txtUsuario;
    $txtEstatus_reg="A";
    // ----------------------------


    switch($accion){

      case "Guardar";
          // echo "<script> alert('Quieres Guardar Operación...'); </script>";
          // header('Location:usuarios.php');

          $sentencia=$pdo->prepare("INSERT INTO empresa(nro,id,usuario,id_usuario,fecha_creacion,nombre,estructura,departamentos,organigrama,monto_presupuesto,monto_saldo_actual,monto_multas,estatus,integrantes,fecha_reg,usuario_reg,estatus_reg) 
          VALUES (NULL, :id, :usuario, :id_usuario, :fecha_creacion, :nombre, :estructura, :departamentos,:organigrama, :monto_presupuesto,:monto_saldo_actual, :monto_multas, :estatus, :integrantes, :fecha_reg, :usuario_reg, :estatus_reg)");

          $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
          $sentencia->bindParam(':usuario',$txtUsuario,PDO::PARAM_STR);
          $sentencia->bindParam(':id_usuario',$txtIdUsuario,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_creacion',$txtFechaCreacion);
          $sentencia->bindParam(':nombre',$txtNombreEmpresa,PDO::PARAM_STR);
          $sentencia->bindParam(':estructura',$txtEstructura,PDO::PARAM_STR);
          $sentencia->bindParam(':departamentos',$txtDepartamentos,PDO::PARAM_STR);
          $sentencia->bindParam(':organigrama',$txtOrganigrama,PDO::PARAM_STR);
          $sentencia->bindParam(':monto_presupuesto',$txtMontoPresupuesto,PDO::PARAM_STR);
          $sentencia->bindParam(':monto_saldo_actual',$txtMontoSaldoActual,PDO::PARAM_STR);
          $sentencia->bindParam(':monto_multas',$txtMontoMultas,PDO::PARAM_STR);
          $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
          $sentencia->bindParam(':integrantes',$txtIntegrantes,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_reg',$txtFecha_reg);
          $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_INT);
          $sentencia->bindParam(':estatus_reg',$txtEstatus_reg);
          $sentencia->execute();

          echo "<script> alert('Entorno Creado Satisfactoriamente...'); </script>";

      break;

      case "Cancelar";
          // echo "<script> alert('Quieres cancelar Operación...'); </script>";
          $procesar="ok";
          header('Location:inicio.php');
      break;

      case "Aceptar";
          // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
          $procesar="ok";
          header('Location:inicio.php');
      break;

      case "Actualizar";
          // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
          if ($password1==$password2){

              $sentencia=$pdo->prepare("UPDATE Tblusuarios SET 
              clave=:clave,
              nombre=:nombre WHERE
              nro=:nro");
              
              $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
              $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
              $sentencia->bindParam(':clave',$password1,PDO::PARAM_STR);
              $sentencia->execute();

              // echo "<script> alert('Los Password son iguales...'); </script>";
              $accion="C";
              $mensaje_usuario="Usuario Actualizado Satisfactoriamente";
              $procesar="listo";
          }else{
              // echo "<script> alert('Los Password no son iguales...'); </script>";
              $accion="E";
              $mensaje_usuario="No se pudo actualizar, claves no coinciden";
              $error_accion=2;
              $procesar="ok";
          }

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
// . Fin recepción de Post  --------------------------------------------------------------------------------------



?>
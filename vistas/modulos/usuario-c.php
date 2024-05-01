<?php
  include('../controladores/global/sesiones.php');
  include('../controladores/global/conexion.php');

  $usuariosesion=$_SESSION['usuario'];

  if(isset($_POST["btnaccion"])){

    $mensaje_usuario="";
    $error_accion=1;
    // De la BD
    $nro=($_POST["txtnro"]);
    $id=($_POST["txtid"]);
    $nombre=($_POST["txtnombre"]);
    $usuario=($_POST["txtusuario"]);
    $tipo=($_POST["txttipo"]);
    $password1=($_POST["txtpassword1"]);
    $password2=($_POST["txtpassword2"]);

    
    if ($tipo=="P"){
        $tipousuario="Participante";
    }else {
        $tipousuario="Administrador";
    }

    // if ($tipo=="P" OR $tipo=="A"){
    //    $tipousuario=($_POST["txttipo"]);
    // }
    
    $fecha_reg=($_POST["txtfecha_reg"]);
    $accion=($_POST["btnaccion"]);

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

        case "Cancelar";
            // echo "<script> alert('Quieres cancelar Operación...'); </script>";
            $procesar="ok";
            header('Location:usuarios.php');
        break;

        case "Aceptar";
            // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
            $procesar="ok";
            header('Location:usuarios.php');
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

  }else{
    echo "<script> alert('No entró...'); </script>";
  }
  
?>
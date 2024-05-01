<?php
  include('../controladores/global/sesiones.php');
  include('../controladores/global/conexion.php');

  $usuariosesion=$_SESSION['usuario'];
  $procesar="ok";
  $id="";
  $nombre="";
  $tipo="";
  $txtemail="";
  $txtpassword1="";
  $txtpassword2="";
  $mensaje_usuario="";

  if(isset($_POST["btn_accion"])){
    $error_accion=1;

    $tipo=($_POST["opc_tipo"]);
    $id=($_POST["txtid"]);
    $nombre=($_POST["txtnombre"]);
    $txtemail=($_POST["txtemail"]);
    $txtpassword1=($_POST["txtpassword1"]);
    $txtpassword2=($_POST["txtpassword2"]);
    if ($tipo=="Participante"){
      $tipousuario="P";
    }else{
      $tipousuario="A";
    }

    $estatus="A";
    $fechareg="2024-01-08";
    $usuarioreg=$usuariosesion['nro'];
    $estatusreg="A";

    $accion=($_POST["btn_accion"]);
    switch ($accion){
      case "Crear";
        //echo "<script> alert('Quieres Consultar...'); </script>";
        if($txtpassword1==$txtpassword2){

          $sentencia=$pdo->prepare("INSERT INTO tblusuarios(nro,id,usuario,clave,nombre,tipo,estatus,fecha_reg,usuario_reg,estatus_reg) 
          VALUES (NULL, :id, :usuario, :clave, :nombre, :tipo, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");
          
          $sentencia->bindParam(':id',$id,PDO::PARAM_STR);
          $sentencia->bindParam(':usuario',$txtemail,PDO::PARAM_STR);
          $sentencia->bindParam(':clave',$txtpassword1,PDO::PARAM_STR);
          $sentencia->bindParam(':nombre',$nombre,PDO::PARAM_STR);
          $sentencia->bindParam(':tipo',$tipousuario,PDO::PARAM_STR);
          $sentencia->bindParam(':estatus',$estatus,PDO::PARAM_STR);
          $sentencia->bindParam(':fecha_reg',$fechareg);
          $sentencia->bindParam(':usuario_reg',$usuarioreg,PDO::PARAM_STR);
          $sentencia->bindParam(':estatus_reg',$estatusreg,PDO::PARAM_STR);
          $sentencia->execute();
          $procesar="listo";
          $mensaje_usuario="Usuario Creado Satisfactoriamente";
          // echo "<script> alert('Usuario creado satisfactoriamente...'); </script>";
          // header('Location:usuarios.php');
        }else{
          //echo "<script> alert('Password no coincide...'); </script>";
          $procesar="ok";
          $error_accion=2;
          $mensaje_usuario="Password no coinciden";
        }
      break;
      
      case "Cancelar";
        header('Location:usuarios.php');
      break;

      case "Aceptar";
        header('Location:usuarios.php');
      break;

    } 

    //  echo "<br/>";
    //  print_r ($id);
    //  echo "<br/>";
    //  print_r ($nombre);
    //  echo "<br/>";
    //  print_r($tipousuario);
    //  echo "<br/>";
    //  print_r($txtemail);
    //  echo "<br/>";
    //  print_r($txtpassword1);
    //  echo "<br/>";
    //  print_r($txtpassword2);
    //  echo "<br/>";
    //  print_r($estatus);
    //  echo "<br/>";
    //  print_r($fechareg);
    //  echo "<br/>";
    //  print_r($usuarioreg);
    //  echo "<br/>";
    // print_r($estatusreg);
    // print_r($estatus);
    // echo "<br/>";
    // print_r($fechareg);
    // echo "<br/>";
    // print_r($usuario_reg);
    // echo "<br/>";
    // print_r($estatus_reg);
    //INSERT INTO `simulacion` (`nro-simulacion`, `id-simulacion`, `fecha-inicio`, `descripcion`, `estatus`, `fecha-reg`, `usuario-reg`, `estatus-reg`) VALUES (NULL, 'S02', '2024-03-20', 'Grabado a mano', 'A', '2024-03-20', '1', 'A');
    // print_r($_POST["txtidsimulacion"]);
    // print_r($_POST["fechainicio"]);
    // print_r($_POST["txtdescrip"]);  
    //print_r($_POST["txtPassword"]);
  }
?>
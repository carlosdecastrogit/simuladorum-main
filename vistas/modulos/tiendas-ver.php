<?php
  include('../controladores/global/sesiones.php');
  include('../controladores/global/conexion.php');
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
    $Accion_dub="NO";
    $Accion_moz="NO";
    $Accion_gou="NO";
    $Accion_die="NO";
    $Accion_arm="NO";
    $Accion_ciu="NO";
    $Accion_sfi="NO";
    $Accion_lsa="NO";


    
  //Recepción de Post  --------------------------------------------------------------------------------------
    if(isset($_POST["btn_accion"])){

      $accion=($_POST["btn_accion"]);
      $txtNro_empresa=($_POST["txtNro_empresa"]);
      $txtTienda_actual=($_POST["txtTienda_actual"]);
      $txtQueso_actual=($_POST["txtQueso_actual"]);

      //print_r($txtQueso_actual);


      switch($accion){

        case "Ver Tienda";

            $txtNombre_tienda="";
            switch($txtTienda_actual){
              case 1;
                $txtNombre_tienda="Armadillo";
              break;
              case 2;
                $txtNombre_tienda="Ciudadela";
              break;
              case 3;
                $txtNombre_tienda="San Fierro";
              break;
              case 4;
                $txtNombre_tienda="Los Santos";
              break;
            }
          //echo "<script> alert('Aquí muestra la tienda...'); </script>";
          // Selección de empresa del usuario -------------------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A' AND nro=$txtNro_empresa");
              $sentencia->execute();
              $listado_empresa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_empresa=$sentencia->rowCount(); 

          // Selecciono el almacén tiendas ---------------------------------------------------------------
            $sentencia=$pdo->prepare("SELECT * FROM `tiendas` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
            $sentencia->execute();
            $listado_tiendas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            $cant_tiendas=$sentencia->rowCount();

            if($cant_tiendas>=1){
              foreach($listado_tiendas as $tiendas){
                $nro_tiendas=$tiendas['nro'];
                $txtCant_cap_almacen=$tiendas['cant_cap_almacen'];
                $txtCant_existencia=$tiendas['cant_existencia'];
                $txtCant_cap_disp=$tiendas['cant_cap_disp'];
              }
              
              // Selecciono los movimientos de las tiendas queso duro ---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=$txtTienda_actual AND nro_queso=1");
              $sentencia->execute();
              $listado_tiendas_mov_dub=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_dub=$sentencia->rowCount();
              print_r($cant_tiendas_mov_dub);
              
              if($cant_tiendas_mov_dub>=1){
                $Accion_dub="SI";
              }else{
                $Accion_dub="NO";
              }
              
              //print_r($Accion_dub);
              
              // ----------------------------------------------------------------------------------------------------
              
              // Selecciono los movimientos de las tiendas queso mozarella ---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=$txtTienda_actual AND nro_queso=2");
              $sentencia->execute();
              $listado_tiendas_mov_moz=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_moz=$sentencia->rowCount();
                  
              if($cant_tiendas_mov_moz>=1){
                $Accion_moz="SI";
              }else{
                $Accion_moz="NO";
              }
              // ----------------------------------------------------------------------------------------------------
              
              // Selecciono los movimientos de las tiendas queso gouda ---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=$txtTienda_actual AND nro_queso=3");
              $sentencia->execute();
              $listado_tiendas_mov_gou=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_gou=$sentencia->rowCount();
                  
              if($cant_tiendas_mov_gou>=1){
                $Accion_gou="SI";
              }else{
                $Accion_gou="NO";
              }
              // ----------------------------------------------------------------------------------------------------
              
              // Selecciono los movimientos de las tiendas queso dietético ---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=$txtTienda_actual AND nro_queso=4");
              $sentencia->execute();
              $listado_tiendas_mov_die=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_die=$sentencia->rowCount();
                  
              if($cant_tiendas_mov_die>=1){
                $Accion_die="SI";
              }else{
                $Accion_die="NO";
              }
              // ----------------------------------------------------------------------------------------------------

            }else{
              $procesar="listo"; //Muestra Vista normal
              $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
              $mensaje_usuario="No se pudo procesar la tienda"; // Vacío en inicalización
            }
            
            
          // /. Fin selección de empresa del usuario -------------------------------------------------------------------------

            // $procesar="ok";
            // header('Location:entorno.php');
        break;
        
        case "Ver Queso";
            //echo "<script> alert('Ver por Queso...'); </script>";
            $txtNombre_queso="";
            switch($txtQueso_actual){
              case 1;
                $txtNombre_queso="Queso Duro Blanco";
              break;
              case 2;
                $txtNombre_queso="Queso Mozarella";
              break;
              case 3;
                $txtNombre_queso="Queso Gouda";
              break;
              case 4;
                $txtNombre_queso="Queso Dietético";
              break;
            }
            //echo "<script> alert('Aquí muestra la tienda...'); </script>";
           // Selección de empresa del usuario -------------------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A' AND nro=$txtNro_empresa");
              $sentencia->execute();
              $listado_empresa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_empresa=$sentencia->rowCount(); 

            // Selecciono el almacén tiendas ---------------------------------------------------------------
            $sentencia=$pdo->prepare("SELECT * FROM `tiendas` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
            $sentencia->execute();
            $listado_tiendas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            $cant_tiendas=$sentencia->rowCount();

            if($cant_tiendas>=1){
              foreach($listado_tiendas as $tiendas){
                $nro_tiendas=$tiendas['nro'];
                $txtCant_cap_almacen=$tiendas['cant_cap_almacen'];
                $txtCant_existencia=$tiendas['cant_existencia'];
                $txtCant_cap_disp=$tiendas['cant_cap_disp'];
              }
              
              // Selecciono los movimientos del queso actual de la tienda Armadillo---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=1 AND nro_queso=$txtQueso_actual");
              $sentencia->execute();
              $listado_tiendas_mov_arm=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_arm=$sentencia->rowCount();
              //print_r($cant_tiendas_mov_arm);
              
              if($cant_tiendas_mov_arm>=1){
                $Accion_arm="SI";
              }else{
                $Accion_arm="NO";
              }
              
              //print_r($Accion_dub);
              
              // ----------------------------------------------------------------------------------------------------
              
              // Selecciono los movimientos del queso actual de la tienda Ciudadela---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=2 AND nro_queso=$txtQueso_actual");
              $sentencia->execute();
              $listado_tiendas_mov_ciu=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_ciu=$sentencia->rowCount();
                  
              if($cant_tiendas_mov_ciu>=1){
                $Accion_ciu="SI";
              }else{
                $Accion_ciu="NO";
              }
              // ----------------------------------------------------------------------------------------------------
              
              // Selecciono los movimientos del queso actual de la tienda San Fierro ---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=3 AND nro_queso=$txtQueso_actual");
              $sentencia->execute();
              $listado_tiendas_mov_sfi=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_sfi=$sentencia->rowCount();
                  
              if($cant_tiendas_mov_sfi>=1){
                $Accion_sfi="SI";
              }else{
                $Accion_sfi="NO";
              }
              // ----------------------------------------------------------------------------------------------------
              
              // Selecciono los movimientos del queso actual de la tienda Los Santos ---------------------------------------------------------------
              $sentencia=$pdo->prepare("SELECT * FROM `tiendas_mov` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro_tienda=4 AND nro_queso=$txtQueso_actual");
              $sentencia->execute();
              $listado_tiendas_mov_lsa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
              $cant_tiendas_mov_lsa=$sentencia->rowCount();
                  
              if($cant_tiendas_mov_lsa>=1){
                $Accion_lsa="SI";
              }else{
                $Accion_lsa="NO";
              }
              // ----------------------------------------------------------------------------------------------------

            }else{
              $procesar="listo"; //Muestra Vista normal
              $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
              $mensaje_usuario="No se pudo procesar el queso"; // Vacío en inicalización
            }
            
            
          // /. Fin selección de empresa del usuario -------------------------------------------------------------------------

            // $procesar="ok";
            // header('Location:entorno.php');
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

        
      }
    }
// . Fin recepción de Post  ---------------------------------------------------------------------------------

?>
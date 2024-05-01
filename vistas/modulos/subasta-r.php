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


  // Selección de Empresa / Entorno
  if ($txtUsuarioTipo=="A") {
    $sentencia=$pdo->prepare("SELECT * FROM `empresa` WHERE estatus='A'");
    $sentencia->execute();
    $listado_entorno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    $cant_entorno=$sentencia->rowCount();
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

    // Selección Depósito AMP del usuario --------------------------------------------------------------------
    $sentencia=$pdo->prepare("SELECT * FROM `amp` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
    $sentencia->execute();
    $listado_amp=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    $cant_amp=$sentencia->rowCount();

    foreach ($listado_amp as $amp){
      $nro_AMP=$amp['nro'];  
    } 
    //print_r($nro_AMP);
    // ---------------------------------------------------------------------------------------------

    // echo "<script> alert('El usuario es PARTICIPANTE...'); </script>";
    //print_r("</br>");
    //print_r($listado_entorno);

    //Recepción de Post
    if(isset($_POST["btn_accion"])){

      $accion=($_POST["btn_accion"]);

      // Variables de Datos del POST
      if($accion!="Aceptar"){      
        $txtNro="";
        $txtId=($_POST["txtId"]);
        $txtEmpresa=($_POST["txtEmpresa"]);
        $txtCiclo=($_POST["txtCiclo"]);
        $txtFecha_ped=($_POST["txtFecha_ped"]);
        $txtFecha_recep=($_POST["txtFecha_recep"]);
        $txtMonto_precio_lc=($_POST["txtMonto_precio_lc"]);
        $txtCant_contratos_lc=($_POST["txtCant_contratos_lc"]);
        $txtCant_litros_lc=($_POST["txtCant_litros_lc"]);
        $txtMonto_total_usb_lc=($_POST["txtMonto_total_usb_lc"]);
        $txtMonto_precio_ad=($_POST["txtMonto_precio_ad"]);
        $txtCant_contratos_ad=($_POST["txtCant_contratos_ad"]);
        $txtCant_litros_ad=($_POST["txtCant_litros_ad"]);
        $txtMonto_total_usb_ad=($_POST["txtMonto_total_usb_ad"]);
        $txtEstatus="A";

        $txtUsuario_reg=$txtUsuario;
        $txtFecha_reg=date("Y/m/d");
        $txtEstatus_reg="A";
      }

      switch($accion){

          case "Calcular";
              // echo "<script> alert('Quieres Guardar Operación...'); </script>";
              // header('Location:usuarios.php');
              $txtNro_AMP=($_POST["txtNro_AMP"]);
              $txtCant_litros_lc=$txtCant_contratos_lc*5000;
              $txtCant_litros_ad=$txtCant_contratos_ad*3000;

              $txtMonto_total_usb_lc=$txtCant_litros_lc*$txtMonto_precio_lc;
              $txtMonto_total_usb_ad=$txtCant_litros_ad*$txtMonto_precio_ad;
               
              // print_r("</br>");
              // print_r("Empresa: ".$txtEmpresa);
              
              // print_r("</br>");
              // print_r("Usuario: ".$txtUsuario_reg);

              // print_r("</br>");
              // print_r("Almacén: ".$txtNro_AMP);

              if( ($txtCant_litros_lc<=0) or ($txtCant_litros_ad<=0) or ($txtMonto_precio_lc<=0) or ($txtMonto_precio_ad<=0) ){
                $procesar="ok"; //Muestra Vista normal
                $error_accion=2; // Valor 0 si todo va normal
                $mensaje_usuario="Los campos numéricos no pueden ser cero (0)"; // Vacío en inicalización
              }else{
                $calcular="SI";
              }

          break;

          case "Guardar";
              // echo "<script> alert('Solo Falta Guardar...'); </script>";
              // header('Location:usuarios.php');
              
              $txtNro_AMP=($_POST["txtNro_AMP"]);

              if( ($txtCant_litros_lc<=0) or ($txtCant_litros_ad<=0) or ($txtMonto_precio_lc<=0) or ($txtMonto_precio_ad<=0) ){
                $procesar="ok"; //Muestra Vista normal
                $error_accion=2; // Valor 0 si todo va normal
                $mensaje_usuario="Los campos numéricos no pueden ser cero (0)"; // Vacío en inicalización
              }else {
                
            // Insertar registro en subasta --------------------------------------------------------------------------------------------------------
                $sentencia=$pdo->prepare("INSERT INTO compra_subasta (nro,id,empresa,ciclo,fecha_ped,fecha_recep,monto_precio_lc,
                cant_contratos_lc,cant_litros_lc,monto_total_usb_lc,monto_precio_ad,cant_contratos_ad,
                cant_litros_ad,monto_total_usb_ad,estatus,fecha_reg,usuario_reg, estatus_reg)  
                VALUES (NULL, :id,:empresa,:ciclo,:fecha_ped,:fecha_recep,:monto_precio_lc,
                :cant_contratos_lc,:cant_litros_lc,:monto_total_usb_lc,:monto_precio_ad,:cant_contratos_ad,
                :cant_litros_ad,:monto_total_usb_ad,:estatus,:fecha_reg, :usuario_reg, :estatus_reg)");

                $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
                $sentencia->bindParam(':empresa',$txtEmpresa,PDO::PARAM_STR);
                $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_ped',$txtFecha_ped,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_recep',$txtFecha_recep,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_precio_lc',$txtMonto_precio_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_contratos_lc',$txtCant_contratos_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_litros_lc',$txtCant_litros_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_total_usb_lc',$txtMonto_total_usb_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_precio_ad',$txtMonto_precio_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_contratos_ad',$txtCant_contratos_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_litros_ad',$txtCant_litros_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_total_usb_ad',$txtMonto_total_usb_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_reg',$txtFecha_reg,PDO::PARAM_STR);
                $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
                $sentencia->execute();

                $Nro_Compra=$pdo->lastInsertID();

            //----------------------------------------------------------------------------------------------
                

            // Actualizar Almacén de Materia Prima en AMP--------------------------------------------------
                $sentencia=$pdo->prepare("SELECT * FROM `amp` WHERE estatus='A' AND nro=$txtNro_AMP");
                $sentencia->execute();
                $listado_amp=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                $cant_amp=$sentencia->rowCount(); 

                foreach($listado_amp as $ampactual) {
                  $cant_capmax_lc_actual=$ampactual['cant_capmax_lc'];
                  $cant_existencia_lc_actual=$ampactual['cant_existencia_lc'];
                  $cant_capdisp_lc_actual=$ampactual['cant_capdisp_lc'];
                  $cant_capmax_ad_actual=$ampactual['cant_capmax_ad'];
                  $cant_existencia_ad_actual=$ampactual['cant_existencia_ad'];
                  $cant_capdisp_ad_actual=$ampactual['cant_capdisp_ad'];
                }

                //Calculo valores a actualizar
                $cant_existencia_lc=$cant_existencia_lc_actual+$txtCant_litros_lc;
                $cant_capdisp_lc=$cant_capmax_lc_actual-$cant_existencia_lc;
                $cant_existencia_ad=$cant_existencia_ad_actual+$txtCant_litros_ad;
                $cant_capdisp_ad=$cant_capmax_ad_actual-$cant_existencia_ad;

                // actualizo la tabla
                $sentencia=$pdo->prepare("UPDATE amp SET 
                cant_existencia_lc=:cant_existencia_lc, cant_capdisp_lc=:cant_capdisp_lc,
                cant_existencia_ad=:cant_existencia_ad, cant_capdisp_ad=:cant_capdisp_ad WHERE
                nro=:nro");
                        
                $sentencia->bindParam(':nro',$txtNro_AMP,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_existencia_lc',$cant_existencia_lc);
                $sentencia->bindParam(':cant_capdisp_lc',$cant_capdisp_lc);
                $sentencia->bindParam(':cant_existencia_ad',$cant_existencia_ad);
                $sentencia->bindParam(':cant_capdisp_ad',$cant_capdisp_ad);
                $sentencia->execute();

            // --------------------------------------------------------------------------------------------
                
            // Inserta movimiento de entrada en AMP_MOV

                $txtId="A-".strval($Nro_Compra);
                $txtNro_empresa=($_POST["txtEmpresa"]);
                $txtId_empresa=($_POST["txtEmpresa"]);
                $txtNro_almacen=$txtNro_AMP;
                $txtNro_compra=$Nro_Compra;
                $txtCiclo=($_POST["txtCiclo"]);
                $txtFecha=($_POST["txtFecha_recep"]);
                $txtTipo_mov_lc="C";
                $txtCant_entrada_lc=($_POST["txtCant_litros_lc"]);
                $txtCant_salida_lc=0.00;
                $txtCant_total_lc=$cant_existencia_lc;
                $txtTipo_mov_ad="C";
                $txtCant_entrada_ad=($_POST["txtCant_litros_lc"]);
                $txtCant_salida_ad=0.00;
                $txtCant_total_ad=$cant_existencia_ad;
                $txtEstatus="A";
                $txtProducido="N";
                $txtFecha_reg=date("Y/m/d");
                $txtUsuario_reg=$txtUsuario;
                $txtEstatus_reg="A";

                $sentencia=$pdo->prepare("INSERT INTO amp_mov (nro,id,nro_empresa,id_empresa,nro_almacen,nro_compra,ciclo,
                fecha,tipo_mov_lc,cant_entrada_lc,cant_salida_lc,cant_total_lc,tipo_mov_ad,cant_entrada_ad,cant_salida_ad,
                cant_total_ad,estatus,producido,fecha_reg,usuario_reg,estatus_reg)  
                VALUES (NULL, :id, :nro_empresa, :id_empresa, :nro_almacen, :nro_compra, :ciclo, :fecha, :tipo_mov_lc, 
                :cant_entrada_lc, :cant_salida_lc, :cant_total_lc, :tipo_mov_ad, :cant_entrada_ad, :cant_salida_ad,
                :cant_total_ad, :estatus, :producido, :fecha_reg, :usuario_reg, :estatus_reg)");

                $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                $sentencia->bindParam(':id_empresa',$txtId_empresa,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_almacen',$txtNro_almacen,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_compra',$txtNro_compra,PDO::PARAM_STR);
                $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha',$txtFecha,PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_mov_lc',$txtTipo_mov_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_entrada_lc',$txtCant_entrada_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_salida_lc',$txtCant_salida_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_total_lc',$txtCant_total_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_mov_ad',$txtTipo_mov_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_entrada_ad',$txtCant_entrada_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_salida_ad',$txtCant_salida_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_total_ad',$txtCant_total_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                $sentencia->bindParam(':producido',$txtProducido,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_reg',$txtFecha_reg,PDO::PARAM_STR);
                $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
                $sentencia->execute();


            // --------------------------------------------------------------------------------------------
                
            // Calcula e inserta movimiento de costo de Almacén de Materia Prima AMP_CTO

                // Consultar la cantidad de movimiento del almacen
                $Registros_AMP_CTO=$pdo->prepare("SELECT COUNT(*) FROM `amp_cto` WHERE estatus='A' AND nro_almacen=$txtNro_AMP");
                $Registros_AMP_CTO->execute();
                $cant_resgistros_AMP_CTO=$Registros_AMP_CTO->fetchAll(PDO::FETCH_ASSOC);
                //print_r("Cantidad de registros del almacen");
                // print_r($cant_resgistros_AMP_CTO);
                // print_r("</br>");
                $cant_sentenciaCUENTA=$Registros_AMP_CTO->rowCount();
                // print_r("Cantidad de registros procesados");
                // print_r($cant_sentenciaCUENTA);
                // print_r("</br>");

                // Obtiene la cantidad de registros de la consulta
                foreach($cant_resgistros_AMP_CTO as $contadorAMP){
                  $Cant_Registros=$contadorAMP['COUNT(*)'];
                }
                //print_r("Var Contador");
                //print_r($Cant_Registros);
                //print_r("</br>");



                if ($Cant_Registros>=1){ // Tiene movimientos
                  // Identifico del último registro de costo
                  $sentencia=$pdo->prepare("SELECT max(nro) FROM `amp_cto` WHERE estatus='A' AND nro_almacen=$txtNro_AMP");
                  $sentencia->execute();
                  $MaxIdAMP_SQL=$sentencia->fetchAll(PDO::FETCH_ASSOC);

                  $cant_MaxIdAMP_SQL=$sentencia->rowCount();

                  // print_r("Arreglo Max ID:");
                  // print_r($MaxIdAMP_SQL);
                  // print_r("</br>");

                  // Obtengo el nro del último registro de la tabla costo para la empresa
                  foreach($MaxIdAMP_SQL as $maximo){
                    $MaxNroAMP=$maximo['max(nro)'];
                    // print_r("Nro Máximo ID:");
                    // print_r($MaxNroAMP);
                    // print_r("</br>");
                  }

                  // Selecciono el ultimo registro de costo de la empresa
                  $sentenciaSQL=$pdo->prepare("SELECT * FROM `amp_cto` WHERE estatus='A' AND nro=$MaxNroAMP");
                  $sentenciaSQL->execute();
                  $Registro_AMP_CTO=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                  $cant_sentenciaSQL=$sentenciaSQL->rowCount();

                  // print_r("Último Registro:");
                  // print_r($Registro_AMP_CTO);
                  // print_r("</br>");

                  //Obtengo los datos del registro de costo para rescatar los acumulados
                  foreach($Registro_AMP_CTO as $RegistroActual){
                    $Cant_acum_lc_actual=$RegistroActual['cant_acum_lc'];
                    $Monto_cto_acum_lc_actual=$RegistroActual['monto_cto_acum_lc'];
                    $Cant_acum_ad_actual=$RegistroActual['cant_acum_ad'];
                    $Monto_cto_acum_ad_actual=$RegistroActual['monto_cto_acum_ad'];
                  }

                }else{
                  $Cant_acum_lc_actual=0.00;
                  $Monto_cto_acum_lc_actual=0.00;
                  $Cant_acum_ad_actual=0.00;
                  $Monto_cto_acum_ad_actual=0.00;
                }

                // Variables de AMP Costo
                $txtId="CTO-".strval($Nro_Compra);
                $txtNro_empresa=($_POST["txtEmpresa"]);
                $txtId_empresa=($_POST["txtEmpresa"]);
                $txtNro_almacen=$txtNro_AMP;
                $txtNro_compra=$Nro_Compra;
                $txtCiclo=($_POST["txtCiclo"]);
                $txtFecha=($_POST["txtFecha_recep"]);
                $txtTipo_mov_lc="C";
                $txtCant_lc=($_POST["txtCant_litros_lc"]);
                $txtMonto_cto_ltr_lc=($_POST["txtMonto_precio_lc"]);
                $txtMonto_cto_total_lc=$txtCant_lc*$txtMonto_cto_ltr_lc;
                $txtCant_acum_lc=$Cant_acum_lc_actual+$txtCant_lc;
                $txtMonto_cto_acum_lc=$Monto_cto_acum_lc_actual+$txtMonto_cto_total_lc;
                $txtMonto_cto_promedio_lc=$txtMonto_cto_acum_lc/$txtCant_acum_lc;
                $txtTipo_mov_ad="C";
                $txtCant_ad=($_POST["txtCant_litros_ad"]);
                $txtMonto_cto_ltr_ad=($_POST["txtMonto_precio_ad"]);
                $txtMonto_cto_total_ad=$txtCant_ad*$txtMonto_cto_ltr_ad;
                $txtCant_acum_ad=$Cant_acum_ad_actual+$txtCant_ad;
                $txtMonto_cto_acum_ad=$Monto_cto_acum_ad_actual+$txtMonto_cto_total_ad;
                $txtMonto_cto_promedio_ad=$txtMonto_cto_acum_ad/$txtCant_acum_ad;
                
                $txtEstatus="A";
                $txtFecha_reg=date("Y/m/d");
                $txtUsuario_reg=$txtUsuario;
                $Estatus_reg="A";

                $sentencia=$pdo->prepare("INSERT INTO amp_cto (nro,id,nro_empresa,id_empresa,nro_almacen,nro_compra,ciclo,
                fecha,tipo_mov_lc,cant_lc,monto_cto_ltr_lc,monto_cto_total_lc,cant_acum_lc,monto_cto_acum_lc,
                monto_cto_promedio_lc,tipo_mov_ad,cant_ad,monto_cto_ltr_ad,monto_cto_total_ad,cant_acum_ad,monto_cto_acum_ad,
                monto_cto_promedio_ad,estatus,fecha_reg,usuario_reg,estatus_reg)  
                VALUES (NULL, :id, :nro_empresa, :id_empresa, :nro_almacen, :nro_compra, :ciclo, :fecha, :tipo_mov_lc, :cant_lc,
                :monto_cto_ltr_lc, :monto_cto_total_lc, :cant_acum_lc, :monto_cto_acum_lc, :monto_cto_promedio_lc, 
                :tipo_mov_ad, :cant_ad, :monto_cto_ltr_ad, :monto_cto_total_ad, :cant_acum_ad, :monto_cto_acum_ad,
                :monto_cto_promedio_ad, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                $sentencia->bindParam(':id_empresa',$txtId_empresa,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_almacen',$txtNro_almacen,PDO::PARAM_STR);
                $sentencia->bindParam(':nro_compra',$txtNro_compra,PDO::PARAM_STR);
                $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha',$txtFecha,PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_mov_lc',$txtTipo_mov_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_lc',$txtCant_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_ltr_lc',$txtMonto_cto_ltr_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_total_lc',$txtMonto_cto_total_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_acum_lc',$txtCant_acum_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_acum_lc',$txtMonto_cto_acum_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_promedio_lc',$txtMonto_cto_promedio_lc,PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_mov_ad',$txtTipo_mov_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_ad',$txtCant_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_ltr_ad',$txtMonto_cto_ltr_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_total_ad',$txtMonto_cto_total_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':cant_acum_ad',$txtCant_acum_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_acum_ad',$txtMonto_cto_acum_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':monto_cto_promedio_ad',$txtMonto_cto_promedio_ad,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_reg',$txtFecha_reg,PDO::PARAM_STR);
                $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_STR);
                $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
                $sentencia->execute();

                $Nro_AMP_CTO=$pdo->lastInsertID();

                // --------------------------------------------------------------------------------------------------

                $procesar="listo"; //Muestra Vista normal
                $error_accion=1; // Valor 0 si todo va normal
                $mensaje_usuario=" Los registros se realizaron satisfactoriamente"; // Vacío en inicalización
              }
              
          break;
          

          case "Consultar";
              // echo "<script> alert('Quieres cancelar Operación...'); </script>";
              // header('Location:entorno.php');
              
            $procesar="ok";
            $error_accion=0; // Valor 0 si todo va normal
            $mensaje_usuario=""; // Vacío en inicalización

          break;

          case "Cancelar";
              // echo "<script> alert('Quieres cancelar Operación...'); </script>";
              $procesar="ok";
              header('Location:subasta.php');
          break;

          case "Aceptar";
              // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
              $procesar="ok";
              header('Location:subasta.php');
          break;

          case "Modificar";
                  // echo "<script> alert('Quieres Actualizar Registro...'); </script>";
                  
                  $procesar="ok";
                  $error_accion=0; // Valor 0 si todo va normal
                  $mensaje_usuario=""; // Vacío en inicalización
              

          break;

          case "Actualizar";
              //echo "<script> alert('Quieres Actualizar el Registro...'); </script>";
              // header('Location:usuarios.php');
              

              $procesar="listo";
              $error_accion=1; // Valor 0 si todo va normal
              $mensaje_usuario="Entorno Actualizado Satisfactoriamente"; // Vacío en inicalización

          break;

          case "Eliminar";
              // Eliminar físico no lo contempla esta aplicación, todas las eliminaciones son lógicas
          break;
      }
    } else{
        // Define variables iniciales para el primer uso
        $txtId="";
        $txtCiclo=1;
        $txtFecha_ped=date("Y/m/d");
        $txtFecha_recep=date("Y/m/d");
        $txtMonto_precio_lc=0.00;
        $txtCant_contratos_lc=0.00;
        $txtCant_litros_lc=0.00;
        $txtMonto_total_usb_lc=0.00;
        $txtMonto_precio_ad=0.00;
        $txtCant_contratos_ad=0.00;
        $txtCant_litros_ad=0.00;
        $txtMonto_total_usb_ad=0.00;
        $txtEstatus="A";

        $txtUsuario_reg=$txtUsuario;
        $txtFecha_reg=date("Y/m/d");
        $txtEstatus_reg="A";
    }
?>
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
  $validar="SI";


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

      if($cant_empresa>=1){
        foreach($listado_empresa as $empresa){
          $txtNro_empresa=$empresa['nro'];
          $txtNombre_empresa=$empresa['nombre'];
          }
          // print_r($txtNombre_empresa);
          // print_r("</br>");
          // print_r($txtNro_empresa);
          // print_r("</br>");

        // Selección Depósito AMP del usuario --------------------------------------------------------------------
          $sentencia=$pdo->prepare("SELECT * FROM `amp` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
          $sentencia->execute();
          $listado_amp=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          $cant_amp=$sentencia->rowCount();

          if ($cant_amp>=1){
            foreach ($listado_amp as $amp){
              $nro_AMP=$amp['nro'];  
              $cant_existencia_lc_actual=$amp['cant_existencia_lc'];  
              $cant_capdisp_lc_actual=$amp['cant_capdisp_lc'];
              $cant_existencia_ad_actual=$amp['cant_existencia_ad'];
              $cant_capdisp_ad_actual=$amp['cant_capdisp_ad'];
            } 
            //print_r($nro_AMP);
          }else{
            $procesar="listo"; //Muestra Vista normal
            $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
            $mensaje_usuario="No se encontró almacén de materia prima"; // Vacío en inicalización
          }

    // ----------------------------------------------------------------------------------------------------

    }else{
      $procesar="listo"; //Muestra Vista normal
      $error_accion=2; // Valor 0 si todo va normal | 1 si se procesó correctamente | 2 si hay error
      $mensaje_usuario="No se encontró empresa de usuario"; // Vacío en inicalización

    }

    
  }
//---------------------------------------------------------------------------------------------- 

//Recepción de Post ----------------------------------------------------------------------------
  if(isset($_POST["btn_accion"])){

      $accion=($_POST["btn_accion"]);

      // Variables de Datos del POST
      if($accion!="Aceptar"){      
        $txtNro="";
        $txtId=($_POST["txtId"]);
        $txtNro_empresa=($_POST["txtEmpresa"]);
        $txtCiclo=($_POST["txtCiclo"]);
        $txtTipo="P";
        $txtFecha=($_POST["txtFecha"]);
        $txtCant_lc=($_POST["txtCant_lc"]);
        $txtCant_ad=($_POST["txtCant_ad"]);
        $txtCant_queso=($_POST["txtCant_queso"]);
        $txtNro_queso=0;
        $txtTipo_queso=($_POST["txtTipo_queso"]);
        $txtMonto_cto_prod_mp=($_POST["txtMonto_cto_prod_mp"]);

        $txtEstatus="A";
        $txtUsuario_reg=$txtUsuario;
        $txtFecha_reg=date("Y/m/d");
        $txtEstatus_reg="A";
      }

      switch($accion){

          case "Producir";
              //echo "<script> alert('Quieres Producir Queso...'); </script>";
              // header('Location:usuarios.php');
              $txtNro_AMP=($_POST["txtNro_AMP"]);

              // print_r("</br>");
              // print_r("Empresa: ".$txtEmpresa);
              
              // print_r("</br>");
              // print_r("Usuario: ".$txtUsuario_reg);

              // print_r("</br>");
              // print_r("Almacén: ".$txtNro_AMP);

              if( ($txtCant_lc<=0) or ($txtCant_ad<=0) ){
                $procesar="ok"; //Muestra Vista normal
                $error_accion=2; // Valor 0 si todo va normal
                $mensaje_usuario="Debe indicar una cantidad de leche y aditivo mayor a 0"; // Vacío en inicalización
              }else{
                if(($txtCant_lc<$cant_existencia_lc_actual) AND ($txtCant_ad<$cant_existencia_ad_actual)) {

                  if($txtCant_lc==$txtCant_ad){
                    $txtCant_queso=($txtCant_lc/10)+($txtCant_ad/5);
                    $txtTipo_queso="Mozarella";
                    $txtNro_queso=2;
                  }else {
                    if (($txtCant_lc+5000)==$txtCant_ad) {
                      $txtCant_queso=($txtCant_lc/10)+($txtCant_ad/5);
                      $txtTipo_queso="Dietético";
                      $txtNro_queso=4;
                    }else{
                      if ($txtCant_lc>$txtCant_ad) {
                        $txtCant_queso=($txtCant_lc/10)+($txtCant_ad/5);
                        $txtTipo_queso="Queso Duro";
                        $txtNro_queso=1;
                      }else{
                        if ($txtCant_lc<($txtCant_ad*2)) {
                          $txtCant_queso=($txtCant_lc/10)+($txtCant_ad/5);
                          $txtTipo_queso="Gouda";
                          $txtNro_queso=3;
                        }
                      }
                    }
                  }
                  $calcular="SI";

                } else{
                  $procesar="ok"; //Muestra Vista normal
                  $error_accion=2; // Valor 0 si todo va normal
                  $mensaje_usuario="El almacén no cuenta con material suficiente"; // Vacío en inicalización
                }
              }

          break;

          case "Guardar";
              // echo "<script> alert('Solo Falta Guardar...'); </script>";
              // header('Location:usuarios.php');
              
              $txtNro_AMP=($_POST["txtNro_AMP"]);

              if( ($txtCant_lc<=0) or ($txtCant_ad<=0) ){
                $calcular="NO";
                $procesar="ok"; //Muestra Vista normal
                $error_accion=2; // Valor 0 si todo va normal
                $mensaje_usuario="Debe Indicar la cantidad de materia prima cero (0)"; // Vacío en inicalización
              }else {

                if(($txtCant_lc<$cant_existencia_lc_actual) AND ($txtCant_ad<$cant_existencia_ad_actual)) {

              // Actualizar Almacén de Materia Prima en AMP-----------------------------------------------------
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

                  //Calculo nuevos valores a actualizar a partir de lo utilizado en la producción
                  $cant_existencia_lc=$cant_existencia_lc_actual-$txtCant_lc;
                  $cant_capdisp_lc=$cant_capmax_lc_actual-$cant_existencia_lc;
                  $cant_existencia_ad=$cant_existencia_ad_actual-$txtCant_ad;
                  $cant_capdisp_ad=$cant_capmax_ad_actual-$cant_existencia_ad;

                  // actualizo la tabla de almacén de materia prima AMP
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

                  //echo "<script> alert('Actualizó Saldos en AMP...'); </script>";

              // --------------------------------------------------------------------------------------------
                  
              // Inserta movimiento de entrada en AMP_MOV ----------------------------------------------------

                  $txtId="AS-";
                  $txtNro_empresa=($_POST["txtEmpresa"]);
                  $txtId_empresa=($_POST["txtEmpresa"]);
                  $txtNro_almacen=$txtNro_AMP;
                  $txtNro_compra=0;
                  $txtCiclo=($_POST["txtCiclo"]);
                  $txtFecha=($_POST["txtFecha"]);
                  $txtTipo_mov_lc="P";
                  $txtCant_entrada_lc=0.00;
                  $txtCant_salida_lc=($_POST["txtCant_lc"]);
                  $txtCant_total_lc=$cant_existencia_lc;
                  $txtTipo_mov_ad="P";
                  $txtCant_entrada_ad=0.00;
                  $txtCant_salida_ad=($_POST["txtCant_ad"]);
                  $txtCant_total_ad=$cant_existencia_ad;
                  $txtEstatus="A";
                  $txtProducido="S";
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

                  $Nro_AMP_MOV=$pdo->lastInsertID();

                  //echo "<script> alert('Insertó movimiento en AMP_MOV...'); </script>";

              // --------------------------------------------------------------------------------------------

              // Calcula e inserta movimiento de costo de Almacén de Materia Prima AMP_CTO -------------------------------------------
                  $txtEstatus="A";
                  $txtCiclo=($_POST["txtCiclo"]);
                  $txtNro_empresa=($_POST["txtEmpresa"]);
                  //print_r($txtEstatus);
                  //print_r($txtCiclo);
                  //print_r($txtNro_empresa);
                  

                  // 1 Selecciona el último registro de la tabla compra subasta para el ciclo mencionado
                  $sentencia=$pdo->prepare("SELECT max(nro) FROM `compra_subasta` WHERE estatus=:estatus AND ciclo=:ciclo AND empresa=:nro");
                  $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                  $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro',$txtNro_empresa,PDO::PARAM_STR);
                  $sentencia->execute();
                  $MaxIdCompra=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                  $cant_MaxIdCompra=$sentencia->rowCount();

                  //print_r("Arreglo Último ID Compra:");
                  //print_r($MaxIdCompra);
                  //print_r("</br>");
                  //print_r($cant_MaxIdCompra);

                  if ($cant_MaxIdCompra>=1){
                    foreach($MaxIdCompra as $compra){
                      $MaxNroCompra=$compra['max(nro)'];
                      //print_r("ültimo ID Compra:");
                      //print_r($MaxNroCompra);
                      // print_r("</br>");
                    }
                  }else{
                    $MaxNroCompra=1;
                  }
                  
                  //--------------------------------------------------------------------------------------------------
                  
                  // 2 obtengo el detalle de la compra para saber precio unitario de LC y AD
                  $estatus="A";
                  $nro=$MaxNroCompra;

                  $sentencia=$pdo->prepare("SELECT * FROM `compra_subasta` WHERE estatus=:estatus AND nro=:nro");
                  $sentencia->bindParam(':estatus',$estatus,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro',$nro,PDO::PARAM_STR);
                  $sentencia->execute();
                  $ListaCompra=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                  $cant_ListaCompra=$sentencia->rowCount();

                  if ($cant_ListaCompra>=1){
                    foreach($ListaCompra as $detallecompra){
                      $monto_precio_lc=$detallecompra['monto_precio_lc'];
                      $monto_precio_ad=$detallecompra['monto_precio_ad'];
                      // print_r("Último ID AMP_MOV:");
                      // print_r($MaxNroAMP);
                      // print_r("</br>");
                    }
                  }else{
                    $monto_precio_lc=1;
                    $monto_precio_ad=1;
                  }
                  // -------------------------------------------------------------------------------------------
                  
                  // 3 Selecciona el último registro de la tabla del AMP_MOV 
                  $sentencia=$pdo->prepare("SELECT max(nro) FROM `amp_mov` WHERE estatus='A' AND nro=$txtNro_AMP");
                  $sentencia->execute();
                  $MaxIdAMP_SQL=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                  $cant_MaxIdAMP_SQL=$sentencia->rowCount();

                  // print_r("Arreglo Último ID AMP_MOV:");
                  // print_r($MaxIdAMP_SQL);
                  // print_r("</br>");
                  if ($cant_MaxIdAMP_SQL>=1){
                    foreach($MaxIdAMP_SQL as $maximo){
                      $MaxNroAMP=$maximo['max(nro)'];
                      // print_r("Último ID AMP_MOV:");
                      // print_r($MaxNroAMP);
                      // print_r("</br>");
                    }
                  }else {
                    $MaxNroAMP=1;
                  }
                  
                  
                  // 3 Obtiene la cantidad acumulada de LC y AD. para conocer la cant acumulada y cto acumulado
                  if ($cant_MaxIdAMP_SQL>0){
                    $sentencia=$pdo->prepare("SELECT * FROM `amp_cto` WHERE estatus='A' AND nro_almacen=$MaxNroAMP");
                    $sentencia->execute();
                    $RegistroAMPcto=$sentencia->fetchAll(PDO::FETCH_ASSOC);

                    $cant_RegistroAMPcto=$sentencia->rowCount();
                    // print_r("Registro de costo ID:");
                    // print_r($RegistroAMPcto);
                    // print_r("</br>");

                    foreach($RegistroAMPcto as $registro){
                      $Cant_acum_lc_actual=$registro['cant_acum_lc'];
                      $Monto_cto_acum_lc_actual=$registro['monto_cto_acum_lc'];
                      $Cant_acum_ad_actual=$registro['cant_acum_ad'];
                      $Monto_cto_acum_ad_actual=$registro['monto_cto_acum_ad'];
                    }

                  // este if es de prueba, hay que borrarlo luego
                    if ($cant_RegistroAMPcto<1){
                      $Cant_acum_lc_actual=0.00;
                      $Monto_cto_acum_lc_actual=0.00;
                      $Cant_acum_ad_actual=0.00;
                      $Monto_cto_acum_ad_actual=0.00;
                    }
                  // ----------------------------------------------

                  }else{
                    $Cant_acum_lc_actual=0.00;
                    $Monto_cto_acum_lc_actual=0.00;
                    $Cant_acum_ad_actual=0.00;
                    $Monto_cto_acum_ad_actual=0.00;
                  }

                  $txtId="CTO-";
                  $txtNro_empresa=($_POST["txtEmpresa"]);
                  $txtId_empresa=($_POST["txtEmpresa"]);
                  $txtNro_almacen=$txtNro_AMP;
                  $txtNro_compra=0;
                  $txtCiclo=($_POST["txtCiclo"]);
                  $txtFecha=($_POST["txtFecha"]);
                  $txtTipo_mov_lc="P";
                  $txtCant_lc=($_POST["txtCant_lc"]);
                  $txtMonto_cto_ltr_lc=$monto_precio_lc;
                  $txtMonto_cto_total_lc=$txtCant_lc*$txtMonto_cto_ltr_lc;
                  $txtCant_acum_lc=$Cant_acum_lc_actual-$txtCant_lc;
                  $txtMonto_cto_acum_lc=$Monto_cto_acum_lc_actual-$txtMonto_cto_total_lc;
                  $txtMonto_cto_promedio_lc=$txtMonto_cto_acum_lc/$txtCant_acum_lc;
                  $txtTipo_mov_ad="C";
                  $txtCant_ad=($_POST["txtCant_ad"]);
                  $txtMonto_cto_ltr_ad=$monto_precio_ad;
                  $txtMonto_cto_total_ad=$txtCant_ad*$txtMonto_cto_ltr_ad;
                  $txtCant_acum_ad=$Cant_acum_ad_actual-$txtCant_ad;
                  $txtMonto_cto_acum_ad=$Monto_cto_acum_ad_actual-$txtMonto_cto_total_ad;
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

                  //echo "<script> alert('Insertó registro en AMP_CTO...'); </script>";

              // --------------------------------------------------------------------------------------------------

              // Insertar registro en PCM --------------------------------------------------------------------------------------------------------
                  //asigno el nro del queso
                  
                  $txtId=($_POST["txtId"]);
                  $txtNro_empresa=($_POST["txtEmpresa"]);
                  $txtCiclo=($_POST["txtCiclo"]);
                  $txtTipo="P";
                  $txtFecha=($_POST["txtFecha"]);
                  $txtCant_lc=($_POST["txtCant_lc"]);
                  $txtCant_ad=($_POST["txtCant_ad"]);
                  $txtCant_queso=($_POST["txtCant_queso"]);
                  $txtNro_queso=($_POST["txtNro_queso"]);
                  $txtTipo_queso=($_POST["txtTipo_queso"]);
                  $monto_cto_prod_mp=($txtCant_lc*$monto_precio_lc)+($txtCant_ad*$monto_precio_ad);
                  $txtEstatus="A";
                  $txtFecha_reg=date("Y/m/d");
                  $txtUsuario_reg=$txtUsuario;
                  $txtEstatus_reg="A";

                  $sentencia=$pdo->prepare("INSERT INTO pcm (nro,id,nro_empresa,ciclo,tipo,fecha,
                  cant_lc,cant_ad,cant_queso,nro_queso,tipo_queso,monto_cto_prod_mp,estatus,fecha_reg,usuario_reg, estatus_reg)  
                  VALUES (NULL, :id, :nro_empresa, :ciclo, :tipo, :fecha, :cant_lc, :cant_ad, :cant_queso,
                  :nro_queso, :tipo_queso, :monto_cto_prod_mp, :estatus, :fecha_reg, :usuario_reg, :estatus_reg)");

                  $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                  $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                  $sentencia->bindParam(':tipo',$txtTipo,PDO::PARAM_STR);
                  $sentencia->bindParam(':fecha',$txtFecha,PDO::PARAM_STR);
                  $sentencia->bindParam(':cant_lc',$txtCant_lc,PDO::PARAM_STR);
                  $sentencia->bindParam(':cant_ad',$txtCant_ad,PDO::PARAM_STR);
                  $sentencia->bindParam(':cant_queso',$txtCant_queso,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro_queso',$txtNro_queso,PDO::PARAM_STR);
                  $sentencia->bindParam(':tipo_queso',$txtTipo_queso,PDO::PARAM_STR);
                  $sentencia->bindParam(':monto_cto_prod_mp',$monto_cto_prod_mp,PDO::PARAM_STR);
                  $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                  $sentencia->bindParam(':fecha_reg',$txtFecha_reg,PDO::PARAM_STR);
                  $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_STR);
                  $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
                  $sentencia->execute();

                  $Nro_pcm=$pdo->lastInsertID();
                  //echo "<script> alert('Insertó registro en PCM...'); </script>";


              //----------------------------------------------------------------------------------------------
              
              // Actualizar saldos en Almacén de productos terminados APT ---------------------------------------
              
                $sentencia=$pdo->prepare("SELECT * FROM `apt` WHERE estatus='A' AND nro_empresa=$txtNro_empresa");
                $sentencia->execute();
                $listado_apt=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                $cant_apt=$sentencia->rowCount();

                foreach ($listado_apt as $apt){
                  $nro_apt=$apt['nro'];
                  // Almacén queso duro
                  $cant_cmax_qd=$apt['cant_cmax_qd'];
                  $cant_e_qd_actual=$apt['cant_e_qd'];
                  $cant_disp_qd_actual=$apt['cant_disp_qd'];
                  
                  // Almacén queso mozarella
                  $cant_cmax_moz=$apt['cant_cmax_moz'];
                  $cant_e_moz_actual=$apt['cant_e_moz'];
                  $cant_disp_moz_actual=$apt['cant_disp_moz'];
                  
                  // Almacén queso gouda
                  $cant_cmax_gou=$apt['cant_cmax_gou'];
                  $cant_e_gou_actual=$apt['cant_e_gou'];
                  $cant_disp_gou_actual=$apt['cant_disp_gou'];
                  
                  // Almacén queso dietético
                  $cant_cmax_die=$apt['cant_cmax_die'];
                  $cant_e_die_actual=$apt['cant_e_die'];
                  $cant_disp_die_actual=$apt['cant_disp_die'];

                } 
                // calculamos las variables a actualizar en APT
                if ($txtNro_queso==1){
                  $cant_e_qd=$cant_e_qd_actual+$txtCant_queso;
                  $cant_disp_qd=$cant_disp_qd_actual-$txtCant_queso;
                  
                  $cant_e_moz=$cant_e_moz_actual;
                  $cant_disp_moz=$cant_disp_moz_actual;
                  $cant_e_gou=$cant_e_gou_actual;
                  $cant_disp_gou=$cant_disp_gou_actual;
                  $cant_e_die=$cant_e_die_actual;
                  $cant_disp_die=$cant_disp_die_actual;
                } else{

                  if ($txtNro_queso==2){
                    $cant_e_moz=$cant_e_moz_actual+$txtCant_queso;
                    $cant_disp_moz=$cant_disp_moz_actual-$txtCant_queso;

                    $cant_e_qd=$cant_e_qd_actual;
                    $cant_disp_qd=$cant_disp_qd_actual;
                    $cant_e_gou=$cant_e_gou_actual;
                    $cant_disp_gou=$cant_disp_gou_actual;
                    $cant_e_die=$cant_e_die_actual;
                    $cant_disp_die=$cant_disp_die_actual;
                  }else {
                    if ($txtNro_queso==3){
                      $cant_e_gou=$cant_e_gou_actual+$txtCant_queso;
                      $cant_disp_gou=$cant_disp_gou_actual-$txtCant_queso;
    
                      $cant_e_qd=$cant_e_qd_actual;
                      $cant_disp_qd=$cant_disp_qd_actual;
                      $cant_e_moz=$cant_e_moz_actual;
                      $cant_disp_moz=$cant_disp_moz_actual;
                      $cant_e_die=$cant_e_die_actual;
                      $cant_disp_die=$cant_disp_die_actual;
                    }else{
                      if ($txtNro_queso==4){
                        $cant_e_die=$cant_e_die_actual+$txtCant_queso;
                        $cant_disp_die=$cant_disp_die_actual-$txtCant_queso;
        
                        $cant_e_qd=$cant_e_qd_actual;
                        $cant_disp_qd=$cant_disp_qd_actual;
                        $cant_e_moz=$cant_e_moz_actual;
                        $cant_disp_moz=$cant_disp_moz_actual;
                        $cant_e_gou=$cant_e_gou_actual;
                        $cant_disp_gou=$cant_disp_gou_actual;
                      }
                    }
                  }
                }

                // actualizo la tabla de almacén de productos terminados APT
                  $sentencia=$pdo->prepare("UPDATE apt SET 
                  cant_e_qd=:cant_e_qd,cant_disp_qd=:cant_disp_qd, cant_e_moz=:cant_e_moz,
                  cant_disp_moz=:cant_disp_moz, cant_e_gou=:cant_e_gou, cant_disp_gou=:cant_disp_gou, 
                  cant_e_die=:cant_e_die, cant_disp_die=:cant_disp_die WHERE
                  nro=:nro");
                          
                  $sentencia->bindParam(':nro',$nro_apt,PDO::PARAM_STR);
                  $sentencia->bindParam(':cant_e_qd',$cant_e_qd);
                  $sentencia->bindParam(':cant_disp_qd',$cant_disp_qd);
                  $sentencia->bindParam(':cant_e_moz',$cant_e_moz);
                  $sentencia->bindParam(':cant_disp_moz',$cant_disp_moz);
                  $sentencia->bindParam(':cant_e_gou',$cant_e_gou);
                  $sentencia->bindParam(':cant_disp_gou',$cant_disp_gou);
                  $sentencia->bindParam(':cant_e_die',$cant_e_die);
                  $sentencia->bindParam(':cant_disp_die',$cant_disp_die);
                  $sentencia->execute();
                  //echo "<script> alert('Actualizó Saldos en APT...'); </script>";

              // -------------------------------------------------------------------------------------------

              // Inserto registro en tabla APT_MOV --------------------------------------------------------------
                  // Asigno variables de datos de la tabla
                  $txtNro_queso=($_POST["txtNro_queso"]);

                  //identifico el nro, tipo y cantidad total del queso
                  if($txtNro_queso==1){
                    $txtCant_total=$cant_e_qd;
                  } else{
                    if($txtNro_queso==2){
                      $txtCant_total=$cant_e_moz;
                    }else{
                      if($txtNro_queso==3){
                        $txtCant_total=$cant_e_gou;
                      }else{
                        $txtCant_total=$cant_e_die;
                      }
                    }
                  }
                
                  $txtId=($_POST["txtId"]);
                  $txtNro_empresa=($_POST["txtEmpresa"]);
                  $txtNro_almacen=$nro_apt;
                  $txtNro_produccion=$Nro_AMP_MOV;
                  $txtCiclo=($_POST["txtCiclo"]);
                  $txtFecha=($_POST["txtFecha"]);
                  $txtTipo="E";
                  $txtCant_entrada=($_POST["txtCant_queso"]);
                  $txtCant_salida=0.00;
                  
                  $txtTipo_queso=($_POST["txtTipo_queso"]);
                  $txtEstatus="A";
                  $txtFecha_reg=date("Y/m/d");
                  $txtUsuario_reg=$txtUsuario;
                  $txtEstatus_reg="A";

                  $sentencia=$pdo->prepare("INSERT INTO apt_mov (nro,id,nro_empresa,nro_almacen, nro_produccion,
                  ciclo,fecha,tipo, cant_entrada,cant_salida,cant_total,nro_queso, nombre_queso, estatus,
                  fecha_reg,usuario_reg, estatus_reg)  
                  VALUES (NULL, :id, :nro_empresa, :nro_almacen, :nro_produccion, :ciclo, :fecha, :tipo, 
                  :cant_entrada, :cant_salida, :cant_total, :nro_queso, :nombre_queso, :estatus, :fecha_reg,
                  :usuario_reg, :estatus_reg)");

                  $sentencia->bindParam(':id',$txtId,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro_empresa',$txtNro_empresa,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro_almacen',$txtNro_almacen,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro_produccion',$txtNro_produccion,PDO::PARAM_STR);
                  $sentencia->bindParam(':ciclo',$txtCiclo,PDO::PARAM_STR);
                  $sentencia->bindParam(':fecha',$txtFecha,PDO::PARAM_STR);
                  $sentencia->bindParam(':tipo',$txtTipo,PDO::PARAM_STR);
                  $sentencia->bindParam(':cant_entrada',$txtCant_entrada,PDO::PARAM_STR);
                  $sentencia->bindParam(':cant_salida',$txtCant_salida,PDO::PARAM_STR);
                  $sentencia->bindParam(':cant_total',$txtCant_total,PDO::PARAM_STR);
                  $sentencia->bindParam(':nro_queso',$txtNro_queso,PDO::PARAM_STR);
                  $sentencia->bindParam(':nombre_queso',$txtTipo_queso,PDO::PARAM_STR);
                  $sentencia->bindParam(':estatus',$txtEstatus,PDO::PARAM_STR);
                  $sentencia->bindParam(':fecha_reg',$txtFecha_reg,PDO::PARAM_STR);
                  $sentencia->bindParam(':usuario_reg',$txtUsuario_reg,PDO::PARAM_STR);
                  $sentencia->bindParam(':estatus_reg',$txtEstatus_reg,PDO::PARAM_STR);
                  $sentencia->execute();

                  $Nro_pcm=$pdo->lastInsertID();

                  //echo "<script> alert('Insertó registro en APT MOV...'); </script>";

              // -------------------------------------------------------------------------------------------
              
            // Asigna variables de control ------------------------------------------------------------------
                $procesar="listo"; //Muestra Vista normal
                $error_accion=1; // Valor 0 si todo va normal
                $mensaje_usuario=" Los registros se realizaron satisfactoriamente"; // Vacío en inicalización
            // -----------------------------------------------------------------------------------------------

                }else{
                  $procesar="ok"; //Muestra Vista normal
                  $error_accion=2; // Valor 0 si todo va normal
                  $mensaje_usuario="El almacén no cuenta con material suficiente"; // Vacío en inicalización
                }
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
              header('Location:pcm.php');
          break;

          case "Aceptar";
              // echo "<script> alert('Quieres Aceptar Operación...'); </script>";
              $procesar="ok";
              header('Location:pcm.php');
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
        $txtTipo="P";
        $txtFecha=date("Y/m/d");
        $txtCant_lc=0.00;
        $txtCant_ad=0.00;
        $txtCant_queso=0.00;
        $txtNro_queso=0.00;
        $txtTipo_queso="";
        $txtMonto_cto_prod_mp=0.00;
       
        $txtEstatus="A";
        $txtUsuario_reg=$txtUsuario;
        $txtFecha_reg=date("Y/m/d");
        $txtEstatus_reg="A";
  }
//----------------------------------------------------------------------------------------------
?>
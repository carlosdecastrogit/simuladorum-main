<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/pcm-mod.php";
        include "modulos/encabezado.php";
        include "modulos/menu.php";
    
    ?>  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">PCM | Modelado</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pcm.php">PCM</a></li>
                <li class="breadcrumb-item active">PCM | MOD</li>
                </ol>
            </div><!-- /.col -->
            <!-- Separador -->
            <div class="col-md-12">
                <hr style="color: #0056b2;" />
            </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    <!-- Inicio del contenedor de datos -->
        <div class="container" style="padding: 0px 20px 50px 20px;">
            <div class="row justify-content-center">
                <?php if ($procesar=="ok") {  ?>
                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-12 ">
                            <?php if($error_accion==1){ ?>
                                <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                            <?php }else{ ?>
                                <h3 class="text-center text-danger"><?php echo "ERROR 4: ".$mensaje_usuario; ?></h3>
                            <?php } ?>    
                        </div>
                    <?php } ?>

                    <!-- Íconos Generales -->
                        <div class="col-md-4" style="padding: 0 0 15px 0;">
                            <a href="pcm-mod-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                            <a href="pcm-mod-operador.php"type="button" class="btn btn-primary"><i class="fa fa-address-card"></i> Operadores</a>
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>

                        <div class="col-md-8" style="padding-top: 10px;">

                        </div>
                    <!-- /. Fin de Íconos Generales -->

                    <!-- DIV Empresa-->
                    <form class="col-md-12" action="pcm-mod.php" method="post" >
                        <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtEmpresa">Empresa</label>
                                <select class="form-control" name="txtEmpresa">
                                    <?php foreach ($listado_empresa as $empresa) { ?>
                                        <option value="<?php echo $empresa['nro']; ?>"> <?php echo $empresa['nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <!-- /. Fin DIV Empresa-->

                    <!-- DIV Operador-->
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtOperador">Operador</label>
                                <select class="form-control" name="txtOperador">
                                    <?php foreach ($listado_operador as $operador) { ?>
                                        <option value="<?php echo $operador['nro']; ?>" <?php if($txtNro_operador==$operador['nro']) { echo "Selected"; } ?>> <?php echo $operador['nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <!-- /. Fin DIV Operador-->
                    <!-- DIV Vacío-->
                         <div class="col-md-1">
                            <div class="form-group">
                                <!-- <form action="pcm-mod.php" method="post" > -->
                                    <label for="btn_accion">.</label>
                                    <input type="submit" class="btn btn-primary form-control" name="btn_accion" value="Ver">
                                <!-- </form> -->
                            </div>
                        </div>
                    <!-- /. Fin DIV Operador-->
                    <!-- DIV Vacío-->
                         <div class="col-md-3">

                        </div>
                    <!-- /. Fin DIV Operador-->
                    </div>
                    </form>

                    <!-- Tabla de movimientos -->
                        <div class="col-12" style="padding: 0px 0px 0px 0px;">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Movimientos PCM Mod</b></h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Ciclo</th>
                                                <th>Fecha</th>
                                                <th>Operador</th>
                                                <th>Total Horas</th>
                                                <th>$ por Hora</th>
                                                <th>$ Adicional</th>
                                                <th>Total Jornada</th>
                                                <th>Icon 1</th>
                                                <th>Icon 2</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listado_pcm_mod as $pcm_mod_mov){ ?>
                                                <tr>
                                                    <td> <?php echo $pcm_mod_mov['ciclo']; ?></td>
                                                    <td> <?php echo $pcm_mod_mov['fecha']; ?></td>
                                                    <td> 
                                                        <?php
                                                            $nro_operador_actual=$pcm_mod_mov['nro_operador'];
                                                            $sentencia=$pdo->prepare("SELECT nombre FROM `pcm_mod_operador` WHERE estatus='A' AND nro_empresa=$txtNro_empresa AND nro=$nro_operador_actual");
                                                            $sentencia->execute();
                                                            $nombre_o=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
                                                        ?>
                                                        <?php foreach($nombre_o as $NombreOperador){ 
                                                            $txtNombre_operador=$NombreOperador['nombre'];
                                                        } ?>
                                                        <?php echo $txtNombre_operador; ?>
                                                        <?php // echo $pcm_mod_mov['nro_operador']; ?>
                                                    </td>
                                                    <td> <?php echo $pcm_mod_mov['cant_total_horas_trab']; ?></td>
                                                    <td> <?php echo $pcm_mod_mov['monto_pago_hora']; ?></td>
                                                    <td> <?php echo $pcm_mod_mov['monto_pago_adicional']; ?></td>
                                                    <td> <?php echo $pcm_mod_mov['monto_total_jornada']; ?></td>
                                                    <td> <?php echo $pcm_mod_mov['emoji1']; ?></td>
                                                    <td> <?php echo $pcm_mod_mov['emoji2']; ?></td>
                                                    <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    <!-- /. Fin Tabla de movimientos -->

                    <?php }else{ ?>

                        <?php  if ($mensaje_usuario!=""){ ?>
                            <div class="col-md-12 ">
                                <?php if($error_accion==1){ ?>
                                    <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                                <?php }else{ ?>
                                    <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                                <?php } ?>    
                            </div>
                            <div class="col-md-12">
                                <form action="pcm-mod-operador-r.php" method="post">
                                    <div class="row justify-content-center">
                                        <?php if($btnOperador="SI"){ ?>
                                            <div class="col-md-2">    
                                                <a href="pcm-mod-operador-r.php" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo Operador</a>
                                            </div>
                                        <?php }else { ?>
                                            <div class="col-md-2">
                                                <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>

                    <?php } ?>

            </div>

        </div>
    <!-- /. Fin de contenedor de datos -->
    </div>
    <!-- /.content-wrapper -->
    
    <?php
        include "modulos/footer.php";
    ?>    

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>

<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/amp.php";
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
                <h1 class="m-0 text-dark">Almacén de Materia Prima (AMP)</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="amp.php">AMP</a></li>
                <li class="breadcrumb-item active">AMP</li>
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

                        <div class="col-md-12">
                            <h3>Almacén Leche Cruda (LC)</h3>
                        </div>
                        <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                            <a href="subasta-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-3">
                            <div class="form-group" style="padding-top: 20px;">
                                <label for="txtEmpresa">Empresa</label>
                                <input type="text" class="form-control" name="txtEmpresa" placeholder="" value="<?php echo $txtEmpresa; ?>">
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 20px;">
                            <div class="form-group">
                                <label for="txtCant_capmax_lc">Capacidad Máxima LC</label>
                                <input type="text" class="form-control" name="txtCant_capmax_lc" placeholder="" value="<?php echo $txtCant_capmax_lc; ?>">
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 20px;">
                            <div class="form-group">
                                <label for="txtCant_existencia_lc">Existencia LC</label>
                                <input type="text" class="form-control"  name="txtCant_existencia_lc" placeholder="" value="<?php echo $txtCant_existencia_lc; ?>">
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 20px;">
                            <div class="form-group">
                                <label for="txtCant_capdisp_lc">Capacidad Disponible LC</label>
                                <input type="text" class="form-control" name="txtCant_capdisp_lc" placeholder="" value="<?php echo $txtCant_capdisp_lc; ?>">
                            </div>
                        </div>

                        <!-- Tabla Leche Cruda -->
                        <div class="col-12">
                                <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Movimientos Almacén de Leche Cruda (LC)</b></h3>

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
                                        <th>Tipo</th>
                                        <th>Entradas</th>
                                        <th>Salidas</th>
                                        <th>Total Unidades</th>
                                        <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_amp_mov as $amp_mov) { ?>
                                            <tr>
                                                <td><?php echo $amp_mov['ciclo']; ?></td>
                                                <td><?php echo $amp_mov['fecha']; ?></td>
                                                <td><?php echo $amp_mov['tipo_mov_lc']; ?></td>
                                                <td><?php echo $amp_mov['cant_entrada_lc']; ?></td>
                                                <td><?php echo $amp_mov['cant_salida_lc']; ?></td>
                                                <td><?php echo $amp_mov['cant_total_lc']; ?></td>
                                                <td>
                                                    <form action="" method="">
                                                        <input type="hidden" name="txtvariable" value="<?php echo "";?>">
                                                        <input class="btn btn-outline-primary btn-sm" type="submit" name="btnaccion" value="C">
                                                        <!-- <input class="btn btn-primary" type="submit" name="btnaccion" value="E"> -->
                                                        <input class="btn btn-outline-primary btn-sm" type="submit" name="btnaccion" value="X">
                                                        <!-- 
                                                            <button class="btn btn-primary" type="submit" value="btnconsultar" name="btnaccion"><i class="fas fa-file"></i></button>
                                                            <button class="btn btn-primary" type="submit" value="btneditar" name="btnaccion"><i class="fas fa-file-alt"></i></button>
                                                            <button class="btn btn-primary" type="submit" value="btneliminar" name="btnaccion"><i class="fas fa-trash-alt"></i></button>
                                                        -->
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                        </div>
                        <!-- /. Fin tabla Leche Cruda -->


                        <!-- Separador -->
                            <div class="col-md-12">
                                <hr style="color: #0056b2;" />
                            </div>
                        <!-- /. Fin Separador -->


                        <!-- Cabecera Almacén de aditivo -->
                        <div class="col-md-12">
                            <h3>Almacén Aditivo (AD)</h3>
                        </div>
                        <div class="col-md-12" style="padding-top: 10px;">
                            <a href="subasta-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>


                        <div class="col-md-3">
                            <div class="txtEmpresa" style="padding-top: 20px;">
                                <label for="texto">Empresa</label>
                                <input type="text" class="form-control" name="txtEmpresa" placeholder="" value="<?php echo $txtEmpresa; ?>">
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 20px;">
                            <div class="form-group">
                                <label for="txtCant_capmax_ad">Capacidad Máxima AD</label>
                                <input type="text" class="form-control" name="txtCant_capmax_ad" placeholder="" value="<?php echo $txtCant_capmax_ad; ?>">
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 20px;">
                            <div class="form-group">
                                <label for="txtCant_existencia_ad">Existencia AD</label>
                                <input type="text" class="form-control"  name="txtCant_existencia_ad" placeholder="" value="<?php echo $txtCant_existencia_ad; ?>">
                            </div>
                        </div>
                        <div class="col-md-3" style="padding-top: 20px;">
                            <div class="form-group">
                                <label for="txtCant_capdisp_ad">Capacidad Disponible AD</label>
                                <input type="text" class="form-control" name="txtCant_capdisp_ad" placeholder="" value="<?php echo $txtCant_capdisp_ad; ?>">
                            </div>
                        </div>
                        <!-- /. Fin cabecera Almacén de aditivo -->


                        <!-- Inicio tabla Aditivo-->
                        <div class="col-12">
                            <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Movimientos Almacén de Aditivos (AD)</b></h3>

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
                                    <th>Tipo</th>
                                    <th>Entradas</th>
                                    <th>Salidas</th>
                                    <th>Total Unidades</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($listado_amp_mov as $amp_mov) { ?>
                                    <tr>
                                        <td><?php echo $amp_mov['ciclo']; ?></td>
                                        <td><?php echo $amp_mov['fecha']; ?></td>
                                        <td><?php echo $amp_mov['tipo_mov_ad']; ?></td>
                                        <td><?php echo $amp_mov['cant_entrada_ad']; ?></td>
                                        <td><?php echo $amp_mov['cant_salida_ad']; ?></td>
                                        <td><?php echo $amp_mov['cant_total_ad']; ?></td>
                                        <td>
                                            <form action="" method="">
                                                <input type="hidden" name="txtvariable" value="<?php echo "";?>">
                                                <input class="btn btn-outline-primary btn-sm" type="submit" name="btnaccion" value="C">
                                                <!-- <input class="btn btn-primary" type="submit" name="btnaccion" value="E"> -->
                                                <input class="btn btn-outline-primary btn-sm" type="submit" name="btnaccion" value="X">
                                                <!-- 
                                                    <button class="btn btn-primary" type="submit" value="btnconsultar" name="btnaccion"><i class="fas fa-file"></i></button>
                                                    <button class="btn btn-primary" type="submit" value="btneditar" name="btnaccion"><i class="fas fa-file-alt"></i></button>
                                                    <button class="btn btn-primary" type="submit" value="btneliminar" name="btnaccion"><i class="fas fa-trash-alt"></i></button>
                                                -->
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- Inicio tabla Aditivo-->

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

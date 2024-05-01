<?php
    include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/pcm.php";
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
                <h1 class="m-0 text-dark">Pasteurizado, Cuajado y Moldeado (PCM)</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pcm.php">PCM</a></li>
                <li class="breadcrumb-item active">PCM</li>
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
            <!-- Contendor de datos -->
            <div class="container" style="padding: 0px 20px 50px 20px;">

                <!-- Opciones Generales -->
                <div class="row justify-content-left" style="padding: 0px 0px 20px 0px;">
                    <div class="col-md-2" style="padding: 0px 0px 20px 0px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Duro</span></div>
                    <div class="col-md-2" style="padding: 0px 0px 20px 5px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Mozarella</span></div>
                    <div class="col-md-2" style="padding: 0px 0px 20px 5px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Gouda</span></div>
                    <div class="col-md-2" style="padding: 0px 0px 20px 5px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Dietético</span></div>
                    <div class="col-md-4" style="padding: 0px 0px 20px 0px"></div>
                    
                    <div class="col-md-6" >
                        <a href="pcm-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                        <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                        <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                    </div>

                    <div class="col-md-6">

                    </div>

                    <div class="col-md-4" style="padding-top: 20px;">
                        <div class="form-group">
                            <label for="txtEmpresa">Empresa</label>
                            <select class="form-control" name="txtEmpresa">
                                <?php foreach ($listado_empresa as $empresa) { ?>
                                <option value="<?php echo $empresa['nro']; ?>"> <?php echo $empresa['nombre']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <?php if ($SubastaMovimientos=="NO") {?>
                        <div class="col-md-12" style="padding-top: 20px;">
                            <div class="">
                                <h4 class="text-center text-danger"> <?php echo $Mensaje_Mov;?> </h4>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- / Fin de opciones Generales -->

            <?php if ($SubastaMovimientos=="SI") {?>
            <!-- Tabla Leche Cruda -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Movimientos PCM</b></h3>

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
                                <th>Tipo</th>
                                <th>Fecha Prod</th>
                                <th>Entrada LC</th>
                                <th>Entrada AD</th>
                                <th>Queso Producido (Kilos) </th>
                                <th>Producto</th>
                                <th>Costo Producción MP</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listado_PCM as $PCM) { ?>
                                <tr>
                                    <td> <?php echo $PCM['ciclo']; ?></td>
                                    <td> <?php echo $PCM['tipo']; ?></td>
                                    <td> <?php echo $PCM['fecha']; ?></td>
                                    <td> <?php echo $PCM['cant_lc']; ?></td>
                                    <td> <?php echo $PCM['cant_ad']; ?></td>
                                    <td> <?php echo $PCM['cant_queso']; ?></td>
                                    <td> <?php echo $PCM['tipo_queso']; ?></td>
                                    <td> <?php echo $PCM['monto_cto_prod_mp']; ?></td>
                                    <td>
                                        <form action="" method="">
                                            <input type="hidden" name="txtNro" value="<?php echo $PCM['nro'];?>">
                                            <input type="hidden" name="txtId" value="<?php echo $PCM['id'];?>">
                                            <input type="hidden" name="txtNro_empresa" value="<?php echo $PCM['nro_empresa'];?>">
                                            <input type="hidden" name="txtCiclo" value="<?php echo $PCM['ciclo'];?>">                        
                                            <input type="hidden" name="txtTipo" value="<?php echo $PCM['tipo'];?>">                        
                                            <input type="hidden" name="txtFecha" value="<?php echo $PCM['fecha'];?>">
                                            <input type="hidden" name="txtCant_lc" value="<?php echo $PCM['cant_lc'];?>">
                                            <input type="hidden" name="txtCant_ad" value="<?php echo $PCM['cant_ad'];?>">
                                            <input type="hidden" name="txtCant_queso" value="<?php echo $PCM['cant_queso'];?>">
                                            <input type="hidden" name="txtTipo_queso" value="<?php echo $PCM['tipo_queso'];?>">
                                            <input type="hidden" name="txtMonto_cto_prod_mp" value="<?php echo $PCM['monto_cto_prod_mp'];?>">
                                            <input type="hidden" name="txtEstatus" value="<?php echo $PCM['estatus'];?>">
                                            <input type="hidden" name="txtUsuario_reg" value="<?php echo $PCM['usuario_reg'];?>">

                                            <input class="btn btn-primary" type="submit" name="btn_accion" value="C">
                                            <!-- <input class="btn btn-primary" type="submit" name="btn_accion" value="E" readonly> -->
                                            <input class="btn btn-primary" type="submit" name="btn_accion" value="X">
                                            <!-- <a href="#"><i class="fas fa-file"></i></a>&nbsp;
                                            <a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;
                                            <a href="#"><i class="fas fa-trash-alt"></i></a> -->
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
            </div>
            <?php } ?>
            </div>
            <!-- /. fin contenedor de datos -->
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

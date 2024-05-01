<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/subasta.php";
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
                <h1 class="m-0 text-dark">SUBASTA</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Subasta</a></li>
                <li class="breadcrumb-item active">Subasta</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Contendor de datos -->
        <div class="container" style="padding: 25px 20px 50px 20px;">

            <!-- Opciones Generales -->
            <div class="row justify-content-left">

                <div class="col-md-6" >
                    <a href="subasta-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
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
                <!-- 
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 form-group" style="padding-top: 20px;">
                            <label for="texto">Empresa</label>
                            <?php // if ($txtUsuarioTipo=="A") { ?>
                                <input type="text" class="form-control" placeholder="Empresa" value="Todas">
                            <?php // }else{ ?>
                                <input type="text" class="form-control" placeholder="Empresa" value="<?php echo $NombreEmpresa;?> ">
                            <?php // } ?>
                        </div>
                    </div>
                </div>
                -->
            </div>
            <!-- / Fin de opciones Generales -->

            <?php if ($SubastaMovimientos=="SI") {?>
            <!-- Tabla Leche Cruda -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Listado de Leche Cruda (LC)</b></h3>

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
                            <th>Fecha Pedido</th>
                            <th>Fecha Recepción</th>
                            <th>Precio LC</th>
                            <th>Cant. Contratos</th>
                            <th>Cantidad LC (Lts)</th>
                            <th>Total LC ($)</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listado_compras_subasta as $compras_subasta) { ?>
                                <tr>
                                    <td> <?php echo $compras_subasta['ciclo']; ?></td>
                                    <td> <?php echo $compras_subasta['fecha_ped']; ?></td>
                                    <td> <?php echo $compras_subasta['fecha_recep']; ?></td>
                                    <td> <?php echo $compras_subasta['monto_precio_lc']; ?></td>
                                    <td> <?php echo $compras_subasta['cant_contratos_lc']; ?></td>
                                    <td> <?php echo $compras_subasta['cant_litros_lc']; ?></td>
                                    <td> <?php echo $compras_subasta['monto_total_usb_lc']; ?></td>
                                    <td>
                                        <form action="subasta-c.php" method="post">
                                            <input type="hidden" name="txtNro" value="<?php echo $compras_subasta['nro'];?>">
                                            <input type="hidden" name="txtId" value="<?php echo $compras_subasta['id'];?>">
                                            <input type="hidden" name="txtEmpresa" value="<?php echo $compras_subasta['empresa'];?>">
                                            <input type="hidden" name="txtCiclo" value="<?php echo $compras_subasta['ciclo'];?>">                        
                                            <input type="hidden" name="txtFecha_ped" value="<?php echo $compras_subasta['fecha_ped'];?>">
                                            <input type="hidden" name="txtFecha_recep" value="<?php echo $compras_subasta['fecha_recep'];?>">
                                            <input type="hidden" name="txtMonto_precio_lc" value="<?php echo $compras_subasta['monto_precio_lc'];?>">
                                            <input type="hidden" name="txtCant_contratos_lc" value="<?php echo $compras_subasta['cant_contratos_lc'];?>">
                                            <input type="hidden" name="txtCant_litros_lc" value="<?php echo $compras_subasta['cant_litros_lc'];?>">
                                            <input type="hidden" name="txtMonto_total_usb_lc" value="<?php echo $compras_subasta['monto_total_usb_lc'];?>">
                                            <input type="hidden" name="txtEstatus" value="<?php echo $compras_subasta['estatus'];?>">
                                            <input type="hidden" name="txtUsuario_reg" value="<?php echo $compras_subasta['usuario_reg'];?>">
                                            <input type="hidden" name="txtProducto" value="LC">

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

            <!-- Tabla Aditivo -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Listado Aditivo (AD)</b></h3>

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
                            <th>Precio AD</th>
                            <th>Fecha Pedido</th>
                            <th>Fecha Recepción</th>
                            <th>Nro. Contratos</th>
                            <th>Cantidad AD (Lts)</th>
                            <th>Total AD ($)</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listado_compras_subasta as $compras_subasta) { ?>
                                <tr>
                                    <td> <?php echo $compras_subasta['ciclo']; ?></td>
                                    <td> <?php echo $compras_subasta['monto_precio_ad']; ?></td>
                                    <td> <?php echo $compras_subasta['fecha_ped']; ?></td>
                                    <td> <?php echo $compras_subasta['fecha_recep']; ?></td>
                                    <td> <?php echo $compras_subasta['cant_contratos_ad']; ?></td>
                                    <td> <?php echo $compras_subasta['cant_litros_ad']; ?></td>
                                    <td> <?php echo $compras_subasta['monto_total_usb_ad']; ?></td>
                                    <td>
                                        <form action="subasta-c.php" method="post">
                                            <input type="hidden" name="txtNro" value="<?php echo $compras_subasta['nro'];?>">
                                            <input type="hidden" name="txtId" value="<?php echo $compras_subasta['id'];?>">
                                            <input type="hidden" name="txtEmpresa" value="<?php echo $compras_subasta['empresa'];?>">
                                            <input type="hidden" name="txtCiclo" value="<?php echo $compras_subasta['ciclo'];?>">
                                            <input type="hidden" name="txtFecha_ped" value="<?php echo $compras_subasta['fecha_ped'];?>">
                                            <input type="hidden" name="txtFecha_recep" value="<?php echo $compras_subasta['fecha_recep'];?>">
                                            <input type="hidden" name="txtMonto_precio_ad" value="<?php echo $compras_subasta['monto_precio_ad'];?>">
                                            <input type="hidden" name="txtCant_contratos_ad" value="<?php echo $compras_subasta['cant_contratos_ad'];?>">
                                            <input type="hidden" name="txtCant_litros_ad" value="<?php echo $compras_subasta['cant_litros_ad'];?>">
                                            <input type="hidden" name="txtMonto_total_usb_ad" value="<?php echo $compras_subasta['monto_total_usb_ad'];?>">
                                            <input type="hidden" name="txtEstatus" value="<?php echo $compras_subasta['estatus'];?>">
                                            <input type="hidden" name="txtUsuario_reg" value="<?php echo $compras_subasta['usuario_reg'];?>">
                                            <input type="hidden" name="txtProducto" value="AD">

                                            <input class="btn btn-primary" type="submit" name="btn_accion" value="C">
                                            <!-- <input class="btn btn-primary" type="submit" name="btn_accion" value="E"> -->
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

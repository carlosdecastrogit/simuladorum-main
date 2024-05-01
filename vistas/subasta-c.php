<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/subasta-c.php";
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
                <h1 class="m-0 text-dark">SUBASTA | <?php echo $accion?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="subasta.php">Subasta</a></li>
                <li class="breadcrumb-item active">Subasta</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Contendor de datos -->
        <div class="container" style="padding: 25px 12px 50px 12px;">
            <?php if ($procesar=="ok") {  ?> 
            <form action="subasta-c.php" method="post">
                <div class="row justify-content-center">
                        <?php  if ($mensaje_usuario!=""){ ?>
                            <div class="col-12 ">
                                <?php if($error_accion==1){ ?>
                                    <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                                <?php }else{ ?>
                                    <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                                <?php } ?>    
                            </div>
                        <?php } ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtEmpresa">Empresa</label>
                                <input type="text" class="form-control" name="txtEmpresa" placeholder="" value="<?php echo $txtNombreEmpresa ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCiclo">Ciclo</label>
                                <input type="text" class="form-control"  placeholder="" name="txtCiclo" value="<?php echo $txtCiclo; ?>">
                            </div>
                        </div>

                        <?php if ($txtProducto=="LC"){ ?>
                            <div class="col-md-8">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Leche Cruda (LC)</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                <label for="txtMonto_precio_lc">Precio LC</label>
                                                <input type="text" class="form-control" name="txtMonto_precio_lc" placeholder="" value="<?php echo $txtMonto_precio_lc; ?>">
                                            </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtFecha_ped">Fecha Pedido LC</label>
                                                    <input type="text" class="form-control"  name="txtFecha_ped" placeholder="" value="<?php echo $txtFecha_ped; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtFecha_recep">Fecha Recepción</label>
                                                    <input type="text" class="form-control" name="txtFecha_recep" placeholder=""  value="<?php echo $txtFecha_recep; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtCant_contratos_lc">Número de Contrato LC</label>
                                                    <input type="text" class="form-control" name="txtCant_contratos_lc" value="<?php echo $txtCant_contratos_lc; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtCant_litros_lc">Cantidad Litros LC</label>
                                                    <input type="text" class="form-control" name="txtCant_litros_lc" placeholder="" value="0.00" value="<?php echo $txtCant_litros_lc ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Monto_total_usb_lc">Monto Total $ LC</label>
                                                    <input type="text" class="form-control" name="txtMonto_total_usb_lc" placeholder="" value="0.00" value="<?php echo $txtMonto_total_usb_lc ?>">
                                                </div>
                                            </div>
                                            <input type="hidden" name="txtProducto" value="LC">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>

                        <?php if ($txtProducto=="AD"){ ?>
                            <div class="col-md-8">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Aditivo AD</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                <label for="txtMonto_precio_ad">Precio AD</label>
                                                <input type="text" class="form-control" name="txtMonto_precio_ad" placeholder="" value="<?php echo $txtMonto_precio_ad; ?>">
                                            </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtFecha_ped">Fecha Pedido AD</label>
                                                    <input type="text" class="form-control"  name="txtFecha_ped" placeholder="" value="<?php echo $txtFecha_ped; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtFecha_recep">Fecha Recepción</label>
                                                    <input type="text" class="form-control" name="txtFecha_recep" placeholder=""  value="<?php echo $txtFecha_recep; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtCant_contratos_ad">Número de Contrato AD</label>
                                                    <input type="text" class="form-control" name="txtCant_contratos_ad" value="<?php echo $txtCant_contratos_ad; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtCant_litros_ad">Cantidad Litros AD</label>
                                                    <input type="text" class="form-control" name="txtCant_litros_ad" placeholder="" value="0.00" value="<?php echo $txtCant_litros_ad ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Monto_total_usb_ad">Monto Total $ AD</label>
                                                    <input type="text" class="form-control" name="txtMonto_total_usb_ad" placeholder="" value="0.00" value="<?php echo $txtMonto_total_usb_lc ?>">
                                                </div>
                                            </div>
                                            <input type="hidden" name="txtProducto" value="AD">
                                        </div>

                                        </div>
                                        <!-- /.card-body -->
                                </div>
                            </div>
                        <?php }?>

                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-m6">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Aceptar">
                                    <!-- <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Editar">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Eliminar">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar"> -->
                                </div>
                            </div>
                        </div>


                </div> 
            </form>
            <?php }else{ ?>

                <?php  if ($mensaje_usuario!=""){ ?>
                    <div class="col-12 ">
                        <?php if($error_accion==1){ ?>
                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                        <?php }else{ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php } ?>    
                    </div>
                <?php } ?>

                <form action="subasta.php" method="post">
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            <?php } ?>
        </div>
        <!-- /Fin de Contenedor de datos -->
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

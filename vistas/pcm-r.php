<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/pcm-r.php";
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
                <h1 class="m-0 text-dark">PCM | Producción</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pcm.php">PCM</a></li>
                <li class="breadcrumb-item active">PCM Producir</li>
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
                    <div class="col-md-2" style="padding: 0px 0px 20px 0px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Duro</span></div>
                    <div class="col-md-2" style="padding: 0px 0px 20px 5px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Mozarella</span></div>
                    <div class="col-md-2" style="padding: 0px 0px 20px 5px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Gouda</span></div>
                    <div class="col-md-2" style="padding: 0px 0px 20px 5px"><span class="form-control"> <i class="fas fa-cheese"></i>&nbsp;&nbsp;Queso Dietético</span></div>
                    <div class="col-md-4" style="padding: 0px 0px 20px 0px"></div>
                <?php if ($procesar=="ok") {  ?>
                    <?php  if ($mensaje_usuario!=""){ ?>
                        
                        <div class="col-12 ">
                            <?php if($error_accion==1){ ?>
                                <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                            <?php }else{ ?>
                                <h3 class="text-center text-danger"><?php echo "ERROR 4: ".$mensaje_usuario; ?></h3>
                            <?php } ?>    
                        </div>
                        <!-- Inicio saldos de almacén -->
                        <div class="col-md-3" style="padding-top: 20px;">
                                <div class="form-group">
                                    <label for="txtCant_capmax_ad">Existencia LC </label>
                                    <input type="text" class="form-control" name="txtCant_existencia_lc" placeholder="" value="<?php echo $cant_existencia_lc_actual; ?>">
                                </div>
                            </div>

                            <div class="col-md-3" style="padding-top: 20px;">
                                <div class="form-group">
                                    <label for="txtCant_existencia_ad">Existencia AD</label>
                                    <input type="text" class="form-control"  name="txtCant_existencia_ad" placeholder="" value="<?php echo $cant_existencia_ad_actual; ?>">
                                </div>
                            </div>
                        <!-- /. Fin Inicio saldos de almacén -->
                    <?php } ?>

                    <!-- DIV Empresa-->
                    <form class="col-md-12" action="pcm-r.php" method="post" >
                        <div class="row">

                    <!-- Div ficha producción -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Producción (PCM)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <!-- DIV ID-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="txtId"> ID</label>
                                                <input type="tetx" class="form-control" name="txtId" placeholder="ID" value="<?php echo $txtId;?>" required>
                                            </div>
                                        </div>
                                        <!-- /. Fin DIV ID -->

                                        <!-- Inicio Div Empresa-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtEmpresa">Empresa</label>
                                                <select class="form-control" name="txtEmpresa">
                                                    <?php foreach ($listado_empresa as $empresa) { ?>
                                                        <option value="<?php echo $empresa['nro']; ?>"> <?php echo $empresa['nombre']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /. Fin inicio Div Empresa-->

                                        <!-- DIV ciclo-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="txtCiclo">Ciclo</label>
                                                <select class="form-control" name="txtCiclo">
                                                    <option value="1" <?php if($txtCiclo=="1") { echo "Selected"; } ?> >1</option>
                                                    <option value="2" <?php if($txtCiclo=="2") { echo "Selected"; } ?> >2</option>
                                                    <option value="3" <?php if($txtCiclo=="3") { echo "Selected"; } ?> >3</option>
                                                    <option value="4" <?php if($txtCiclo=="4") { echo "Selected"; } ?> >4</option>
                                                    <option value="5" <?php if($txtCiclo=="5") { echo "Selected"; } ?> >5</option>
                                                    <option value="6" <?php if($txtCiclo=="6") { echo "Selected"; } ?> >6</option>
                                                    <option value="7" <?php if($txtCiclo=="7") { echo "Selected"; } ?> >7</option>
                                                    <option value="8" <?php if($txtCiclo=="8") { echo "Selected"; } ?> >8</option>
                                                    <option value="9" <?php if($txtCiclo=="9") { echo "Selected"; } ?> >9</option>
                                                    <option value="10" <?php if($txtCiclo=="10") { echo "Selected"; } ?> >10</option>
                                                    <option value="11" <?php if($txtCiclo=="11") { echo "Selected"; } ?> >11</option>
                                                    <option value="12" <?php if($txtCiclo=="12") { echo "Selected"; } ?> >12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /. Fin DIV ciclo-->

                                        <!-- DIV Fecha -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="txtFecha">Fecha</label>
                                                    <input type="date" class="form-control" name="txtFecha" placeholder="" value="<?php echo $txtFecha;?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. Fin DIV Fecha -->

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="txtCant_lc">Entrada Leche Cruda (Kilos)</label>
                                                <input type="number" class="form-control" name="txtCant_lc" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_lc; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="txtCant_ad">Entrada Aditivos (Kilos)</label>
                                                <input type="number" class="form-control" name="txtCant_ad" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_ad; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="txtCant_queso">Queso Producido (Kilos)</label>
                                                <input type="number" class="form-control" name="txtCant_queso" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_queso; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="txtTipo_queso">Producto</label>
                                                <input type="text" class="form-control" name="txtTipo_queso"  placeholder="" value="<?php echo $txtTipo_queso; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <!-- <label for="txtMonto_cto_prod_mp">Costo Producción MP</label> -->
                                                <input type="hidden" class="form-control" name="txtMonto_cto_prod_mp" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtMonto_cto_prod_mp; ?>" readonly>
                                                <!-- <input type="text" class="form-control" name="nro_AMP"  placeholder="" value="<?php //echo $nro_AMP; ?>" readonly> -->
                                            </div>
                                        </div>
                                        
                                    </div>  
                                </div>
                            </div>
                        </div>
                    <!-- /. Div ficha producción -->

                    <!-- Div CTA -->
                        <div class="col-md-12">
                            <div class="row justify-content-left">
                                <div class="col-md-4">
                                    <input type="hidden" name="txtNro_AMP" value="<?php echo $nro_AMP;?>">
                                    <input type="hidden" name="txtNro_queso" value="<?php echo $txtNro_queso;?>">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Producir">
                                    <?php if ($calcular=="SI"){ ?>
                                        <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar">
                                    <?php } ?>
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar">
                                    <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> &nbsp; Guardar </button>
                                    <a class="btn btn-primary" href="inicio.php" role="button"><i class="fas fa-window-close"></i> &nbsp; Cancelar</a> -->
                                </div>
                            </div>
                        </div>
                    <!-- /. Fin Div CTA -->


                    </div>
                    <!-- /. Fin row-->
                    </form>

                    <!-- Tabla de movimientos -->
                        <div class="col-12" style="padding: 0px 0px 0px 0px;">

                        </div>
                    <!-- /. Fin Tabla de movimientos -->

                    <?php }else{ ?>

                        <?php  if ($mensaje_usuario!=""){ ?>
                            <div class="col-md-12 ">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <?php if($error_accion==1){ ?>
                                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                                        <?php }else{ ?>
                                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                                        <?php } ?>  
                                    </div>
                                </div>
                                 
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form action="pcm-r.php" method="post">
                                            <div class="row justify-content-center">
                                                <div class="col-md-3">
                                                    <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

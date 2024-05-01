<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/tiendas-r.php";
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
                <h1 class="m-0 text-dark">TIENDAS </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tiendas</a></li>
                <li class="breadcrumb-item active">Tiendas</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Inicio del contenedor de datos -->
        <div class="container" style="padding: 0px 20px 50px 20px;">
            <div class="row justify-content-center">
                <!-- Verifica si se debe procesar -->
                <?php if ($procesar=="ok") {  ?>
                    <!-- Imprimer mensaje de alerta o error en procesar [calcular, guardar]  -->
                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-12 ">
                            <?php if($error_accion==1){ ?>
                                <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                            <?php }else{ ?>
                                <h3 class="text-center text-danger"><?php echo "ERROR 4: ".$mensaje_usuario; ?></h3>
                            <?php } ?>    
                        </div>
                    <?php } ?>
                    <!-- /. Fin del mensaje -----------------------------------------------  -->

                    <!-- Inicio Div Empresa-->
                        <div class="col-md-12">
                            <div class="form-group">
                                    <?php foreach ($listado_empresa as $empresa) { ?>
                                        <h3><?php echo $empresa['nombre']; ?></h3>
                                    <?php } ?>
                            </div>
                        </div>
                    <!-- /. Fin inicio Div Empresa-->

            <!-- DIV Empresa-->
            <form class="col-md-12" action="tiendas-r.php" method="post" >
                <div class="row">
                    <!-- Div Capacidad de almacén -->
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCant_cap_almacen">Capacidad de Almacén</label>
                                <input type="number" class="form-control" name="txtCant_cap_almacen" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_cap_almacen; ?>" readonly>
                            </div>
                        </div>
                    <!-- /. fin Div capacidad de almacén-->
                    <!-- Div Capacidad de almacén -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCant_existencia">Existencia</label>
                                <input type="number" class="form-control" name="txtCant_existencia" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_existencia; ?>" readonly>
                            </div>
                        </div>
                    <!-- /. fin Div capacidad de almacén-->
                    <!-- Div Capacidad de almacén -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCant_cap_disp">Capacidad Disponible</label>
                                <input type="number" class="form-control" name="txtCant_cap_disp" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_cap_disp; ?>" readonly>
                            </div>
                        </div>
                    <!-- /. fin Div capacidad de almacén-->

                    <!-- Div ficha producción -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ventas</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <!-- Inicio Div Empresa-->
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
                                        <!-- /. Fin inicio Div Empresa-->

                                        <!-- Inicio Div tienda-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="txtTienda_actual">Tiendas</label>
                                                    <select class="form-control" name="txtTienda_actual">
                                                            <option value="1" <?php if($txtTienda_actual==1) { echo "Selected"; } ?>> Armadillo </option>
                                                            <option value="2" <?php if($txtTienda_actual==2) { echo "Selected"; } ?>> Ciudadela </option>
                                                            <option value="3" <?php if($txtTienda_actual==3) { echo "Selected"; } ?>> San Fierro </option>
                                                            <option value="4" <?php if($txtTienda_actual==4) { echo "Selected"; } ?>> Los Santos </option>
                                                    </select>
                                                </div>
                                            </div>
                                         <!-- /. Fin div tienda-->

                                         <!-- DIV ciclo-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="txtCiclo">Ciclo</label>
                                                <select class="form-control" name="txtCiclo">
                                                    <option value=1 <?php if($txtCiclo==1) { echo "Selected"; } ?> >1</option>
                                                    <option value=2 <?php if($txtCiclo==2) { echo "Selected"; } ?> >2</option>
                                                    <option value=3 <?php if($txtCiclo==3) { echo "Selected"; } ?> >3</option>
                                                    <option value=4 <?php if($txtCiclo==4) { echo "Selected"; } ?> >4</option>
                                                    <option value=5 <?php if($txtCiclo==5) { echo "Selected"; } ?> >5</option>
                                                    <option value=6 <?php if($txtCiclo==6) { echo "Selected"; } ?> >6</option>
                                                    <option value=7 <?php if($txtCiclo==7) { echo "Selected"; } ?> >7</option>
                                                    <option value=8 <?php if($txtCiclo==8) { echo "Selected"; } ?> >8</option>
                                                    <option value=9 <?php if($txtCiclo==9) { echo "Selected"; } ?> >9</option>
                                                    <option value=10  <?php if($txtCiclo==10) { echo "Selected"; } ?> >10</option>
                                                    <option value=11  <?php if($txtCiclo==11) { echo "Selected"; } ?> >11</option>
                                                    <option value=12  <?php if($txtCiclo==12) { echo "Selected"; } ?> >12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /. Fin DIV ciclo-->

                                        <!-- DIV Fecha -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="txtFecha">Fecha</label>
                                                        <input type="date" class="form-control" name="txtFecha" placeholder="" value="<?php echo $txtFecha;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /. Fin DIV Fecha -->

                                    <!-- Inicio Div select tienda-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtQueso_actual">Producto</label>
                                                <select class="form-control" name="txtQueso_actual">
                                                        <option value="1" <?php if($txtQueso_actual==1) { echo "Selected"; } ?>> Queso Duro Blanco </option>
                                                        <option value="2" <?php if($txtQueso_actual==2) { echo "Selected"; } ?>> Queso Mozarella </option>
                                                        <option value="3" <?php if($txtQueso_actual==3) { echo "Selected"; } ?>> Queso Gouda </option>
                                                        <option value="4" <?php if($txtQueso_actual==4) { echo "Selected"; } ?>> Queso Dietético </option>
                                                </select>
                                            </div>
                                        </div>
                                    <!-- /. Fin inicio Div Empresa-->

                                    <!-- Div Cantidad -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="txtCantidad">Cantidad</label>
                                            <input type="number" class="form-control" name="txtCantidad" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCantidad; ?>">
                                        </div>
                                    </div>
                                    <!-- Div Cantidad -->
                                    
                                    <!-- Div pvp -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="txtPvp">PVP</label>
                                            <input type="number" class="form-control" name="txtPvp" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtPvp; ?>">
                                        </div>
                                    </div>
                                    <!-- /. Div pvp -->
                                    
                                    <!-- Div pvp -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="txtTotal">Total</label>
                                            <input type="number" class="form-control" name="txtTotal" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtTotal; ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- /. Div pvp -->
                                    <!-- Div mensaje -->
                                    <?php if($disponibilidad=="NO") {?>
                                        <div class="col-md-12">
                                            <h2 class="text-center text-danger"> <?php echo $mensaje_disponibilidad; ?></h2>
                                        </div>
                                    <?php } ?>
                                    <!-- /. Div mensaje -->
                                    </div>  
                                </div>
                            </div>
                        </div>
                    <!-- /. Div ficha producción -->

                    <!-- Div CTA -->
                    <div class="col-md-12">
                            <div class="row justify-content-left">
                                <div class="col-md-4">
                                    <input type="hidden" class="" name="nro_tiendas" value="<?php echo $nro_tiendas;?>">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Procesar">
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

                <!-- /. Instrucciones si no se va a procesar -->
                <?php }else{ ?>

                        <!-- Imprimer mensaje de alerta o error al final de procesar o antes de procesar  -->
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
                                        <div class="row justify-content-center">
                                            <div class="col-md-3">
                                                <a href="tiendas.php"type="button" class="btn btn-primary btn_block">Aceptar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- fin de imprimir mensaje ---------------------------------------------------  -->

                <?php } ?>
            </div>
            <!-- /. fin row del contenedor  -->

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

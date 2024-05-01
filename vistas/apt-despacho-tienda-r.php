<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/apt-despacho-tienda-r.php";
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
                <h1 class="m-0 text-dark">APT Despacho Tienda | Preparar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="apt.php">APT</a></li>
                <li class="breadcrumb-item"><a href="despacho.php">Despacho</a></li>
                <li class="breadcrumb-item active">APT Despacho Tienda</li>
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

                    <!-- Íconos Generales -->
                        <div class="col-md-12" style="padding: 0px 10px 20px 10px;">
                            <a href="despacho-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    <!-- /. Fin íconos Generales -->
                    <form action="apt-despacho-tienda-r.php" method="post" class="row" style="padding: 0px 10px 0px 10px;">
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
                                     <option value=10 <?php if($txtCiclo==10) { echo "Selected"; } ?> >10</option>
                                     <option value=11 <?php if($txtCiclo==11) { echo "Selected"; } ?> >11</option>
                                     <option value=12 <?php if($txtCiclo==12) { echo "Selected"; } ?> >12</option>
                                 </select>
                             </div>
                        </div>
                        <!-- /. Fin DIV ciclo-->

                        <!-- DIV vacío] -->
                        <div class="col-md-6">
                            <div class="form-group">
                            </div>
                        </div>
                        <!-- /. Fin DIV vacío -->

                        <!-- Div productos por despachar -->
                        <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Productos Terminados por Despachar</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
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

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtCant_dub">Queso Duro Blanco</label>
                                                    <input type="number" class="form-control" name="txtCant_dub" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_dub;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtCant_moz">Queso Mozarella</label>
                                                    <input type="number" class="form-control" name="txtCant_moz" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_moz;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtCant_gou">Queso Gouda</label>
                                                    <input type="number" class="form-control" name="txtCant_gou" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_gou;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtCant_die">Queso Dietético</label>
                                                    <input type="number" class="form-control" name="txtCant_die" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_die;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="txtTotal">Total</label>
                                                    <input type="number" class="form-control" name="txtTotal" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtTotal;?>" readonly>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        <!-- /. Div productos por despachar-->

                        <!-- Div CTA -->
                        <div class="col-md-12">
                                <div class="row justify-content-left" style="padding: 0px 0px 10px 0px;">
                                    <div class="col-md-1" style="padding: 3px 5px 3px 5px;">
                                        <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Calcular">  
                                    </div>
                                    <?php if ($calcular=="SI"){ ?>
                                        <div class="col-md-1" style="padding: 3px 3px 3px 3px;">
                                            <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Guardar">
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-1" style="padding: 3px 3px 3px 3px;">
                                        <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Cancelar">
                                    </div>
                                </div>
                            </div>
                        <!-- /. Fin Div CTA -->

                        <!-- Inicio Div vacio-->
                            <div class="col-md-8">     
                            </div>
                        <!-- /. Fin inicio Div vacio-->
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
                                        <form action="despacho.php" method="post">
                                            <div class="row justify-content-center">
                                                <div class="col-md-4">
                                                    <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="despacho-r.php" type="button" class="btn btn-primary btn-block"><i class="fas fa-plus-circle"></i> Nuevo Despacho</a>
                                                </div>
                                            </div>
                                        </form>
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

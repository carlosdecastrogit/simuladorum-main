<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/apt-despacho-tienda.php";
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
                <h1 class="m-0 text-dark">APT Despacho Tienda</h1>
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
                            <a href="apt-despacho-tienda-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Preparar</a>
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    <!-- /. Fin íconos Generales -->

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
                    <!-- Inicio Div vacio-->
                        <div class="col-md-8">
                            
                        </div>
                    <!-- /. Fin inicio Div Empresa-->

                    <!-- Ficha movimientos de despachos preparados-->
                        <div class="col-12">
                            <div class="card card-primary text-center">
                            <div class="card-header">
                                <h3 class="card-title"><b>Productos Terminados para despachar (preparados)</b></h3>

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
                                        <th>Queso Duro Blanco </th>
                                        <th>Queso Mozarella</th>
                                        <th>Queso Gouda</th>
                                        <th>Queso Dietético</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($listado_apt_dtienda as $apt_dtienda){?>
                                        <tr>
                                            <td><?php echo $apt_dtienda['ciclo'];?></td>
                                            <td><?php echo $apt_dtienda['fecha'];?></td>
                                            <td><?php echo $apt_dtienda['cant_dub'];?></td>
                                            <td><?php echo $apt_dtienda['cant_moz'];?></td>
                                            <td><?php echo $apt_dtienda['cant_gou'];?></td>
                                            <td><?php echo $apt_dtienda['cant_die'];?></td>
                                            <td><?php echo $apt_dtienda['cant_total'];?></td>
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
                                    <?php }?>
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    <!-- /. Fin ficha movimientos de despacho-->
                    <!-- Separador-->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador-->
                    <!-- Resumen Almacén de productos terminados-->
                        <div class="col-12">
                            <div class="card card-primary text-center">
                            <div class="card-header">
                                <h3 class="card-title"><b>Resumen Almacén de productos terminados </b></h3>

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
                                        <th>Queso Duro Blanco </th>
                                        <th>Queso Mozarella</th>
                                        <th>Queso Gouda</th>
                                        <th>Queso Dietético</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $dub_ciclo_1;?></td>
                                        <td><?php echo $moz_ciclo_1;?></td>
                                        <td><?php echo $gou_ciclo_1;?></td>
                                        <td><?php echo $die_ciclo_1;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_1+$moz_ciclo_1+$gou_ciclo_1+$die_ciclo_1;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo $dub_ciclo_2;?></td>
                                        <td><?php echo $moz_ciclo_2;?></td>
                                        <td><?php echo $gou_ciclo_2;?></td>
                                        <td><?php echo $die_ciclo_2;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_2+$moz_ciclo_2+$gou_ciclo_2+$die_ciclo_2;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><?php echo $dub_ciclo_3;?></td>
                                        <td><?php echo $moz_ciclo_3;?></td>
                                        <td><?php echo $gou_ciclo_3;?></td>
                                        <td><?php echo $die_ciclo_3;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_3+$moz_ciclo_3+$gou_ciclo_3+$die_ciclo_3;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><?php echo $dub_ciclo_4;?></td>
                                        <td><?php echo $moz_ciclo_4;?></td>
                                        <td><?php echo $gou_ciclo_4;?></td>
                                        <td><?php echo $die_ciclo_4;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_4+$moz_ciclo_4+$gou_ciclo_4+$die_ciclo_4;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><?php echo $dub_ciclo_5;?></td>
                                        <td><?php echo $moz_ciclo_5;?></td>
                                        <td><?php echo $gou_ciclo_5;?></td>
                                        <td><?php echo $die_ciclo_5;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_5+$moz_ciclo_5+$gou_ciclo_5+$die_ciclo_5;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><?php echo $dub_ciclo_6;?></td>
                                        <td><?php echo $moz_ciclo_6;?></td>
                                        <td><?php echo $gou_ciclo_6;?></td>
                                        <td><?php echo $die_ciclo_6;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_6+$moz_ciclo_6+$gou_ciclo_6+$die_ciclo_6;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><?php echo $dub_ciclo_7;?></td>
                                        <td><?php echo $moz_ciclo_7;?></td>
                                        <td><?php echo $gou_ciclo_7;?></td>
                                        <td><?php echo $die_ciclo_7;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_7+$moz_ciclo_7+$gou_ciclo_7+$die_ciclo_7;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td><?php echo $dub_ciclo_8;?></td>
                                        <td><?php echo $moz_ciclo_8;?></td>
                                        <td><?php echo $gou_ciclo_8;?></td>
                                        <td><?php echo $die_ciclo_8;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_8+$moz_ciclo_8+$gou_ciclo_8+$die_ciclo_8;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td><?php echo $dub_ciclo_9;?></td>
                                        <td><?php echo $moz_ciclo_9;?></td>
                                        <td><?php echo $gou_ciclo_9;?></td>
                                        <td><?php echo $die_ciclo_9;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_9+$moz_ciclo_9+$gou_ciclo_9+$die_ciclo_9;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><?php echo $dub_ciclo_10;?></td>
                                        <td><?php echo $moz_ciclo_10;?></td>
                                        <td><?php echo $gou_ciclo_10;?></td>
                                        <td><?php echo $die_ciclo_10;?></td>
                                        <td>
                                            <?php 
                                                $total=$dub_ciclo_10+$moz_ciclo_10+$gou_ciclo_10+$die_ciclo_10;
                                                echo $total;
                                            ?>
                                        </td>
                                    </tr>

                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    <!-- /. Fin Resumen Almacén de productos terminados-->

                    <!-- Separador-->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador-->

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

<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/despacho.php";
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
                <h1 class="m-0 text-dark">DESPACHO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="despacho.php">Despacho</a></li>
                <li class="breadcrumb-item active">Despacho Movimientos</li>
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
        <!-- Despacho -->

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

                    <!-- Ficha movimientos de despacho-->
                        <div class="col-12">
                            <div class="card text-center">
                            <div class="card-header">
                                <h3 class="card-title"><b>Movimientos Despacho</b></h3>

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
                                        <th>Fecha </th>
                                        <th>Producto</th>
                                        <th>Existencia</th>
                                        <th>Armadillo</th>
                                        <th>Ciudadela</th>
                                        <th>San Fierro</th>
                                        <th>Los Santos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($listado_despacho as $despacho) { ?>
                                        <tr>
                                            <td><?php echo $despacho['ciclo']; ?></td>
                                            <td><?php echo $despacho['fecha']; ?></td>
                                            <td><?php echo $despacho['nombre_queso']; ?></td>
                                            <td><?php echo $despacho['cant_xdespacho']; ?></td>
                                            <td><?php echo $despacho['cant_desp_arm']; ?></td>
                                            <td><?php echo $despacho['cant_desp_ciu']; ?></td>
                                            <td><?php echo $despacho['cant_desp_sfi']; ?></td>
                                            <td><?php echo $despacho['cant_desp_lsa']; ?></td>
                                            <td>
                                                <form action="" method="">
                                                    <input type="hidden" name="txtNro" value="<?php echo $despacho['nro']; ?>">
                                                    <input type="hidden" name="txtNro_empresa" value="<?php echo $despacho['nro_empresa']; ?>">
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
                    <!-- /. Fin ficha movimientos de despacho-->

                    <!-- Separador-->
                        <div class="col-md-12">
                            <hr style="color: #0056b2;" />
                        </div>
                    <!-- /. Fin Separador-->

                    <!-- Título -->
                        <div class="col-md-12">
                            <h2>Costo Transporte</h2>
                        </div>
                        <div class="col-md-2" style="padding: 0px 0px 20px 10px">Armadillo <b>0,080</b></div>
                        <div class="col-md-2" style="padding: 0px 0px 20px 10px">Ciudadela <b>0,090</b></div>
                        <div class="col-md-2" style="padding: 0px 0px 20px 10px">San Fierro <b>0,075</b></div>
                        <div class="col-md-2" style="padding: 0px 0px 20px 10px">Los Santos <b>0,085</b></div>   
                        <div class="col-md-4" style="padding: 0px 0px 20px 10px"></div>   
                    <!-- Título -->

                    <!-- Ficha movimientos costo de transporte-->
                        <div class="col-12">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h3 class="card-title"><b>Movimientos Costos de Transporte</b></h3>

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
                                            <th>Fecha </th>
                                            <th>Producto </th>
                                            <th>Armadillo</th>
                                            <th>Ciudadela</th>
                                            <th>San Fierro</th>
                                            <th>Los Santos</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($listado_despacho as $despacho) { ?>
                                            <tr>
                                                <td><?php echo $despacho['ciclo']; ?></td>
                                                <td><?php echo $despacho['fecha']; ?></td>
                                                <td><?php echo $despacho['nombre_queso']; ?></td>
                                                <td><?php echo $despacho['cost_t_arm']; ?></td>
                                                <td><?php echo $despacho['cost_t_ciu']; ?></td>
                                                <td><?php echo $despacho['cost_t_sfi']; ?></td>
                                                <td><?php echo $despacho['cost_t_lsa']; ?></td>
                                                <td><?php echo $despacho['cost_t_total']; ?></td>
                                                <td>
                                                    <form action="" method="">
                                                        <input type="hidden" name="txtNro" value="<?php echo $despacho['nro']; ?>">
                                                        <input type="hidden" name="txtNro_empresa" value="<?php echo $despacho['nro_empresa']; ?>">
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
                    <!-- /. Fin ficha movimientos de despacho-->

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

<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/apt.php";
        include "modulos/encabezado.php";
        include "modulos/menu.php";
    
    ?>  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0 text-dark">ALMACÉN DE PRODUCTOS TERMINADOS (APT)</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="apt.php">APT</a></li>
                <li class="breadcrumb-item active">APT</li>
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
                        <div class="col-md-12" style="padding: 0px 15px 10px 20px;">
                            <a href="apt-despacho-tienda.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Despacho Tienda</a>
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    <!-- /. Fin de Íconos Generales -->

    <!-- Inicio de tarjetas de datos ---------------------------------------------------------------->

    <!-- Contenedor Queso Blanco Duro --------------------------------------------------------------->
        <div class="container" style="padding: 10px 15px 0px 20px;">
            <!-- Contenido General -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Almacén Queso Blanco Duro</h3>
                </div>                

            <!-- Variables de Almacén Queso Blanco Duro --------------------------------------------------->
                <!-- Inicio Div Empresa-->
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="txt_cant_cmax_qd">Cap. Max. (Kg)</label>
                        <input type="number" class="form-control" name="txt_cant_cmax_qd" placeholder="" value="<?php echo $txt_cant_cmax_qd; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="txt_cant_e_qd">Existencia</label>
                        <input type="number" class="form-control" name="txt_cant_e_qd" placeholder="" value="<?php echo $txt_cant_e_qd; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-capdisp">
                        <label for="txt_cant_disp_qd">Capacidad Disponible</label>
                        <input type="number" class="form-control" name="txt_cant_disp_qd" placeholder="" value="<?php echo $txt_cant_disp_qd; ?>">
                    </div>
                </div>
                <!-- /. Fin de Variables de Almacén Queso Blanco Duro -->

            </div>
            <!-- /. Fin de contenido General -->

            <!-- Tabla de movimientos Queso Blanco Duro -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card card-primary text-center">
                        <div class="card-header">
                            <h3 class="card-title"><b>Movimientos Queso Blanco Duro</b></h3>

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
                                <?php if($cant_listado_quesoduro>=1){ ?>
                                    <?php foreach($listado_quesoduro as $quesoduro) {?>
                                <tr>
                                    <td><?php echo $quesoduro['ciclo'] ?></td>
                                    <td><?php echo $quesoduro['fecha'] ?></td>
                                    <td><?php echo $quesoduro['tipo'] ?></td>
                                    <td><?php echo $quesoduro['cant_entrada'] ?></td>
                                    <td><?php echo $quesoduro['cant_salida'] ?></td>
                                    <td><?php echo $quesoduro['cant_total'] ?></td>
                                    <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <?php } ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td><?php echo "0"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /. fin col -->
            </div>

            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
            <!-- /. Fin de separador -->

        </div>
    <!-- /. Fin contenedor queso duro --------------------------------------------------------------->

    <!-- Contenedor Queso Queso Mozarella ----------------------------------------------------------->
        <div class="container" style="padding: 10px 15px 0px 20px;">
            <!-- Contenido General -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Almacén Queso Mozarella</h3>
                </div>                

            <!-- Variables de Almacén Queso Queso Mozarella----------->
                <!-- Inicio Div Empresa-->
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="txt_cant_cmax_moz">Cap. Max. (Kg)</label>
                        <input type="number" class="form-control" name="txt_cant_cmax_moz" placeholder="" value="<?php echo $txt_cant_cmax_moz; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="txt_cant_e_moz">Existencia</label>
                        <input type="number" class="form-control" name="txt_cant_e_moz" placeholder="" value="<?php echo $txt_cant_e_moz; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-capdisp">
                        <label for="txt_cant_disp_moz">Capacidad Disponible</label>
                        <input type="number" class="form-control" name="txt_cant_disp_moz" placeholder="" value="<?php echo $txt_cant_disp_moz; ?>">
                    </div>
                </div>
                <!-- /. Fin de Variables de Almacén Queso Blanco Duro -->

            </div>
            <!-- /. Fin de contenido General -->

            <!-- Tabla de movimientos Queso Blanco Duro -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card card-primary text-center">
                        <div class="card-header">
                            <h3 class="card-title"><b>Movimientos Queso Mozarella</b></h3>

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
                                <?php if($cant_listado_quesomozarella>=1){ ?>
                                    <?php foreach($listado_quesomozarella as $mozarella) {?>
                                    <tr>
                                        <td><?php echo $mozarella['ciclo'] ?></td>
                                        <td><?php echo $mozarella['fecha'] ?></td>
                                        <td><?php echo $mozarella['tipo'] ?></td>
                                        <td><?php echo $mozarella['cant_entrada'] ?></td>
                                        <td><?php echo $mozarella['cant_salida'] ?></td>
                                        <td><?php echo $mozarella['cant_total'] ?></td>
                                        <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                    </tr>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td><?php echo "0"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /. fin col -->
            </div>

            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
            <!-- /. Fin de separador -->

        </div>
    <!-- /. fin del contenedor Queso Queso Mozarella ------------------------------------------------>

    <!-- Contenedor Queso Gouda---------------------------------------------------------------------->
        <div class="container" style="padding: 10px 15px 0px 20px;">
            <!-- Contenido General -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Almacén Queso Gouda</h3>
                </div>                

            <!-- Variables de Almacén Queso Queso Mozarella----------->
                <!-- Inicio Div Empresa-->
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="txt_cant_cmax_gou">Cap. Max. (Kg)</label>
                        <input type="number" class="form-control" name="txt_cant_cmax_gou" placeholder="" value="<?php echo $txt_cant_cmax_gou; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="txt_cant_e_gou">Existencia</label>
                        <input type="number" class="form-control" name="txt_cant_e_gou" placeholder="" value="<?php echo $txt_cant_e_gou; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-capdisp">
                        <label for="txt_cant_disp_gou">Capacidad Disponible</label>
                        <input type="number" class="form-control" name="txt_cant_disp_gou" placeholder="" value="<?php echo $txt_cant_disp_gou; ?>">
                    </div>
                </div>
                <!-- /. Fin de Variables de Almacén Queso gouda -->

            </div>
            <!-- /. Fin de contenido General -->

            <!-- Tabla de movimientos Queso Blanco Duro -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card card-primary text-center">
                        <div class="card-header">
                            <h3 class="card-title"><b>Movimientos Queso Gouda</b></h3>

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
                                <?php if($cant_listado_quesogouda>=1){ ?>
                                    <?php foreach($listado_quesogouda as $gouda) {?>
                                        <tr>
                                            <td><?php echo $gouda['ciclo'] ?></td>
                                            <td><?php echo $gouda['fecha'] ?></td>
                                            <td><?php echo $gouda['tipo'] ?></td>
                                            <td><?php echo $gouda['cant_entrada'] ?></td>
                                            <td><?php echo $gouda['cant_salida'] ?></td>
                                            <td><?php echo $gouda['cant_total'] ?></td>
                                            <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td><?php echo "0"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /. fin col -->
            </div>

            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
            <!-- /. Fin de separador -->

        </div>
    <!-- /. fin del contenedor Queso Queso Mozarella ----------------------------------------------------------->
   
    <!-- Contenedor Queso Dietético------------------------------------------------------------------>
        <div class="container" style="padding: 10px 15px 0px 20px;">
            <!-- Contenido General -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Almacén Queso Dietético</h3>
                </div>                

            <!-- Variables de Almacén Queso Queso Mozarella----------->
                <!-- Inicio Div Empresa-->
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="txt_cant_cmax_die">Cap. Max. (Kg)</label>
                        <input type="number" class="form-control" name="txt_cant_cmax_die" placeholder="" value="<?php echo $txt_cant_cmax_die; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="txt_cant_e_die">Existencia</label>
                        <input type="number" class="form-control" name="txt_cant_e_die" placeholder="" value="<?php echo $txt_cant_e_die; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-capdisp">
                        <label for="txt_cant_disp_die">Capacidad Disponible</label>
                        <input type="number" class="form-control" name="txt_cant_disp_die" placeholder="" value="<?php echo $txt_cant_disp_die; ?>">
                    </div>
                </div>
                <!-- /. Fin de Variables de Almacén Queso gouda -->

            </div>
            <!-- /. Fin de contenido General -->

            <!-- Tabla de movimientos Queso Blanco Duro -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card card-primary text-center">
                        <div class="card-header">
                            <h3 class="card-title"><b>Movimientos Queso Dietético</b></h3>

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
                                <?php if($cant_listado_quesodietetico>=1){ ?>
                                    <?php foreach($listado_quesodietetico as $dietetico) {?>
                                        <tr>
                                            <td><?php echo $dietetico['ciclo'] ?></td>
                                            <td><?php echo $dietetico['fecha'] ?></td>
                                            <td><?php echo $dietetico['tipo'] ?></td>
                                            <td><?php echo $dietetico['cant_entrada'] ?></td>
                                            <td><?php echo $dietetico['cant_salida'] ?></td>
                                            <td><?php echo $dietetico['cant_total'] ?></td>
                                            <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td><?php echo "0"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "0.00"; ?></td>
                                        <td><?php echo "-"; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /. fin col -->
            </div>

            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
            <!-- /. Fin de separador -->

        </div>
    <!-- /. fin del contenedor Queso Queso Mozarella ------------------------------------------------>


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
                                <form action="apt.php" method="post">
                                    <div class="row justify-content-center">
                                        <?php if($btnOperador="SI"){ ?>
                                            <div class="col-md-2">    
                                            <a href="apt-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo Despacho</a>
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

<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/publicidad.php";
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
                <h1 class="m-0 text-dark">PUBLICIDAD </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pcm.php">PUBLICIDAD</a></li>
                <li class="breadcrumb-item active">Publicidad</li>
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

                    <!-- DIV Empresa-->
                    <form class="col-md-12" action="publicidad.php" method="post" >
                        <div class="row">

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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtTotal_inversion">Total Inversión</label>
                                <input type="text" class="form-control" name="txtTotal_inversion" value="<?php echo $txtTotal_inversion; ?>">
                            </div>
                        </div>
                        <!-- /. Fin DIV Empresa-->

                        <!-- DIV Vacío-->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <!-- <form action="pcm-mod.php" method="post" > -->
                                        <label for="btn_accion">.</label>
                                        <input type="submit" class="btn btn-primary form-control" name="btn_accion" value="Calcular">
                                    <!-- </form> -->
                                </div>
                            </div>
                        <!-- /. Fin DIV Operador-->
                        <!-- DIV Vacío-->
                            <div class="col-md-3">

                            </div>
                        <!-- /. Fin DIV Operador-->
                        </div>
                    </form>

                    <!-- Tabla de movimientos -->
                        <div class="col-12" style="padding: 0px 0px 0px 0px;">
                            <div class="card card-primary">
                                <div class="card-header ">
                                    <h3 class="card-title"><b>Publicidad</b></h3>

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
                                <div class="card-body table-responsive p-0" style="height: 320px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Armadillo</th>
                                                <th>San Fierro</th>
                                                <th>Ciudadela</th>
                                                <th>Los Santos</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                                <tr>
                                                    <td> Queso Duro Blanco</td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_dub_arm">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_dub_sfi">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_dub_ciu">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_dub_lsa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Queso Mozzarella</td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_moz_arm">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_moz_sfi">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_moz_ciu">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_moz_lsa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Queso Gouda </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_gou_arm">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_gou_sfi">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_gou_ciu">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_gou_lsa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Queso Dietético </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_die_arm">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_die_sfi">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_die_ciu">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtpub_die_lsa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td> Queso Dietético </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtEmpresa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtEmpresa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtEmpresa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td> 
                                                        <div class="">
                                                            <select class="form-control" name="txtEmpresa">
                                                                    <option value="1"> Ninguna </option>
                                                                    <option value="2"> Videos Promocionales </option>
                                                                    <option value="3"> Vallas en avenidas y carreteras </option>
                                                                    <option value="4"> Flyers </option>
                                                                    <option value="5"> Otros </option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    <!-- /. Fin Tabla de movimientos -->

                    <!-- Inicio de imágenes --->
                    <div class="col-md-12">
                        <div class="row justify-content-around" style="padding: 30px 0 30px 0;">
                            <div class="col-md-12" style="padding: 0px 0 20px 0;">
                                <h3 class="text-center">Información demográfica de <strong>Santino</strong></h3>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-center">Niños</h4>
                                <img src="img/P1.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-center">Jóvenes</h4>
                                <img src="img/P2.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-center">Adultos</h4>
                                <img src="img/P3.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-center">Adultos Mayores</h4>
                                <img src="img/P4.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row justify-content-center" style="padding: 30px 0 30px 0;">
                            <div class="col-md-12" style="padding: 0px 0 20px 0;">
                                <h3 class="text-center">Uso de los productos en <strong>Santino</strong></h3>
                            </div>
                            <div class="col-md-5">
                                <h4 class="text-left">Queso Duro Blanco</h4>
                                <p>Un queso de textura firme y sabor fuerte, que se utiliza comúnmente para rallar y espolvorear sobre pastas y ensaladas.</p>
                            </div>
                            <div class="col-md-5">
                                <h4 class="text-left">Queso Gouda</h4>
                                <p>Un queso semi-duro, con un sabor ligeramente dulce y cremoso. Se puede disfrutar solo, en sándwiches o como ingrediente en platos calientes. </p>
                            </div>
                            <div class="col-md-5">
                                <h4 class="text-left">Queso Mozarella</h4>
                                <p>Un queso suave de pasta hilada y textura elástica. Se utiliza comúnmente en pizzas, ensaladas y sándwiches. </p>
                            </div>
                            <div class="col-md-5">
                                <h4 class="text-left">Queso Dietético</h4>
                                <p>Un queso bajo en grasas y calorías, hecho generalmente a partir de leche descremada. Es una opción popular para personas que buscan reducir su ingesta de grasa.</p>
                            </div>

                        </div>
                    </div>

                    <!-- /. Fin de Imágenes ---->

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
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                        </div>
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

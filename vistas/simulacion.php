<?php
    include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/simulacion.php";
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
                <h1 class="m-0 text-dark">SIMULACIÓN</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tiendas</a></li>
                <li class="breadcrumb-item active">Tiendas</li>
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
        <div class="container" style="padding: 0px 20px 50px 20px;">

            <div class="row justify-content-center">
                <!-- Íconos Generales -->
                
                <div class="col-md-10" style="padding: 0px 0px 20px 10px;">
                    <?php if($cantRegistros>=1) { ?>
                        <!-- <a href="simulacion-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a> -->
                        <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                        <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                    <?php } ?>
                </div>
                <?php  if ($mensaje_usuario!=""){ ?>
                    <div class="col-12 ">
                        <?php if($error_accion>1){ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php }else {?> 
                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                        <?php }?> 
                    </div>
                <?php } ?>
                <?php if($cantRegistros==1){ ?>
                        <div class="col-md-10">
                            <!-- Tarjeta -->
                            <div class="card card-primary">
                                <!-- Cabecera de tarjeta -->
                                <div class="card-header">
                                    <h3 class="card-title">Simulación Activa</h3>
                                </div>
                                <!-- / cabecera de tarjeta -->
                                <!-- Inicio formulario -->
                                <form action="simulacion.php" method="post">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" name="txtNro" value="<?php echo $txtNro; ?>">
                                                <div class="form-group">
                                                    <label for="txtId">ID Simulación</label>
                                                    <input type="input" class="form-control" placeholder="ID Simulación" name="txtId" value="<?php echo $txtId; ?>">
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="txtFechaInicio">Fecha Inicio</label>
                                                    <input type="date" class="form-control" placeholder="Fecha de inicio" name="txtFechaInicio" value="<?php echo $txtFechaInicio; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="txtEstatus">Estatus</label>
                                                    <input type="input" class="form-control" placeholder="Estatus de la Simulación" name="txtEstatus" value="<?php echo $txtEstatus; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Descripción</span>
                                                    </div>
                                                    <textarea class="form-control" aria-label="With textarea" name="txtDescripcion" > <?php echo $txtDescripcion; ?> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <?php if($cantRegistros>=1) { ?>
                                            <div class="row justify-content-center">
                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Finalizar" name="btn_accion">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </form>
                                <!-- / Fin Formulario -->
                            </div>
                            <!-- /. Fin de tarjeta -->
                        </div>
                <?php }else{ ?>
                        <div class="col-md-12">
                            <h3 class="text-center text-danger">NO HAY SIMULACIÓN ACTIVA</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <a href="simulacion-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Crear Simulación</a>
                                </div>
                            </div>
                        </div>
                <?php } ?>

            </div>  
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

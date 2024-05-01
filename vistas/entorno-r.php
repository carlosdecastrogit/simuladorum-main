<?php
include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/entorno-r.php";
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
                <h1 class="m-0 text-dark">Entorno</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Entorno</a></li>
                <li class="breadcrumb-item active">Entorno</li>
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

        <!-- Contendor Principal -->
        <div class="container" style="">
            <?php if ($procesar=="ok") {  ?>

                <div class="row justify-content-center">
                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-12 ">
                        <?php if($error_accion>1){ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php }?> 
                        </div>
                    <?php } ?>

                    <div class="col-md-8">
                        <p class="lead">
                            <b>Bienvenidos</b>, acaban de hacer una inversión importante para la producción de queso con el propósito de satisfacer el paladar de los habitantes de <b>Santino</b>.
                        </p>
                        <p class="lead">
                            A continuación te explicaremos como es la estructura y organización de la empresa. Pero antes debemos registrar el nombre comercial de la Empresa.
                        </p>
                    </div>
                    <div class="col-md-8" style="padding-top:20px;">
                        <form action="entorno-r.php" method="post">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del Entorno</h3>
                                </div>
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtId">ID de la empresa (*)</label>
                                            <input type="text"  class="form-control" name="txtId" placeholder="ID de la empresa" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="txtNombre">Nombre de la Empresa (*)</label>
                                            <input type="text" class="form-control" name="txtNombre" placeholder="Nombre de la empresa" required>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4"><input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar"> <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row justify-content-around" style="padding: 50px 0 50px 0;">
                    <div class="col-md-3">
                        <h3 class="text-center">Mapa</h3>
                        <img src="img/mapa.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-center">Organigrama</h3>
                        <img src="img/organigrama.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-center">Estructura</h3>
                        <img src="img/lafabrica.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                    </div>
                </div>

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

                <form action="entorno.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="txtNro" value="<?php $txtNro; ?>">
                            <input type="hidden" name="txtId" value="<?php $txtId; ?>">
                            <input type="hidden" name="txtnNmbre" value="<?php $txtNombre; ?>">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            
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

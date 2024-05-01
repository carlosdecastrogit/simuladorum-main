<?php
include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/entorno.php";
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
        <!-- VErifica si hay simulación activa -->
        <?php if($cantsimulacion>=1){ ?>

            <!-- Contendor Principal -->
            <div class="container" style="padding-top: 0px;">
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
                        <!-- Mensaje cuando no hay entorno -->
                        <?php if ($entorno=="NO"){?>
                            <div class="col-md-8">
                                <h3 class="text-center text-danger"><?php echo $mensaje_entorno; ?></h3>
                            </div>
                        <?php } ?>
                        <!-- / Fin Mensaje cuando no hay entorno -->
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <form action="entorno-c.php" method="post">
                                <div class="">
                                    <div class="form-group">
                                        <?php if($txtUsuarioTipo=="A") { ?>
                                            <div class="form-group">
                                                <label for="select">Empresas</label>
                                                <select class="form-control" name="txtEmpresa">
                                                    <?php foreach ($listado_entorno as $entorno) { ?>
                                                    <option value="<?php echo $entorno['nro']; ?>"><?php echo $entorno['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php }else { ?>                                    
                                            <div class="form-group">
                                                <label for="select">Empresa</label>
                                                <select class="form-control" name="txtEmpresa">
                                                    <?php foreach ($listado_entorno as $entorno) { ?>
                                                    <option value="<?php echo $entorno['nro']; ?>"><?php echo $entorno['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="">
                                    <!-- <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar"> -->
                                    <?php if($entorno=="NO") { ?>
                                        <a href="entorno-r.php" class="btn btn-primary">Nuevo</a>
                                    <?php } ?>
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Consultar">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Modificar">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Eliminar">
                                    <!-- <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar"> -->
                                    <!-- <button type="submit" class="btn btn-primary">Crear Entorno</button> -->
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
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <input type="hidden" name="txtNro" value="<?php $txtNro; ?>">
                                <input type="hidden" name="txtId" value="<?php $txtId; ?>">
                                <input type="hidden" name="txtNombre" value="<?php $txtNombre; ?>">

                                <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                
                <?php } ?>
            </div>        

        <?php }else{ ?>

            <div class="col-md-12">
                <h3 class="text-center text-danger">NO HAY SIMULACIÓN ACTIVA <?php if ($txtUsuarioTipo=="P") { echo "CONTACTE CON EL ADMINISTRADOR"; }?></h3>
            </div>
            <?php if ($txtUsuarioTipo=="A") { ?>
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <a href="simulacion-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Crear Simulación</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php } ?>
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

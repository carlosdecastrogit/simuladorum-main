<?php
    include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/usuario-r.php";
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
                <h1 class="m-0 text-dark">CREAR USUARIO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="usuarios.php">Usuarios</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
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

        <div class="container" style="padding-top: 25px;">

            <div class="row justify-content-center" >
            <!-- Condicional Central de proceso -->
            <?php if ($procesar=="ok") {  ?>

                <?php  if ($mensaje_usuario!=""){ ?>
                    <div class="col-12 ">
                        <?php if($error_accion>1){ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php }else {?> 
                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                        <?php }?> 
                    </div>
                <?php } ?>
                <!-- Columna de Card -->
                <div class="col-md-5">
                    <!-- Login Card -->
                    <div class="card card-primary">
                        <!-- Cabecera de tarjeta -->
                        <div class="card-header">
                            <h3 class="card-title">Datos del Usuario</h3>
                        </div>
                        <!-- /.Fin cabecera de tarjeta -->

                        <!-- / Card-body -->
                        <div class="card-body">

                            <form action="usuario-r.php" method="post">
                                <div class="form-group">
                                    <label for="txtnombre">Nombre (*)</label>
                                    <input type="text" class="form-control" placeholder="Ingresa Nombre" value="<?php echo $nombre; ?>"  name="txtnombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="txtid">Número único de identificación (*)</label>
                                    <input type="text" class="form-control" placeholder="Ingresa ID" value="<?php echo $id; ?>" name="txtid" required>
                                </div>

                                <div class="form-group">
                                    <label for="opc_tipo">Tipo (*)</label>
                                    <select class="form-control" value="<?php echo $tipo; ?>" name="opc_tipo" required>
                                    <option>Participante</option>
                                    <option>Administrador</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="txtemail">Usuario (correo) (*)</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Ingresa Email" value="<?php echo $txtemail; ?>" name="txtemail" required>
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtpassword1">Clave / Passsword (*)</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Ingresa Password" value="<?php echo $txtpassword1; ?>" name="txtpassword1" required>
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtpassword2">Reingresa Clave / Passsword (*)</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Repite el Password" value="<?php echo $txtpassword2; ?>" name="txtpassword2" required>
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Crear" name="btn_accion">
                                        <input type="submit" class="btn btn-primary btn-block" value="Cancelar" name="btn_accion">
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>
                        <!-- /. Fin card-body -->

                    </div>
                    <!-- /. Fin card primario -->
                </div>
                <!-- Final de Card -->
            <?php } else{ ?>

                <?php  if ($mensaje_usuario!=""){ ?>
                    <div class="col-12 ">
                        <?php if($error_accion==1){ ?>
                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                        <?php }else{ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php } ?>    
                    </div>
                <?php } ?>

                <form action="usuario-r.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="txtid" value="<?php $id; ?>">
                            <input type="hidden" name="txtid" value="<?php $nombre; ?>">
                            <input type="hidden" name="txtnombre" value="<?php $tipo; ?>">
                            <input type="hidden" name="txtusuario" value="<?php $txtemail; ?>">
                            <input type="hidden" name="txtpassword1" value="<?php $txtpassword1; ?>">
                            <input type="hidden" name="txtpassword2" value="<?php $txtpassword2; ?>">


                            <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                
            <?php } ?>

            </div>
        <!--- Fin Login box -->

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

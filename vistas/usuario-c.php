<?php
    include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/usuario-c.php";
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
                <h1 class="m-0 text-dark">ADMINISTRACIÓN DE USUARIOS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="usuarios.php">Usuarios</a></li>
                <li class="breadcrumb-item active">Administración de Usuarios</li>
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
            <!-- Muestra los input para procesar: editar, eliminar; si la variable procesar es ok-->
            <?php if ($procesar=="ok") {  ?>
                <?php  if ($mensaje_usuario!=""){ ?>
                    <div class="col-12 ">
                        <?php if($error_accion>1){ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php }?> 
                    </div>
                <?php } ?>
                <div class="col-md-5">
                <!-- Inicio de Tarjeta (Card) -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Usuario</h3>
                    </div>
                    <div class="card-body">

                        <form action="usuario-c.php" method="post">

                            <div class="form-group">
                                <label for="txtnro">Número único de identificación</label>
                                <input type="number" class="form-control" placeholder="" value="<?php echo $nro; ?>" name="txtnro" readonly>
                            </div>
                            <div class="form-group">
                                <label for="txtid">ID</label>
                                <input type="text" class="form-control" placeholder="" value="<?php echo $id; ?>" name="txtid" readonly>
                            </div>
                            <div class="form-group">
                                <label for="txtnombre">Nombre</label>
                                <?php if($accion=="E"){ ?>
                                    <input type="text" class="form-control" placeholder="" value="<?php echo $nombre; ?>" name="txtnombre">
                                <?php }else { ?>
                                    <input type="text" class="form-control" placeholder="" value="<?php echo $nombre; ?>" name="txtnombre" readonly>
                                <?php } ?>
                            </div>
                            <?php // if($accion=="C" OR $accion=="X" ){ ?>
                                <div class="form-group">
                                    <label for="txttipo">Tipo</label>
                                    <input type="text" class="form-control" placeholder="" value="<?php echo $tipousuario; ?>" name="txttipo" readonly>
                                </div>
                            <!--
                            <?php // } else{ ?>
                                <div class="form-group">
                                    <label for="txttipo">Tipo</label>
                                    <select class="form-control" name="txttipo" readonly>
                                        <option>Participante</option>
                                        <option>Administrador</option>
                                    </select>
                                </div>
                            <?php // } ?>
                            -->
                            <div class="form-group">
                                <label for="txtusuario">Usuario</label>
                                    <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Ingresa Email" value="<?php echo $usuario; ?>" name="txtusuario" readonly>
                                    <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txttipo">Fecha de Registro</label>
                                <input type="date" class="form-control" placeholder="Ingresa Email" value="<?php echo $fecha_reg; ?>" name="txtfecha_reg" readonly>
                            </div>
                            <?php if($accion=="E"){ ?>
                                <div class="form-group">
                                    <label for="txtpassword">Clave/Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Ingresa Password" value="<?php echo $password1; ?>" name="txtpassword1">
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtpassword2">Reingresa Clave/Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Repite el Password" value="<?php echo $password2; ?>" name="txtpassword2">
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <input type="hidden" name="txtpassword1" value="<?php $password1; ?>">
                                <input type="hidden" name="txtpassword2" value="<?php $password2; ?>">
                            <?php } ?>
                            <div class="row">
                                <div class="col-12">
                                    <?php if($accion=="E"){ ?>
                                        <input type="submit" class="btn btn-success btn-block" name="btnaccion" value="Actualizar">
                                    <?php } ?>
                                    <?php if($accion=="X"){ ?>    
                                        <input type="submit" class="btn btn-danger btn-block" name="btnaccion" value="Eliminar">
                                    <?php } ?>
                                        <input type="submit" class="btn btn-primary btn-block" name="btnaccion" value="Cancelar">
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.login-box -->
                </div>

            <!-- Muestra el mensaje cuando se realiza satisfactoriamente los procesos -->
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

                <form action="usuario-c.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="txtnro" value="<?php $txtnro; ?>">
                            <input type="hidden" name="txtid" value="<?php $txtid; ?>">
                            <input type="hidden" name="txtnombre" value="<?php $txtnombre; ?>">
                            <input type="hidden" name="txtusuario" value="<?php $txtusuario; ?>">
                            <input type="hidden" name="txtpassword1" value="<?php $txtpassword1; ?>">
                            <input type="hidden" name="txtpassword2" value="<?php $txtpassword2; ?>">
                            <input type="hidden" name="txtfecha_reg" value="<?php $txtfecha_reg; ?>">
                            <input type="hidden" name="txttipo" value="<?php $txttipo; ?>">

                            <input type="submit" class="btn btn-primary btn-block" name="btnaccion" value="Aceptar">
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

<?php
include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/entorno-c.php";
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
                <h1 class="m-0 text-dark">Gestión de Entorno | <?php  echo $accion; ?></h1>
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

        <!-- Contendor de Datos -->
        <div class="container" >
            <?php if ($procesar=="ok") {  ?>

                <div class="row justify-content-center">
                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-12 ">
                        <?php if($error_accion>1){ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php }?> 
                        </div>
                    <?php } ?>

                    <div class="col-md-10" style="padding-top:20px;">
                        <form action="entorno-c.php" method="post">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del <strong>Entorno</strong></h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtNro">Número / Código</label>
                                                <input type="text"  class="form-control" name="txtNro" value="<?PHP echo $txtNro; ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtId">ID</label>
                                                <input type="text"  class="form-control" name="txtId" value="<?PHP echo $txtId; ?>" placeholder="" <?php if ($accion=="Modificar") { echo "required"; }  ?> <?php if ($accion=="Consultar") { echo "readonly"; }  ?> >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtNombre">Nombre</label>
                                                <input type="text"  class="form-control" name="txtNombre" value="<?PHP echo $txtNombre; ?>" placeholder="" <?php if ($accion=="Modificar") { echo "required"; }  ?>  <?php if ($accion=="Consultar") { echo "readonly"; }  ?>  >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtIdUsuario">Participante</label>
                                                <input type="text"  class="form-control" name="txtNombreUsuario" value="<?PHP echo implode($txtNombreUsuario)." "."(Nro: ".$txtUsuarioe.")"; ?>" placeholder="" <?php if ($accion=="Modificar"){ echo "readonly"; } ?> readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtFrecha_creacion">Fecha de creación</label>
                                                <input type="text"  class="form-control" name="txtFrecha_creacion" value="<?PHP echo $txtFecha_Creacion; ?>" placeholder="" <?php if ($accion=="Modificar"){ echo "readonly"; }?>  <?php if ($accion=="Consultar") { echo "readonly"; }  ?> >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtMonto_Presupuesto"> Monto Presupuesto </label>
                                                <input type="text" class="form-control" name="txtPresupuesto" value=" <?PHP echo $txtMonto_Presupuesto; ?>" placeholder="" <?php if ($accion=="Modificar"){ echo "readonly"; }?>  <?php if ($accion=="Consultar") { echo "readonly"; }  ?> >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtMonto_Saldo_Actual"> Monto Saldo Actual </label>
                                                <input type="text" class="form-control" name="txtMonto_Saldo_Actual" value=" <?PHP echo $txtMonto_Saldo_Actual; ?>" placeholder="" <?php if ($accion=="Modificar"){ echo "readonly"; } ?>  <?php if ($accion=="Consultar") { echo "readonly"; }  ?> >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtMonto_Multas"> Monto Multas </label>
                                                <input type="text" class="form-control" name="txtMonto_Multas" value=" <?PHP echo $txtMonto_Multas; ?>" placeholder="" <?php if ($accion=="Modificar"){ echo "readonly"; } ?>  <?php if ($accion=="Consultar") { echo "readonly"; }  ?> >
                                            </div>
                                        </div>
                                    </div>         
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="row justify-content-left">
                                <div class="col-md-4">
                                    <?php if ($accion=="Modificar"){ ?>
                                        <input type="submit" class="btn btn-primary" name="btn_accion" value="Actualizar">
                                    <?php } ?>
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Aceptar">
                                </div>
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
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <?php if($error_accion==1){ ?>
                                    <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                                <?php }else{ ?>
                                    <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                                <?php } ?>  
                            </div>

                        </div>
                          
                    </div>
                <?php } ?>

                <form action="entorno-c.php" method="post">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <input type="hidden" name="txtNro" value="<?php $txtNro; ?>">
                                <input type="hidden" name="txtId" value="<?php $txtId; ?>">
                                <input type="hidden" name="txtnNmbre" value="<?php $txtNombre; ?>">

                                <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                            </div>
                            <!-- /.col -->
                        </div>
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

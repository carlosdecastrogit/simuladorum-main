<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        
        include "modulos/calendario-r.php";
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
                <h1 class="m-0 text-dark">CALENDARIO</h1>
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

        <!-- Tabla de Calendario-->
        <div class="container" style="padding-top: 25px;">
            <div class="row justify-content-center">
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
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <!-- cabecera de tarjeta -->
                                <div class="card-header">
                                    <h3 class="card-title">Datos del Calendario</h3>
                                </div>
                                <!-- /final cabecera de tarjeta -->
                                <!-- Inicio formulario -->
                                <form action="calendario-r.php" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="txtId">ID (*)</label>
                                            <input type="input" class="form-control" name="txtId" placeholder="ID Simulación" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtFecha">Fecha de inicio (*)</label>
                                            <input type="date" date_format="Y" class="form-control" name="txtFecha" placeholder="" value="<?php echo $txtFecha; ?>" required>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Observación</span>
                                            </div>
                                            <textarea class="form-control" aria-label="With textarea" name="txtObservacion" ></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar" >
                                        <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar" >
                                        <!-- <button type="submit" class="btn btn-primary" name="btnguardar">Guardar Simulación</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
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

                    <form action="calendario-r.php" method="post">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="txtid" value="<?php $txtid; ?>">
                                <input type="hidden" name="txtFecha" value="<?php $txtFecha; ?>">
                                <input type="hidden" name="txtObservacion" value="<?php $txtObservacion; ?>">


                                <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                <?php } ?>
            </div>  

        </div>
        <!-- ./ Fin de Tabla de Calendario-->

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

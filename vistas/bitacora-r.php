<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/bitacora-r.php";
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
                    <h1 class="m-0 text-dark">BITÁCORA</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Bitácora</a></li>
                    <li class="breadcrumb-item active">General</li>
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

        <!-- Contenedor Principal -->
        <div class="container" style="padding-top: 0px;">
        
            <?php if ($procesar=="ok") {  ?>
                <div class="row justify-content-center">

                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-md-12 ">
                        <?php if($error_accion>1){ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php }?> 
                        </div>
                    <?php } ?>


                    <div class="col-md-10">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Registro Bitácora</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="bitacora-r.php" method="post">
                                <div class="card-body">
                                    <div class="row justify-content-left">
                                        <div class="col-md-4">
                                            <!-- Div Empresa -->
                                            <div class="form-group">
                                                <label for="txtNro_empresa">Empresa</label>
                                                <select class="form-control" name="txtNro_empresa">
                                                <?php foreach ($listado_empresa as $empresa){ ?>
                                                    <option value="<?php echo $empresa['nro']; ?>"><?php echo $empresa['nombre']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="txtCiclo">Ciclo</label>
                                                <select class="form-control" name="txtCiclo">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                            </div> 
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="txtFecha">Fecha</label>
                                                <input type="date" class="form-control" placeholder="" name="txtFecha" value="<?php echo $txtFecha; ?>">
                                            </div>
                                        </div>                                     
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="txtMontoMulta">Multa ($)</label>
                                                <input type="number" step="0.01" class="form-control" placeholder="" name="txtMontoMulta" value="<?php echo $txtMontoMulta; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="txtFechaPago">Fecha de Pago</label>
                                                <input type="date" class="form-control" placeholder="" name="txtFechaPago" value="<?php echo $txtFechaPago; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Observaciones</span>
                                                </div>
                                                <textarea class="form-control" aria-label="With textarea" name="txtObservacion"> <?php echo $txtObservacion; ?> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <?php if ($txtUsuarioTipo=="A") {?>
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar">
                                    <?php } ?> 
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar"> 
                                    <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> &nbsp; Guardar </button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-window-close"></i> &nbsp; Cancelar</button>
                                    -->
                                </div>
                            </form>
                        </div>
                    </div>

                </div>  
            <?php }else{ ?>
                <div class="row justify-content-center">
                <?php  if ($mensaje_usuario!=""){ ?>
                    <div class="col-md-12 ">
                        <?php if($error_accion==1){ ?>
                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                        <?php }else{ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php } ?>    
                    </div>
                <?php } ?>

                <form action="bitacora-r.php" method="post">
                    <div class="col-md-12">
                        <input type="hidden" name="txtCiclo" value="<?php $txtCiclo; ?>">
                        <input type="hidden" name="txtNro_empresa" value="<?php $txtNro_empresa; ?>">
                        <input type="hidden" name="txtFecha" value="<?php $txtFecha; ?>">
                        <input type="hidden" name="txtMontoMulta" value="<?php $txtMontoMulta; ?>">
                        <input type="hidden" name="txtFechaPago" value="<?php $txtFechaPago; ?>">
                        <input type="hidden" name="txtObservacion" value="<?php $txtObservacion; ?>">
                        <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                    </div>
                </form>
                </div>
            <?php } ?>

        </div>
        <!-- /. Fin de Contenedor Principal -->
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

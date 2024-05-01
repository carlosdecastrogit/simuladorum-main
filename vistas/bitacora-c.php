<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/bitacora-c.php";
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
                                <h3 class="card-title">Gestión Bitácora</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="bitacora-c.php" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="txtNro">Nro ID</label>
                                                <input type="number" class="form-control" placeholder="" value="<?php echo $txtNro; ?>" name="txtNro" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                    <label for="txtCiclo">Ciclo</label>
                                                    <?php if($accion=="E"){ ?>
                                                        <select class="form-control" name="txtCiclo">
                                                            <option value="1" <?php if($txtCiclo=="1"){ echo "Selected"; } ?>>1</option>
                                                            <option value="2" <?php if($txtCiclo=="2"){ echo "Selected"; } ?>>2</option>
                                                            <option value="3" <?php if($txtCiclo=="3"){ echo "Selected"; } ?> >3</option>
                                                            <option value="4" <?php if($txtCiclo=="4"){ echo "Selected"; } ?>>4</option>
                                                            <option value="5" <?php if($txtCiclo=="5"){ echo "Selected"; } ?>>5</option>
                                                            <option value="6" <?php if($txtCiclo=="6"){ echo "Selected"; } ?>>6</option>
                                                            <option value="7" <?php if($txtCiclo=="7"){ echo "Selected"; } ?>>7</option>
                                                            <option value="8" <?php if($txtCiclo=="8"){ echo "Selected"; } ?>>8</option>
                                                            <option value="9" <?php if($txtCiclo=="9"){ echo "Selected"; } ?>>9</option>
                                                            <option value="10" <?php if($txtCiclo=="10"){ echo "Selected"; } ?>>10</option>
                                                            <option value="11" <?php if($txtCiclo=="11"){ echo "Selected"; } ?>>11</option>
                                                            <option value="12" <?php if($txtCiclo=="12"){ echo "Selected"; } ?>>12</option>
                                                        </select>
                                                    <?php }else{ ?>
                                                        <input type="text" class="form-control" name="txtCiclo" value="<?php echo $txtCiclo; ?>">
                                                    <?php } ?>
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="txtNro_empresa">Empresa</label>
                                                <select class="form-control" name="txtNro_empresa">
                                                <?php foreach ($listado_empresa as $empresa){ ?>
                                                    <option value="<?php echo $empresa['nro']; ?>" <?php if($txtNro_empresa==$empresa['nro']){ echo "Selected"; } ?>><?php echo $empresa['nombre']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="txtFecha">Fecha</label>
                                                <?php if($accion=="E"){ ?>
                                                    <input type="date" class="form-control" placeholder="" name="txtFecha" value="<?php echo $txtFecha; ?>">
                                                <?php }else{ ?>
                                                    <input type="text" class="form-control" name="txtFecha" value="<?php echo $txtFecha; ?>">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label for="txtMontoMulta">Multa ($)</label>
                                            <?php if($accion=="E"){ ?>
                                                <input type="number" step="0.01" class="form-control" placeholder="" name="txtMontoMulta" value="<?php echo $txtMontoMulta; ?>">
                                            <?php }else{ ?>
                                                <input type="text" class="form-control" name="txtMontoMulta" value="<?php echo $txtMontoMulta; ?>">
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <label for="txtFechaPago">Fecha Pago</label>
                                            <?php if($accion=="E"){ ?>
                                                <input type="date" class="form-control" placeholder="" name="txtFechaPago" value="<?php echo $txtFechaPago; ?>">
                                            <?php }else{ ?>
                                                <input type="text" class="form-control" name="txtFechaPago" value="<?php echo $txtFechaPago; ?>">
                                            <?php } ?>
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
                                                                        
                                    <input type="hidden" name="txtEstatus" value="<?php $txtEstatus; ?>">
                                    <input type="hidden" name="txtFecha_reg" value="<?php $txtFecha_reg; ?>">
                                    <input type="hidden" name="txtUsuario_reg" value="<?php $txtUsuario_reg; ?>">
                                    <input type="hidden" name="txtEstatus_reg" value="<?php $txtEstatus_reg; ?>">    
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="col-md-12">
                                        <div class="row justify-content-left">
                                            <div class="col-md-4">
                                                <?php if($accion=="E"){ ?>
                                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Actualizar">
                                                <?php } ?>
                                                <?php if($accion=="X"){ ?>    
                                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Eliminar">
                                                <?php } ?>
                                                <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar">
                                            </div>
                                        </div>
                                    </div>
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

                <form action="bitacora-c.php" method="post">
                    <div class="col-md-12">
                        <input type="hidden" name="txtCiclo" value="<?php $txtCiclo; ?>">
                        <input type="hidden" name="txtNro_empresa" value="<?php $txtNro_empresa; ?>">
                        <input type="hidden" name="txtFecha" value="<?php $txtFecha; ?>">
                        <input type="hidden" name="txtMontoMulta" value="<?php $txtMontoMulta; ?>">
                        <input type="hidden" name="txtFechaPago" value="<?php $txtFechaPago; ?>">
                        <input type="hidden" name="txtEstatus" value="<?php $txtEstatus; ?>">
                        <input type="hidden" name="txtFecha_reg" value="<?php $txtFecha_reg; ?>">
                        <input type="hidden" name="txtUsuario_reg" value="<?php $txtUsuario_reg; ?>">
                        <input type="hidden" name="txtEstatus_reg" value="<?php $txtEstatus_reg; ?>">

                        <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                    </div>
                </form>
                </div>
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

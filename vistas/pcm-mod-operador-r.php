<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/pcm-mod-operador-r.php";
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
                <h1 class="m-0 text-dark">PCM-MOD | Operador</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="pcm-mod.php">PCM-MOD</a></li>
                    <li class="breadcrumb-item active">PCM-MOD Operador</li>
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
        
        <!-- Contenedor principal -->
        <div class="container" style="padding: 0px 0 50px 0;">
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
                
                    
                        <!-- Tarjeta de datos -->
                        <div class="col-md-8">
                    <form class="" action="pcm-mod-operador-r.php" method="post">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del Operador</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- DIV ID -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtId"> ID</label>
                                                <input type="text" class="form-control" name="txtId" placeholder="Introduce ID del Operadro" value="" required>
                                            </div>
                                        </div>

                                        <!-- DIV Empresa-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtEmpresa">Empresa</label>
                                                <select class="form-control" name="txtEmpresa">
                                                    <?php foreach ($listado_empresa as $empresa) { ?>
                                                        <option value="<?php echo $empresa['nro']; ?>"> <?php echo $empresa['nombre']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtNombre">Nombre</label>
                                                <input type="text" class="form-control" name="txtNombre" placeholder="Introduce el nombre del operador" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtCargo">Cargo</label>
                                                <select class="form-control" name="txtCargo">
                                                        <option value="Operador"> Operador </option>
                                                </select>
                                                <!--- 
                                                <label for="txtCargo">Cargo</label>
                                                <input type="text" class="form-control" name="txtCargo" placeholder="Introduce el Cargo" value="" required>
                                                    -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtCargo">Cantidad horas semanales</label>
                                                <input type="number" max="60" min="1" step="1.00" class="form-control" name="txtCant_horas_sem" placeholder="1.00" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtCant_horas_max_sem">Cantidad máxima de horas semanales</label>
                                                <input type="number" max="60" min="1" step="1.00" class="form-control" name="txtCant_horas_max_sem" placeholder="1.00" value="" required>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar">
                                </div>

                            </div>
                        </div>
                    </form>

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
        <!-- Fin de contenedor principal -->
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

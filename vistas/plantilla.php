<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/apt-cto.php";
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
                <h1 class="m-0 text-dark">APT - CTO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="apt.php">APT</a></li>
                <li class="breadcrumb-item active">APT-CTO</li>
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

---------------------------------------------------------------------------------------------------------------
    <!-- Inicio del contenedor de datos -->
        <div class="container" style="padding: 0px 20px 50px 20px;">
            <div class="row justify-content-center">
                <!-- Verifica si se debe procesar -->
                <?php if ($procesar=="ok") {  ?>
                    <!-- Imprimer mensaje de alerta o error en procesar [calcular, guardar]  -->
                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-12 ">
                            <?php if($error_accion==1){ ?>
                                <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                            <?php }else{ ?>
                                <h3 class="text-center text-danger"><?php echo "ERROR 4: ".$mensaje_usuario; ?></h3>
                            <?php } ?>    
                        </div>
                    <?php } ?>
                    <!-- /. Fin del mensaje -----------------------------------------------  -->

                    <!-- Div CTA -->
                        <div class="col-md-12">
                            <div class="row justify-content-left">
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Producir">
                                    <?php if ($calcular=="SI"){ ?>
                                        <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar">
                                    <?php } ?>
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar">
                                    <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> &nbsp; Guardar </button>
                                    <a class="btn btn-primary" href="inicio.php" role="button"><i class="fas fa-window-close"></i> &nbsp; Cancelar</a> -->
                                </div>
                            </div>
                        </div>
                    <!-- /. Fin Div CTA -->

                <!-- /. Instrucciones si no se va a procesar -->
                <?php }else{ ?>

                        <!-- Imprimer mensaje de alerta o error al final de procesar o antes de procesar  -->
                        <?php  if ($mensaje_usuario!=""){ ?>
                            <div class="col-md-12 ">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <?php if($error_accion==1){ ?>
                                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                                        <?php }else{ ?>
                                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                                        <?php } ?>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form action="subasta-r.php" method="post">
                                            <div class="row justify-content-center">
                                                <div class="col-md-3">
                                                    <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- fin de imprimir mensaje ---------------------------------------------------  -->

                <?php } ?>
            </div>
            <!-- /. fin row del contenedor  -->

        </div>
    <!-- /. Fin de contenedor de datos -->
---------------------------------------------------------------------------------------------------------------
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

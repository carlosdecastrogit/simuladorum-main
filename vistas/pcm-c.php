<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/pcm-c.php";
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
                <h1 class="m-0 text-dark">PCM | Producir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="pcm.php">PCM</a></li>
                <li class="breadcrumb-item active">PCM Producir</li>
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
        <div class="container" style="padding: 0px 20px 50px 20px;">

            <div class="row justify-content-left" style="padding: 0px 0px 30px 0px;">
                <div class="col-md-12">
                    <h3>Productos</h3>
                </div>
                <div class="col-md-12">
                    <span> <i class="fas fa-cheese" style="padding: 0 10px 0 0;"></i>Queso Duro</span> 
                    <span> <i class="fas fa-cheese" style="padding: 0 10px 0 20px;"></i>Queso Mozarella</span>
                    <span> <i class="fas fa-cheese" style="padding: 0 10px 0 20px;"></i>Queso Gouda</span>
                    <span> <i class="fas fa-cheese" style="padding: 0 10px 0 20px;"></i>Queso Dietético</span>
                </div>
            </div>
                
            <form class="row justify-content-center" action="inicio.php" method="post">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="text-empresa">Empresa</label>
                            <select class="form-control" id="text-empresa">
                                <option>Empresa ACME</option>
                                <option>Empresa 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">

                    </div>

                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Datos PCM</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="num-ciclo">Ciclo</label>
                                    <input type="number" class="form-control" id="num-ciclo" placeholder="Ciclo" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="fechaproduccion">Fecha Producción</label>
                                    <input type="date" class="form-control" id="fechaproduccion" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="text-tipo">Tipo</label>
                                    <select class="form-control" id="text-tipo">
                                        <option>P</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="num-lechecruda">Entrada Leche Cruda Ltrs</label>
                                    <input type="number" class="form-control" id="num-lechecruda" placeholder="" value="0.00">
                                </div>
                                <div class="form-group">
                                    <label for="num-aditivo">Entrada Aditivo Ltrs</label>
                                    <input type="number" class="form-control" id="num-aditivo" placeholder="" value="0.00">
                                </div>
                                <div class="form-group">
                                    <label for="num-quesoproducido">Queso Producido Kg</label>
                                    <input type="number" class="form-control" id="num-quesoproducido" placeholder="" value="0.00">
                                </div>
                                <div class="form-group">
                                    <label for="text-producto">Producto</label>
                                    <input type="text" class="form-control" id="text-producto" placeholder="Producto" value="">
                                </div>
                                <div class="form-group">
                                    <label for="num-ctoproduccion">Costo Producción</label>
                                    <input type="number" class="form-control" id="num-ctoproduccion" placeholder="" value="0.00">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        
                    </div>

                    <div class="col-md-7">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> &nbsp; Guardar </button>
                        <a class="btn btn-primary" href="inicio.php" role="button"><i class="fas fa-check"></i> &nbsp; Aceptar</a>
                        <a class="btn btn-primary" href="inicio.php" role="button"><i class="fas fa-pencil-alt"></i> &nbsp; Editar</a>
                        <a class="btn btn-primary" href="inicio.php" role="button"><i class="fas fa-trash-alt"></i> &nbsp; Eliminar</a>
                        <a class="btn btn-primary" href="inicio.php" role="button"><i class="fas fa-window-close"></i> &nbsp; Cancelar</a>
                    </div>
            </form>
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

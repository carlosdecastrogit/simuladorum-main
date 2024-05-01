<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/amp-r.php";
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
                <h1 class="m-0 text-dark">AMP | Salidas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="amp.php">AMP</a></li>
                <li class="breadcrumb-item active">Registro</li>
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
        <!-- inicio DIV de contenido -->
        <div class="container" style="padding: 0px 20px 50px 20px;">
            <div class="row justify-content-center">
                
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

                    <div class="col-md-5">
                        <div class="form-group">
                                        <label for="num-ciclo">Ciclo</label>
                                        <input type="number" class="form-control" id="num-ciclo" placeholder="Ciclo" value="0">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Leche Cruda (LC)</h3>
                            </div>
                            <div class="card-body">
                                    <!--
                                    <div class="form-group">
                                        <label for="num-ciclo">Ciclo</label>
                                        <input type="number" class="form-control" id="num-ciclo" placeholder="Ciclo" value="0">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="fechasalidalc">Fecha Salida LC</label>
                                        <input type="date" class="form-control" id="fechasalidalc" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="txt-operacionlc">Operación LC</label>
                                        <select class="form-control" id="txt-operacionlc">
                                            <option>S</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="num-cantidadlc">Cantidad LC</label>
                                        <input type="number" class="form-control" id="num-cantidadlc" placeholder="" value="0.00">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Aditivos (AD)</h3>
                            </div>
                            <div class="card-body">
                                    <!--
                                    <div class="form-group">
                                        <label for="num-ciclo">Ciclo</label>
                                        <input type="number" class="form-control" id="num-ciclo" placeholder="Ciclo" value="0">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="fechasalidaad">Fecha Salida AD</label>
                                        <input type="date" class="form-control" id="fechasalidaad" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="txt-operacionad">Operación AD</label>
                                        <select class="form-control" id="txt-operacionad">
                                            <option>S</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="num-catidadad">Cantidad AD</label>
                                        <input type="number" class="form-control" id="num-catidadad" placeholder="" value="0.00">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> &nbsp; Guardar </button>
                        <a class="btn btn-primary" href="amp.php" role="button"><i class="fas fa-window-close"></i> &nbsp; Cancelar</a>
                    </div>
                </form>

            </div> 
        </div>
        <!-- /. Fin DIV de contenido -->
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

<?php
    include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/simulacion.php";
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
                <h1 class="m-0 text-dark">SIMULACIÓN</h1>
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
        <div class="container" style="padding-top: 25px;">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Simulación</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="txt-idsimulacion">ID Simulación</label>
                                    <input type="input" class="form-control" id="txt-idsimulacion" placeholder="ID Simulación">
                                </div>
                                <div class="form-group">
                                    <label for="fechainicio">Fecha Inicio</label>
                                    <input type="date" class="form-control" id="fechainicio" placeholder="Fecha de inicio">
                                </div>
                                <div class="form-group">
                                    <label for="txt-estatus">Estatus</label>
                                    <input type="input" class="form-control" id="txt-estatus" placeholder="Estatus de la Simulación">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Descripción</span>
                                    </div>
                                    <textarea class="form-control" aria-label="With textarea" id="txt-descrip" ></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="simulacion-r.php">Crear Simulación</a>
                            </div>
                            <!-- /.card-body -->
                    </div>
                </div>

            </div>  
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

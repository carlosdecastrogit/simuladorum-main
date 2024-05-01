<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/variables.php";
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
                <h1 class="m-0 text-dark">VARIABLES</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tiendas</a></li>
                <li class="breadcrumb-item active">Tiendas</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container" style="padding-top: 25px;">
            <div class="row mb-2 align-items-end">
                <div class="col-sm-12 col-md-12">
                    <p class="text-center">Contenido de la columna</p>
                </div>
            </div>

            <div class="row justify-content-center" style="padding: 40px 40px; ">
                <div class="col-sm-1 col-md-1">
                    <a class="btn btn-primary" href="#" role="button">Botón</a>
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

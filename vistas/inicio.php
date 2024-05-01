<?php
    include "../controladores/enlaces.php";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/inicio.php";
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
                <h1 class="m-0 text-dark">INICIO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Presentación</li>
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
        <div class="container" style="padding-top: 0px;">
            <div class="row mb-2 align-items-end">
                <div class="col-sm-12 col-md-6">
                <img src="img/logo-universidad.png" class="img-fluid rounded mx-auto d-block" alt="Logo Universidad">
                </div>
                <div class="col-sm-12 col-md-5 justify-content-center">
                    <div>
                        <p class="text-justify">
                        "Los mejores líderes son los que que anteponen sus equipos a todo lo demás, los que crean un ambiente de trabajo en el que la gente se siente importante y oporta ideas y opiniones. Invierte en tu gente antes de invertir en tu negocio."
                        </p>
                    </div>
                    <div>
                        <p class="text-right">
                        <strong>Michael Mahoney , CEO Boston Scientific</strong>
                        </p>
                    </div>
                </div>  
            </div>

            <div class="row justify-content-center" style="padding-top: 50px;">
                <div class="col-sm-12 col-md-10 ">
                <p class="text-justify">
                    En nombre de la <a href="https://www.unimet.edu.ve/">Universidad Metropolitana</a>, le damos la bienvenida a nuestro proceso de enseñanza de simulacion de negocios, donde ustedes serán los responsables de llevar las riendas del negocio, tomando algunos roles importantes dentro de la organización.
                </p>
                <p class="text-justify">
                    Liderazgo, visión de negocio, adaptación al cambio, creatividad , capacidad para tomar riesgos y la confianza en tu equipo, serán competencias que tendrás que poner en práctica para alcanzar los mejores resultados.
                </p>
                </div>
            </div>
            <!-- Botón Comenzar 
            <div class="row justify-content-center" style="padding: 40px 40px; ">
                <div class="col-sm-2 col-md-2">
                    <a class="btn btn-primary" href="subasta.php" role="button">Comenzar</a>
                </div>
            </div>
            -->
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

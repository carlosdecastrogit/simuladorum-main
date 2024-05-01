<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/apt-c.php";
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
                <h1 class="m-0 text-dark">APT | Consulta</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="apt.php">APT</a></li>
                <li class="breadcrumb-item active">APT Consulta</li>
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
        <div class="container" style="padding: 25px 20px 50px 20px;">
                
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
                    <!--
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="num-ciclo">Ciclo</label>
                            <input type="number" class="form-control" id="num-ciclo" placeholder="Ciclo" value="0">
                        </div>
                    </div>
                    -->
                    <div class="col-md-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Datos APT</h3>
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="text-tipoqueso">Tipo de Queso</label>
                                        <select class="form-control" id="text-tipoqueso">
                                            <option>Queso Duro Blanco</option>
                                            <option>Queso Mozarella</option>
                                            <option>Queso Gouda</option>
                                            <option>Queso Dietético</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="num-ciclo">Ciclo</label>
                                        <input type="number" class="form-control" id="num-ciclo" placeholder="Ciclo" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="fechaproduccion">Fecha</label>
                                        <input type="date" class="form-control" id="fechaproduccion" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="text-tipo">Tipo</label>
                                        <select class="form-control" id="text-tipo">
                                            <option>E</option>
                                            <option>S</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="num-entradas">Entradas</label>
                                        <input type="number" class="form-control" id="num-entradas" placeholder="" value="0.00">
                                    </div>
                                    <div class="form-group">
                                        <label for="num-salidas">Salidas</label>
                                        <input type="number" class="form-control" id="num-salidas" placeholder="" value="0.00">
                                    </div>
                                    <div class="form-group">
                                        <label for="num-totalunidades">Total Unidades</label>
                                        <input type="number" class="form-control" id="num-totalunidades" placeholder="" value="0.00">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        
                    </div>

                    <div class="col-md-5">
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

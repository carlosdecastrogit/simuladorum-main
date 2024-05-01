<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/tiendas-mov-r.php";
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
                <h1 class="m-0 text-dark">TIENDAS | Registro</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="tiendas-mov.php">TIENDAS MOV</a></li>
                <li class="breadcrumb-item active">Tiendas Mov. Registro</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-md-12">
                <hr style="color: #0056b2;" />
            </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
        <div class="container" style="padding: 0px 20px 20px 20px;">
            <!-- Variables Globales -->
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" style="padding-top: 20px;">
                        <label for="texto-empresa">Empresa</label>
                        <input type="text" class="form-control" id="texto-empresa" placeholder="Empresa" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" style="padding-top: 20px;">
                        <label for="num-capalmacen">Cap. Almacenaje</label>
                        <input type="number" class="form-control" id="num-capalmacen" placeholder="" value="0.00">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" style="padding-top: 20px;">
                        <label for="num-existencia">Existencia</label>
                        <input type="number" class="form-control" id="num-existencia" placeholder="" value="0.00">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-capdisp" style="padding-top: 20px;">
                        <label for="num-capdisp">Capacidad Disponible</label>
                        <input type="number" class="form-control" id="num-capdis" placeholder="" value="0.00">
                    </div>
                </div>
            </div>
            
            <!-- Formulario -->
            <form class="row justify-content-center" action="inicio.php" method="post">

                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tiendas MOV</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text-tipoqueso">Tipo de Queso</label>
                                            <select class="form-control" id="text-tipoqueso">
                                                <option>Queso Duro Blanco</option>
                                                <option>Queso Mozarella</option>
                                                <option>Queso Gouda</option>
                                                <option>Queso Dietético</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="num-ciclo">Ciclo</label>
                                            <input type="number" class="form-control" id="num-ciclo" placeholder="Ciclo" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fechaproduccion">Fecha</label>
                                            <input type="date" class="form-control" id="fechaproduccion" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text-transaccion">Tipo Transacción</label>
                                            <select class="form-control" id="text-transaccion">
                                                <option>Transacción 1</option>
                                                <option>Trnasacción 2</option>
                                                <option>Transacción 3</option>
                                                <option>Transacción 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="num-ventas">Ventas (Kg) / Ajuste</label>
                                            <input type="number" class="form-control" id="num-ventas" placeholder="" value="0.00">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="num-pvp">PVP</label>
                                            <input type="number" class="form-control" id="num-pvp" placeholder="" value="0.00">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="num-disponibilidad">Disponibilidad</label>
                                            <input type="number" class="form-control" id="num-disponibilidad" placeholder="" value="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> &nbsp; Guardar </button>
                        <a class="btn btn-primary" href="amp.php" role="button"><i class="fas fa-window-close"></i> &nbsp; Cancelar</a>
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

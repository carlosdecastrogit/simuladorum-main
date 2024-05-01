<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/tiendas-mov.php";
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
                <h1 class="m-0 text-dark">TIENDAS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="tiendas-mov.php">Tiendas</a></li>
                <li class="breadcrumb-item active">Movimientos</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-md-12">
                <hr style="color: #0056b2;" />
            </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Cabecera del contenido -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">          
                <!-- Variables Globales -->
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
                <div class="col-md-12">
                    <form  class="row" action="inicio.php" method="post">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="select-tienda">Tienda</label>
                                <select class="form-control" id="select-tienda">
                                    <option>Armadillo</option>
                                    <option>San Fierro</option>
                                    <option>Ciudadela</option>
                                    <option>Los Santos</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding: 32px 0px 0px 0px;">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> &nbsp; Mostrar </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Separador -->
            <div class="row">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
        </div>
        <!-- Queso Blanco Duro -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Queso Blanco Duro</h3>
                </div>                
                <!-- Íconos Generales -->
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="tiendas-mov-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>

                <div class="col-md-6">

                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Despachos a tienda Queso Blanco Duro</b></h3>

                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Ciclo</th>
                                <th>Fecha</th>
                                <th>Transacción</th>
                                <th>Entradas</th>
                                <th>Ventas (Kgr) / Ajustes</th>
                                <th>PVP</th>
                                <th>Ingresos</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
        </div>
        <!-- Queso Mozarella -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Queso Mozarella</h3>
                </div>                
                <!-- Íconos Generales -->
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="tiendas-mov-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>

                <div class="col-md-6">

                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Despachos a tienda Queso Mozarella</b></h3>

                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Ciclo</th>
                                <th>Fecha</th>
                                <th>Transacción</th>
                                <th>Entradas</th>
                                <th>Ventas (Kgr) / Ajustes</th>
                                <th>PVP</th>
                                <th>Ingresos</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
        </div>
        <!-- Queso Gouda -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Queso Gouda</h3>
                </div>                
                <!-- Íconos Generales -->
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="tiendas-mov-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>

                <div class="col-md-6">

                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Despachos a tienda Queso Gouda</b></h3>

                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Ciclo</th>
                                <th>Fecha</th>
                                <th>Transacción</th>
                                <th>Entradas</th>
                                <th>Ventas (Kgr) / Ajustes</th>
                                <th>PVP</th>
                                <th>Ingresos</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
        </div>
        <!-- Queso Dietético -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Queso Dietético</h3>
                </div>                
                <!-- Íconos Generales -->
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="tiendas-mov-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>

                <div class="col-md-6">

                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Despachos a tienda Queso Dietético</b></h3>

                        <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="buscar">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Ciclo</th>
                                <th>Fecha</th>
                                <th>Transacción</th>
                                <th>Entradas</th>
                                <th>Ventas (Kgr) / Ajustes</th>
                                <th>PVP</th>
                                <th>Ingresos</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>11-1-2024</td>
                                <td>S</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td>0,0</td>
                                <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- Separador -->
            <div class="row" style="padding: 25px 0 25px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
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

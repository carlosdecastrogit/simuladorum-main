<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/ventas.php";
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
                <h1 class="m-0 text-dark">VENTAS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="ventas.php">Ventas</a></li>
                <li class="breadcrumb-item active">Ventas</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-md-12">
                <hr style="color: #0056b2;" />
            </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <!-- Tienda Armadillo -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Armadillo</h3>
                </div> 
               
                <!-- Íconos Generales -->
                <!--
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="apt-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>
                -->

                <!-- Variables Globales -->
                <div class="col-md-3">
                    <div class="form-group" style="padding-top: 20px;">
                        <label for="texto-empresa">Empresa</label>
                        <input type="text" class="form-control" id="texto-empresa" placeholder="Empresa" value="">
                    </div>
                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Ventas Armadillo</b></h3>

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
                    <div class="card-body table-responsive p-0" style="height: 260px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Queso</th>
                                <th>Ciclo 1</th>
                                <th>Ciclo 2</th>
                                <th>Ciclo 3</th>
                                <th>Ciclo 4</th>
                                <th>Ciclo 5</th>
                                <th>Ciclo 6</th>
                                <th>Ciclo 7</th>
                                <th>Ciclo 8</th>
                                <th>Ciclo 9</th>
                                <th>Ciclo 10</th>
                                <th>Ciclo 11</th>
                                <th>Ciclo 12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Queso Duro Blanco </td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Mozarella</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Gouda</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Dietético</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
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
            <div class="row" style="padding: 5px 0 5px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
        </div>

        <!-- Tienda San Ferro -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>San Ferro</h3>
                </div> 
               
                <!-- Íconos Generales -->
                <!--
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="apt-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>
                -->

                <!-- Variables Globales -->
                <div class="col-md-3">
                    <div class="form-group" style="padding-top: 20px;">
                        <label for="texto-empresa">Empresa</label>
                        <input type="text" class="form-control" id="texto-empresa" placeholder="Empresa" value="">
                    </div>
                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Ventas San Ferro</b></h3>

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
                    <div class="card-body table-responsive p-0" style="height: 260px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Queso</th>
                                <th>Ciclo 1</th>
                                <th>Ciclo 2</th>
                                <th>Ciclo 3</th>
                                <th>Ciclo 4</th>
                                <th>Ciclo 5</th>
                                <th>Ciclo 6</th>
                                <th>Ciclo 7</th>
                                <th>Ciclo 8</th>
                                <th>Ciclo 9</th>
                                <th>Ciclo 10</th>
                                <th>Ciclo 11</th>
                                <th>Ciclo 12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Queso Duro Blanco </td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Mozarella</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Gouda</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Dietético</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
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
            <div class="row" style="padding: 5px 0 5px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
        </div>

        <!-- Tienda Ciudadela -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Ciudadela</h3>
                </div> 
               
                <!-- Íconos Generales -->
                <!--
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="apt-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>
                -->

                <!-- Variables Globales -->
                <div class="col-md-3">
                    <div class="form-group" style="padding-top: 20px;">
                        <label for="texto-empresa">Empresa</label>
                        <input type="text" class="form-control" id="texto-empresa" placeholder="Empresa" value="">
                    </div>
                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Ventas Ciudadela</b></h3>

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
                    <div class="card-body table-responsive p-0" style="height: 260px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Queso</th>
                                <th>Ciclo 1</th>
                                <th>Ciclo 2</th>
                                <th>Ciclo 3</th>
                                <th>Ciclo 4</th>
                                <th>Ciclo 5</th>
                                <th>Ciclo 6</th>
                                <th>Ciclo 7</th>
                                <th>Ciclo 8</th>
                                <th>Ciclo 9</th>
                                <th>Ciclo 10</th>
                                <th>Ciclo 11</th>
                                <th>Ciclo 12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Queso Duro Blanco </td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Mozarella</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Gouda</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Dietético</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
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
            <div class="row" style="padding: 5px 0 5px 0;">
                <div class="col-md-12">
                    <hr style="color: #0056b2;" />
                </div>
            </div>
        </div>

        <!-- Tienda Los Santos -->
        <div class="container" style="padding: 0px 20px 0px 20px;">
            <!-- Íconos Generales -->
            <div class="row justify-content-left">
                <!-- Título -->
                <div class="col-md-12">
                    <h3>Los Santos</h3>
                </div> 
               
                <!-- Íconos Generales -->
                <!--
                <div class="col-md-6" style="padding: 10px 0px 10px 10px;">
                    <a href="apt-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>
                -->

                <!-- Variables Globales -->
                <div class="col-md-3">
                    <div class="form-group" style="padding-top: 20px;">
                        <label for="texto-empresa">Empresa</label>
                        <input type="text" class="form-control" id="texto-empresa" placeholder="Empresa" value="">
                    </div>
                </div>
            </div>

            <!-- Tabla de movimientos -->
            <div class="row" style="padding: 0px 0px 0px 0px;">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Ventas Los Santos</b></h3>

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
                    <div class="card-body table-responsive p-0" style="height: 260px;">
                        <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Queso</th>
                                <th>Ciclo 1</th>
                                <th>Ciclo 2</th>
                                <th>Ciclo 3</th>
                                <th>Ciclo 4</th>
                                <th>Ciclo 5</th>
                                <th>Ciclo 6</th>
                                <th>Ciclo 7</th>
                                <th>Ciclo 8</th>
                                <th>Ciclo 9</th>
                                <th>Ciclo 10</th>
                                <th>Ciclo 11</th>
                                <th>Ciclo 12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Queso Duro Blanco </td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Mozarella</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Gouda</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                            </tr>
                            <tr>
                                <td>Queso Dietético</td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
                                <td>0,0 &nbsp; &nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;</a></td>
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
            <div class="row" style="padding: 5px 0 5px 0;">
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

<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/usuarios.php";
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
                <h1 class="m-0 text-dark">Usuarios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="usuarios.php">Usuarios</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div><!-- /.col -->
            <!-- Separador -->
            <div class="col-md-12">
                <hr style="color: #0056b2;" />
            </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- Contenedor de Datos o (content-header) -->
        <div class="container" style="padding: 0px 20px 50px 20px;">
            <!-- Cabecera Tabla Usuarios -->
            <div class="row justify-content-left">

                <!-- Íconos Generales -->
                <div class="col-md-4" style="padding: 0px 0px 20px 10px;">
                    <a href="usuario-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                    <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <!-- Tabla de movimientos -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Usuarios</b></h3>

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
                                <th>NRO</th>
                                <th>ID</th>
                                <th>NOMBRE USUARIO</th>
                                <th>USUARIO</th>
                                <th>TIPO</th>
                                <th>Fecha de Registro</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listausuarios as $usuarios){ ?>
                                <tr>
                                    <td><?php echo $usuarios['nro'];?> </td>
                                    <td><?php echo $usuarios['id'];?></td>
                                    <td><?php echo $usuarios['nombre'];?></td>
                                    <td><?php echo $usuarios['usuario'];?></td>
                                    <td><?php echo $usuarios['tipo'];?></td> <!-- U= Super Usuario | A= Administrador | P = Profesor | E= participante | I= Invitado -->
                                    <td><?php echo $usuarios['fecha_reg'];?></td>
                                    <!-- <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td> -->
                                    <td>
                                        <form action="usuario-c.php" method="post">
                                            <input type="hidden" name="txtnro" value="<?php echo $usuarios['nro'];?>">
                                            <input type="hidden" name="txtid" value="<?php echo $usuarios['id'];?>">
                                            <input type="hidden" name="txtnombre" value="<?php echo $usuarios['nombre'];?>">
                                            <input type="hidden" name="txtusuario" value="<?php echo $usuarios['usuario'];?>">
                                            <input type="hidden" name="txttipo" value="<?php echo $usuarios['tipo'];?>">
                                            <input type="hidden" name="txtfecha_reg" value="<?php echo $usuarios['fecha_reg'];?>">
                                            <input type="hidden" name="txtpassword1" value="<?php echo $usuarios['clave'];?>">
                                            <input type="hidden" name="txtpassword2" value="<?php echo $usuarios['clave'];?>">
                                            <input class="btn btn-primary" type="submit" name="btnaccion" value="C">
                                            <input class="btn btn-primary" type="submit" name="btnaccion" value="E">
                                            <input class="btn btn-primary" type="submit" name="btnaccion" value="X">
                                            <!-- 
                                                <button class="btn btn-primary" type="submit" value="btnconsultar" name="btnaccion"><i class="fas fa-file"></i></button>
                                                <button class="btn btn-primary" type="submit" value="btneditar" name="btnaccion"><i class="fas fa-file-alt"></i></button>
                                                <button class="btn btn-primary" type="submit" value="btneliminar" name="btnaccion"><i class="fas fa-trash-alt"></i></button>
                                            -->
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
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

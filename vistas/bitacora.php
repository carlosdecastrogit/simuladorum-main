<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
        include "modulos/bitacora.php";
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
                <h1 class="m-0 text-dark">BITÁCORA</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Bitácora</a></li>
                <li class="breadcrumb-item active">General</li>
                </ol>
            </div><!-- /.col -->
            <!-- Separador -->
            <div class="col-md-12">
                <hr style="color: #0056b2;" />
            </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- Contenedor Principal -->
        <div class="container" style="padding: 0px 20px 20px 20px;">
        
            <?php if ($procesar=="ok") {  ?>
                <div class="row justify-content-center">

                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-md-12 ">
                        <?php if($error_accion>1){ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php }?> 
                        </div>
                    <?php } ?>

                <!-- Íconos Generales -->
                    <div class="col-md-4" style="padding: 0px 0px 20px 10px;">
                        <?php if ($txtUsuarioTipo=="A") { ?>
                            <a href="bitacora-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>                     
                        <?php } ?>
                        <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                        <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                    </div>
                    <div class="col-md-8">

                    </div>
                <!-- /. Fin íconos Generales -->
                </div>

                <!-- Tabla de movimientos -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- card-header -->
                            <div class="card-header">
                                <h3 class="card-title"><b>BITACORA</b></h3>

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
                            <!-- Card-body -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>NRO</th>
                                            <th>CICLO</th>
                                            <th>FECHA</th>
                                            <th>EMPRESA</th>
                                            <th>OBSERVACIÓN</th>
                                            <th>MONTO DE LA MULTA</th>
                                            <th>FECHA DE PAGO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listabitacora as $bitacora){ ?>
                                            <tr>
                                                <td><?php echo $bitacora['nro'];?> </td>
                                                <td><?php echo $bitacora['ciclo'];?></td>
                                                <td><?php echo $bitacora['fecha'];?></td>
                                                <td>
                                                    <?php 
                                                        $NroEmpresaActual=$bitacora['nro_empresa'];
                                                        $sentencia=$pdo->prepare("SELECT nombre FROM `empresa` WHERE estatus='A' AND nro=$NroEmpresaActual");
                                                        $sentencia->execute();
                                                        $EmpresaActual=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                                        $cant_EmpresaActual=$sentencia->rowCount();
                                                        
                                                        foreach($EmpresaActual as $ea){
                                                            $NombreActual=$ea['nombre'];
                                                        }
                                                        echo $NombreActual;
                                                        //echo $bitacora['nro_empresa'];
                                                    
                                                    ?>
                                                </td>
                                                <td><?php echo $bitacora['observacion'];?></td> 
                                                <td><?php echo $bitacora['monto_multa'];?></td>
                                                <td><?php echo $bitacora['fecha_pago'];?></td>
                                                <!-- <td><a href="#"><i class="fas fa-file"></i></a>&nbsp;<a href="#"><i class="fas fa-file-alt"></i></a>&nbsp;<a href="#"><i class="fas fa-trash-alt"></i></a></td> -->
                                                <td>
                                                    <form action="bitacora-c.php" method="post">
                                                        <input type="hidden" name="txtNro" value="<?php echo $bitacora['nro'];?>">
                                                        <input type="hidden" name="txtId" value="<?php echo $bitacora['id'];?>">
                                                        <input type="hidden" name="txtCiclo" value="<?php echo $bitacora['ciclo'];?>">
                                                        <input type="hidden" name="txtFecha" value="<?php echo $bitacora['fecha'];?>">
                                                        <input type="hidden" name="txtNro_empresa" value="<?php echo $bitacora['nro_empresa'];?>">
                                                        <input type="hidden" name="txtObservacion" value="<?php echo $bitacora['observacion'];?>">
                                                        <input type="hidden" name="txtMontoMulta" value="<?php echo $bitacora['monto_multa'];?>">
                                                        <input type="hidden" name="txtFechaPago" value="<?php echo $bitacora['fecha_pago'];?>">
                                                        <input type="hidden" name="txtEstatus" value="<?php echo $bitacora['estatus'];?>">
                                                        <input type="hidden" name="txtEstatus_reg" value="<?php echo $bitacora['estatus'];?>">
                                                        <input type="hidden" name="txtFecha_reg" value="<?php echo $bitacora['fecha_reg'];?>">
                                                        <input type="hidden" name="txtUsuario_reg" value="<?php echo $bitacora['usuario_reg'];?>">

                                                        <input class="btn btn-primary" type="submit" name="btn_accion" value="C">
                                                        <?php if ($txtUsuarioTipo=="A") { ?>
                                                            <input class="btn btn-primary" type="submit" name="btn_accion" value="E">
                                                            <input class="btn btn-primary" type="submit" name="btn_accion" value="X">
                                                        <?php } ?>
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
                <!-- /.Separador -->
            </div>  
            <?php }else{ ?>
                <div class="row justify-content-center">
                <?php  if ($mensaje_usuario!=""){ ?>
                    <div class="col-md-12 ">
                        <?php if($error_accion==1){ ?>
                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                        <?php }else{ ?>
                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                        <?php } ?>    
                    </div>
                <?php } ?>

                <form action="bitacora-r.php" method="post">
                    <div class="col-md-12">
                        <input type="hidden" name="txtCiclo" value="<?php $txtCiclo; ?>">
                        <input type="hidden" name="txtNro_empresa" value="<?php $txtNro_empresa; ?>">
                        <input type="hidden" name="txtFecha" value="<?php $txtFecha; ?>">
                        <input type="hidden" name="txtMontoMulta" value="<?php $txtMontoMulta; ?>">
                        <input type="hidden" name="txtFechaPago" value="<?php $txtFechaPago; ?>">
                        <input type="hidden" name="txtObservacion" value="<?php $txtObservacion; ?>">
                        <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                    </div>
                </form>
                </div>
            <?php } ?>
        </div>
        <!-- /. Fin de Contenedor Principal -->
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

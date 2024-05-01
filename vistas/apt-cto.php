<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/apt-cto.php";
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
                <h1 class="m-0 text-dark">APT - CTO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="apt.php">APT</a></li>
                <li class="breadcrumb-item active">APT-CTO</li>
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

    <!-- Inicio del contenedor de datos -->
        <div class="container" style="padding: 0px 20px 50px 20px;">
            <div class="row justify-content-center">
                <!-- Verifica si se debe procesar -->
                <?php if ($procesar=="ok") {  ?>
                    <!-- Imprimer mensaje de alerta o error en procesar [calcular, guardar]  -->
                    <?php  if ($mensaje_usuario!=""){ ?>
                        <div class="col-12 ">
                            <?php if($error_accion==1){ ?>
                                <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                            <?php }else{ ?>
                                <h3 class="text-center text-danger"><?php echo "ERROR 4: ".$mensaje_usuario; ?></h3>
                            <?php } ?>    
                        </div>
                    <?php } ?>
                    <!-- /. Fin del mensaje -----------------------------------------------  -->

                    <!-- Íconos Generales -->
                        <div class="col-md-12" style="padding: 0px 10px 20px 10px;">
                            <button type="button" class="btn btn-primary"><i class="fas fa-share-alt"></i></button>
                            <button type="button" class="btn btn-primary"><i class="fas fa-print"></i></button>
                        </div>
                    <!-- /. Fin íconos Generales -->

                        <!-- Inicio Div Empresa-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtEmpresa">Empresa</label>
                                <select class="form-control" name="txtEmpresa">
                                    <?php foreach ($listado_empresa as $empresa) { ?>
                                        <option value="<?php echo $empresa['nro']; ?>"> <?php echo $empresa['nombre']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- /. Fin inicio Div Empresa-->

                        <div class="col-md-8">

                        </div>

                        <!-- -->
                        <div class="col-12">
                            <div class="card card-primary text-center">
                            <div class="card-header">
                                <h3 class="card-title"><b>Movimientos APT-CTO</b></h3>

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
                                        <th>Cantidad (E) </th>
                                        <th>Costo Unidad (E)</th>
                                        <th>Costo Total (E)</th>
                                        <th>Cantidad (D)</th>
                                        <th>Costo Unidad (D)</th>
                                        <th>Costo Total (D)</th>
                                        <th>Cantidad Acumulada (S)</th>
                                        <th>Costo Promedio (S)</th>
                                        <th>Costo Acum (S)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <!-- Entradas ------------------------------------------------------------------->
                                        <td><?php echo $cant_e_ciclo1;      //  Cantidad Entrada?></td>
                                        <td><?php echo $cant_cto_unidad1;   //  Costo unidad entrada ?></td>
                                        <td><?php echo $cant_cto_total1;    //  Cantidad total entrada ?></td>
                                        <!-- Variables Globales---------------------------------------------------------->
                                        <?php $cant_ag=$cant_e_ciclo1;      //  GLOBAL: Cantidad acumulada global?>
                                        <?php $cost_ag=$cant_cto_total1;    //  GLOGAL: Costo acumulado global?>
                                        <!-- Salidas ------------------------------------------------------------------->
                                        <td><?php echo $cant_s_ciclo1;      //  Cantidad Salida?></td>
                                        <td><?php $cant_cost_unidad_s1=$cost_ag/$cant_ag; echo $cant_cost_unidad_s1; // Costo unidad salida?></td>
                                        <td><?php $cant_cto_total_s1=$cant_s_ciclo1*$cant_cost_unidad_s1; echo $cant_cto_total_s1; // Costo Total Salida?></td>
                                        <!-- Saldos ------------------------------------------------------------------->
                                        <td><?php $cant_acum_sal_1=$cant_e_ciclo1-$cant_s_ciclo1; echo $cant_acum_sal_1; // Cantidad acumulada en saldos?></td>
                                        <td><?php $cant_cost_acum_sal_1=$cant_cto_unidad1; echo $cant_cost_acum_sal_1; // Cantidad acumulada en saldos?></td>
                                        <td><?php $cant_cost_total_sal_1=$cant_cto_total1-$cant_cto_total_s1; echo $cant_cost_total_sal_1; // Cantidad acumulada en saldos?></td>

                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><?php echo $cant_e_ciclo2;?></td>
                                        <td><?php echo $cant_cto_unidad2;?></td>
                                        <td><?php echo $cant_cto_total2; ?></td>
                                        <td>0,00</td>
                                        <td>0,00</td>
                                        <td>0,00</td>
                                        <td>0,00</td>
                                        <td>0,00</td>
                                        <?php $cant_ag=$cant_ag+$cant_e_ciclo1-$cant_s_ciclo1;?>
                                        <?php $cost_ag=$cost_ag+$cant_cto_total2;?>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/. Fin tabla de contenido -->

                    <!-- Div CTA -->
                        <div class="col-md-12">
                            <div class="row justify-content-left">
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Producir">
                                    <?php if ($calcular=="SI"){ ?>
                                        <input type="submit" class="btn btn-primary" name="btn_accion" value="Guardar">
                                    <?php } ?>
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Cancelar">
                                    <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-database"></i> &nbsp; Guardar </button>
                                    <a class="btn btn-primary" href="inicio.php" role="button"><i class="fas fa-window-close"></i> &nbsp; Cancelar</a> -->
                                </div>
                            </div>
                        </div>
                    <!-- /. Fin Div CTA -->

                <!-- /. Instrucciones si no se va a procesar -->
                <?php }else{ ?>

                        <!-- Imprimer mensaje de alerta o error al final de procesar o antes de procesar  -->
                        <?php  if ($mensaje_usuario!=""){ ?>
                            <div class="col-md-12 ">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <?php if($error_accion==1){ ?>
                                            <h3 class="text-center text-success"><?php echo $mensaje_usuario; ?></h3>
                                        <?php }else{ ?>
                                            <h3 class="text-center text-danger"><?php echo $mensaje_usuario; ?></h3>
                                        <?php } ?>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <form action="subasta-r.php" method="post">
                                            <div class="row justify-content-center">
                                                <div class="col-md-3">
                                                    <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Aceptar">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- fin de imprimir mensaje ---------------------------------------------------  -->

                <?php } ?>
            </div>
            <!-- /. fin row del contenedor  -->

        </div>
    <!-- /. Fin de contenedor de datos -->

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

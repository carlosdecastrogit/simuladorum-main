<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/despacho-r.php";
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
                <h1 class="m-0 text-dark">Despacho | Registro</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="despacho.php">Despacho</a></li>
                <li class="breadcrumb-item active">Despacho Registro </li>
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

                    
                    <form class="col-md-12" action="despacho-r.php" method="post" >
                        <div class="row">
                            <!-- DIV Empresa-->
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
                            <!-- /. Fin DIV Empresa-->

                            <!-- DIV Fecha Pedido-->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="txtPedido">Fecha Despacho</label>
                                    <select class="form-control" name="txtPedido">
                                        <?php foreach($listado_apt_dtienda as $apt_dtienda){?>
                                            <option value= <?php echo $apt_dtienda['ciclo'];?>><?php echo $apt_dtienda['fecha'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <!-- /. Fin Fecha pedido-->

                            <!-- CTA Búsqueda-->
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="txtPedido">.</label>
                                        <input type="submit" class="btn btn-primary btn-block" name="btn_accion" value="Ver">
                                    </div>
                                </div>
                            <!-- /. Fin DIV Fecha Pedido-->
                        </div>

                    <!-- Div tabla despacho a tienda -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Despacho Tienda</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="txtFecha">Fecha</label>
                                                <input type="text" class="form-control" name="txtFecha" placeholder="Fecha de Despacho" value="<?php echo $txtFecha; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Producto</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Mercancia por Despachar</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Armadillo</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Ciudadela</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>San Fierro</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Los Santos</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p>Queso Duro Blanco</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_dub" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_dub; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_dub_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_dub_arm; ?>" <?php if($txtCant_dub==0){ echo "readonly";} ?> >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_dub_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_dub_ciu; ?>" <?php if($txtCant_dub==0){ echo "readonly";} ?> >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_dub_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_dub_sfi; ?>" <?php if($txtCant_dub==0){ echo "readonly";} ?> >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_dub_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_dub_lsa; ?>" <?php if($txtCant_dub==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p>Queso Mozarella</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_moz" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_moz; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_moz_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_moz_arm; ?>" <?php if($txtCant_moz==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_moz_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_moz_ciu; ?>" <?php if($txtCant_moz==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_moz_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_moz_sfi; ?>" <?php if($txtCant_moz==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_moz_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_moz_lsa; ?>" <?php if($txtCant_moz==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p>Queso Gouda</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_gou" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_gou; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_gou_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_gou_arm; ?>" <?php if($txtCant_gou==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_gou_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_gou_ciu; ?>" <?php if($txtCant_gou==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_gou_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_gou_sfi; ?>" <?php if($txtCant_gou==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_gou_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_gou_lsa; ?>" <?php if($txtCant_gou==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p>Queso Dietético</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_die" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_die; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_die_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_die_arm; ?>" <?php if($txtCant_die==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_die_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_die_ciu; ?>" <?php if($txtCant_die==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_die_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_die_sfi; ?>" <?php if($txtCant_die==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCant_die_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCant_die_lsa; ?>" <?php if($txtCant_die==0){ echo "readonly";} ?>>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    <!-- /. fin Div despacho a tienda -->

                    <!-- Div Costo de Transporte -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Costo de Transporte</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Producto</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Armadillo</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>San Fierro</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Ciudadela</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Los Santos</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class=""><strong>Total</strong></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class="">Queso Duro Blanco</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_dub_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_dub_arm; ?>" readonly >
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_dub_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_dub_ciu; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_dub_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_dub_sfi; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_dub_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_dub_lsa; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_dub_total" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_dub_total; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class="">Queso Mozarella</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_moz_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_moz_arm; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_moz_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_moz_ciu; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_moz_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_moz_sfi; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_moz_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_moz_lsa; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_moz_total" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_moz_total; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class="">Queso Goudao</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_gou_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_gou_arm; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_gou_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_gou_ciu; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_gou_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_gou_sfi; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_gou_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_gou_lsa; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_gou_total" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_gou_total; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <p class="">Queso Dietético</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_die_arm" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_die_arm; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_die_ciu" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_die_ciu; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_die_sfi" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_die_sfi; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_die_lsa" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_die_lsa; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="txtCto_trans_die_total" min="0" step="0.01" placeholder="0.00" value="<?php echo $txtCto_trans_die_total; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    <!-- /. fin Div Costo de Transporte -->

                    <!-- Div CTA -->
                        <div class="col-md-12">
                            <div class="row justify-content-left">
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-primary" name="btn_accion" value="Calcular">
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
                
                </form>


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
                                        <div class="row justify-content-center">
                                            <div class="col-md-3">
                                                <a href="despacho.php"type="button" class="btn btn-primary btn_block">Aceptar</a>
                                            </div>
                                        </div>
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

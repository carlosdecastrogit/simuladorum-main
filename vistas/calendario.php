<?php

include "../controladores/enlaces.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php

        include "modulos/calendario.php";
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
                <h1 class="m-0 text-dark">CALENDARIO</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tiendas</a></li>
                <li class="breadcrumb-item active">Tiendas</li>
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


        <?php if ($cant_calendario>=1) { ?>
            <!-- Tabla de Calendario-->
            <div class="container" style="padding-top: 25px;">
                <div class="row justify-content-center">
                    <!-- Íconos Generales -->
                    <div class="col-md-4" style="padding: 0px 0px 20px 10px;">
                        <form action="calendario-c.php" method="post">
                            
                            <input type="hidden" name="txtNro" value="<?php echo $txtNro; ?>">
                            <input type="hidden" name="txtId" value="<?php echo $txtId; ?>">
                            <input type="hidden" name="txtFecha" value="<?php echo $txtFecha; ?>">
                            <input type="hidden" name="txtObservacion" value="<?php echo $txtObservacion; ?>">
                            <input type="hidden" name="txtEstatus" value="<?php echo $txtEstatus; ?>">
                            <input type="hidden" name="txtUsuario_reg" value="<?php echo $txtUsuario_reg; ?>">
                            <input type="hidden" name="txtFecha_reg" value="<?php echo $txtFecha_reg; ?>">
                            <input type="hidden" name="txtEstatus_reg" value="<?php echo $txtEstatus_reg; ?>">
                            <input type="submit" class="btn btn-primary" name="btn_accion" value="Consultar">
                            <input type="submit" class="btn btn-primary" name="btn_accion" value="Editar">
                            <input type="submit" class="btn btn-primary" name="btn_accion" value="Eliminar">

                        </form>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <!-- / Fin de íconos generales -->

                    <div class="col-md-10">
                        <!-- Cabecera de Tarjeta Calendar -->
                        <div class="card card-primary">
                        <div class="card-header border-0 ui-sortable-handle">
                            <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            &nbsp;
                            Calendario
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <!-- th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th> -->
                                                                <th class="picker-switch" data-action="pickerSwitch" colspan="12" title="Select Month"><?php echo $mes_texto."  ".$ano_calendario;  ?></th>
                                                                <!-- <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th> -->
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Lunes</th>
                                                                <th class="dow">Martes</th>
                                                                <th class="dow">Miércoles</th>
                                                                <th class="dow">Jueves</th>
                                                                <th class="dow">Viernes</th>
                                                                <th class="dow">Sábado</th>
                                                                <th class="dow">Domingo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Inversión en Publicidad</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Resultados </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Fijar PVP</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"></div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> .</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Inversión en Publicidad</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Resultados </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Fijar PVP</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"></div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> .</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Inversión en Publicidad</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Resultados </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Fijar PVP</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"></div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> .</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Inversión en Publicidad</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Resultados </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Fijar PVP</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"></div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> .</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Inversión en Publicidad</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Resultados </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Subasta de Compras</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Fijar PVP</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"></div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> .</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                        <tr>
                                                                <!-- th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th> -->
                                                                <th class="picker-switch" data-action="pickerSwitch" colspan="12" title="Select Month"><?php echo $mes_texto2."  ".$ano_calendario; ?></th>
                                                                <!-- <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th> -->
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Lunes</th>
                                                                <th class="dow">Martes</th>
                                                                <th class="dow">Miércoles</th>
                                                                <th class="dow">Jueves</th>
                                                                <th class="dow">Viernes</th>
                                                                <th class="dow">Sábado</th>
                                                                <th class="dow">Domingo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Ventas</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción y Despacho</div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> Otros</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Ventas</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción y Despacho</div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> Otros</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Ventas</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción y Despacho</div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> Otros</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Ventas</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción y Despacho</div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> Otros</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Ventas</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción</div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Recepción de Pedido (AMP) </div>
                                                                    </div>
                                                                </td>
                                                                <td data-action="selectDay" data-day="" class="day">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;">Producción y Despacho</div>
                                                                    </div>
                                                                </td>

                            
                                                                <td data-action="selectDay" data-day="" class="day old weekend">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="padding: 3px 0px 3px 10px; text-align: left; background-color:#80BFFF;">$dia</div>
                                                                        <div class="col-md-12" style="padding: 5px 0 10px 0;"><h5> Otros</h5></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none;">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h3>Aprendamos a Jugar</h3>
                    </div>
                    <div class="col-md-10">
                        <p>- La línea del tiempo en Santino transcurre en ciclos de 7 días.  En cada ciclo existen varios eventos que estarán programados según un calendario</p>
                        <p>- Cada ciclo equivale en el mundo real aproximadamente a 1 mes.</p>
                        <p>- Los eventos agendados transcurrirán de la siguiente manera:</p>
                        <p><strong>Lunes:</strong> Subasta para adquisición de materia prima y Reporte de 	Ventas.</p>
                        <p><strong>Martes:</strong> Inversión en publicidad, producción de productos terminados y despacho a las tiendas.</p>
                        <p><strong>Miércoles:</strong>  Recepción de la materia prima comprada en la subasta del 	día lunes.</p>
                        <p><strong>Jueves:</strong> Subasta para adquisición de materia prima  y produccion.</p>
                        <p><strong>Viernes:</strong> Recepción de la materia prima comprada en la subasta del 	día miércoles y fijar los precio de venta al público (PVP).</p>
                        <p><strong>Sábado:</strong> Producción de productos terminados y despacho a las tiendas y encuentro de participantes.</p>
                        <p>- Cada participante u equipo deberá llevar el control de todas las actividades en esta hoja de archivo de Excel. No se recomienda el uso de Google Sheets para trabajar esta hoja, ya que podría desconfigurarse.</p>
                        <p>-  La evaluación es por resultados.  Cada participante u equipo  será(n) medido por varios indicadores que los ubicarán en una tabla de posiciones.</p>
                    </div>

                </div>    
            </div>
            <!-- ./ Fin de Tabla de Calendario-->
        <?php }else{ ?>
            <div class="container" style="padding-top: 25px;">
                <div class="row justify-content-center align-items-center">
                    <!-- / Fin íconos Generales -->
                   <div class="col-md-12" style="padding-top: 10%;">
                       <h1 class="text-center text-danger"><strong>¡ NO HAY CALENDARIO ACTIVO !</strong></h1>
                   </div>
                    <!-- Íconos Generales -->
                    <div class="col-sm-4 col-md-2 col-" style="padding: 20px 0px 0px 0px;">
                        <?php if($txtUsuarioTipo=="A") { ?>
                            <a href="calendario-r.php"type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
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

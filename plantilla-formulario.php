<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simulador de Negocios| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <div class="container" style="padding-top: 125px;">
            
            <!-- Formulario de Clave de acceso --> 
            <form class="row" action="inicio.php" method="post">
                <div class="col-md-12">
                    <h1 class="display 5">Controles de formulario</h1>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="texto">Texto</label>
                        <input type="text" class="form-control" id="text" placeholder="Input de Texto" value="">
                    </div>
                </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="num">Numérico</label>
                            <input type="number" class="form-control" id="num" placeholder="Numérico con decimales" value="0,00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="num">Numérico</label>
                            <input type="number" class="form-control" id="num" placeholder="Numérico sin decimales" value="0">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="select">Empresa</label>
                            <select class="form-control" id="select">
                                <option>Empresa ACME</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="formControlRange">Example Range input</label>
                            <input type="range" class="form-control-range" id="formControlRange">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <label class="form-check-label" for="exampleRadios1">
                                Ejemplo de Radio
                            </label>
                            </br>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked> Opción 1 </br>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" > Opción 2
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Observaciones</span>
                            </div>
                            <textarea class="form-control" aria-label="With textarea" id="cajatexto" ></textarea>
                        </div>
                    </div>
                    
                    <!-- Ciclo -->
                    <div class="col-md-5">
                            <div class="form-group">
                                <label for="txtCiclo">Ciclo</label>
                                <select class="form-control" name="txtCiclo">
                                    <option value="1" <?php if($txtCiclo=="1") { echo "Selected"; } ?> >1</option>
                                    <option value="2" <?php if($txtCiclo=="2") { echo "Selected"; } ?> >2</option>
                                    <option value="3" <?php if($txtCiclo=="3") { echo "Selected"; } ?> >3</option>
                                    <option value="4" <?php if($txtCiclo=="4") { echo "Selected"; } ?> >4</option>
                                    <option value="5" <?php if($txtCiclo=="5") { echo "Selected"; } ?> >5</option>
                                    <option value="6" <?php if($txtCiclo=="6") { echo "Selected"; } ?> >6</option>
                                    <option value="7" <?php if($txtCiclo=="7") { echo "Selected"; } ?> >7</option>
                                    <option value="8" <?php if($txtCiclo=="8") { echo "Selected"; } ?> >8</option>
                                    <option value="9" <?php if($txtCiclo=="9") { echo "Selected"; } ?> >9</option>
                                    <option value="10" <?php if($txtCiclo=="10") { echo "Selected"; } ?> >10</option>
                                    <option value="11" <?php if($txtCiclo=="11") { echo "Selected"; } ?> >11</option>
                                    <option value="12" <?php if($txtCiclo=="12") { echo "Selected"; } ?> >12</option>
                                </select>
                            </div> 
                        </div>
            </form>

            <!-- Formulario de Clave de acceso --> 
            <form class="row" action="inicio.php" method="post">
                <div class="col-md-12">
                    <h1 class="display 6">Formulario de Acceso</h1>
                </div>
                <div class="col-md-3 form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="col-md-3 form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="col-md-12 form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <div class="row" style="padding-top: 50px;">
                <dic class="col-md-3">
                    <p>Divisor gris</p>
                    <hr style="color: #0056b2;" />
                </dic>
            </div>

    </div>

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

</body>
</html>

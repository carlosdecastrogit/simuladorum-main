<?php 
    $usuariosesion=$_SESSION['usuario'];
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../vistas/img/logo-queso.png" alt="Santino Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SANTINO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../vistas/img/ico-usuario-gris.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $usuariosesion['nombre']; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="../vistas/inicio.php" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
                <p>
                    Inicio
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            <li class="nav-header">SIMULACIÓN</li>
            <li class="nav-item">
                <a href="../vistas/bitacora.php" class="nav-link">
                <i class="nav-icon fas fa-blog"></i>
                <p>
                    Bitácora
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/entorno.php" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    Entorno
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="../vistas/subasta.php" class="nav-link">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                    Subasta
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/amp.php" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>
                    Almacén MP [AMP]
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/amp-cto.php" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>
                    Costos [AMP]
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/pcm.php"  class="nav-link">
                <i class="nav-icon fas fa-industry"></i>
                <p>
                    Producción [PCM]
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/pcm-mod.php"  class="nav-link">
                <i class="nav-icon fas fa-industry"></i>
                <p>
                    Modelado [PCM-MOD]
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/apt.php" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>
                    Almacén PT [APT]
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/apt-cto.php" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>
                    Costos Almacén [APT]
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/apt-despacho-tienda.php" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p>
                    APT-Despacho Tiendas
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/despacho.php" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>
                    Despacho
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/tiendas.php" class="nav-link">
                <i class="nav-icon fas fa-store"></i>
                <p>
                    Tiendas
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/ventas.php" class="nav-link">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>
                    Reporte de Ventas
                </p>
                </a>
            </li>  
            <li class="nav-item">
                <a href="../vistas/publicidad.php"class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                    Publicidad
                </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="../vistas/pcm-cf.php"class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                    Cto. Fabricación [PCM-CF]
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/pcm-cp.php"class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>
                    Cto. Producción [PCM.CP]
                </p>
                </a>
            </li>
            
            <li class="nav-header">CONFIGURACIÓN</li>
            <?php 
               if ($usuariosesion['tipo']=="A"){ ?>

                <li class="nav-item">
                    <a href="../vistas/usuarios.php"  class="nav-link">
                    <i class="nav-icon far fa-solid fa-user"></i>
                    <p>
                        Usuarios
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>
                <?php
               };
            ?>
            <!--
            <li class="nav-item">
                <a href="../vistas/usuarios.php"  class="nav-link">
                <i class="nav-icon far fa-solid fa-user"></i>
                <p>
                    Usuarios
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            -->
            <?php 
               if ($usuariosesion['tipo']=="A"){ ?>

                <li class="nav-item">
                    <a href="../vistas/simulacion.php" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Simulación
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>
                <?php
               };
            ?>

                <li class="nav-item">
                    <a href="../vistas/simulacion-final.php" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Finalizar Simulación
                        <span class="badge badge-info right"></span>
                    </p>
                    </a>
                </li>

            <!--
            <li class="nav-item">
                <a href="../vistas/simulacion.php" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Simulación
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            -->
            <!--
            <li class="nav-item">
                <a href="../vistas/grupos.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>  
                <p>
                    Grupos
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            -->
            <li class="nav-item">
                <a href="../vistas/calendario.php"  class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Calendario
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/variables.php" class="nav-link">
                <i class="nav-icon fas fa-subscript"></i> 
                <p>
                    Variables
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../vistas/cerrarsesion.php"  class="nav-link">
                <i class="nav-icon far fa-times-circle"></i>
                <p>
                    Cerrar Sesión
                    <span class="badge badge-info right"></span>
                </p>
                </a>
            </li>

            <li class="nav-header">REPORTES</li>
            <li class="nav-item">
                <a href="../vistas/estadisticas.php" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Estadísticas
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
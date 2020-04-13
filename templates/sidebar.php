  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <!--  <img src="../img/BlancoCopiaLogoSuplementosLeo(1).png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
          <span class="brand-text font-weight-light">Laboratorio COVID-19</span>
      </a>

      <?php
        /* echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>"; */
        ?>


      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <!--  <div class="image">
          <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
              <div class="info">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <p> <b>Usuario:</b> <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido1']; ?>
                                  <!--  <i class="right fas fa-angle-left"></i> -->
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="login.php?cerrarSesion=true" class="nav-link">
                                      <p>Salir</p>
                                  </a>
                              </li>
              </div>
          </div>

          <!-- SIDEBAR MENU -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <!-- RESUMEN -->
                      <!-- Para ocultar esta sección a otras personas -->
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Resumen
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="index.php" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Resumen</p>
                                  </a>
                              </li>
                          </ul>
                      </li>

                  <!-- FIN RESUMEN -->

                  <!-- PACIENTES -->
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fa fa-user-circle"></i>
                          <p>
                              Pacientes
                              <!--  <span class="right badge badge-danger">New</span> -->
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>

                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="listaPacientes.php" class="nav-link">
                                  <i class="fa fa-list-ul nav-icon"></i>
                                  <p>Ver Todos</p>
                              </a>
                          </li>
                          <?php if ($_SESSION['rol'] == 1) : ?>
                              <!-- Para ocultar esta sección a otras personas -->
                              <li class="nav-item">
                                  <a href="crearPaciente.php" class="nav-link">
                                      <i class="fa fa-plus-circle nav-icon"></i>
                                      <p>Agregar</p>
                                  </a>
                              </li>
                          <?php endif; ?>
                      </ul>
                  </li>
                  <!-- FIN PACIENTES -->


                  <!-- ADMINISTRADORES -->

                  <?php if ($_SESSION['rol'] == 1) :  ?>
                      <!-- Para ocultar esta sección a otras personas -->

                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fa fa-user"></i>
                              <p>
                                  Administradores
                                  <!--  <span class="right badge badge-danger">New</span> -->
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>

                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="listaAdministradores.php" class="nav-link">
                                      <i class="fa fa-list-ul nav-icon"></i>
                                      <p>Ver Todos</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="crearAdministrador.php" class="nav-link">
                                      <i class="fa fa-plus-circle nav-icon"></i>
                                      <p>Agregar</p>
                                  </a>
                              </li>
                          </ul>
                      </li>

                  <?php endif;  ?>
                  <!-- FIN ADMINISTRADORES -->


                  <!--  -->
                  <!-- CIERRE DE TODOS LOS UL .nav nav-pills nav-sidebar flex-column -->
              </ul>

              <!-- CIERRE NAV SIDEBAR MENU -->
          </nav>

      </div>
      <!-- CIERRE DIV .SIDEBAR-->

  </aside>
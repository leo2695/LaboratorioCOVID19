  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Resumen</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio.php">Inicio</a></li>
                          <li class="breadcrumb-item active">Resumen</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <div class="row">

              <!-- WIDGET PACIENTES-->
              <?php
                $sql = "SELECT COUNT(cedula) AS registros FROM pacientes "; //AS registros es como se va a llamar la columna de ese COUNT con ese nombre es que accedo al resultado
                $resultado = $conn->query($sql); //mando el query
                $registrados = $resultado->fetch_assoc(); //y aqui pongo el resultado de la consulta
                ?>

              <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3><?php echo $registrados['registros']; ?></h3>

                          <p>Pacientes</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-user-plus"></i>
                      </div>
                      <?php if ($_SESSION['rol'] == 1) : ?>
                          <!-- Para ocultar esta sección a otras personas -->

                          <a href="listaPacientes.php" class="small-box-footer">
                              Más Información <i class="fas fa-arrow-circle-right"></i>
                          </a>

                      <?php endif; ?>
                  </div>
              </div>
              <!-- FIN WIDGET PACIENTES -->

              <!-- WIDGET POSITIVOS-->
              <?php
                $sql = "SELECT COUNT(cedula) AS positivos FROM pacientes WHERE diagnostico='p' "; //AS registros es como se va a llamar la columna de ese COUNT con ese nombre es que accedo al resultado
                $resultado = $conn->query($sql); //mando el query
                $registrados = $resultado->fetch_assoc(); //y aqui pongo el resultado de la consulta
                ?>

              <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-red">
                      <div class="inner">
                          <h3><?php echo $registrados['positivos']; ?></h3>

                          <p>Positivos</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-medkit"></i>
                      </div>
                      <?php if ($_SESSION['rol'] == 1) : ?>
                          <!-- Para ocultar esta sección a otras personas -->
                          
                          <a href="listaPacientes.php" class="small-box-footer">
                              Más Información <i class="fas fa-arrow-circle-right"></i>
                          </a>

                      <?php endif; ?>
                  </div>
              </div>
              <!-- FIN WIDGET POSITIVOS -->


              <!-- WIDGET NO POSITIVOS-->
              <?php
                $sql = "SELECT COUNT(cedula) AS negativos FROM pacientes WHERE diagnostico='n' "; //AS registros es como se va a llamar la columna de ese COUNT con ese nombre es que accedo al resultado
                $resultado = $conn->query($sql); //mando el query
                $registrados = $resultado->fetch_assoc(); //y aqui pongo el resultado de la consulta
                ?>

              <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3><?php echo $registrados['negativos']; ?></h3>

                          <p>Negativos</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-plus-circle"></i>
                      </div>
                      <?php if ($_SESSION['rol'] == 1) : ?>
                          <!-- Para ocultar esta sección a otras personas -->

                          <a href="listaPacientes.php" class="small-box-footer">
                              Más Información <i class="fas fa-arrow-circle-right"></i>
                          </a>

                      <?php endif; ?>
                  </div>
              </div>
              <!-- FIN WIDGET NO POSITIVOS -->

          </div><!-- FIN DIV ROW -->


          <h2 class="page-header">Estadísticas</h2>

          <div class="row">


              <div class="col-md-6">
                  <!-- LINE CHART -->
                  <div class="card card-info">
                      <div class="card-header">
                          <h3 class="card-title">Casos Positivos Diarios</h3>

                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="chart">
                              <canvas id="estadisticas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->


              </div><!-- FIN DIV ROW -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php // include_once 'funciones/sesiones.php'; 
?>
<?php include_once 'funciones/funciones.php' ?>
<?php include_once 'templates/header.php' ?>

<body class="hold-transition sidebar-mini">

  <!-- Site wrapper -->
  <div class="wrapper">

    <?php include_once 'templates/navegacion.php' ?>

    <?php include_once 'templates/sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Crear Administrador</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="listaAdministradores.php">Inicio</a></li>
                <li class="breadcrumb-item active">Crear Administrador</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- HORIZONTAL FORM -->
        <div class="card card-info col-md-8">
          <div class="card-header">
            <h3 class="card-title">Agregar</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form class="form-horizontal" method="POST" action="modeloAdministrador.php" name="crear" id="crear">
            <div class="card-body">

              <!-- CEDULA -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Cédula</label>
                <div class="col-sm-10">
                  <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Formato: 204060455">
                </div>
              </div>
              <!-- FIN CEDULA -->


              <!-- NOMBRE -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                </div>
              </div>
              <!-- FIN NOMBRE -->

              <!-- APELLIDO 1 -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Primer Apellido</label>
                <div class="col-sm-10">
                  <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Apellido">
                </div>
              </div>
              <!-- FIN APELLIDO 1 -->

              <!-- APELLIDO 2 -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Segundo Apellido</label>
                <div class="col-sm-10">
                  <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="Apellido">
                </div>
              </div>
              <!-- FIN APELLIDO 2 -->

              <!-- USUARIO -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                  <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario">
                </div>
              </div>

              <!-- PASSWORD -->
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                </div>
              </div>

              <!-- REPETIR PASSWORD -->
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Repetir Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" name="repetirPassword" class="form-control" id="repetirPassword" placeholder="Repetir Contraseña">
                  <span id="resultadoPassword" class="help-block"></span>
                </div>
              </div>

              <!-- ROL -->
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Rol</label>
                <div class="col-sm-8">
                  <select class="form-control" name="rol" id="rol">
                    <option value="">Seleccione el Rol</option>
                    <option value="1">Administrador</option>
                    <option value="0">Paciente</option>
                  </select>
                </div>
              </div>
              <!-- FIN ROL -->

            </div>
            <!-- /.card-body -->


            <div class="card-footer">
              <button type="submit" id="agregar" class="btn btn-info">Agregar</button>
              <input type="hidden" name="registro" value="nuevo">
              <button type="reset" class="btn btn-default float-right">Resetear</button>
              <a href="listaAdministradores.php" class="btn btn-default ml-5">Regresar</a>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->
        <!-- FIN HORIZONTAL FORM -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once 'templates/footer.php' ?>
</body>

</html>
<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funciones.php'; ?>
<?php include_once 'templates/header.php'; ?>

<?php
$id_Admi = $_GET['id']; //pongo solo id porque es el que esta puesto en la URL y viene por GET porque esta visible en la URL

if (!filter_var($id_Admi, FILTER_VALIDATE_INT)) {
  /* die('Es entero'); */
  /*  die('Error'); */
}

?>



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
              <h1>Editar Administrador</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="listaAdministradores.php">Inicio</a></li>
                <li class="breadcrumb-item active">Editar Administrador</li>
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
            <h3 class="card-title">Editar</h3>
          </div>
          <!-- /.card-header -->


          <?php
          $sql = "SELECT * FROM administradores WHERE cedula=$id_Admi";
          $resultado = $conn->query($sql);
          $administrador = $resultado->fetch_assoc();
          ?>

          <!-- form start -->
          <form class="form-horizontal" method="POST" action="modeloAdministrador.php" name="editar" id="editar">
            <div class="card-body">

              <!-- CEDULA -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Cédula</label>
                <div class="col-sm-10">
                  <input type="text" name="cedula" class="form-control" id="cedula" value="<?php echo $administrador['cedula']; ?>">
                </div>
              </div>
              <!-- FIN CEDULA -->


              <!-- NOMBRE -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $administrador['nombre_Medico']; ?>">
                </div>
              </div>
              <!-- FIN NOMBRE -->

              <!-- APELLIDO 1 -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Primer Apellido</label>
                <div class="col-sm-10">
                  <input type="text" name="apellido1" class="form-control" id="apellido1" value="<?php echo $administrador['apellido1_Medico']; ?>">
                </div>
              </div>
              <!-- FIN APELLIDO 1 -->

              <!-- APELLIDO 2 -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Segundo Apellido</label>
                <div class="col-sm-10">
                  <input type="text" name="apellido2" class="form-control" id="apellido2" value="<?php echo $administrador['apellido2_Medico']; ?>">
                </div>
              </div>
              <!-- FIN APELLIDO 2 -->

              <!-- USUARIO -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                  <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $administrador['usuario']; ?>">
                </div>
              </div>

              <!-- PASSWORD -->
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                </div>
              </div>
              <!-- FIN PASSWORD -->

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
              <button type="submit" class="btn btn-info">Actualizar</button>
              <input type="hidden" name="registro" value="actualizar"> <!-- Este es el que envió por POST para ver si es crear o editar -->
              <input type="hidden" name="idRegistro" value="<?php echo $id_Admi; ?>">
              <a href="listaAdministradores.php"> <button type="button" class="btn btn-default float-right">Cancelar</button></a>
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
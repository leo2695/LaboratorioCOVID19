<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funciones.php'; ?>
<?php include_once 'templates/header.php'; ?>

<?php
$id_Paciente = $_GET['id']; //pongo solo id porque es el que esta puesto en la URL y viene por GET porque esta visible en la URL

if (!filter_var($id_Paciente, FILTER_VALIDATE_INT)) {
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
              <h1>Editar Paciente</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="listaPacientes.php">Inicio</a></li>
                <li class="breadcrumb-item active">Editar Paciente</li>
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
          $sql = "SELECT * FROM pacientes WHERE cedula=$id_Paciente";
          $resultado = $conn->query($sql);
          $paciente = $resultado->fetch_assoc();

          /* echo "<pre>";
          var_dump($paciente);
          echo "</pre>"; */
          ?>

          <!-- form start -->
          <form class="form-horizontal" method="POST" action="modeloPaciente.php" name="editar" id="editar">
            <!-- Tengo que cambiarle el id para poder usar AJAX para cargar la imagen -->
            <div class="card-body">

              <!-- NOMBRE -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $paciente['nombre_Paciente']; ?>">
                </div>
              </div>
              <!-- FIN NOMBRE -->

              <!-- APELLIDO -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Primer Apellido</label>
                <div class="col-sm-10">
                  <input type="text" name="apellido" class="form-control" id="apellido" value="<?php echo $paciente['apellido1_Paciente']; ?>">
                </div>
              </div>
              <!-- FIN APELLIDO -->

              <!-- APELLIDO2 -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Segundo Apellido</label>
                <div class="col-sm-10">
                  <input type="text" name="apellido" class="form-control" id="apellido" value="<?php echo $paciente['apellido2_Paciente']; ?>">
                </div>
              </div>
              <!-- FIN APELLIDO2 -->

              <!-- EDAD -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Edad</label>
                <div class="col-sm-8">
                  <input type="number" name="edad" class="form-control" id="edad" min="0" max="120" value="<?php echo $paciente['edad']; ?>">
                </div>
              </div>
              <!-- FIN EDAD -->

              <!-- EMAIL -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Correo Electrónico</label>
                <div class="col-sm-8">
                  <input type="email" name="email" class="form-control" id="email" value="<?php echo $paciente['email']; ?>">
                </div>
              </div>
              <!-- FIN EMAIL -->


              <!-- GENERO -->
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Género</label>
                <div class="col-sm-8">
                  <select class="form-control" name="genero" id="genero">

                    <option value="<?php echo $paciente['genero']; ?>" selected>
                      <?php if ($paciente['genero'] == 'm') { ?>
                        Masculino
                      <?php }
                      if ($paciente['genero'] == 'f') { ?>
                        Femenino
                      <?php } ?>
                    </option>

                    <?php if ($paciente['genero'] == 'm') { ?>
                      <option value="f">Femenino</option>
                    <?php } else { ?>
                      <option value="m">Masculino</option>
                    <?php } ?>

                  </select>
                </div>
              </div>
              <!-- FIN GENERO -->


              <!-- TELEFONO -->
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Télefono</label>
                <div class="col-sm-8">
                  <input type="tel" name="telefono" class="form-control" id="telefono" value="<?php echo $paciente['telefono']; ?>">
                </div>
              </div>
              <!-- FIN TELEFONO -->


              <!-- RESULTADO -->
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Diagnóstico COVID-19</label>
                <div class="col-sm-8">
                  <select class="form-control" name="diagnostico" id="diagnostico">

                    <option value="<?php echo $paciente['diagnostico']; ?>" selected>
                      <?php if ($paciente['diagnostico'] == 'p') { ?>
                        Positivo
                      <?php }
                      if ($paciente['diagnostico'] == 'n') { ?>
                        Negativo
                      <?php }  if ($paciente['diagnostico'] == 'e') { ?>
                        Espera
                      <?php } ?>
                    </option>

                    <?php if ($paciente['diagnostico'] == 'p') { ?>
                      <option value="f">Negativo</option>
                      <option value="f">Espera</option>
                    <?php }
                    if ($paciente['diagnostico'] == 'n') { ?>
                      <option value="f">Positivo</option>
                      <option value="f">Espera</option>
                    <?php }  if ($paciente['diagnostico'] == 'e') { ?>
                      <option value="f">Positivo</option>
                      <option value="f">Negativo</option>
                    <?php } ?>

                  </select>
                </div>
              </div>
              <!-- FIN RESULTADO -->

            </div>
            <!-- /.card-body -->


            <div class="card-footer">
              <button type="submit" class="btn btn-info">Actualizar</button>
              <input type="hidden" name="registro" value="actualizar"> <!-- Este es el que envió por POST para ver si es crear o editar -->
              <input type="hidden" name="idRegistro" value="<?php echo $id_Paciente; ?>">
              <a href="listaPacientes.php"> <button type="button" class="btn btn-default float-right">Cancelar</button></a>
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
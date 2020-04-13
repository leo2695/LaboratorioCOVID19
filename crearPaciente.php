<?php include_once 'funciones/sesiones.php'; ?>
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
                            <h1>Crear Paciente</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="listaPacientes.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Crear Paciente</li>
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
                    <form class="form-horizontal" method="POST" action="modeloPaciente.php" name="crear" id="crear">
                        <!-- Tengo que cambiarle el id para poder usar AJAX para cargar la imagen -->
                        <div class="card-body">

                            <!-- CÉDULA -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Cédula</label>
                                <div class="col-sm-8">
                                    <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Cédula Formato: 402260558">
                                </div>
                            </div>
                            <!-- FIN CÉDULA -->


                            <!-- NOMBRE -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                                </div>
                            </div>
                            <!-- FIN NOMBRE -->

                            <!-- APELLIDO -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Primer Apellido</label>
                                <div class="col-sm-8">
                                    <input type="text" name="apellido1" class="form-control" id="apellido1" placeholder="Primer Apellido">
                                </div>
                            </div>
                            <!-- FIN APELLIDO -->

                            <!-- APELLIDO2 -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Segundo Apellido</label>
                                <div class="col-sm-8">
                                    <input type="text" name="apellido2" class="form-control" id="apellido2" placeholder="Segundo Apellido">
                                </div>
                            </div>
                            <!-- FIN APELLIDO2 -->

                            <!-- EDAD -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Edad</label>
                                <div class="col-sm-8">
                                    <input type="number" name="edad" class="form-control" id="edad" placeholder="0" min="0" max="120">
                                </div>
                            </div>
                            <!-- FIN EDAD -->

                            <!-- EMAIL -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Formato: a@gmail.com">
                                </div>
                            </div>
                            <!-- FIN EMAIL -->


                            <!-- GENERO -->
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Género</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="genero" id="genero">
                                        <option value="">Seleccione el Genero</option>
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino</option>



                                    </select>
                                </div>
                            </div>
                            <!-- FIN GENERO -->


                            <!-- TELEFONO -->
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Télefono</label>
                                <div class="col-sm-8">
                                    <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Formato: 23452218">
                                </div>
                            </div>
                            <!-- FIN TELEFONO -->


                            <!-- RESULTADO -->
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-4 col-form-label">Diagnóstico COVID-19</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="diagnostico" id="diagnostico">
                                        <option value="">Seleccione el Resultado de la Prueba</option>
                                        <option value="p">Positivo</option>
                                        <option value="n">Negativo</option>
                                        <option value="e">Espera</option>



                                    </select>
                                </div>
                            </div>
                            <!-- FIN RESULTADO -->


                        </div>
                        <!-- /.card-body -->


                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Agregar</button>
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="reset" class="btn btn-default float-right">Resetear</button>
                            <a href="listaPacientes.php" class="btn btn-default ml-5">Regresar</a>
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
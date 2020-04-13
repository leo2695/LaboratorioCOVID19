<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
?>

<?php include_once 'funciones/sesiones.php' ?>
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
                            <h1>Lista Pacientes</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Pacientes</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Gestiona los Pacientes</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="registros" class="table table-bordered table-striped">

                                    <!-- Títulos de Columnas -->
                                    <thead>
                                        <tr>
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Edad</th>
                                            <th>Género</th>
                                            <th>COVID-19</th>
                                            <th>Correo Electrónico</th>
                                            <?php if ($_SESSION['rol'] == 1) : ?>
                                                <!-- Para ocultar esta sección a otras personas -->
                                                <th>Acciones</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        /*  */
                                        if ($_SESSION['rol'] == 1) {
                                            /* <!-- Para ocultar esta sección a otras personas --> */
                                            /*  */


                                            try {
                                                $sql = "SELECT * FROM pacientes";
                                                $resultado = $conn->query($sql);
                                            } catch (Exception $e) {
                                                $error = $e->getMessage();
                                                echo $error;
                                            }
                                            /* $paciente = $resultado->fetch_assoc();

                                        /*   echo "<pre>";
                                        var_dump($paciente);
                                        echo "</pre>"; */
                                        }
                                        if ($_SESSION['rol'] == 0) :

                                            $cedulaSesion = $_SESSION['cedula']; //tomo la variable que cree en el modeloLogin de session y la asigno a una nueva variable porque directa en el SQL no pude
                                            try {
                                                $sql = "SELECT * FROM pacientes WHERE cedula = $cedulaSesion; ";
                                                $resultado = $conn->query($sql);
                                            } catch (Exception $e) {
                                                $error = $e->getMessage();
                                                echo $error;
                                            }
                                        endif;
                                        while ($paciente = $resultado->fetch_assoc()) : ?>
                                            <tr>
                                                <td><?php echo $paciente['cedula'];  ?></td>
                                                <td><?php echo $paciente['nombre_Paciente'] . ' ' . $paciente['apellido1_Paciente'] . ' ' . $paciente['apellido2_Paciente'];  ?></td>
                                                <td><?php echo $paciente['edad'];  ?></td>
                                                <!-- IF GENERO -->
                                                <?php if ($paciente['genero'] == "m") { ?>
                                                    <td>Masculino</td>
                                                <?php } else { ?>
                                                    <td>Femenino</td>
                                                <?   } ?>
                                                <!-- FIN IF GENERO -->

                                                <!-- IF DIAGNOSTICO -->
                                                <?php if ($paciente['diagnostico'] == "p") { ?>
                                                    <td>Positivo</td>

                                                <?php }

                                                if ($paciente['diagnostico'] == "n") { ?>
                                                    <td>Negativo</td>
                                                <? }
                                                if ($paciente['diagnostico'] == "e") { ?>
                                                    <td>En Espera</td>
                                                <?php } ?>
                                                <!-- FIN IF DIAGNOSTICO -->

                                                <td><?php echo $paciente['email']  ?></td>

                                                <!-- ACCIONES -->
                                                <?php if ($_SESSION['rol'] == 1) : ?>
                                                    <!-- Para ocultar esta sección a otras personas -->

                                                    <td>
                                                        <!-- Editar -->
                                                        <a href="editarPaciente.php?id=<?php echo $paciente['cedula']; ?>" class="btn bg-orange btn-flat margin">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <!-- Eliminar -->
                                                        <a href="#" data-id="<?php echo $paciente['cedula']; ?>" data-tipo="paciente" class="btn bg-maroon btn-flat margin borrarRegistro" data-imagen="<?php echo $paciente['imagen']; ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                <?php endif; ?>

                                            </tr>


                                        <?php endwhile; ?>


                                    </tbody>


                                    <tfoot>
                                        <tr>
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Edad</th>
                                            <th>Género</th>
                                            <th>COVID-19</th>
                                            <th>Correo Electrónico</th>
                                            <?php if ($_SESSION['rol'] == 1) : ?>
                                                <!-- Para ocultar esta sección a otras personas -->
                                                <th>Acciones</th>
                                            <?php endif; ?>
                                        </tr>
                                    </tfoot>


                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <?php include_once 'templates/footer.php' ?>

        <!-- APP.JS -->
        <!-- <script src="js/app.js"></script> -->
</body>

</html>
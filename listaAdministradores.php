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
                            <h1>Lista Administradores</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Administradores</li>
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
                                <h3 class="card-title">Gestiona los Administradores</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="registros" class="table table-bordered table-striped">

                                    <!-- Títulos de Columnas -->
                                    <thead>
                                        <tr>
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        try {
                                            $sql = "SELECT cedula, nombre_Medico, apellido1_Medico,apellido2_Medico, usuario FROM administradores";
                                            $resultado = $conn->query($sql);
                                        } catch (Exception $e) {
                                            $error = $e->getMessage();
                                            echo $error;
                                        }

                                        while ($administrador = $resultado->fetch_assoc()) : ?>
                                            <tr>
                                                <td><?php echo $administrador['cedula'];  ?></td>
                                                <td><?php echo $administrador['nombre_Medico'].' '.$administrador['apellido1_Medico']. ' '.$administrador['apellido2_Medico'];  ?></td>
                                                <td><?php echo $administrador['usuario']; ?></td>


                                                <!-- ACCIONES -->
                                                <td>
                                                    <!-- Editar -->
                                                    <a href="editarAdministrador.php?id=<?php echo $administrador['cedula']; ?>" class="btn bg-orange btn-flat margin">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <!-- Eliminar -->
                                                    <a href="#" data-id="<?php echo $administrador['cedula']; ?>" data-tipo="Administrador" class="btn bg-maroon btn-flat margin borrarRegistro">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>


                                        <?php endwhile; ?>


                                    </tbody>


                                    <tfoot>
                                        <tr>
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Acciones</th>
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
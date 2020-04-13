<?php
session_start();
$cerrarSesion = $_GET['cerrarSesion'];
if ($cerrarSesion) :
    session_destroy();
endif;
?>

<?php
/* ini_set("display_errors", "1");
error_reporting(E_ALL); */
?>

<?php include_once '../funciones/funciones.php' ?>

<?php include_once 'templates/header.php' ?>

<body class="hold-transition login-page">

    <div class="login-box">


        <div class="login-logo">
            <a href="index.php"><b>Laboratorio</b>COVID-19</a>
        </div>
        <!-- FIN .login-logo -->


        <div class="card">

            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sesión</p>


                <!-- INICIAR SESION -->
                <?php
                session_start();
                /*echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>"; */
                ?>






                <form action="modeloLogin.php" method="POST" name="loginForm" id="loginForm">

                    <!-- USUARIO -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block" name="">Entrar</button>
                            <input type="hidden" name="login" value="1">
                        </div>

                        <!-- FIN .row -->
                    </div>

                </form>

                <!-- FIN .login-card-body -->
            </div>

            <!-- FIN .card -->
        </div>

        <!-- FIN DIV .login-box -->
    </div>

    <?php include_once 'templates/footer.php' ?>
</body>
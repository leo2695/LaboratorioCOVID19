<?php
include_once '../funciones/funciones.php';

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

/* $cedulaAdministrador = $_POST['cedula']; */





/* LOGIN */
if (isset($_POST['login'])) : //hace referencia al input hidden



    /* die(json_encode($_POST)); */ //BIEN

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {

        $statement = $conn->prepare("SELECT * FROM administradores WHERE usuario=?;");
        $statement->bind_param("s", $usuario);
        $statement->execute();
        $statement->bind_result($cedulaAdministrador, $nombreMedico, $apellido1Medico, $apellido2Medico, $usuarioMedico, $passwordMedico, $modificado, $rol); //regresa el resultado, lo filtra y puedo usar las variables que quiera
        //el orden importa, serán asignados a como aparezcan en las columnas de la BD a los nombres que puse en bind_result en orden

        if ($statement->affected_rows) {
            $existe = $statement->fetch();

            if ($existe) {
                /*    $respuesta = array(
                    'respuesta' => 'Existe!'
                ); */
                if (password_verify($password, $passwordMedico)) {

                    //INICIAR SESION
                    session_start();
                    $_SESSION['cedula']=$cedulaAdministrador; //esta es para poder accederla en lista Pacientes para que solo muestra al paciente que ingreso sino es admi
                    $_SESSION['usuario'] = $usuarioMedico;
                    $_SESSION['nombre'] = $nombreMedico;
                    $_SESSION['apellido1'] = $apellido1Medico;
                    $_SESSION['rol'] = $rol;

                    $respuesta = array(
                        'respuesta' => 'exito',
                        'usuario' => $nombreMedico . ' ' . $apellido1Medico

                    );
                    //

                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        }

        $statement->close();
        $conn->close();
    } catch (Exception $cedula) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));


endif;

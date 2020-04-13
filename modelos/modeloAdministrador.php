<?php include_once '../funciones/funciones.php';

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$rol=$_POST['rol'];


/* CREAR */

if ($_POST['registro'] == 'nuevo') :

    /* die(json_encode($_POST)); */ //BIEN

    /*  */
    $opciones = array(
        'cost' => 12
    );
    $encriptar = password_hash($password, PASSWORD_BCRYPT, $opciones);
    /*  */
    try {

        $statement = $conn->prepare("INSERT INTO administradores (cedula, nombre_Medico, apellido1_Medico, apellido2_Medico, usuario,password,rol) VALUES (?,?,?,?,?,?,?)");
        $statement->bind_param("isssssi", $cedula, $nombre, $apellido1, $apellido2, $usuario, $encriptar,$rol);
        $statement->execute();

        //Crear respuesta
        $id_Registrado = $statement->insert_id;
        /*  */
        if ($statement->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito'
            );

            /* die(json_encode($_POST)); */ //BIEN
        } else {
            $respuesta = array(

                'respuesta' => 'error'

            );
        }

        $statement->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));

endif;














/* EDITAR */
if ($_POST['registro'] == 'actualizar') :
     die(json_encode($_POST));

    $cedulaEditar = $_POST['idRegistro'];


    try {

        if (empty($_POST['password'])) {
            //si el campo password viene vacio, o sea no cambie el password, no actualizo el password en la BD, para no enviarlo vacío
            /* die(json_encode($_POST['password'])); */
            //
            $statement = $conn->prepare("UPDATE administradores SET nombre_Medico = ? , apellido1_Medico = ?, apellido2_Medico = ?, usuario = ?, modificado = NOW() WHERE cedula = ?"); //NOW() es una función que toma la hora actual del servidor
            $statement->bind_param("ssssi", $nombre, $apellido1, $apellido2, $usuario, $cedulaEditar);
            //

        } else {
            //si cambie el password entonces hago el UPDATE a ese campo o sea a todo
            /* die(json_encode($_POST['usuario'])); */

            //HASHEAR EL PASSWORD
            $opciones = array(
                'cost' => 12
            );
            $encriptar = password_hash($password, PASSWORD_BCRYPT, $opciones);


            //
            $statement = $conn->prepare("UPDATE administradores SET nombre_Medico = ? , apellido1_Medico = ?, apellido2_Medico = ?, usuario = ?, password=?, modificado = NOW() WHERE cedula = ?"); //NOW() es una función que toma la hora actual del servidor
            $statement->bind_param("sssi", $nombre, $apellido1, $apellido2, $usuario, $encriptar, $cedulaEditar);
        }

        $statement->execute();

        if ($statement->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        $statement->close();
        $conn->close();
        //


    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));

endif;
















/* ELIMINAR */
if ($_POST['registro'] == 'eliminar') :
    /* die(json_encode($_POST)); */

    $idBorrar = $_POST['id'];


    try {

        $statement = $conn->prepare("DELETE FROM administradores WHERE cedula = ? ");
        $statement->bind_param("i", $idBorrar);
        $statement->execute();



        /* RESPUESTA */
        if ($statement->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'idEliminado' => $idBorrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        //

        $statement->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }

    die(json_encode($respuesta));

endif;

<?php
/* echo "<pre>";
var_dump($_POST);
echo "</pre>"; */
include_once '../funciones/funciones.php';


//Comprobando conexión

/* if($conn->ping()){
    echo "Conectado";
}else{
    echo "No!";
}  */

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$diagnostico = $_POST['diagnostico'];


/* CREAR */

if ($_POST['registro'] == 'nuevo') :

        /* die(json_encode($_POST)); */ //BIEN

        /* die(json_encode($respuesta)); */ //BIEN
    /*  */

    try {

        $statement = $conn->prepare("INSERT INTO pacientes (cedula, nombre_Paciente, apellido1_Paciente, apellido2_Paciente, edad, email, genero, telefono, diagnostico) VALUES (?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("isssissss", $cedula, $nombre, $apellido1, $apellido2, $edad, $email, $genero, $telefono, $diagnostico);
        $statement->execute();

        if ($statement->affected_rows) { //si el statement que hice afecto una fila o sea si hizo una nueva entonces devuelto éxito
            $respuesta = array(
                'respuesta' => 'exito',
            );

            /* die(json_encode($respuesta)); */ //BIEN

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

/* echo $encriptar; */














/* EDITAR */
if ($_POST['registro'] == 'actualizar') :

    /* die(json_encode($_POST)); */

    /* Para guardar las imagenes ahí */
    $directorio = "../img/pacientes/";

    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true); //0755 que puedan verlos pero que no los puedan manipular   |||   recursivo: true asi hacemos que todos los archivos tengan los mismos permisos
    }

    //Mover archivos de temp a ubicación permanente
    if (move_uploaded_file($_FILES['cargarImagen']['tmp_name'], $directorio . $_FILES['cargarImagen']['name'])) {
        //no guardamos las imagenes en la BD, lo guardamos en el servidor y en la BD solo el nombre del archivo
        $imagenNombre = $_FILES['cargarImagen']['name'];
        $imagenResultado = "Se cargó correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()

        );
    }



    /*  die(json_encode($imagenNombre)); */

    /*  */
    try {

        if ($_FILES['cargarImagen']['size'] > 0) {
            //si la email, geneto, telefono, diagnostico fue modificada

            //
            $statement = $conn->prepare("UPDATE pacientes SET nombre_Paciente = ? ,apellido1_Paciente  apellido2_Paciente= ?, edad= ?, email, geneto, telefono, diagnostico= ?, modificado = NOW() WHERE id_Invitado = ?"); //NOW() es una función que toma la hora actual del servidor
            $statement->bind_param("ssssi", $nombre, $apellido1_Paciente, $apellido2_Paciente, $edad, $imagenNombre, $id_Invitado);
            //

        } else {
            //si no cambie la email, geneto, telefono, diagnostico
            /* die(json_encode($_POST['apellido1_Paciente' apellido2_Paciente])); */

            $statement = $conn->prepare("UPDATE pacientes SET nombre_Paciente = ? ,apellido1_Paciente  apellido2_Paciente= ?, edad= ?, modificado = NOW() WHERE id_Invitado = ?"); //NOW() es una función que toma la hora actual del servidor
            $statement->bind_param("sssi", $nombre, $apellido1_Paciente, $apellido2_Paciente, $edad, $id_Invitado);
        }

        $estado = $statement->execute();
        /* $archivo = fopen($_FILES["UploadFileName"]["tmp_name"], 'r'); */
        if ($estado == true) {
            $respuesta = array(
                'respuesta' => 'exito',
                /*  'imagenPrevia' => $archivo, */
                'id_actualizado' => $id_Invitado
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

    $idBorrar = $_POST['id']; //este id es del Ajax.js y el js lo esta tomando del form data-id

    /* Para guardar las imagenes ahí */
    $directorio = "../img/pacientes/";

    /*  die(json_encode($_POST['email, geneto, telefono, diagnostico'])); */

    /* ELIMINAR FOTO */
    unlink($_POST['email, geneto, telefono, diagnostico']);
    rmdir($directorio . $_POST['email, geneto, telefono, diagnostico']);
    /*  */

    try {

        $statement = $conn->prepare("DELETE FROM pacientes WHERE id_Invitado = ?");
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

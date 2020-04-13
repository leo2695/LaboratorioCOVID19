<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funciones.php'; ?>

<?php

$sql = "SELECT modificado, COUNT(*) AS resultado FROM pacientes WHERE diagnostico= 'p' GROUP BY DATE(modificado) ORDER BY modificado ";
$resultado = $conn->query($sql);

//si el querey falla puede ser por el DATE()
//en ese caso escribir en la linea de comandos del motor SQL
/*
SELECT @@GLOBAL.sql_mode;

SET @@global.sql_mode= 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
*/

$arregloRegistros = array();

while ($registroDia = $resultado->fetch_assoc()) :
    /*  echo "<pre>"; */
    /*  var_dump($registroDia); */ //esto es un arreglo array
    /* var_dump(json_encode($registroDia)); */ //y asi ya cambia a formato JSON
    /* echo "</pre>"; */

    $fecha = $registroDia['modificado']; //esta fecha tiene la hora entonces tengo que darle formato
    $registro['fecha'] = date('Y-m-d', strtotime($fecha)); //esto es para quitarle la hora
    $registro['cantidad'] = $registroDia['resultado']; //['resultado'] este es el alias AS que puse o sea es el resultado del COUNT o sea cuantos conto que cumplieran las caracteristicas que puse

    $arregloRegistros[] = $registro;



endwhile;

/* echo "<pre>";
var_dump($arregloRegistros); //asi arreglo
echo "</pre>"; */

echo json_encode($arregloRegistros);  //asi se va en json y esto es accesible para el js en data

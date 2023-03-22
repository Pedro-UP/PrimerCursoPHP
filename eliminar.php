<?php

/* hace la conexion con la base de datos atravez de la del archivo que isimos para tener la conexion
es por asi decirlo como una invocacion de una funcion de conexion */
require 'conexion.php';

//* Solo usaremos uno en este caso sera el id es decir lo eliminaremos por id
//* Como la informacion lo mandamos desde la funcion GET aqui tenemos que usar GET
$id = $mysqli->real_escape_string($_GET['id']);

//* De esta forma elimina el registro
$sql = "DELETE FROM alumnostb WHERE id=$id";

//* La variable echo es para mostrar lo que apaece en la variable sql sirve para ver errores.
//echo $sql;
$resultado = $mysqli->query($sql);

if ($resultado > 0) {
    header("Location: index.php");
} else {
    echo ' Error al eliminar el registro';
}


?>
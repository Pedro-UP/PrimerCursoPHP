<?php
/*En una nueva estancia creamos los valores para lo conexion de la base de datos en donde pediremos 
los campos de nuetra base de datos posteriormente a eso veremos que 
si algo sale mal nos enviara el siguiente mensaje de error */
$mysqli = new mysqli("localhost", "root", "", "elsherk");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQl: (" . $mysqli->connect_errno . ") " . $mysqli->connect_errno;
}
?>
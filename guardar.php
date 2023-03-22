<?php

/* hace la conexion con la base de datos atravez de la del archivo que isimos para tener la conexion
es por asi decirlo como una invocacion de una funcion de conexion */
require 'conexion.php';

/* en la variables que creamos le podemos poner cualquier nombre y resivira atravez del metodo POST
la informacion que tiene ese elemento que aviamos creado previamente y con el comando de mysqli que
aparece hay es para mayor seguridad */
$nombre = $mysqli->real_escape_string($_POST['nombre']);
$edad = $mysqli->real_escape_string($_POST['edad']);
$email = $mysqli->real_escape_string($_POST['email']);
$genero = $mysqli->real_escape_string($_POST['genero']);
$horas = $mysqli->real_escape_string($_POST['horas']);

// * Secuencia sql para insertar los tipos de datos que enviamos desde el formulario de
// * Los primeros datos son los de la base de datos y los de value los de arriba.
$sql = "INSERT INTO alumnostb(nombre, edad, email, genero, horas) 
VALUES('$nombre','$edad','$email','$genero', '$horas')";
//* La variable echo es para mostrar lo que apaece en la variable sql sirve para ver errores.
//echo $sql;
$resultado = $mysqli->query($sql);

// * Si los datos son enviados es decir se envia almenos uno entonces se registran,
// * sino se registran mandara un error
if ($resultado > 0) {
    //* Con este comando te redirecciona a la pagina en la que estabas
    header("Location: registro.html");
} else {
    echo ' Error al agregar registro';
}


?>
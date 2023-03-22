<?php

/* hace la conexion con la base de datos atravez de la del archivo que isimos para tener la conexion
es por asi decirlo como una invocacion de una funcion de conexion */
require 'conexion.php';

/* en la variables que creamos le podemos poner cualquier nombre y resivira atravez del metodo POST
la informacion qye tiene ese elemento que aviamos creado previamente y con el comando de mysqli que
aparece hay es para mayor seguridad */
$id = $mysqli->real_escape_string($_POST['id']);
$nombre = $mysqli->real_escape_string($_POST['nombre']);
$edad = $mysqli->real_escape_string($_POST['edad']);
$email = $mysqli->real_escape_string($_POST['email']);
$genero = $mysqli->real_escape_string($_POST['genero']);
$horas = $mysqli->real_escape_string($_POST['horas']);

//* En este punto a diferencia de guardar usaremos otro tipo de funcion en este caso
//* sera para actualizar los datos en este caso cambiaremos los datos cuando
//* el id sea el sellecionado.
$sql = "UPDATE alumnostb SET nombre='$nombre', edad='$edad', email='$email', 
genero='$genero', horas='$horas' WHERE id=$id ";
//* La variable echo es para mostrar lo que apaece en la variable sql sirve para ver errores.
//echo $sql;
$resultado = $mysqli->query($sql);

// * Si los datos son encviados es decir se envia almenos uno enonces se registran,
// * sino se registran mandara un error
if ($resultado > 0) {
    header("Location: index.php");
} else {
    echo ' Error al modificar el registro';
}


?>
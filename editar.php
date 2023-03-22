<?php
require 'conexion.php';

//* Se utiliza el metodo GET para recibir el dato a travez de un enlace
$id = $mysqli->real_escape_string($_GET['id']);
//* Con LIMIT 1 kimitamos que solo muestre un registro
$sql = "SELECT * FROM alumnostb WHERE id = $id LIMIT 1 ";
$resultado = $mysqli->query($sql);
//* Comando para mostrar los resultados
$row = $resultado->fetch_assoc();

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clases de Sherk</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <h1>Alumnos del Dia Jueves</h1>
    <!-- * En php para generar un CRUD nesesitamos primero de crear un formulario el cual debera de llevar un id y nombre
     * identificador que en este caso sera registro y se le colocara para poder hacer el envio de los datos el
    * metodo POST y se guardara en la ruta que especifiquemos. -->
    <form id="registro" name="registro" method="POST" action="guardar-edit.php" autocomplete="off">
        <div class="container">
            <!-- * Lo siguientes que aremos sera crear un elemento para que este obtenga lo puest por el usuario y
            * posteriormente ya que esta en el metodo POST lo envie a la ruta.-->
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <!-- //* Con el comando value mostraremos lo que tiene ese campo del id que seleccionamos -->
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del alumno"
                    value="<?php echo $row['nombre'] ?>" autofocus required>
                   <!--  //? En este caso pedimos el id pero no lo mostraremos -->
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad del alumno"
                    value="<?php echo $row['edad'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                    value="<?php echo $row['email'] ?>" required>
            </div>
            <!-- * Para hacer uno que sea de opciones es decir puedas seleccionar el que quieras sera nesesario poner este comando
            * tal cual esta abajo solamente cambiando los option por los que deseemos poner -->
            <div class="form-group">
                <label for="genero">Genero</label>
                <select class="form-control" id="genero" name="genero">
                    <option value="hombre" <?php if ('hombre' == $row['genero']) {
                        echo 'selected';
                    } ?>>Hombre</option>
                    <option value="mujer" <?php if ('mujer' == $row['genero']) {
                        echo 'selected';
                    } ?>>Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="horas">Horas en Total</label>
                <select class="form-control" id="horas" name="horas" required>
                    <option value="1-a-2" <?php if ('1-a-2' == $row['horas']) {
                        echo 'selected';
                    } ?>>1-2hr</option>
                    <option value="2-a-3" <?php if ('2-a-3' == $row['horas']) {
                        echo 'selected';
                    } ?>>2-3hr</option>
                    <option value="mas-de-3" <?php if ('mas-de-3' == $row['horas']) {
                        echo 'selected';
                    } ?>>Mas de 3hr
                    </option>
                </select>
            </div> <br>
            <!-- ? Codigo en desuso -->
            <!-- ? <div class="form-group">
             ? <label for="exampleFormControlTextarea1">Example textarea</label>
            ? <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        ? </div> -->
            <div class="form-group">
                <button class="btn btn-primary" id="guardar" name="guardar" type="submit">Guardar</button>
            </div> <br>
            <div class="form-group">
                <a href="index.php" class="btn btn-primary" style="width: auto;">Volver</a>
            </div>
        </div>
    </form>


    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
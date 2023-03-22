<!-- //* Codigo PHP para poder ver los registros de nuestra tabla -->
<?php
//* Para conectarse con la base de datos
require 'conexion.php';

//* Guardamos la secuencia sql en la que traemos todos los datos de la tabla siempre y seguridad
//* cuando sean mayor a 1 y los guardamos en la variable sql
$sql = "SELECT * FROM alumnostb WHERE 1";
//* Luego en una variable resultado guardamos la consulta sql antes dicha
$resultado = $mysqli->query($sql);
    //? La funcion mysqli->query() realisa una consulta a la base de datos.
    //? mysqli_query() combina la ejecución de sentencias y el almacenamiento en buffer de conjuntos de resultados.
?>

<!doctype html> 
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clases de Sherk</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //* Conexion que se requiere traer para poder hacer que la tabla tenga mas funciones -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- //* Conexion nesesaria para la funcion -->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- //* Sript nesesario para dicha funcion -->
    <script>
        $(document).ready(function () {
            $('#tablasherk').DataTable();
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Alumnos del Dia Jueves</h1>
        </div>

        <div class="row">
            <a href="registro.html" class="btn btn-primary" style="width: auto;">Registro</a>
        </div>

        <table id="tablasherk" class="display" style="width:100%">
            <thead>
                <tr>
                    <th class="col-md-0">Id</th>
                    <th class="col-md-3">Nombre</th>
                    <th class="col-md-0">Edad</th>
                    <th class="col-md-3">Correo Electronio</th>
                    <th class="col-md-0">Genero</th>
                    <th class="col-md-2">Horas</th>
                    <th class="col-md-1">Editar</th>
                    <th class="col-md-1">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- //* Para mostrar la tabla primero en un ciclo while en cada fila se ira guardando los datos de la tabla
                //* que aviamos guardado en resultado y con fecth_assoc ira recorriendo campo por campo y fila por fila -->
                <?php while($row = $resultado->fetch_assoc()) {?>
                <tr>
                    <!-- //* Para poder mostrarlo atravez del siguiente codigo atravez de la funcion echo pedimos el dato
                    //* de la columna correspondiente -->
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['edad']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['genero']; ?></td>
                    <td><?php echo $row['horas']; ?></td>
                   <!--  //*Para el boton editar y eliminar colocaremos php en la misma linea del html primero lo dirijiremos 
                    //* a la ventana correspondiente y en esta nesesitaremos el id especifico de cada fila -->
                    <td><a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a></td>
                    <td><a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>
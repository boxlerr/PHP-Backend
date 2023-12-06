<?php
include_once("header.php");
?>
<?php
require_once("../conect/conect.php");

// Verificar si la conexión a la base de datos se realizó con éxito
if ($con) {
    // Verificar si se han enviado los datos del formulario
    if (isset($_POST['nombreCategoria'])) {
        // Obtener el nombre de la categoría del formulario
        $nombreCategoria = $_POST['nombreCategoria'];

        // Verificar si la categoría ya existe en la base de datos
        $consultaExistencia = "SELECT idCategoria FROM categorias WHERE nombreCategoria = '$nombreCategoria'";
        $resultadoExistencia = mysqli_query($con, $consultaExistencia);

        // Si la categoría no existe, insertarla en la base de datos
        if (mysqli_num_rows($resultadoExistencia) == 0) {
            // Crear la consulta SQL para insertar la nueva categoría
            $consultaInsertar = "INSERT INTO categorias (nombreCategoria) VALUES ('$nombreCategoria')";

            // Ejecutar la consulta en la base de datos
            $resultadoInsertar = mysqli_query($con, $consultaInsertar);

            // Verificar el resultado de la consulta
            if ($resultadoInsertar) {
                // Mostrar un mensaje de éxito si la consulta fue exitosa
                echo "<h1>Categoría \"$nombreCategoria\" agregada con éxito</h1>";
                echo "<a href='index.php'>Volver</a>";
            } else {
                // Mostrar un mensaje de error si la consulta falló
                echo "<h1>Error al agregar la categoría</h1>";
                echo "Error: " . mysqli_error($con);
            }
        } else {
            // Mostrar un mensaje si la categoría ya existe
            echo "<h1>La categoría \"$nombreCategoria\" ya existe</h1>";
            echo "<a href='index.php'>Volver</a>";
        }
    }
} else {
    // Mostrar un mensaje de error si la conexión a la base de datos falló
    echo "<h1>Error de conexión a la base de datos</h1>";
}

//En resumen, mysqli_num_rows es útil para contar el número de filas en el resultado de una consulta SELECT y se utiliza para realizar acciones basadas en la cantidad de resultados obtenidos.
?>

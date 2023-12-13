<?php
include_once("header.php");
?>
<?php
// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");

// Verifica si la conexión a la base de datos se estableció correctamente
if ($con) {
    // Verifica si 'categoria' está presente en la URL
    if (isset($_GET['categoria'])) {
        // Obtiene el valor de 'categoria' desde la URL
        $id = $_GET['categoria'];

        // Construye la consulta SQL para eliminar la categoría con el ID correspondiente
        $consulta = "DELETE FROM categorias WHERE idCategoria='$id'";

        // Ejecuta la consulta
        $resultado = mysqli_query($con, $consulta);

        // Verifica si la consulta se ejecutó con éxito
        if ($resultado) {
            // Muestra un mensaje de éxito y un enlace para volver a la página principal
            print "<h1>La categoría fue eliminada</h1>";
            print "<div class='container mt-5 text-center'> <!-- Utiliza la clase 'text-center' de Bootstrap para centrar horizontalmente -->
            <a href='index.php' class='btn btn-dark boton-usuario'>Volver</a> <!-- Utiliza la clase 'btn btn-dark' para dar estilo a Bootstrap -->
        </div>";        }
    }
}
?>

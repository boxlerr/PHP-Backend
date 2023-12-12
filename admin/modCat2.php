<?php
include_once("header.php");
?>
<?php
// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");

if ($con) {
    if (isset($_GET['mod']) && isset($_GET['id'])) {
        $mod = $_GET['mod'];
        $id = $_GET['id'];

        // Consulta para actualizar el nombre de la categoría
        $consulta = "UPDATE categorias SET nombreCategoria='$mod' WHERE idCategoria='$id'";
        $resultado = mysqli_query($con, $consulta);

        if ($resultado) {
            print "<h1>La categoría fue modificada por $mod</h1>";
            print "<div class='container mt-5 text-center'> <!-- Utiliza la clase 'text-center' de Bootstrap para centrar horizontalmente -->
            <a href='index.php' class='btn btn-dark boton-usuario'>Volver</a> <!-- Utiliza la clase 'btn btn-dark' para dar estilo a Bootstrap -->
        </div>";
        } else {
            print "<h1>Error al modificar la categoría</h1>";
            // Muestra el error de MySQL específico
            print "Error: " . mysqli_error($con);
        }
    }
}
?>

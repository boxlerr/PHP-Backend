<?php
include_once("header.php");
?>
<?php
// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");

if ($con) {
    if (isset($_POST['nombreAuto']) && isset($_POST['precioAuto']) && isset($_POST['detalleAuto']) && isset($_POST['idAuto'])) {
        // Obtiene los datos del formulario
        $id = $_POST['idAuto'];
        $nombre = $_POST['nombreAuto'];
        $precio = $_POST['precioAuto'];
        $detalle = $_POST['detalleAuto'];

        // Evitar inyecciones SQL utilizando consultas preparadas
        $consulta = $con->prepare("UPDATE autos SET nombreAuto=?, precioAuto=?, detalleAuto=? WHERE idAuto=?");
        $consulta->bind_param("ssss", $nombre, $precio, $detalle, $id);
        $resultado = $consulta->execute();

        if ($resultado) {
            print "<h1>El auto fue modificado por $nombre</h1>";
            print "<div class='container mt-5 text-center'> <!-- Utiliza la clase 'text-center' de Bootstrap para centrar horizontalmente -->
            <a href='index.php' class='btn btn-dark boton-usuario'>Volver</a> <!-- Utiliza la clase 'btn btn-dark' para dar estilo a Bootstrap -->
        </div>";
        } else {
            print "<h1>Error al modificar el auto</h1>";
            // Muestra el error de MySQL
            print "Error: " . $consulta->error;
        }

        $consulta->close();
    }
}
?>

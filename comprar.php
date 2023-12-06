<?php
// Incluye el encabezado de la página
include_once("header.php");

// Incluye el archivo de conexión a la base de datos
require_once("conect/conect.php");
?>

<main>
    <h1 class="mt-5 text-center">Comprar</h1>
    <div class="container mt-4">
        <?php
        // Verifica la conexión a la base de datos
        if ($con) {
            // Consulta para obtener las categorías
            $consultaCategorias = "SELECT idCategoria, nombreCategoria FROM categorias";

            // Verifica si se obtienen las categorías correctamente
            if ($resultadoCategorias = mysqli_query($con, $consultaCategorias)) {
                // Itera sobre las categorías
                while ($filaCategoria = mysqli_fetch_array($resultadoCategorias)) {
                    // Muestra el nombre de la categoría como título
                    echo "<h2 class='mt-4 text-center'>" . htmlspecialchars($filaCategoria['nombreCategoria']) . "</h2>";
                    echo "<div class='row justify-content-center'>";

                    // Obtiene el ID de la categoría actual
                    $idCategoria = $filaCategoria['idCategoria'];

                    // Prepara y ejecuta la consulta de autos para la categoría actual
                    if ($consultaAutos = $con->prepare("SELECT idAuto, nombreAuto, precioAuto, detalleAuto, fotoAuto FROM autos WHERE idCategoria = ?")) {
                        $consultaAutos->bind_param('i', $idCategoria);
                        $consultaAutos->execute();
                        $resultadoAutos = $consultaAutos->get_result();

                        // Itera sobre los autos de la categoría actual
                        while ($filaAuto = mysqli_fetch_array($resultadoAutos)) {
                            // Construye la ruta de la imagen del auto
                            $imgPath = !empty($filaAuto['fotoAuto']) ? "img/" . htmlspecialchars($filaAuto['fotoAuto']) : "img/default_image.jpg";

                            // Muestra la información del auto en una tarjeta
                            echo "<div class='col-md-4 col-lg-3 mb-3 d-flex align-items-stretch'>";
                            echo "<div class='card'>";
                            echo "<img src='" . $imgPath . "' alt='" . htmlspecialchars($filaAuto['nombreAuto'], ENT_QUOTES) . "' class='card-img-top img-fluid'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>" . htmlspecialchars($filaAuto['nombreAuto']) . "</h5>";
                            echo "<p class='card-text'>Precio: " . htmlspecialchars($filaAuto['precioAuto']) . "</p>";
                            echo "<p class='card-text'>Detalle: " . htmlspecialchars($filaAuto['detalleAuto']) . "</p>";

                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }

                        // Cierra la consulta de autos
                        $consultaAutos->close();
                    } else {
                        echo "<p>Error en la consulta de autos.</p>";
                    }

                    // Cierra el div de row
                    echo "</div>";
                }
            } else {
                echo "<p>Error al obtener las categorías.</p>";
            }
        } else {
            echo "<p>No se pudo conectar a la base de datos.</p>";
        }
        ?>
    </div>
</main>

<?php include_once("footer.php"); ?>

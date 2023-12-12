<?php
include_once("header.php");
?>
<?php
// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");

if ($con) {
    if (isset($_GET['categoria'])) {
        $id = $_GET['categoria'];

        // Consulta para obtener los datos de la categoría
        $consulta = "SELECT idCategoria, nombreCategoria FROM categorias WHERE idCategoria='$id'";
        $resultado = mysqli_query($con, $consulta);

        if ($resultado) {
            $fila = mysqli_fetch_array($resultado);

            // Muestra el formulario para modificar la categoría
            print "
                <form action='modCat2.php' method='get'>
                    <div>
                        <label for='mod'>Modificar</label>
                        <input id='mod' name='mod' type='text' value='$fila[nombreCategoria]' />
                        <input name='id' type='hidden' value='$fila[idCategoria]' />
                        <input type='submit' value='Modificar' />
                    </div>
                </form>
            ";
        }
    }
}
?>
<div class="container mt-5 text-center"> <!-- Utiliza la clase 'text-center' de Bootstrap para centrar horizontalmente -->
        <a href="../admin/index.php" class="btn btn-dark boton-usuario">Volver</a> <!-- Utiliza la clase 'btn btn-dark' para dar estilo a Bootstrap -->
    </div>

<?php
include_once("header.php");
?>
<?php
// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");

if ($con) {
if (isset($_GET['auto'])) {
// Si se ha enviado el formulario, procesar la actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = $_POST['idAuto'];
$nombre = $_POST['nombreAuto'];
$precio = $_POST['precioAuto'];
$detalle = $_POST['detalleAuto'];

// Evitar inyecciones SQL utilizando consultas preparadas
//prepare() es para preparar una consulta SQL para su ejecución. el servidor de bd analiza, compila y optimiza el plan para la consulta, pero no ejecuta la consulta en sí.
//"conect"
$consulta = $con->prepare("UPDATE autos SET nombreAuto=?, precioAuto=?, detalleAuto=? WHERE idAuto=?");
//bind_param() se usa para enlazar variables a los marcadores de posición de parámetros de la sentencia SQL preparada. es importante para evitar la inyección de SQL, ya que  valor que se pase a través de bind_param() será tratado como  valor y no como parte de la SQL.
$consulta->bind_param("ssss", $nombre, $precio, $detalle, $id);
//execute() es  para ejecutar una sentencia preparada que ha sido previamente preparada
$resultado = $consulta->execute();

if ($resultado) {
print "<h1>El auto fue modificado por $nombre</h1>";
print "<a href='index.php'>Volver</a>";
exit(); // Termina la ejecución después de mostrar el mensaje de éxito
} else {
print "<h1>Error al modificar el auto</h1>";
// Muestra el error de MySQL
print "Error: " . $consulta->error;
}

$consulta->close();
} else {
$id = $_GET['auto'];

// Evitar inyecciones SQL utilizando consultas preparadas
$consulta = $con->prepare("SELECT * FROM autos WHERE idAuto = ?");
$consulta->bind_param("s", $id);
$consulta->execute();
$resultado = $consulta->get_result();

if ($resultado->num_rows > 0) {
$filas = $resultado->fetch_assoc();

// Muestra el formulario con los datos del auto
print "
<form action='modAuto.php?auto=$id' method='post' enctype='multipart/form-data'>
<div>
    <label for='nombreAuto'>Nombre Auto</label>
    <input value='$filas[nombreAuto]' id='nombreAuto' type='text' name='nombreAuto' required />
</div>
<div>
    <label for='precioAuto'>Precio Auto</label>
    <input value='$filas[precioAuto]' id='precioAuto' type='number' name='precioAuto' required />
</div>
<div>
    <label for='detalleAuto'>Detalles</label>
    <textarea id='detalleAuto' name='detalleAuto'>$filas[detalleAuto]</textarea>
</div>
<div>
    <input type='hidden' name='idAuto' value='$id' />
</div>
<input type='submit' value='Modificar Auto' />
</form>
";
} else {
print "<h1>No se encontró el auto</h1>";
}

$consulta->close();
}
}
}
?>

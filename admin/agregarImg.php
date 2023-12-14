<?php
require_once ("../registros/admin.php");
include_once("header.php");
?>
<?php
// Incluimos el archivo de conexión a la base de datos
require_once("../conect/conect.php");

// Verificamos si la conexión a la base de datos fue exitosa
if ($con != NULL) {
    // Verificamos si se han enviado los datos del formulario
    //isset() es una función en PHP que se utiliza para verificar si es null o no
    if (isset($_POST['nom']) && isset($_POST['pre'])) {
        // Recibimos los datos del formulario
        $nombre = $_POST['nom'];
        $precio = $_POST['pre'];

        // Generamos un nombre único para la imagen basado en la hora actual
        $hora = time();
        $foto = $hora . '.jpg';

        // Especificamos la ruta de la carpeta donde se guardarán las imágenes
        $ruta_carpeta_img = "../img/";

        // Verificamos si la carpeta existe, y si no, la creamos
        if (!is_dir($ruta_carpeta_img)) {
            mkdir($ruta_carpeta_img, 0777, true);
        }

        // Movemos la imagen subida al servidor y le asignamos el nombre único
        move_uploaded_file($_FILES['arch']['tmp_name'], $ruta_carpeta_img . $foto);

        // Creamos la consulta SQL para insertar los datos en la base de datos
        $consulta = "INSERT INTO autos (nombreProducto, precioAuto, detalleAuto, fotoAuto) VALUES ('$nombre', '$precio', '', '$foto')";

        // Ejecutamos la consulta
        $respuesta = mysqli_query($con, $consulta);

        // Redirigimos a la página principal del administrador
        header("Location: index.php");
    }
} else {
    // Si la conexión a la base de datos falla, mostramos un mensaje de error
    print "<h1>Algo salió mal</h1>";
}

//Se incluye el archivo de conexión a la base de datos (conect.php).
//Se verifica si la conexión a la base de datos ($con) fue exitosa.
//Se verifica si se han enviado los datos del formulario ($_POST['nom'] y $_POST['pre']).
//Se reciben los datos del formulario en variables.
//Se genera un nombre único para la imagen basado en la hora actual.
//Se especifica la ruta de la carpeta donde se guardarán las imágenes.
//Se verifica si la carpeta existe, y si no, se crea.
//Se crea la consulta SQL para insertar los datos en la base de datos.
//Se ejecuta la consulta.
//Se redirige a la página principal del administrador (index.php).
//Si la conexión a la base de datos falla, se muestra un mensaje de error.
?>

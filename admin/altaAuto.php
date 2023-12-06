<?php
include_once("header.php");
?>
<?php
require_once("../conect/conect.php");

// Verificar si la conexión a la base de datos se realizó con éxito
if ($con) {
    // Verificar si se han enviado los datos del formulario
    if (isset($_POST['nombreAuto']) && isset($_POST['precioAuto']) && isset($_POST['detalleAuto']) && isset($_POST['idCategoria'])) {
        
        // Obtener los datos del formulario
        $nombre = $_POST['nombreAuto'];
        $precio = $_POST['precioAuto'];
        $detalle = $_POST['detalleAuto'];
        $idCategoria = $_POST['idCategoria'];

        // Obtener información sobre la imagen subida
        $imagen_nombre = $_FILES['arch']['name'];
        $imagen_tmp = $_FILES['arch']['tmp_name'];
        //La función pathinfo() en PHP es utilizada para obtener información sobre la ruta de un archivo.
        //Seguridad puede ayudar a prevenir archivis malisiosos
        $imagen_extension = pathinfo($imagen_nombre, PATHINFO_EXTENSION);

        // Definir la ruta donde se guardarán las imágenes
        $ruta_carpeta_img = "../img/";

        // Verificar si la carpeta de imágenes existe, y si no, crearla
        if (!is_dir($ruta_carpeta_img)) {
            mkdir($ruta_carpeta_img, 0777, true);
        }

        // Generar un nombre único para la imagen
        $imagen_unico = uniqid() . "." . $imagen_extension;
        
        // Definir la ruta completa de la imagen
        $directorio_imagen = $ruta_carpeta_img . $imagen_unico;

        // Mover la imagen al directorio especificado
        move_uploaded_file($imagen_tmp, $directorio_imagen);

        // Crear la consulta SQL para insertar el nuevo auto en la base de datos
        $consulta = "INSERT INTO autos (nombreAuto, precioAuto, detalleAuto, fotoAuto, idCategoria) VALUES ('$nombre', '$precio', '$detalle', '$imagen_unico', '$idCategoria')";

        // Ejecutar la consulta en la base de datos
        $resultado = mysqli_query($con, $consulta);

        // Verificar el resultado de la consulta
        if ($resultado) {
            // Mostrar un mensaje de éxito si la consulta fue exitosa
            echo "<h1>El Producto $nombre fue agregado</h1>";
            echo "<a href='index.php'>Volver</a>";
        } else {
            // Mostrar un mensaje de error si la consulta falló
            echo "<h1>Error al agregar el producto</h1>";
            echo "Error: " . mysqli_error($con);
        }
    }
} else {
    // Mostrar un mensaje de error si la conexión a la base de datos falló
    die("Error de conexión: " . mysqli_connect_error());
}




//Definición: PATHINFO_EXTENSION es una constante utilizada con la función pathinfo() de PHP para extraer la extensión de un camino (path) de archivo.
//Uso en el código: En la línea $imagen_extension = pathinfo($imagen_nombre, PATHINFO_EXTENSION);, se utiliza para obtener la extensión del nombre de la imagen subida.

//Definición: uniqid() es una función de PHP que genera un identificador único basado en la marca de tiempo actual.
//Uso en el código: En la línea $imagen_unico = uniqid() . "." . $imagen_extension;, se utiliza para generar un nombre único para la imagen, evitando colisiones de nombres.

//Definición: mkdir() es una función de PHP que se utiliza para crear un directorio.
//Uso en el código: En la línea mkdir($ruta_carpeta_img, 0777, true);, se crea el directorio especificado para almacenar las imágenes si aún no existe.

//Definición: mysqli_query() es una función de PHP que realiza una consulta a la base de datos utilizando la conexión proporcionada.
//Uso en el código: En varias líneas del código, como $resultado = mysqli_query($con, $consulta);, se utiliza para ejecutar consultas SQL en la base de datos.

//Definición: is_dir() es una función de PHP que verifica si el directorio especificado existe.
//Uso en el código: En la línea if (!is_dir($ruta_carpeta_img)) { mkdir($ruta_carpeta_img, 0777, true); }, se utiliza para verificar si el directorio de imágenes existe y, si no, crearlo.
?>

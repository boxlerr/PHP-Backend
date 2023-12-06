<?php
include_once("header.php");
?>
<?php
// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");

// Verifica si la conexión a la base de datos se estableció correctamente
if ($con) {
   
    // Obtiene el identificador del auto a eliminar desde la URL
//El uso de intval() es una práctica de seguridad recomendable en PHP cuando estás usando valores que  serán utilizados en operaciones de base de datos.
//Validación: Asegura que el valor de $_GET['auto'] sea un número entero. Esto es útil para proteger contra inyecciones SQL.
//Robustez: Hace que tu código sea más robusto al manejar diferentes tipos de entrada (por ejemplo, si alguien intenta pasar una cadena o un valor no numérico como ID).

    $id = isset($_GET['auto']) ? intval($_GET['auto']) : 0;

    // Verifica si el identificador del auto es válido (mayor que 0)
    if ($id > 0) {
        // Construye la consulta SQL para eliminar el auto con el ID correspondiente
        $consulta = "DELETE FROM autos WHERE idAuto='$id'";
        
        // Ejecuta la consulta
        $resultado = mysqli_query($con, $consulta);

        // Verifica si la consulta se ejecutó con éxito
        if ($resultado) {
            // Muestra un mensaje de éxito y un enlace para volver a la página principal
            print "<h1>El auto fue eliminado exitosamente</h1>";
            print "<a href='index.php'>Volver</a>";
        } else {
            // Muestra un mensaje de error y detalles específicos del error MySQL
            print "<h1>Error al eliminar el auto</h1>";
            print "Error: " . mysqli_error($con);
        }
    } else {
        // Muestra un mensaje si el identificador del auto no es válido
        print "<h1>Identificador de auto no válido</h1>";
    }
} else {
    // Muestra un mensaje de error si la conexión a la base de datos falla
    print "<h1>Error de conexión a la base de datos</h1>";
}
?>

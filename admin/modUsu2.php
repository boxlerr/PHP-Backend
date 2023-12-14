<?php
require_once ("../registros/admin.php");
include_once("header.php");
require_once("../conect/conect.php");

if ($con) {
    if (isset($_POST['nombreUsuario']) && isset($_POST['apellidoUsuario']) && isset($_POST['emailUsuario']) && isset($_POST['claveUsuario']) && isset($_POST['nivelUsuario']) && isset($_POST['estadoUsuario']) && isset($_POST['idUsuario'])) {
        $id = $_POST['idUsuario'];
        $nombre = $_POST['nombreUsuario'];
        $apellido = $_POST['apellidoUsuario'];
        $email = $_POST['emailUsuario'];
        $clave = $_POST['claveUsuario'];
        $nivel = $_POST['nivelUsuario'];
        $estado = $_POST['estadoUsuario'];

        $consulta = $con->prepare("UPDATE usuarios SET NOMBRE=?, APELLIDO=?, EMAIL=?, CLAVE=?, NIVEL=?, ESTADO=? WHERE ID=?");
        $consulta->bind_param("sssssss", $nombre, $apellido, $email, $clave, $nivel, $estado, $id);
        $resultado = $consulta->execute();

        if ($resultado) {
            print "<h1>El usuario fue modificado por $nombre</h1>";
            print "<a href='index.php'>Volver</a>";
        } else {
            print "<h1>Error al modificar el usuario</h1>";
            print "Error: " . $consulta->error;
        }

        $consulta->close();
    }
}
?>

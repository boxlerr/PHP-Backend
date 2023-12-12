<?php
include_once("../header.php");
?>
<?php
session_start();
require_once("../conect/conect.php");

if ($con) {
    $usuario = $_POST['usuario1'];
    $pass = $_POST['pass1'];

    $consulta = "SELECT * FROM usuarios WHERE EMAIL='$usuario' AND CLAVE=MD5('$pass')";
    $resultado = mysqli_query($con, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas == NULL) {
        header("Location: ../login.php?error=ok");
    } elseif ($filas['ESTADO'] == 'banneado') {
        header("Location: ../login.php?ban=ok");
    } else {
        $_SESSION = $filas;
        // Mostrar var_dump($_SESSION) antes de la redirección
        var_dump($_SESSION);
        if ($filas['NIVEL'] == 'Admin') {
            header("Location: ../admin/index.php");
        } else {
            header("Location: ../permisos/index.php");
        }
    }
}
?>

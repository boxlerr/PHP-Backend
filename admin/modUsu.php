<?php
require_once ("../registros/admin.php");
include_once("header.php");
require_once("../conect/conect.php");

if ($con) {
    if (isset($_GET['usuario'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['ID'];
            $nombre = $_POST['NOMBRE'];
            $apellido = $_POST['APELLIDO'];
            $email = $_POST['EMAIL'];
            $clave = $_POST['CLAVE'];
            $nivel = $_POST['NIVEL'];
            $estado = $_POST['ESTADO'];

            $consulta = $con->prepare("UPDATE usuarios SET NOMBRE=?, APELLIDO=?, EMAIL=?, CLAVE=?, NIVEL=?, ESTADO=? WHERE ID=?");
            $consulta->bind_param("sssssss", $nombre, $apellido, $email, $clave, $nivel, $estado, $id);
            $resultado = $consulta->execute();

            if ($resultado) {
                print "<h1>El usuario fue modificado: $nombre</h1>";
                print "<div class='container mt-5 text-center'> <!-- Utiliza la clase 'text-center' de Bootstrap para centrar horizontalmente -->
                <a href='index.php' class='btn btn-dark boton-usuario'>Volver</a> <!-- Utiliza la clase 'btn btn-dark' para dar estilo a Bootstrap -->
            </div>";
            exit();
            } else {
                print "<h1>Error al modificar el usuario</h1>";
                print "Error: " . $consulta->error;
            }

            $consulta->close();
        } else {
            $id = $_GET['usuario'];

            $consulta = $con->prepare("SELECT * FROM usuarios WHERE ID = ?");
            $consulta->bind_param("s", $id);
            $consulta->execute();
            $resultado = $consulta->get_result();

            if ($resultado->num_rows > 0) {
                $filas = $resultado->fetch_assoc();

                print "
                <form action='modUsu.php?usuario=$id' method='post' enctype='multipart/form-data'>
                    <div>
                        <label for='NOMBRE'>Nombre</label>
                        <input value='$filas[NOMBRE]' id='NOMBRE' type='text' name='NOMBRE' required />
                    </div>
                    <div>
                        <label for='APELLIDO'>Apellido</label>
                        <input value='$filas[APELLIDO]' id='APELLIDO' type='text' name='APELLIDO' required />
                    </div>
                    <div>
                        <label for='EMAIL'>Email</label>
                        <input value='$filas[EMAIL]' id='EMAIL' type='email' name='EMAIL' required />
                    </div>
                    <div>
                        <label for='CLAVE'>Clave</label>
                        <input value='$filas[CLAVE]' id='CLAVE' type='password' name='CLAVE' required />
                    </div>
                    <div>
                        <label for='NIVEL'>Nivel</label>
                        <input value='$filas[NIVEL]' id='NIVEL' type='text' name='NIVEL' required />
                    </div>
                    <div>
                        <label for='ESTADO'>Estado</label>
                        <input value='$filas[ESTADO]' id='ESTADO' type='text' name='ESTADO' required />
                    </div>
                    <div>
                        <input type='hidden' name='ID' value='$id' />
                    </div>
                    <input type='submit' value='Modificar Usuario' />
                </form>
                ";
            } else {
                print "<h1>No se encontró el usuario</h1>";
            }

            $consulta->close();
        }
    }
}
?>
<div class="container mt-5 text-center"> <!-- Utiliza la clase 'text-center' de Bootstrap para centrar horizontalmente -->
        <a href="../admin/index.php" class="btn btn-dark boton-usuario">Volver</a> <!-- Utiliza la clase 'btn btn-dark' para dar estilo a Bootstrap -->
    </div>

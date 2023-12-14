<?php
require_once ("../registros/admin.php");
// Incluye el archivo de encabezado
include_once("header.php");
// para no entrar por url require_once("../registros/admin.php");
// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");
?>

<main class="container mt-5">
    <h1 class="text-center">Bienvenido al administrador de YATS "Usuarios"</h1>
    <p class="text-center">Modifica usuarios</p>

    <?php
    // Verifica si 'usuarios' está presente en la URL y es un valor numérico
    $id = isset($_GET['usuarios']) ? intval($_GET['usuarios']) : 0;
    ?>

    <!-- Mostrar usuarios y formulario para modificar usuarios -->
    <?php
    // Construye la consulta SQL para obtener todos los usuarios
    $consultaUsuarios = "SELECT ID, NOMBRE, APELLIDO, EMAIL, NIVEL, ESTADO FROM usuarios";
    // Ejecuta la consulta
    $resultadoUsuarios = mysqli_query($con, $consultaUsuarios);
    ?>

    <?php if ($resultadoUsuarios) : ?>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Mail</th>
                    <th>Nivel</th>
                    <th>Estado</th>
                    <th>Modificar</th>
                 </tr>
            </thead>
            <tbody>
                <?php while ($filaUsuario = mysqli_fetch_array($resultadoUsuarios)) : ?>
                    <tr>
                        <td><?= $filaUsuario['NOMBRE'] ?></td>
                        <td><?= $filaUsuario['APELLIDO'] ?></td>
                        <td><?= $filaUsuario['EMAIL'] ?></td>
                        <td><?= $filaUsuario['NIVEL'] ?></td>
                        <td><?= $filaUsuario['ESTADO'] ?></td>
                        <!-- Enlaces para modificar y eliminar cada usuario -->
                        <td><a href="modUsu.php?usuario=<?= $filaUsuario['ID'] ?>" class="btn btn-primary">Modificar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <div class="container mt-5 text-center">
        <a href="index.php" class="btn btn-dark boton-usuario">Categorias</a>
    </div>

</main>

<?php include_once("footer.php"); ?>

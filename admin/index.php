<?php
// Incluye el archivo de encabezado
include_once("header.php");

// Incluye el archivo de conexión a la base de datos
require_once("../conect/conect.php");
?>

<main class="container mt-5">
    <h1 class="text-center">Bienvenido al administrador de YATS</h1>
    <p class="text-center">Agrega autos y modifica sus características</p>

    <?php
    // Verifica si 'autos' está presente en la URL y es un valor numérico
    $id = isset($_GET['autos']) ? intval($_GET['autos']) : 0;
    ?>

    <!-- Mostrar autos si se selecciona una categoría -->
    <?php if ($id > 0) : ?>
        <?php
        // Construye la consulta SQL para obtener los autos de la categoría seleccionada
        $consultaAutos = "SELECT idAuto, nombreAuto FROM autos WHERE idCategoria='$id'";
        // Ejecuta la consulta
        $resultadoAutos = mysqli_query($con, $consultaAutos);
        ?>

        <?php if ($resultadoAutos) : ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Auto</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($filaAuto = mysqli_fetch_array($resultadoAutos)) : ?>
                        <tr>
                            <td><?= $filaAuto['nombreAuto'] ?></td>
                            <!-- Enlaces para modificar y eliminar cada auto -->
                            <td><a href="modAuto.php?auto=<?= $filaAuto['idAuto'] ?>" class="btn btn-primary">Modificar</a></td>
                            <td><a href="borrarAuto.php?auto=<?= $filaAuto['idAuto'] ?>" class="btn btn-danger">Eliminar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Formulario de alta de auto -->
            <form action="altaAuto.php" method="post" enctype="multipart/form-data" class="mt-4">
                <div class="mb-3">
                    <label for="nombreAuto" class="form-label">Nombre Auto</label>
                    <input id="nombreAuto" type="text" name="nombreAuto" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="precioAuto" class="form-label">Precio Auto</label>
                    <input id="precioAuto" type="number" name="precioAuto" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="detalleAuto" class="form-label">Detalles</label>
                    <textarea id="detalleAuto" name="detalleAuto" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="arch" class="form-label">Cargar imagen:</label>
                    <input id="arch" name="arch" type="file" class="form-control" />
                </div>
                
                <!-- Campo oculto para enviar idCategoria -->
                <input type="hidden" name="idCategoria" value="<?= $id ?>" />

                <input type="submit" value="Cargar Auto" class="btn btn-success" />
            </form>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Mostrar categorías y formulario para agregar nueva categoría -->
    <?php
    // Construye la consulta SQL para obtener todas las categorías
    $consultaCategorias = "SELECT idCategoria, nombreCategoria FROM categorias";
    // Ejecuta la consulta
    $resultadoCategorias = mysqli_query($con, $consultaCategorias);
    ?>

    <?php if ($resultadoCategorias) : ?>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($filaCategoria = mysqli_fetch_array($resultadoCategorias)) : ?>  <!--se me bugeaban los signos-->
                    <tr>
                        <td><a href="?autos=<?= $filaCategoria['idCategoria'] ?>" class="btn btn-link"><?= $filaCategoria['nombreCategoria'] ?></a></td>
                        <!-- Enlaces para modificar y eliminar cada categoría -->
                        <td><a href="modCat.php?categoria=<?= $filaCategoria['idCategoria'] ?>" class="btn btn-primary">Modificar</a></td>
                        <td><a href="borrCat.php?categoria=<?= $filaCategoria['idCategoria'] ?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Formulario para agregar nueva categoría -->
        <form action="altaCatego.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="nombreCategoria" class="form-label">Nombre de la Categoría</label>
                <input id="nombreCategoria" name="nombreCategoria" type="text" class="form-control" required />
            </div>
            <input type="submit" value="Agregar Categoría" class="btn btn-success" />
        </form>
    <?php endif; ?>
</main>

<?php include_once("footer.php"); ?>

<?php include_once("header.php"); ?>

<main>
    <h1>Soporte</h1>

    <form action="datos.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Completa tus datos:</legend>
            <div class="mb-3">
                <label for="nom" class="form-label">Nombre:</label>
                <input id="nom" type="text" name="nombre" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="ape" class="form-label">Apellido:</label>
                <input id="ape" type="text" name="apellido" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input id="dni" type="number" name="dni" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="prob" class="form-label">Tipo de problema</label>
                <select id="prob" name="Problema" class="form-select">
                    <option>Seleccione su problema</option>
                    <optgroup label="Producto">
                        <option value="Remera">Maybach 6</option>
                        <option value="Pantalon">Vision One-Eleven</option>
                        <option value="Zapatilla">300 GD, BR 460</option>
                    </optgroup>
                    <optgroup label="Cuenta">
                        <option value="Contraseña">Contraseña</option>
                        <option value="Usuario">Usuario</option>
                        <option value="Wallet">Wallet</option>
                    </optgroup>
                </select>
            </div>
            <div class="mb-3">
                <label for="comen" class="form-label">Comentario</label>
                <textarea id="comen" name="comentario" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Agrega una foto del problema:</label>
                <input id="img" type="file" name="img" class="form-control" />
            </div>
        </fieldset>
        <button class="btn btn-primary" type="submit">Enviar Ticket</button>
    </form>
</main>

<?php include_once("footer.php"); ?>
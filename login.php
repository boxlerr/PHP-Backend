<?php include_once("header.php"); ?>
<?php require_once("conect/conect.php"); ?>

<script>
    function validarContraseñas() {  //validacion contraseña
        var pass = document.getElementById("pass").value;
        var confirmPass = document.getElementById("confirmPass").value;

        if (pass !== confirmPass) {
            alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
            return false;
        }

        return true;
    }
</script>

<?php
if (isset($_GET['ban'])) {
    print "<strong style=color:red > Tu usuario se encuentra BANNEADO. Contacta a soporte </strong>";
}
?>

<form action="registros/login.php" method="post">
    <fieldset>
        <legend>Ingresa</legend>
        <div>
            <label for="usuario1">Usuario</label>
            <input id="usuario1" name="usuario1" type="email">
        </div>
        <div>
            <label for="pass1">Contraseña</label>
            <input id="pass1" name="pass1" type="password">
        </div>

        <input type="submit" value="Ingresar">
    </fieldset>
</form>

<?php if (isset($_GET['error'])) {
    print "<strong style=color:red >El usuario o contraseña son incorrectos   </strong>";
} ?>

<form action="registros/alta.php" method="post" onsubmit="return validarContraseñas();">
    <fieldset>
        <legend>Regístrate</legend>
        <div>
            <label for="usuario">Email</label>
            <input id="usuario" name="usuario" type="email">
        </div>
        <div>
            <label for="pass">Contraseña</label>
            <input id="pass" name="pass" type="password">
        </div>
        <div>
            <label for="confirmPass">Confirmar Contraseña</label>
            <input id="confirmPass" name="confirmPass" type="password">
        </div>
        <div>
            <label for="nom">Nombre</label>
            <input id="nom" name="nom" type="text">
        </div>
        <div>
            <label for="ape">Apellido</label>
            <input id="ape" name="ape" type="text">
        </div>
        <input type="submit" value="Regístrate">
    </fieldset>
</form>

<?php if (isset($_GET['alta'])) {
    print "<strong style=color:green >Ya te puedes loguear </strong>";
} ?>

<?php include_once("footer.php"); ?>

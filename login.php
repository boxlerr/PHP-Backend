<?php
include_once("header.php");
?>
<?php

//conectar a la base de datos .

require_once("conect/conect.php");


if($con){
    print "<h1>conexion OK</h1>";

    //guardar los datos de la consulta 

    $consulta = "SELECT idCategoria, categoria FROM categorias";

    $resultado = mysqli_query($con,$consulta);


    
    
    print "<ul>";
    while($filas=mysqli_fetch_array($resultado)){
        
        print "<li><a href=productos.php?categoria=$filas[idCategoria] >$filas[categoria]</a></li>";


    }
    print "</ul>";






}




?>

<form action="registros/login.php" method="post" >
    <fieldset>
        <legend>Ingresa</legend>
    <div>
        <label for="usuario1" >Usuario</label>
        <input id="usuario1" name="usuario1" type="email" >
    </div>
    <div>
        <label for="pass1" >Contraseña</label>
        <input id="pass1" name="pass1" type="password" >
    </div>

    <input type="submit" value="Ingresar"  >
    </fieldset>

</form>

<form action="registros/alta.php" method="post" >
    <fieldset>
            <legend>Registrate</legend>
        <div>
            <label for="usuario" >Email</label>
            <input id="usuario" name="usuario" type="email" >
        </div>
        <div>
            <label for="pass" >Contraseña</label>
            <input id="pass" name="pass" type="password" >
        </div>
        <div>
            <label for="nom" >Nombre</label>
            <input id="nom" name="nom" type="text" >
        </div>
        <div>
            <label for="ape" >Apellido</label>
            <input id="ape" name="ape" type="text" >
        </div>

        <input type="submit" value="Registrate"  >
    </fieldset>

</form>
<?php
if(isset($_GET['alta'])){
    print "<strong style=color:green >Ya te podes loguear </strong>";

}



?>
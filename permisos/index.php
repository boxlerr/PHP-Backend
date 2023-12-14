<?php
include_once("../admin/header.php");
?>
<h1>Logeado!</h1>
<?php

session_start();
if(!isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'usuario' ){

}

if(!isset($_SESSION['ID'])){
    header("Location: ../index.php");

}else{
    var_dump($_SESSION);
}

?>
<div class="container mt-5 text-center"> <!-- Utiliza la clase 'text-center' de Bootstrap para centrar horizontalmente -->
        <a href="../registros/logout.php" class="btn btn-dark boton-usuario">Salir</a> <!-- Utiliza la clase 'btn btn-dark' para dar estilo a Bootstrap -->
    </div>

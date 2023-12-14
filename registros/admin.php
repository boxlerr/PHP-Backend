<?php
include_once("header.php");
session_start();
if(!isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'Admin' ){

    echo '<div class="permiso-denegado">No tenes permisos. Doxeado IP 172.20.10.2</div>';
    exit;
}

//para no entrar al admin desde el URL
//Seguridad: Previene que usuarios no autorizados o que no han iniciado sesión 
//accedan a partes del sitio web que requieren ciertos privilegios.
//Simplicidad: die() es una forma sencilla de detener la ejecución 
//del script inmediatamente si no se cumplen las condiciones de seguridad

?>

<?php
session_start();
if(!isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'Admin' ){

    die("No tenes permisos");

}



?>
<?php
session_start();
if(!isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'usuario' ){

    die("No tenes permisos");

}

if(!isset($_SESSION['ID'])){
    header("Location: ../index.php");


}else{
    var_dump($_SESSION);
}

?>

<a href="../registros/logout.php" >Salir</a>
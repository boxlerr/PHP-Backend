<?php
include_once("header.php");
?>
<?php
session_start();
require_once("../conect/conect.php");

if($con){
    $usuario=$_POST['usuario1'];
    $pass=$_POST['pass1'];


    $consulta= "SELECT * FROM usuarios WHERE EMAIL='$usuario' AND CLAVE=MD5('$pass')";

   mysqli_query($con,$consulta);

   //completar login 


}


?>
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


   if ($filas ['NIVEL'] == 'Admin') {
    $_SESSION = $filas;
    header("Location: ../admin/index.php");
   } else {
    $_SESSION = $filas;
    header("Location: ../panel/index.php");

   }
   if ($filas == NULL) {
    header ("Location: ../login.php?error=ok");
   }
   if ($filas['ESTADO'] == 'banneado') {
    header("Location ../login.php?ban=ok");
   }

}


?>
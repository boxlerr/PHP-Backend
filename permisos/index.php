<?php include_once("../header.php");; 
session_start();  

//si no esta seteado el tipo o no es admin, muestra: 

if(!isset($_SESSION['NIVEL']) || $_SESSION['NIVEL'] != 'USUARIO' ){      
die("No tenes permisos");  }  
//si no esta seteada la sesion, te envia al index 

if(!isset($_SESSION['ID'])){      
header("Location: ../index.php");  

}else{      var_dump($_SESSION);  }  ?> <a href="../registros/logout.php">Salir</a>
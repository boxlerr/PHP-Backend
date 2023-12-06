<?php
include_once("header.php");
?> 

    <main class="container mt-5">
        <h2 class="mb-4">Esta es la colaboración que hiciste con nosotros para mejorar:</h2>
        <ul class="list-group">

            <?php

            $nombre;
            $apellido;
            $dni;
            $problema;
            $comentario;
            $img;
            $temp;

            if(isset($_POST["nombre"])){
                $nombre = $_POST["nombre"];
                print "<li class='list-group-item'>Nombre: $nombre</li>";
            }
            if(isset($_POST["apellido"])){
                $apellido = $_POST["apellido"];
                print "<li class='list-group-item'>Apellido: $apellido</li>";
            }
            if(isset($_POST["dni"])){
                $dni = $_POST["dni"];
                print "<li class='list-group-item'>DNI: $dni</li>";
            }
            if(isset($_POST["problema"])){
                $problema = $_POST["problema"];
                print "<li class='list-group-item'>Problema: $problema</li>";
            }
            if(isset($_POST["comentario"])){
                $comentario = $_POST["comentario"];
                print "<li class='list-group-item'>Comentario: $comentario</li>";
            }
            $img = time().".jpg";
            $temp = $_FILES['img']['tmp_name'];
            move_uploaded_file($temp, "archivos/$img");
            print "<img src='archivos/$img' class='img-fluid mt-3' alt='Imagen subida'/>";
            ?>
        </ul>
    </main>
    <?php
include_once("footer.php");
?>

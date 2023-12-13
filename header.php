<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo Parcial Web II </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Belanosima&display=swap" rel="stylesheet">
</head>

<body>

    <header>

        <?php
        $titulos = array();
        $titulos['Inicio'] = 'index.php';
        $titulos['Productos'] = 'producto.php';
        $titulos['Quienes somos'] = 'nosotros.php';
        $titulos['Soporte'] = 'soporte.php';
        $titulos['Comprar'] = 'comprar.php';

        ?>
        <div class="fixed-top">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="img/yatslogo.png" width="90" height="45" alt="yats-logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <?php
                            foreach ($titulos as $pagina => $links) {
                                echo "<li class='nav-item'>
                                    <a class='nav-link active' aria-current='page' href=$links><strong>$pagina</strong></a>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Agrega el espacio entre los elementos de la izquierda y el botón de login -->
                    <div class="ml-auto">
                        <a class="nav-link active mr-2" aria-current="page" href="login.php"><strong>Login</strong></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

</body>

</html>

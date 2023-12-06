<?php
include_once("header.php");
?>

<main>
    <h1>Inicio</h1>

    <div class="container ">
<div id="micarousel" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#micarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#micarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#micarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>
<div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="3000">
        <img src="img/destacado.jpg" alt="imagen 1" class="d-block w-100 img-fluid">
        <div class="carousel-caption d-none d-md-block">
        <h5>Mercedes-Benz EQA</h5>
        </div>
    </div>
    <div class="carousel-item" data-bs-interval="3000">
        
        <img src="img/destacado2.jpg" alt="imagen 2" class="d-block w-100 img-fluid" >
        <div class="carousel-caption d-none d-md-block">
        <h5>Mercedes-Benz GLC SUV</h5>
        </div>
    </div>

    <div class="carousel-item" data-bs-interval="3000">
        
        <img src="img/destacado3.jpg" alt="imagen 3" class="d-block w-100 img-fluid" >
        <div class="carousel-caption d-none d-md-block">
        <h5>Mercedes-Benz Sedan S</h5>
        </div>
    </div>
    </div> 
    <button class="carousel-control-next" type="button" data-bs-target="#micarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
</div>
</div>
<!--Visualizacion en BD listo
    Cargar datos ADMIN  listo
    registro de usuario comun y admin
    registro como usuario
    cargar imagenes listo
    bannear usuario (no borrarlos)
    Validar formularios con JS
    explicar codigo-->
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php
include_once("footer.php");
?>
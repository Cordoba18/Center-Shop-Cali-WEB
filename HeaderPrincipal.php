<?php
include_once("sql/Conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid ">
  <a class="navbar-brand" href="index.php">
      <img src="icons/LOGO.png" alt="Bootstrap" width="100" height="100">
    </a>
    <a class="navbar-brand" id="tittle" href="index.php">CENTER SHOP CALI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        </li>
      </ul>
      <div class="dropdown" id="categorias">
  <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    CATEGORIAS
  </button>
  <ul class="dropdown-menu">
  <?php 
$con = conectar();
$sql = "SELECT*FROM categorias";
$result = mysqli_query($con, $sql);
while ($mostrar = mysqli_fetch_array($result)) {
echo "<li><a class='dropdown-item' href='vistas/PaginaProductos.php?categoria=$mostrar[categoria]'> $mostrar[categoria] </a></li>";
}
  mysqli_close($con)  ?>
  </ul>
</div>
      <form class="d-flex" action="vistas/PaginaProductos.php" role="search"> 
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
        <input class="btn btn-outline-primary" type="submit" value="SEARCH"></input>
        <a class="btn btn-light " id="btn-sesion" href="vistas/login.php">INICIO DE SESIÒN</a>
      </form>
    </div>
  </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
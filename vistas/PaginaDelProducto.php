<?php
include_once("HeaderPrincipal.php");
include_once("../sql/Conexion.php")
?>

<head>
    <title>Pagina producto</title>
    <link rel="stylesheet" href="../css/PaginaProductoCss.css">
</head>
<body>
  <div class="contenedor-pagina-productos">
    <div class="contenedor-imagen-producto"> 
    <a href=""><img class="icono-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a> 
    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="imagen-producto" src="<?php 
      $con = conectar();
      $sql = "SELECT*FROM imagenes_productos WHERE id_producto=$_GET[producto] AND estado = 'activo'";
      $result = mysqli_query($con, $sql);
      if($mostrar = mysqli_fetch_array($result)) {
        echo "../images/".$mostrar['imagen'];
  }mysqli_close($con); ?>" class="d-block w-100" alt="...">
    </div>
    <?php 
      $con = conectar();
      $sql = "SELECT*FROM imagenes_productos WHERE id_producto=$_GET[producto] AND estado = 'activo'";
      $result = mysqli_query($con, $sql);
      $total = 0;
      while($mostrar = mysqli_fetch_array($result)) {
        if ($total == 0) {
          $total = 1;
        }else {
        echo "<div class='carousel-item'>
      <img class='imagen-producto' src='../images/$mostrar[imagen]' class='d-block w-100' alt=''>
    </div>";}
  }mysqli_close($con); ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div> <br>
    <form action="" method="post">
     <div class="info-producto">
        <form action="" method="post">
          <div class="tallas">
      <h1 class="titulo-tallas"> TALLAS :</h1>  <select name="TALLAS" >
     <?php $con = conectar();
  $sql = "SELECT*FROM tallas WHERE id_producto=$_GET[producto] AND estado = 'activo' ";
  $result = mysqli_query($con, $sql);
  while ($mostrar = mysqli_fetch_array($result)) {
  echo "<option> $mostrar[talla] </option>";
  }
  mysqli_close($con)  ?>
            </select>
            </div>
            <div class="colores">
            <h1 class="titulo-colores"> COLORES :</h1>  <select name="COLORES" >
            <?php $con = conectar();
  $sql = "SELECT*FROM colores WHERE id_producto=$_GET[producto] AND estado = 'activo' ";
  $result = mysqli_query($con, $sql);
  while ($mostrar = mysqli_fetch_array($result)) {
  echo "<option> $mostrar[color] </option>";
  }
  mysqli_close($con)  ?>
        </select>
        </div>
        <div class="calificacion">
        <h1 class="titulo-calificacion"> CALIFICANOS :</h1>  <select name="CALIFICACION">
          <option> 1</option>
          <option> 2</option>
          <option> 3</option>
          <option> 4</option>
          <option> 5</option>
          </select>
          </div>
        <input type="submit" value="AGREGAR AL CARRITO">
        <a href="PaginaCompra.php">COMPRAR</a>
        <div class="descripcion-producto">
          <h1 >Descripciòn:</h1>
          <P> <?php $con = conectar();
  $sql = "SELECT*FROM productos WHERE id=$_GET[producto] AND estado = 'activo' ";
  $result = mysqli_query($con, $sql);
  if ($mostrar = mysqli_fetch_array($result)) {
  echo "$mostrar[descripcion]";
  }
  mysqli_close($con)  ?> </P></div>
          
    </div>
    </form>
    <div class="relacionados"> 
      <?php
        include_once('ProductosRelacionados.php') ?>
    </div>
    </div>
   
</body>
</html>
<?php
include_once("FooderPrincipal.php");
?>

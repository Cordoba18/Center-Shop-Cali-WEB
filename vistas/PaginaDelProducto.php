<?php
include_once("HeaderPrincipal.php");
include_once("../sql/Conexion.php")
?>

<head>
    <title>Pagina producto</title>
    <link rel="stylesheet" href="../css/PP.css">
</head>
<body>
  <div class="contenedor-pagina-productos">


    <div class="contenedor-imagen-producto"> 
    
    <div id="carouselExample" class="carousel slide">
  
    <div class="carousel-inner">
 
    <?php 
      $con = conectar();
      $sql = "SELECT*FROM imagenes_productos WHERE id_producto=$_GET[producto] AND estado = 'activo'";
      $result = mysqli_query($con, $sql);
      if($mostrar = mysqli_fetch_array($result)) {
        echo "<div class='carousel-item active'><img class='imp'   src='../images/$mostrar[imagen]' class='d-block w-100' alt='...'> </div>";
  }mysqli_close($con); ?>
   
    <?php 


      $con = conectar();
      $sql = "SELECT*FROM imagenes_productos WHERE id_producto=$_GET[producto] AND estado = 'activo'";
      $result = mysqli_query($con, $sql);
      $total = 0;
      while($mostrar = mysqli_fetch_array($result)) {
        if ($total == 0) {
          $total = 1;
        }else{
        echo "<div class='carousel-item'>
      <img class='imp'  src='../images/$mostrar[imagen]' class='d-block w-100' alt=''>
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




    </div><div class="propiedades-producto" >
       <?php  $con = conectar();
  $sql = "SELECT*FROM productos WHERE id=$_GET[producto] AND estado = 'activo' ";
  $result = mysqli_query($con, $sql);
  while ($mostrar = mysqli_fetch_array($result)) {
  echo "<h1 class='np'> $mostrar[nombre] </h1>";
  if ($mostrar['descuento'] <= 0) {?> 
    <h1 class="pp">$<?php 
      echo " $mostrar[precio] </h1>";

  }else{
  ?>
  <div class="total-producto">
<h1 class="class='pp'">$<?php
$descuento = $mostrar['descuento']*$mostrar['precio'];
 $preciodescuento = $descuento/100;
 $total = $mostrar['precio']-$preciodescuento;?><?php
    echo "$total </h1>";
    echo "<h1 class='descuento-producto'> $mostrar[descuento] % <b>OFF</b>  </h1></div> ";
  }
}
  mysqli_close($con)  ?>
    </div>
    </div>
    <br>
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
          
          </form>
    </div>
    <div class="relacionados"> 
      <?php
        include_once('ProductosRelacionados.php') ?>
    </div>


    </div> <!-- Contenedor Todo -->
    <script src="../scripts/entercorazon.js"></script>
</body>

</html>
<?php
include_once("FooderPrincipal.php");
?>

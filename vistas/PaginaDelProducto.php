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
  if ($mostrar = mysqli_fetch_array($result)) {
  echo "<h1 class='np'> $mostrar[nombre] </h1>";
  if ($mostrar['descuento'] <= 0) {?> 
    <h1 class="pp">$<?php 
      echo number_format(intval($mostrar['precio']))." </h1>";

  }else{
  ?>
  <div class="total-producto">
  <h1 class="pp">$<?php
  $descuento = $mostrar['descuento']*$mostrar['precio'];
  $preciodescuento = $descuento/100;
  $total = $mostrar['precio']-$preciodescuento;?><?php
  $totaldefinitivo = number_format(intval($total));
    echo $totaldefinitivo."</h1>";
    echo "<h1 class='descuento-producto'> $mostrar[descuento] % <b>OFF</b></h1></div> ";
  }
  echo "<div class='valoracion-producto'><h1 class='text-valoriacion'> Valoracion: </h1>";
  if ($mostrar['n_p_calificaron'] == null || $mostrar['n_p_calificaron'] == 0) {
    echo "<div class='contendor-calificacion'><i class='bi bi-star-fill'></i><h1>(0)</h1></div></div> ";
    }else if ($mostrar['calificacion'] >= 0 && $mostrar['calificacion'] < 2) {
    echo "<div class='contendor-calificacion'><i class='bi bi-star-fill'></i><h1>($mostrar[n_p_calificaron])</h1></div></div> ";
    }
    else if ($mostrar['calificacion'] >= 2 &&   $mostrar['calificacion'] < 3) {
      echo "<div class='contendor-calificacion'>
      <i class='bi bi-star-fill'></i>
      <i class='bi bi-star-fill'></i>
      <h1>($mostrar[n_p_calificaron])</h1></div></div> ";
      }
      else if ($mostrar['calificacion'] >= 3 &&   $mostrar['calificacion'] < 4) {
        echo "<div class='contendor-calificacion'>
        <i class='bi bi-star-fill'></i>
        <i class='bi bi-star-fill'></i>
        <i class='bi bi-star-fill'></i>
        <h1>($mostrar[n_p_calificaron])</h1></div></div> ";
        }
        else if ($mostrar['calificacion'] >= 4 &&   $mostrar['calificacion'] < 5) {
          echo "<div class='contendor-calificacion'>
          <i class='bi bi-star-fill'></i>
          <i class='bi bi-star-fill'></i>
          <i class='bi bi-star-fill'></i>
          <i class='bi bi-star-fill'></i>
          <h1>($mostrar[n_p_calificaron])</h1></div></div> ";
          }
          else if ($mostrar['calificacion'] == 5 ) {
            echo "<div class='contendor-calificacion'>
            <i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i>
            <i class='bi bi-star-fill'></i><h1>($mostrar[n_p_calificaron])</h1></div></div> ";
            }
            $sql = "SELECT*FROM users WHERE id=$mostrar[id_empresa] AND estado = 'activo' ";
            $result = mysqli_query($con, $sql);
            if ($mostrar = mysqli_fetch_array($result)) {
               echo "<div class='contenedor-ep'> <a href='PaginaProductos.php?empresa=".$mostrar['id']."'><img class='img-p' src='../images/$mostrar[logo]'></a>  </div>";}
    
}
  mysqli_close($con)  ?>
    </div>
    </div>
    <br>
    <div class="info-producto">
    
    <div class="utilidades-producto">

     <div class="colum-1">
     <div class="dropdown">
     <a class="dropdown-toggle" id="boxes-producto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      TALLAS
      </a>
     <ul class="dropdown-menu">
      <?php 
      $con = conectar();
      $sql = "SELECT * FROM tallas WHERE id_producto=$_GET[producto] AND estado='activo'";
      $result = mysqli_query($con, $sql);
      while ($mostrar = mysqli_fetch_array($result)) {
      echo "<li><button> $mostrar[talla] </button></li>";
      }
        mysqli_close($con)  ?>
        </ul>
      </div>
        <div class="dropdown ">
        <a class="dropdown-toggle " id="boxes-producto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          COLORES
          </a>
          <ul class="dropdown-menu" >
         <?php 
          $con = conectar();
          $sql = "SELECT * FROM colores WHERE id_producto=$_GET[producto] AND estado='activo'";
          $result = mysqli_query($con, $sql);
          while ($mostrar = mysqli_fetch_array($result)) {
        echo " <li><img class='box-imagen' src='../images/$mostrar[imagen]'><button> $mostrar[color]</button> </li>";
          }
          mysqli_close($con)  ?>
          </ul>
    </div>
    <div class="contenedor-descripcion">

     <h1 class="descripcion"> Descripcion </h1>
     <?php 
$con = conectar();
$sql = "SELECT * FROM productos WHERE id=$_GET[producto] AND estado='activo'";
$result = mysqli_query($con, $sql);
if($mostrar = mysqli_fetch_array($result)) {
  echo "<p>".$mostrar['descripcion']."</p>";
}
  mysqli_close($con)  ?>
     </div>
     </div>

     <div class="colum-2">

     <button class="btn-carrito">AGREGAR AL CARRITO <i class="bi bi-cart"></i></button>
     <button class="btn-deseos">AGREGAR A MIS DESEOS <i class="bi bi-heart-fill"></i></button>
     <button class="btn-comprar">COMPRAR</button>
      
     </div>
    </div>
     </div>
    <div class="relacionados"> 
      <?php
        include_once('ProductosRelacionados.php') ?>
    </div>
    <script src="../scripts/entercorazon.js"></script>
</body>

</html>
<?php
include_once("FooderPrincipal.php");
?>

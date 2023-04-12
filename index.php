
<?php
include_once("HeaderPrincipal.php");
?>
<head>
    <title>Center Shop Cali</title>
    <link rel="stylesheet" href="css/IndexCss.css">
    <link href="css/slider.css" rel="stylesheet" type="text/css" />
   
   
</head>

<body>
<div class="slider">
<?php 
$con = conectar();
$sql = "SELECT*FROM slider WHERE estado = 'activo' ORDER BY RAND()";
$result = mysqli_query($con, $sql);
$numero = 0;
$ids = [];
$alt = [];
$info = [];
$nombre = [];
while ($mostrar = mysqli_fetch_array($result)) {
   $imagen = $mostrar['imagen'];
   $info[] = $mostrar['info'];
   $nombre[] = $mostrar['nombre'];
$ids[] = $imagen;
  $alt[] = "Slider " . $numero;
  $numero = $numero + 1;
}
  mysqli_close($con)  ?>
    	
<h1></h1>
<?php
 $max = count($ids);
 for($s=0;$s<$max;$s++){ ?>
     <input type="radio" id="<?= $ids[$s]; ?>" name="image-slide" hidden />
 <?php }
?>
<div class="slideshow">
 <?php for($s=0;$s<$max;$s++){ ?>
 <div class="item-slide">
     <img src="images/<?= $ids[$s]; ?>" alt="<?= $alt[$s]; ?>" />
     <?php echo "<h1 class='titulo'>$nombre[$s]</h1>"?>
     <?php echo "<p class='descripcion' >$info[$s]</p>"?>
 </div>
 <?php } ?>
</div>
<div class="pagination">
 <?php for($s=0;$s<$max;$s++){ ?>
 <label class="pag-item" for="<?= $ids[$s]; ?>">
     <img src="images/<?= $ids[$s]; ?>" alt="<?= $alt[$s]; ?>" />

 </label>
 <?php } ?>
</div>
</div>
<h1 class="titulo_componente"> LOCALES MAS POPULARES</h1>
<div class="locales"> 
   
   <?php 
   $con = conectar();
$sql = "SELECT*FROM users WHERE Roles_id = 2 AND estado = 'activo' ORDER BY RAND()";
$result2 = mysqli_query($con, $sql);

while ($mostrar2 = mysqli_fetch_array($result2)) { ?>
<div class="elemento" border =6 >
    <?php
    $im = $mostrar2['logo']; 
    $nom = $mostrar2['nombre'];?>
      <?php echo "<a href='vistas/PaginaProductos.php?empresa=".$mostrar2['nombre']."'><img class='logo' src='images/$im'></a>"?> 
      <?php echo "<h1 class='titulo_logo'>$mostrar2[nombre]</h1>"?>
 </div>
 <?php 
}
  mysqli_close($con)  ?>
    	
   
</div>
<div class="Productos-Populares"> 
    <h1 class="titulo_componente"> PRODUCTOS MAS POPULARES</h1>
    <div id="app"></div>
  </div>
</section>
</div>
<div class="descuentos"> 
    <h1 class="titulo_componente"> DESCUENTOS</h1>
</div>
</body>
<?php
include_once("FooderPrincipal.php");
?>
 <script src="scripts/slider.js"></script>
</html>

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
</div>
<br>
<div class="barra-locales">
<h1 class="titulo_componente">  LOCALES MAS POPULARES</h1> <a class="btn-mas" href="vistas/PaginaProductos.php?empresa=ALL">VER MAS</a>
</div><br>
<div class="locales"> 
   <?php 
   $con = conectar();
$sql = "SELECT*FROM users WHERE Roles_id = 2 AND estado = 'activo' ORDER BY RAND()";
$result10 = mysqli_query($con, $sql);
$im = [];
$nom = [];
while ($mostrar10 = mysqli_fetch_array($result10)) { ?>
    <?php
    $im[] = $mostrar10['logo']; 
    $nom[] = $mostrar10['nombre'];}?>
      <?php for ($i=0; $i < 3 ; $i++) { ?>
       <div class="elemento" border =6 >
        <?php echo "<a href='vistas/PaginaProductos.php?empresa=".$nom[$i]."'><img class='logo' src='images/$im[$i]'></a>"?> 
      <?php echo "<h1 class='titulo_logo'>$nom[$i]</h1>"  ;?> 
       </div>
    <?php } ?>
 </div>
 <?php 
  mysqli_close($con)  ?>
    	
   
</div>
<br>
    <h1 class="titulo_componente"> PRODUCTOS MAS POPULARES</h1>
    <section class="product"> 
        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">
                <?php
                $con = conectar();
                $sql = "SELECT * FROM productos WHERE estado='activo'";
                $result5 = mysqli_query($con, $sql);
                while ($mostrar5 = mysqli_fetch_array($result5)) {
                  ?><div class="producto">
                    <?php
                  $id = $mostrar5['id'];
                  $sql = "SELECT * FROM imagenes_productos where id_producto='$id' and estado='activo'";
                  $result6 = mysqli_query($con, $sql);
                  if($mostrar6 = mysqli_fetch_array($result6)) {
                    $imagen =  $mostrar6['imagen']; }?> 
                    <a href="vistas/PaginaDelProducto.php?producto=<?php echo $id?>"><img src="images/<?php echo $imagen ?>" class="imagen-producto" alt=""></a>
                    <h2 class="nombre-producto"><?php echo $mostrar5['nombre'] ?></h2>
                    <p class="id-producto"> Empresa : <?php
                    
                    $con = conectar();
                    $empresa = $mostrar5['id_empresa'];
                $sql = "SELECT * FROM users WHERE id=$empresa  AND  estado='activo'";
                $result7 = mysqli_query($con, $sql);
                while ($mostrar7 = mysqli_fetch_array($result7)) {
                  echo $mostrar7['nombre'];
                }?></p>

                    <div class="precio-descuento">
                      <?php 
                      if ($mostrar5['descuento'] < 1) {?>
                        <span class="precio-actual">$<?php echo $mostrar5['precio'] ?></span></div>
                        <a href=""><img class="btn-listadeseos" src="icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="icons/CarritoCompras.png" alt=""></a></div><?php 

                      }else{
                      ?>
                    <span class="precio-actual">$<?php 
                    $descuento = $mostrar5['descuento']*$mostrar5['precio'];
                     $preciodescuento = $descuento/100;
                     $total = $mostrar5['precio']-$preciodescuento;?>
                     <?php echo $total ?></span>
                     <span class="precio-antes">$<?php echo $mostrar5['precio'] ?></span><p class="descuento"><?php echo $mostrar5['descuento'] ?>% OFF</p></div>
                     <a href=""><img class="btn-listadeseos" src="icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="icons/CarritoCompras.png" alt=""></a>

            </div>
            <?php } } mysqli_close($con) ?>
        </div>
    </section>
  </div>
  <br>
<h1 class="titulo_componente"> DESCUENTOS</h1>
<section class="product"> 
        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">
                <?php
                $con = conectar();
                $sql = "SELECT * FROM productos WHERE descuento > 0 AND  estado='activo'";
                $result5 = mysqli_query($con, $sql);
                while ($mostrar5 = mysqli_fetch_array($result5)) {
                  ?><div class="producto">
                    <?php
                  $id = $mostrar5['id'];
                  $sql = "SELECT * FROM imagenes_productos where id_producto='$id' and estado='activo'";
                  $result6 = mysqli_query($con, $sql);
                  if($mostrar6 = mysqli_fetch_array($result6)) {
                    $imagen =  $mostrar6['imagen']; }?> 
                    <a href="vistas/PaginaDelProducto.php?producto=<?php echo $id?>"><img src="images/<?php echo $imagen ?>" class="imagen-producto" alt=""></a>
                    <h2 class="nombre-producto"><?php echo $mostrar5['nombre'] ?></h2>
                    <p class="id-producto"> Empresa : <?php
                    
                    $con = conectar();
                    $empresa = $mostrar5['id_empresa'];
                $sql = "SELECT * FROM users WHERE id=$empresa  AND  estado='activo'";
                $result7 = mysqli_query($con, $sql);
                while ($mostrar7 = mysqli_fetch_array($result7)) {
                  echo $mostrar7['nombre'];
                }?></p>
                    <div class="precio-descuento">
                    <span class="precio-actual">$<?php 
                    $descuento = $mostrar5['descuento']*$mostrar5['precio'];
                     $preciodescuento = $descuento/100;
                     $total = $mostrar5['precio']-$preciodescuento;?>
                     <?php echo $total ?></span>
                     <span class="precio-antes">$<?php echo $mostrar5['precio'] ?></span><p class="descuento"><?php echo $mostrar5['descuento'] ?>% OFF</p></div>
                     <a href=""><img class="btn-listadeseos" src="icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="icons/CarritoCompras.png" alt=""></a>

            </div>
            <?php } mysqli_close($con) ?>
        </div>
    </section>
    <script src="scripts/script.js"></script>
</body>
<?php
include_once("FooderPrincipal.php");
?>

 
</html>
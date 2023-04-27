
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
<h1 class="titulo_componente"> ALGUNAS EMPRESAS </h1> <a class="btn-mas" href="vistas/PaginaProductos.php?empresa=ALL">VER MAS</a>
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
    $nom[] = $mostrar10['nombre'];
    $id[] = $mostrar10['id'];}?>
   
      <?php for ($i=0; $i < 3 ; $i++) { ?>
       <div class="elemento" >
        <?php echo "<a href='vistas/PaginaProductos.php?empresa=".$id[$i]."'><img class='logo' src='images/$im[$i]'></a>"?> 
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
                $sql = "SELECT DISTINCT id_producto FROM `lista_deseos`  WHERE estado='activo' ORDER BY RAND()";
                $result5 = mysqli_query($con, $sql);
                while ($mostrar5 = mysqli_fetch_array($result5)) {
                  $idpopular[] = $mostrar5['id_producto'];
                }
                $totalpopulares = 0;
                for ($idspopulares=0; $idspopulares < count($idpopular) ; $idspopulares++) { 
                $sql = "SELECT * FROM `productos` WHERE id=$idpopular[$idspopulares] AND estado='activo'";
                $result5 = mysqli_query($con, $sql);
                if ($mostrar5 = mysqli_fetch_array($result5)) {
                  $idproductopopular[] = $mostrar5['id'];
                  $nombreproductopopular[] = $mostrar5['nombre'];
                  $descuentoproductopopular[] = $mostrar5['descuento'];
                  $precioproductopopular[] = $mostrar5['precio'];
                  $idempresaproductopopular[] = $mostrar5['id_empresa'];
                  $totalpopulares = $totalpopulares + 1;
                }
              }
                for ($i=0; $i < $totalpopulares ; $i++) { 
                 
                  ?><div class="producto">
                    <?php
                  $sql = "SELECT * FROM imagenes_productos where id_producto='$idproductopopular[$i]' and estado='activo'";
                  $resultimagen = mysqli_query($con, $sql);
                  if($mostrarimagen = mysqli_fetch_array($resultimagen)) {
                    $imagenpp =  $mostrarimagen['imagen']; }
                   ?> 
                    <a href="vistas/PaginaDelProducto.php?producto=<?php echo $idproductopopular[$i]?>"><img src="images/<?php echo $imagenpp ?>" class="imagen-producto" alt=""></a>
                    <h2 class="nombre-producto"><?php echo $nombreproductopopular[$i] ?></h2>
                    <p class="id-producto"> Empresa : <?php
                $sql = "SELECT * FROM users WHERE id=$idempresaproductopopular[$i]  AND  estado='activo'";
                $result7 = mysqli_query($con, $sql);
                while ($mostrar7 = mysqli_fetch_array($result7)) {
                  echo $mostrar7['nombre'];
                }?></p>

                    <div class="precio-descuento">
                      <?php 
                      if ($descuentoproductopopular[$i] < 1) {?>
                        <span class="precio-actual">$<?php echo $precioproductopopular[$i] ?></span></div>
                        <a href=""><img class="btn-listadeseos" src="icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="icons/CarritoCompras.png" alt=""></a></div><?php 

                      }else{
                      ?>
                    <span class="precio-actual">$<?php 
                    $descuento = $descuentoproductopopular[$i]*$precioproductopopular[$i];
                     $preciodescuento = $descuento/100;
                     $total = $precioproductopopular[$i]-$preciodescuento;?>
                     <?php echo $total ?></span>
                     <span class="precio-antes">$<?php echo $precioproductopopular[$i] ?></span><p class="descuento"><?php echo $descuentoproductopopular[$i] ?>% OFF</p></div>
                     <a href=""><img class="btn-listadeseos" src="icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="icons/CarritoCompras.png" alt=""></a>

            </div>
            <?php } } mysqli_close($con)   ?>
        </div>
    </section>
  </div>
  <br>
  <div class="barra-locales">
<h1 class="titulo_componente"> DESCUENTOS        </h1> <a class="btn-mas" href="vistas/PaginaProductos.php?descuentos=ALL">VER MAS</a>
</div><br>
<section class="product"> 
        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">
                <?php
                $con = conectar();
                $sql = "SELECT * FROM productos WHERE descuento > 0 AND  estado='activo' ORDER BY RAND()";
                $result5 = mysqli_query($con, $sql);
                while ($mostrar5 = mysqli_fetch_array($result5)) {
                  $idproducto[] = $mostrar5['id'];
                  $nombreproducto[] = $mostrar5['nombre'];
                  $descuentoproducto[] = $mostrar5['descuento'];
                  $precioproducto[] = $mostrar5['precio'];
                  $idempresaproducto[] = $mostrar5['id_empresa'];
                }
                for ($i=0; $i < 10 ; $i++) { 
                 
                  ?><div class="producto">
                    <?php
                  $sql = "SELECT * FROM imagenes_productos where id_producto='$idproducto[$i]' and estado='activo'";
                  $result6 = mysqli_query($con, $sql);
                  if($mostrar6 = mysqli_fetch_array($result6)) {
                    $imagen =  $mostrar6['imagen']; }?> 
                    <a href="vistas/PaginaDelProducto.php?producto=<?php echo $idproducto[$i]?>"><img src="images/<?php echo $imagen ?>" class="imagen-producto" alt=""></a>
                    <h2 class="nombre-producto"><?php echo $nombreproducto[$i] ?></h2>
                    <p class="id-producto"> Empresa : <?php
                    
                    $con = conectar();
                    
                $sql = "SELECT * FROM users WHERE id=$idempresaproducto[$i]  AND  estado='activo'";
                $result7 = mysqli_query($con, $sql);
                while ($mostrar7 = mysqli_fetch_array($result7)) {
                  echo $mostrar7['nombre'];
                }?></p>
                    <div class="precio-descuento">
                    <span class="precio-actual">$<?php 
                    $descuento = $descuentoproducto[$i]*$precioproducto[$i];
                     $preciodescuento = $descuento/100;
                     $total = $precioproducto[$i]-$preciodescuento;?>
                     <?php echo $total ?></span>
                     <span class="precio-antes">$<?php echo $precioproducto[$i]; ?></span><p class="descuento"><?php echo $descuentoproducto[$i]; ?>% OFF</p></div>
                     <a href=""><img class="btn-listadeseos" src="icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="icons/CarritoCompras.png" alt=""></a>

            </div>
            <?php  } mysqli_close($con) ?>
        </div>
    </section>
    <script src="scripts/script.js"></script>
</body>
<?php
include_once("FooderPrincipal.php");
?>

 
</html>
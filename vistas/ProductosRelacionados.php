<link rel="stylesheet" href="../css/ProductosRelacionadosCss.css">
<h1 class="titulo_componente"> PRODUCTOS RELACIONADOS</h1>
    <section class="product"> 
        <button class="pre-btn"><img src="../images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="../images/arrow.png" alt=""></button>
        <div class="product-container">
                <?php
                $con = conectar();
                $sql = "SELECT * FROM `productos`  WHERE id= $_GET[producto] AND estado='activo'";
                $result5 = mysqli_query($con, $sql);
                if ($mostrar5 = mysqli_fetch_array($result5)) {
                  $categoria = $mostrar5['categoria'];
                }
                $sql = "SELECT * FROM `productos`  WHERE categoria = $categoria AND id<> $_GET[producto] AND estado='activo' ORDER BY RAND() LIMIT 10";
                $result5 = mysqli_query($con, $sql);
                while ($mostrar5 = mysqli_fetch_array($result5)) {
                  $idpopular[] = $mostrar5['id'];
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
                    <a href="../vistas/PaginaDelProducto.php?producto=<?php echo $idproductopopular[$i]?>"><img src="../images/<?php echo $imagenpp ?>" class="imagen-producto" alt=""></a>
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
                        <span class="precio-actual">$<?php echo number_format(intval($precioproductopopular[$i])) ?></span></div>
                        <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a></div><?php 

                      }else{
                      ?>
                    <span class="precio-actual">$<?php 
                    $descuento = $descuentoproductopopular[$i]*$precioproductopopular[$i];
                     $preciodescuento = $descuento/100;
                     $total = $precioproductopopular[$i]-$preciodescuento;?>
                     <?php echo number_format(intval($total)) ?></span>
                     <span class="precio-antes">$<?php echo $precioproductopopular[$i] ?></span><p class="descuento"><?php echo $descuentoproductopopular[$i] ?>% OFF</p></div>
                     <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
                     <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a>

            </div>
            <?php } } mysqli_close($con)   ?>
        </div>
    </section>
  </div>
    <script src="../scripts/script.js"></script>
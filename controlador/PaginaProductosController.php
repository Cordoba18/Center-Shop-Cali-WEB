<?php 
if (isset($_GET['empresa'])) {

    $empresa = $_GET['empresa'];
   if ($empresa == "ALL") {?>
    <div class="locales"> 
      <div class="resultados"><p class="r_busqueda">Resultados de busqueda de </p>
       <h1 class="resultado"><?php echo "EMPRESAS"; ?> </h1></div><?php
    $con = conectar();
 $sql = "SELECT*FROM users WHERE Roles_id = 2 AND estado = 'activo' ORDER BY RAND()";
 $result10 = mysqli_query($con, $sql);
 $resultado = 0;
 while ($mostrar10 = mysqli_fetch_array($result10)) { ?>
        <div class="elemento" >
          <?php $resultado = $resultado + 1; ?>
         <?php echo "<a href='PaginaProductos.php?empresa=".$mostrar10['id']."'><img class='logo' src='../images/$mostrar10[logo]'></a>"?> 
       <?php echo "<h1 class='titulo_logo'>$mostrar10[nombre]</h1>"  ;?> 
        </div>
     <?php } ?>
  </div>
  <?php 
   mysqli_close($con)  ?>
         
    <?php
   }else {
    ?> 
    <div class="productos">
    <div class="resultados"><p class="r_busqueda">Resultados de busqueda de </p>
     <h1 class="resultado">
      <?php
      $con = conectar(); 
      $sql = "SELECT * FROM users WHERE id=$empresa  AND  estado='activo'";
      $result7 = mysqli_query($con, $sql);
      if ($mostrar7 = mysqli_fetch_array($result7)) {
        echo $mostrar7['nombre'];
      } 
      ?>
    </h1> <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    ORDENAR POR
  </button>
  <ul class="dropdown-menu">
  <li><a class='dropdown-item' href=''> MAYOR PRECIO </a></li>
  <li><a class='dropdown-item' href=''> MENOR PRECIO </a></li>
  <li><a class='dropdown-item' href=''> MAS RECIENTE </a></li>
  <li><a class='dropdown-item' href=''> MEJOR VOTADOS </a></li>
  </ul></div><?php
    $con = conectar();
    $sql = "SELECT * FROM productos WHERE id_empresa = $_GET[empresa] AND estado='activo'";
    $result5 = mysqli_query($con, $sql);
    $resultado = 0;
    while ($mostrar5 = mysqli_fetch_array($result5)) {
      ?><div class="producto">
        <?php $resultado = $resultado + 1; ?>
        <?php
      $id = $mostrar5['id'];
      $sql = "SELECT * FROM imagenes_productos where id_producto='$id' and estado='activo'";
      $result6 = mysqli_query($con, $sql);
      if($mostrar6 = mysqli_fetch_array($result6)) {
        $imagen =  $mostrar6['imagen']; }?> 
        <a href="PaginaDelProducto.php?producto=<?php echo $id?>"><img src="../images/<?php echo $imagen ?>" class="imagen-producto" alt=""></a>
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
            <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
         <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a></div><?php 

          }else{
          ?>
        <span class="precio-actual">$<?php 
        $descuento = $mostrar5['descuento']*$mostrar5['precio'];
         $preciodescuento = $descuento/100;
         $total = $mostrar5['precio']-$preciodescuento;?>
         <?php echo $total ?></span>
         <span class="precio-antes">$<?php echo $mostrar5['precio'] ?></span><p class="descuento"><?php echo $mostrar5['descuento'] ?>% OFF</p></div>
         <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
         <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a>
</div>
<?php } } ?><?php
    if ($resultado == 0) {?>
      <div class="nobusqueda">
    <h1 class="excepcion"> LO SIENTO NO ENCONTRAMOS SU CONSULTA</h1></div>
    <?php
    } ?>  </div> </div>   <?php mysqli_close($con); } 
   } else if (isset($_GET['search'])) {?>
    <div class="productos">
    <div class="resultados"><p class="r_busqueda">Resultados de busqueda de  </p> <h1 class="resultado"><?php echo $_GET['search'] ?> </h1> <button id="10" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    ORDENAR POR
  </button>
  <ul class="dropdown-menu">
  <li><a class='dropdown-item' href=''> MAYOR PRECIO </a></li>
  <li><a class='dropdown-item' href=''> MENOR PRECIO </a></li>
  <li><a class='dropdown-item' href=''> MAS RECIENTE </a></li>
  <li><a class='dropdown-item' href=''> MEJOR VOTADOS </a></li>
  </ul></div><?php
     $con = conectar();
     $sql = "SELECT * FROM categorias WHERE categoria='$_GET[search]' OR categoria  REGEXP '".strtolower($_GET['search'])."'";
     $result5 = mysqli_query($con, $sql);
     if ($mostrar5 = mysqli_fetch_array($result5)) {
         $categoria2 = $mostrar5['id'];
     }else {
        $categoria2 = "";
     }
     $sql = "SELECT * FROM users WHERE (nombre='$_GET[search]' OR nombre  REGEXP '".strtolower($_GET['search'])."') AND estado = 'activo'";
     $result5 = mysqli_query($con, $sql);
     if ($mostrar5 = mysqli_fetch_array($result5)) {
         $idempresa = $mostrar5['id'];
     }else {
        $idempresa= "";
     }
    if ($categoria2 == "" && $idempresa == "") {
        $sql = "SELECT * FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') AND estado='activo'";
    }else if (!$categoria2 == "") {
      $sql = "SELECT * FROM productos WHERE categoria=$categoria2 AND estado='activo'";
    } else if (!$idempresa == "") {
        $sql = "SELECT * FROM productos WHERE id_empresa=$idempresa AND estado='activo'";
    }
    $resultado = 0;
    $result5 = mysqli_query($con, $sql);
    while ($mostrar5 = mysqli_fetch_array($result5)) {
      ?><div class="producto">
            <?php $resultado = $resultado + 1; ?>
            
        <?php
      $id = $mostrar5['id'];
      $sql = "SELECT * FROM imagenes_productos where id_producto='$id' and estado='activo'";
      $result6 = mysqli_query($con, $sql);
      if($mostrar6 = mysqli_fetch_array($result6)) {
        $imagen =  $mostrar6['imagen']; }?> 
        <a href="PaginaDelProducto.php?producto=<?php echo $id?>"><img src="../images/<?php echo $imagen ?>" class="imagen-producto" alt=""></a>
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
            <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
         <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a></div><?php 

          }else{
          ?>
        <span class="precio-actual">$<?php 
        $descuento = $mostrar5['descuento']*$mostrar5['precio'];
         $preciodescuento = $descuento/100;
         $total = $mostrar5['precio']-$preciodescuento;?>
         <?php echo $total ?></span>
         <span class="precio-antes">$<?php echo $mostrar5['precio'] ?></span><p class="descuento"><?php echo $mostrar5['descuento'] ?>% OFF</p></div>
         <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
         <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a>
</div>
<?php } } ?> <?php
    if ($resultado == 0) {?>
      <div class="nobusqueda">
    <h1 class="excepcion"> LO SIENTO NO ENCONTRAMOS SU CONSULTA</h1></div>
    <?php
    } ?>  </div> <?php mysqli_close($con); }
else if (isset($_GET['categoria'])) { ?>
    <div class="productos">
    <div class="resultados"><p class="r_busqueda">Resultados de busqueda de </p><h1 class="resultado"><?php echo $_GET['categoria'] ?> </h1> <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

    ORDENAR POR
  </button>
  <ul class="dropdown-menu">
  <li><a class='dropdown-item' href=''> MAYOR PRECIO </a></li>
  <li><a class='dropdown-item' href=''> MENOR PRECIO </a></li>
  <li><a class='dropdown-item' href=''> MAS RECIENTE </a></li>
  <li><a class='dropdown-item' href=''> MEJOR VOTADOS </a></li>
  </ul></div><?php
    
    $con = conectar();
    $sql = "SELECT * FROM categorias WHERE categoria='$_GET[categoria]'";
    $result5 = mysqli_query($con, $sql);
    while ($mostrar5 = mysqli_fetch_array($result5)) {
        $categoria = $mostrar5['id'];
    }
    $con = conectar();
    $sql = "SELECT * FROM productos WHERE categoria = $categoria AND estado='activo'";
    $result5 = mysqli_query($con, $sql);
    $resultado = 0;
    while ($mostrar5 = mysqli_fetch_array($result5)) {
      ?><div class="producto">
       <?php $resultado = $resultado + 1; ?>
        <?php
      $id = $mostrar5['id'];
      $sql = "SELECT * FROM imagenes_productos where id_producto='$id' and estado='activo'";
      $result6 = mysqli_query($con, $sql);
      if($mostrar6 = mysqli_fetch_array($result6)) {
        $imagen =  $mostrar6['imagen']; }?> 
        <a href="PaginaDelProducto.php?producto=<?php echo $id?>"><img src="../images/<?php echo $imagen ?>" class="imagen-producto" alt=""></a>
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
            <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
         <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a></div><?php 

          }else{
          ?>
        <span class="precio-actual">$<?php 
        $descuento = $mostrar5['descuento']*$mostrar5['precio'];
         $preciodescuento = $descuento/100;
         $total = $mostrar5['precio']-$preciodescuento;?>
         <?php echo $total ?></span>
         <span class="precio-antes">$<?php echo $mostrar5['precio'] ?></span><p class="descuento"><?php echo $mostrar5['descuento'] ?>% OFF</p></div>
         <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
         <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a>
</div>
<?php } } ?> <?php
    if ($resultado == 0) {?>
      <div class="nobusqueda">
    <h1 class="excepcion"> LO SIENTO NO ENCONTRAMOS SU CONSULTA</h1></div>
    <?php
    } ?>   </div> <?php mysqli_close($con);  }
else if (isset($_GET['descuento'])) {

    if ($_GET['descuento'] == "ALL") {
        ?><div class="productos">
        <div class="resultados"><p class="r_busqueda">Resultados de busqueda de  </p> <h1 class="resultado"><?php echo "descuentos"?> </h1> <button id="10" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        ORDENAR POR
      </button>
      <ul class="dropdown-menu">
      <li><a class='dropdown-item' href=''> MAYOR PRECIO </a></li>
      <li><a class='dropdown-item' href=''> MENOR PRECIO </a></li>
      <li><a class='dropdown-item' href=''> MAS RECIENTE </a></li>
      <li><a class='dropdown-item' href=''> MEJOR VOTADOS </a></li>
      </ul></div><?php
         $con = conectar();
        $sql = "SELECT * FROM productos WHERE descuento > 0 AND estado='activo'";
        $resultado = 0;
        $result5 = mysqli_query($con, $sql);
        while ($mostrar5 = mysqli_fetch_array($result5)) {
          ?><div class="producto">
                <?php $resultado = $resultado + 1; ?>
            <?php
          $id = $mostrar5['id'];
          $sql = "SELECT * FROM imagenes_productos where id_producto='$id' and estado='activo'";
          $result6 = mysqli_query($con, $sql);
          if($mostrar6 = mysqli_fetch_array($result6)) {
            $imagen =  $mostrar6['imagen']; }?> 
            <a href="PaginaDelProducto.php?producto=<?php echo $id?>"><img src="../images/<?php echo $imagen ?>" class="imagen-producto" alt=""></a>
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
                <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
             <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a></div><?php 
    
              }else{
              ?>
            <span class="precio-actual">$<?php 
            $descuento = $mostrar5['descuento']*$mostrar5['precio'];
             $preciodescuento = $descuento/100;
             $total = $mostrar5['precio']-$preciodescuento;?>
             <?php echo $total ?></span>
             <span class="precio-antes">$<?php echo $mostrar5['precio'] ?></span><p class="descuento"><?php echo $mostrar5['descuento'] ?>% OFF</p></div>
             <a href=""><img class="btn-listadeseos" src="../icons/ListaDeDeseos.png" alt=""></a>
             <a href=""><img class="btn-carritocompras" src="../icons/CarritoCompras.png" alt=""></a>
    </div>
    <?php } } ?> <?php
    if ($resultado == 0) {?>
      <div class="nobusqueda">
    <h1 class="excepcion"> LO SIENTO NO ENCONTRAMOS SU CONSULTA</h1></div>
    <?php
    } ?>  </div> <?php mysqli_close($con); } ?> <?php
    } ?>
   
 <p class="resultadototal" hidden><?php echo $resultado?> </p>
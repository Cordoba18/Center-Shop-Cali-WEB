<?php 
include_once("../sql/Consultas.php");
$consultas = new consulta();
$ordenar = new orderpor();
if (isset($_GET['empresa'])) {

    $empresa = $_GET['empresa'];
   if ($empresa == "ALL" && isset($_GET['categoria'])== false) {?>
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
      if ($_GET['empresa'] == "ALL") {
        echo "Todas las empresas";
      }else {
        
      $con = conectar(); 
      $sql = "SELECT * FROM users WHERE id=$empresa  AND  estado='activo'";
      $result7 = mysqli_query($con, $sql);
      if ($mostrar7 = mysqli_fetch_array($result7)) {
        echo $mostrar7['nombre'];
      } 
    }
      ?>
    </h1> <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    ORDENAR POR
  </button>
  <ul class="dropdown-menu">
  <li  id="1"><a class='dropdown-item' href= <?php echo $ordenar -> existenciafiltro("mayorprecio") ?> > MAYOR PRECIO </a></li>
  <li id="2" ><a class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("menorprecio") ?>> MENOR PRECIO </a></li>
  <li id="3"><a  class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("recientes") ?>> MAS RECIENTE </a></li>
  </ul></div><?php
    $con = conectar();
    $sql = $consultas -> empresa();
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
  <li  id="1"><a class='dropdown-item' href= <?php echo $ordenar -> existenciafiltro("mayorprecio") ?> > MAYOR PRECIO </a></li>
  <li id="2" ><a class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("menorprecio") ?>> MENOR PRECIO </a></li>
  <li id="3"><a  class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("recientes") ?>> MAS RECIENTE </a></li>
  </ul></div><?php
     $con = conectar();
     $sql = $consultas -> search();
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
else if (isset($_GET['categoria']) && isset($_GET['empresa']) == false && isset($_GET['search']) == false) { ?>
    <div class="productos">
    <div class="resultados"><p class="r_busqueda">Resultados de busqueda de </p><h1 class="resultado"><?php echo $_GET['categoria'] ?> </h1> <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

    ORDENAR POR
  </button>
  <ul class="dropdown-menu">
  <li  id="1"><a class='dropdown-item' href= <?php echo $ordenar -> existenciafiltro("mayorprecio") ?> > MAYOR PRECIO </a></li>
  <li id="2" ><a class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("menorprecio") ?>> MENOR PRECIO </a></li>
  <li id="3"><a  class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("recientes") ?>> MAS RECIENTE </a></li>
  </ul></div><?php
    
    $con = conectar();
    $sql = $consultas -> categoria();
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
else if (isset($_GET['descuentos'])) {

    if ($_GET['descuentos'] == "ALL") {
        ?><div class="productos">
        <div class="resultados"><p class="r_busqueda">Resultados de busqueda de  </p> <h1 class="resultado"><?php echo "descuentos"?> </h1> <button id="10" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        ORDENAR POR
      </button>
      <ul class="dropdown-menu">
      <li  id="1"><a class='dropdown-item' href= <?php echo $ordenar -> existenciafiltro("mayorprecio") ?> > MAYOR PRECIO </a></li>
  <li id="2" ><a class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("menorprecio") ?>> MENOR PRECIO </a></li>
  <li id="3"><a  class='dropdown-item' href=<?php echo $ordenar -> existenciafiltro("recientes") ?>> MAS RECIENTE </a></li>
      </ul></div><?php
         $con = conectar();
        $sql = $consultas->descuentos();
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



 <?php  
 


class orderpor {

  function existenciafiltro($ordenar){
      
      $url_actual = $_SERVER['REQUEST_URI'];

      if (isset($_GET['filtro'])) {
        $url_nuevo_filtro= str_replace("filtro=".$_GET['filtro'], "", $url_actual."filtro=$ordenar");
      }else {
        $url_nuevo_filtro= $url_actual."&filtro=$ordenar";
      }
    

    echo $url_nuevo_filtro;
}

}


 ?>
 <p class="textodelorden" hidden> <?php echo $_GET['filtro'] ?> </p>
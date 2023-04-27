<?php
include_once("../sql/Consultas.php")
?>
<h1 class="titulo_filtros"> Filtros </h1>
<?php 

if (isset($_GET['descuentos']) || isset($_GET['empresa']) ) {
   
    if (isset($_GET['empresa']) &&  $_GET['empresa'] != "ALL") {?>

        <p class="filtro">Descuentos </p> 
        <ul>
    <?php $con = conectar();
    $sql = "SELECT*FROM categorias";
    $result = mysqli_query($con, $sql);
    $consulta = new consulta();
    while ($mostrar = mysqli_fetch_array($result)) {
    echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&descuento=true&empresa=$_GET[empresa]'> $mostrar[categoria] 
    (";
    $total = $consulta -> contardescuentos($mostrar['id'], "empresa", $_GET['empresa']);
    echo $total .") </a></li>";

}mysqli_close($con); ?>
        </ul>
        <br>
        <p class="filtro">MÀS COMPRADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&mascomprados=true&empresa=$_GET[empresa]'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarcomprados($mostrar['id'], "empresa", $_GET['empresa']);
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MÀS POPULARES </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&populares=true&empresa=$_GET[empresa]'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpopulares($mostrar['id'], "empresa", $_GET['empresa']);
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MEJOR PUNTUADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&puntuados=true&empresa=$_GET[empresa]'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpuntuados($mostrar['id'], "empresa", $_GET['empresa']);
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul> <?php
    } else{
        ?>
        <p class="filtro">Descuentos </p> 
        <ul> 
    <?php 
    $con = conectar();
    $sql = "SELECT*FROM categorias";
    $result = mysqli_query($con, $sql);
    $consulta = new consulta();
    while ($mostrar = mysqli_fetch_array($result)) {
    echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&descuento=true&empresa=ALL'> $mostrar[categoria] 
    (";
    $total = $consulta -> contardescuentos($mostrar['id'], "ALL", "");
    echo $total .") </a></li>";

}mysqli_close($con); ?>
        </ul>
        <br>
        <p class="filtro">MÀS COMPRADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&mascomprados=true&empresa=ALL'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarcomprados($mostrar['id'], "ALL", "");
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MÀS POPULARES </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&populares=true&empresa=ALL'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpopulares($mostrar['id'], "ALL", "");
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MEJOR PUNTUADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&puntuados=true&empresa=ALL'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpuntuados($mostrar['id'], "ALL", "");
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>
        <?php
    }
    }
    elseif (isset ($_GET['search'])) {?>
     
    <p class="filtro">Descuentos </p> 
    <?php
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
        $razon = "search";
    }else if (!$categoria2 == "") {
        $razon = "categoria";
    } else if (!$idempresa == "") {
        $razon = "empresa";
    }
    mysqli_close($con);
         ?> <ul> 
    <?php 
    $con = conectar();
    $sql = "SELECT*FROM categorias";
    $result = mysqli_query($con, $sql);
    $consulta = new consulta();
    while ($mostrar = mysqli_fetch_array($result)) {
    echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&descuento=true&search=$_GET[search]'> $mostrar[categoria] 
    (";
    $total = $consulta -> contardescuentos($mostrar['id'], $razon, $_GET['search']);
    echo $total .") </a></li>";

}mysqli_close($con); ?>
        </ul>
        <br>
        <p class="filtro">MÀS COMPRADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&mascomprados=true&search=$_GET[search]'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarcomprados($mostrar['id'], $razon, $_GET['search']);
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MÀS POPULARES </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&populares=true&search=$_GET[search]'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpopulares($mostrar['id'], $razon, $_GET['search']);
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MEJOR PUNTUADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&puntuados=true&search=$_GET[search]'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpuntuados($mostrar['id'], $razon, $_GET['search']);
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul><?php
       
     }else
     if (isset ($_GET['categoria']) && isset ($_GET['search'])== false) {?>
        <p class="filtro">Descuentos </p> 
        <ul> 
    <?php 
    $con = conectar();
    $sql = "SELECT*FROM categorias";
    $result = mysqli_query($con, $sql);
    $consulta = new consulta();
    while ($mostrar = mysqli_fetch_array($result)) {
    echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&descuento=true&empresa=ALL'> $mostrar[categoria] 
    (";
    $total = $consulta -> contardescuentos($mostrar['id'], "ALL", "");
    echo $total .") </a></li>";

}mysqli_close($con); ?>
        </ul>
        <br>
        <p class="filtro">MÀS COMPRADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&mascomprados=true&empresa=ALL'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarcomprados($mostrar['id'], "ALL", "");
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MÀS POPULARES </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&populares=true&empresa=ALL'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpopulares($mostrar['id'], "ALL", "");
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul>

        <br>
        <p class="filtro">MEJOR PUNTUADOS </p> 
        <ul> 
        <?php $con = conectar();
        $sql = "SELECT*FROM categorias";
        $result = mysqli_query($con, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        echo "<li><a class='subfiltro' href='PaginaProductos.php?categoria=$mostrar[categoria]&puntuados=true&empresa=ALL'> $mostrar[categoria] 
        (";
        $total = $consulta -> contarpuntuados($mostrar['id'], "ALL", "");
        echo $total .") </a></li>";

        }           mysqli_close($con); ?>
        </ul><?php
      
     }?>

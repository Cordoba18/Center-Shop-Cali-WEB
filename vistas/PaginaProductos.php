<?php
include_once("HeaderPrincipal.php");
?>
<head>
    <title>CATALOGO</title>
    <link rel="stylesheet" href="../css/PaginaProductos.css">
</head>
<body>


<div class="contenedor-productos">
  <div class="recomendaciones">
    <?php 
    include_once("../controlador/FiltrosController.php");
    ?>

  </div>
<?php
  include_once("../controlador/PaginaProductosController.php"); ?>
  
</div>
<script src="../scripts/busquedatotal.js"></script>
</body>
</html>
<?php
include_once("FooderPrincipal.php");
?>

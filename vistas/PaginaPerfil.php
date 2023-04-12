<?php
include_once("HeaderSimple.php");
?>
<head>
    <link rel="stylesheet" href="../css/PaginaPerfilCss.css">
    <title>Perfil</title>
      <div class="config">
    <ul> 

    <li> <a href="CambiarContraUsuario.php">CAMBIAR CONTRASENA</a> </li>
    <li> <a href="CarritoCompras.php">CARRITO DE COMPRAS</a> </li>
    <li> <a href="ListaDeseos.php">LISTA DE DESEOS</a> </li>
    <li> <a href="MetodosPago.php">METODO DE PAGO</a> </li>
    <li> <a href="../index.php">CERRAR SESIÓN</a> </li>
    </ul>
    </div>
    <div class="atributos"> 
        <form action="" method="post">
            <label for="">NOMBRE COMPLETO  </label>
            <input type="text" name="nombre">
            <label for="">FECHA NACIMIENTO </label>
            <input type="date" name="fechaN">
            <label for="">NUMERO DE TELEFONO</label>
            <input type="number" name="telefono">
            <label for="">Correo</label>
            <input type="submit" value="GUARDAR CAMBIOS">
        </form>
    </div>
</head>
<body>
    
</body>
</html>
<?php
include_once("FooderPrincipal.php");
?>
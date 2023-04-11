<?php
include_once("HeaderPrincipal.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARRITO DE COMPRAS</title>

</head>
<body>
    <div class="metodopago">

    <form action="" method="post">
        <label >DIRECCIÓN:</label>
        <input type="text" name="direccion">
        <label >TELEFONO:</label>
        <input type="number" name="telefono" >
        <label >NÚMERO DE TARJETA:</label>
        <input type="number" name="n_tarjeta" >
        <label >NOMBRE DEL TITULAR:</label>
        <input type="text" name="n_titular" >
        <label >FECHA EXPEDICIÓN:</label>
        <input type="date" name="fecha_e">
        <label >CODIGO DE TARJETA:</label>
        <input type="number" name="c_tarjeta">
        <a href="MetodosPago.php">VER METODOS DE PAGO</a>
        <input type="submit" value="GUARDAR CAMBIOS">
    </form>
    </div>

 
</body>
</html>
<?php
include_once("FooderPrincipal.php");
?>
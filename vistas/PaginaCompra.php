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
    <h1>FACTURA :</h1>
    <div class="productos">

    <table>
        <th> gwg</th>
        <th>twqtqt</th>
        <tr>
            <td> NOMBRE</td>
        </tr>
    </table>
    </div>
    <form action="" method="post">
        <h1> ELEGIR METODO DE PAGO:</h1>
        <div class="metodosdepago">

        </div>
        <a href="">¿NO TIENES UN METODO DE PAGO?</a>
        <label >CONTRASEÑA:</label>
        <input type="password" name="contrasena" >
        <select name="tipo_pedido" id="">
            <option>TIPO DE PEDIDO </option>
            <option>DOMICILIO</option>
            <option>LO RECOJO</option>
        </select>
      
        <h1>TOTAL :</h1> <input type="submit" value="comprar">
    </form>

    <a href="">VACIAR CARRITO</a>
    <a href="">COMPRAR</a>
</body>
</html>
<?php
include_once("FooderPrincipal.php");
?>
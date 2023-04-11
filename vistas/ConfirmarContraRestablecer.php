<?php
include_once("HeaderSimple.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVA CONTRASEÑA</title>
</head>
<body>
<div class="Login">


<h1> INGRESE NUEVA CONTRASEÑA :</h1>

<form action="login.php" method="post">

<label >CONTRASEÑA : </label>
<input type="password" name="contrasena">
<label >CONFIRMAR CONTRASEÑA : </label>
<input type="password" name="ccontrasena">
<input type="submit" value="CONFIRMAR">
</form>
</div>
</body>
</html>
<?php
include_once("FooderPrincipal.php");
?>
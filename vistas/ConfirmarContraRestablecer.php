<?php
include_once("HeaderSimple.php");
?>
<head>
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
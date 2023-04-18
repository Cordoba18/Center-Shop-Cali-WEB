<?php
include_once("HeaderSimple.php");
?>
<head>
    <title> INICIO SESIÓN</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>
<div class="Login">




<form action="../controlador/LoginController.php" method="post">
<h1> INICIAR SESION</h1>
<label >CORREO: </label>
<input type="email" name="correo">
<label >CONTRASEÑA:</label>
<input type="password" name="contrasena" >
<input type="submit" value="INICIAR">
<a href="CrearCuenta.php">CREAR CUENTA</a>
<a href="RestablecerContraseña.php">RECUPERAR CONTRASEÑA</a>
</form>
</div>
</body>

</html>
<?php
include_once("FooderPrincipal.php");
?>
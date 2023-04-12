<?php
include_once("HeaderSimple.php");
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
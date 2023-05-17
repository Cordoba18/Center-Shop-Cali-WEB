
<head>
    <title> INICIO SESIÓN</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>
<div class="Login"> 
<form action="../controlador/LoginController.php" method="post">
<h1> INICIAR SESION</h1>
<div class="contenedor-inputs">
<label >CORREO: </label>
<input class="input-entrada" type="email" name="correo"></div>
<div class="contenedor-inputs">
<label >CONTRASEÑA:</label></div>
<input class="input-entrada" type="password" name="contrasena" >
<div class="contenedor-boton">
<input type="submit" value="INICIAR"></div>
<div class="contenedor-links">
<a href="CrearCuenta.php">CREAR CUENTA</a>
<a href="RestablecerContraseña.php">RECUPERAR CONTRASEÑA</a></div>
</form>
</div>
</body>

</html>
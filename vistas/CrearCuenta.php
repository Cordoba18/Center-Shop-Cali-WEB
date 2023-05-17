
<head>
    <title> INICIO SESIÓN</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>
<div class="Login">


<form action="../controlador/LoginController.php" method="post">
<h1> CREAR CUENTA</h1>
<div class="contenedor-inputs">
<label >NOMBRE COMPLETO: </label>
<input class="input-entrada" type="text" name="correo"></div>
<div class="contenedor-inputs">
<label >FECHA NACIMIENTO: </label>
<input class="input-entrada" type="date" name="f_nacimiento"></div>
<div class="contenedor-inputs">
<label >NUMERO DE TELEFONO: </label>
<input class="input-entrada" type="number" name="telefono"></div>
<div class="contenedor-inputs">
<label >CORREO:</label>
<input class="input-entrada" type="email" name="correo" ></div>
<div class="contenedor-inputs">
<label >CONTRASEÑA:</label>
<input class="input-entrada" type="password" name="contrasena" ></div>
<div class="contenedor-boton">
<input type="submit" value="CREAR"></div>
<div class="contenedor-links">
<a href="login.php">YA TENGO CUENTA</a></div>
</form>
</div>
</body>

</html>

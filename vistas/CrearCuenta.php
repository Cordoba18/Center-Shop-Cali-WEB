<?php
include_once("HeaderSimple.php");
?>
<head>
    <title> INICIO SESIÓN</title>
    <link rel="stylesheet" href="../css/Login.css">
</head>
<body>
<div class="Login">


<img src="../icons/LOGO.png" alt="">
<form action="../controlador/LoginController.php" method="post">
<h1> CREAR CUENTA</h1>
<label >NOMBRE COMPLETO: </label>
<input type="text" name="correo">
<label >FECHA NACIMIENTO: </label>
<input type="date" name="f_nacimiento">
<label >NUMERO DE TELEFONO: </label>
<input type="number" name="telefono">
<label >CORREO:</label>
<input type="email" name="correo" >
<label >CONTRASEÑA:</label>
<input type="password" name="contrasena" >
<input type="submit" value="CREAR">
<a href="login.php">YA TENGO CUENTA</a>
</form>
</div>
</body>

</html>
<?php
include_once("FooderPrincipal.php");
?>
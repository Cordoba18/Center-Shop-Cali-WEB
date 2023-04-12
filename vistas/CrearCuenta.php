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
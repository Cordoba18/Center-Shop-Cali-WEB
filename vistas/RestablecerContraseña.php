<?php
include_once("HeaderSimple.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title> INICIO SESIÓN</title>
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
<div class="Login">


<h1> INGRESE SU CORREO :</h1>

<form action="RecuperarContraseña.php" method="post">

<label >CORREO: </label>
<input type="email" name="correo">
<input type="submit" value="INICIAR">
</form>
</div>
</body>

</html>
<?php
include_once("FooderPrincipal.php");
?>
<?php
include_once("HeaderSimple.php");
?>
<head>
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
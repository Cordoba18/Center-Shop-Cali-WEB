<?php
include_once("HeaderSimple.php");
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title> INICIO SESIÓN</title>
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
<div class="Login">




<form action="ConfirmarContraRestablecer.php" method="post">
<h1>RECUPERAR CONTRASEÑA:</h1>
<p>Hemos enviado un codigo al correo :  </p>
<label >CODIGO </label>
<input type="number" name="codigo" value="CODIGO">
<input type="submit" value="CONFIRMAR CODIGO">

</form>
</div>
</body>

</html>
<?php
include_once("FooderPrincipal.php");
?>
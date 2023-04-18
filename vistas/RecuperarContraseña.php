<?php
include_once("HeaderSimple.php");
?>
<head>
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
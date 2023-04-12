<?php
include_once("HeaderPrincipal.php");
?>

<head>
    <title>TU LISTA DE DESEOS</title>
</head>
<body>
    <h1> CAMBIAR CONTRASEÑA </h1>

    <form action="PaginaPerfil.php" method="post">

    <label > CONTRASEÑA ACTUAL : </label>
    <input type="password" name="acontrasena">
    <label >CONTRASEÑA : </label>
    <input type="password" name="contrasena">
    <label >CONFIRMAR CONTRASEÑA : </label>
    <input type="password" name="ccontrasena">
    <input type="submit" value="CONFIRMAR">
    

    </form>
</body>
</html>
<?php
include_once("FooderPrincipal.php");
?>
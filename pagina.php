<?php

session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];

	echo "<h1><font color=ff0000>Bienvenido: $usuarioingresado </h1>";
}
else
{
	header('location: index.php');
}

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: main.html');
}
?>

<link rel="stylesheet" href="login.css">
<body style="color:#red";>
<form method="POST">
<input type="submit" value="Cerrar sesión" name="btncerrar" />
</form>
</body>

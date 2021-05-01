<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="login.css">
 <title>Alumnos</title>
</head>

<body style="background-color:#00">
<div align="center">
<form method="POST">
<table style="background-color:#00">
<tr style="background-color:#00"><td colspan="2" style=" background-color:#00 padding-bottom:10px;"><label>Iogin</label></td></tr>

<tr><td rowspan="6"><img src="logo.png"></td><td><label>Alumno</label></td></tr>

<tr><td><input type="text" name="txtusuario" placeholder="Ingresar usuario" required /> </td></tr>

<tr><td><label>Numero de control</label></td></tr>

<tr><td><input type="password" name="txtpassword" placeholder="Ingresar password" required /> </td></tr>

<tr><td><input type="submit" name="btningresar" value="Ingresar"/></td></tr>

<tr><td><a href="#">¿Olvidaste tu contraseña?</a><br><br><a href="#">Crear una nueva cuenta </a></td></tr>

</table>
</form>
</div>
</body>

</html>


<?php

session_start();
if(isset($_SESSION['nombredelusuario']))
{
	header('location: pagina.php');
}

if(isset($_POST['btningresar']))
{
	
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="test";
	
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$conn)
	{
		die("No hay conexión: ".mysqli_connect_error());
	}
	
	$nombre=$_POST['txtusuario'];
	$pass=$_POST['txtpassword'];
	
	$query=mysqli_query($conn,"Select * from alumnos where usuario = '".$nombre."' and numcont = '".$pass."'");
	$nr=mysqli_num_rows($query);
	
	if(!isset($_SESSION['nombredelusuario']))
	{
	if($nr == 1)
	{
		$_SESSION['nombredelusuario']=$nombre;
		header("location: paginaalumnos.php");
	}
	else if ($nr == 0)
	{
		echo "<script>alert('Usuario no existe');window.location= 'alumnos.php' </script>";
	}
	}
}
?>

<?php session_start();
require_once("bd_conexion.php");
?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Información Administrativo ZUMAQUE</title>
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="login">
	<div class="contenedor">
	<header class="site-header clearfix">
		<div class="logo">
			<img src="../img/logo.jpg" alt="">
		</div>
		<div class="titulo">
			<h1>Sistema de Información Administrativo ZUMAQUE</h1>
		</div>
	</header>
		<div class="contenido">
		<?php  
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];

		$consulta = "SELECT * FROM empleados WHERE usuario='$usuario' AND password ='$password' ";
		$respuesta = mysqli_query($conn, $consulta);

		$filas = mysqli_num_rows($respuesta);

		if ($filas > 0) {
			$_SESSION['usuario'] = $usuario;
			header ("location:../inicio.php");
		} else{
			echo "<h2>";
			echo "Error en la autentificación. Por favor vuelve atrás y revisa los datos. <br> <br>"; 
			echo "</h2>";
			echo "<a class=\"btnvolver\" href=\"../index.php\">Volver</a>";
		}
		mysqli_free_result($respuesta);
		 ?>

	</div>
</div>
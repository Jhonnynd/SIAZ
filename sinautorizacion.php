<?php session_start(); 
$varsession = $_SESSION['usuario'];
if($varsession == null || $varsession = ''){
	header ("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Información Administrativo ZUMAQUE</title>
	<link rel="icon" href="favicon.ico" type="image/ico">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
	<header class="site-header clearfix">
		<div class="logo">
			<img src="img/logo.jpg" alt="">
		</div>
		<div class="titulo">
			<h1>Sistema de Información Administrativo ZUMAQUE</h1>
		</div>
	</header>
	
		<div class="barra clearfix">
			<div class="menu-movil">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav class="navegacion">
					<ul class="clearfix">	
						<li><a href="inicio.php">Inicio</a></li>
						<li><a href="empleados.php">Empleados</a></li>
						<li><a href="boleteria.php">Boletería</a></li>
						<li><a href="facturacion.php">Facturacion</a></li>
					</ul>
			</nav>
		</div>
		<div class="contenido">
			<h2>Lo sentimos. Necesitas tener el cargo de administrador o asesor de viajes para ver esto.</h2>
		</div>
	</div>
	<footer>
	<div>
	<a href="funciones/close.php">Cerrar sesíón</a>
	</div>
</footer>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
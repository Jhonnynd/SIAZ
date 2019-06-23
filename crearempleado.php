<?php 
	if(isset($_POST['nombre'])){
		$nombre = $_POST['nombre'];
	}
	if(isset($_POST['apellido'])){
		$apellido = $_POST['apellido'];
	}
	if(isset($_POST['cedula'])){
		$cedula = $_POST['cedula'];
	}
	if(isset($_POST['telefono'])){
		$telefono = $_POST['telefono'];
	}
	if(isset($_POST['departamento'])){
		$departamento = $_POST['departamento'];
	}
	if(isset($_POST['cargo'])){
		$cargo = $_POST['cargo'];
	}
	try {
		require_once("funciones/bd_conexion.php");

	} catch (Exception $e) {
		$error = $e->getMessage();
	}
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Información Administrativo ZUMAQUE</title>
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
						<li><a href="index.php">Inicio</a></li>
						<li><a class="activo" href="empleados.php">Empleados</a></li>
						<li><a href="boleteria.php">Boletería</a></li>
						<li><a href="facturacion.php">Facturacion</a></li>
					</ul>
			</nav>
		</div>
		<div class="contenido">
			<pre>
				<?php var_dump($_POST); ?>
			</pre>
		</div>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
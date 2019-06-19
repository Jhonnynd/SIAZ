<?php 
	try {
		require_once("funciones/bd_conexion.php");
		$sql = "SELECT * FROM contactos";
		$resultado = $conn->query($sql);

	} catch (Exception $e) {
		$error = $e->getMessage();
	}
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
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
			<h2>Agregar un empleado nuevo:</h2>
			<form class="agregar-empleado clearfix" action="crearempleado.php" method="POST">
			<div class="left">
				<div class="campo">
					<label for="nombre">Nombre: <br> </label>
						<input type="text" name="nombre" id="nombre" placeholder="Nombre">
				</div>

				<div class="campo">
					<label for="apellido">Apellido:<br></label>
						<input type="text" name="apellido" id="apellido" placeholder="Apellido">
				</div>

				<div class="campo">
					<label for="cedula">Número de cédula:<br></label>
						<input type="text" name="cedula" id="cedula" placeholder="Número de cédula">
				</div>

				<div class="campo">
					<label for="telefono">Teléfono:<br></label>
						<input type="text" name="telefono" id="telefono" placeholder="Teléfono">
				</div>
			</div>
			<div class="right">
				<div class="campo">
					<label for="departamento">Departamento:<br>
						<select name="cargo" value="-Any-">
							<option>Selecciona un departamento</option>
							<option value=""></option>
						</select>
					</label>
					</div>

				<div class="campo">
					<label for="cargo">Cargo:<br>
						<select name="cargo" value="-Any-">
							<option>Selecciona un cargo</option>
							<option value=""></option>
						</select>
					</label>
				</div>
				<input class="agregar" type="submit" value="Agregar empleado">
			</div>
				
			</form>
			

		</div>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
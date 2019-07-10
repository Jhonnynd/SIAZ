<?php session_start(); 
	$varsession = $_SESSION['usuario'];
	if($varsession == null || $varsession = ''){
		header ("location:index.php");
	}
	$usuario = $_SESSION['usuario'];
	require_once("funciones/bd_conexion.php");
		$consulta = "SELECT * FROM empleados WHERE usuario = '{$usuario}' AND cargo_id = 1 OR usuario = '{$usuario}' AND cargo_id = 4; ";
		$respuesta = mysqli_query($conn, $consulta);
		$filas = mysqli_num_rows($respuesta);
		if ($filas < 1) {
			header ("location:sinautorizacion.php");
		} 
		mysqli_free_result($respuesta);
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
						<li><a href="inicio.php">Inicio</a></li>
						<li><a href="empleados.php">Empleados</a></li>
						<li><a class="activo" href="boleteria.php">Boletería</a></li>
						<li><a href="facturacion.php">Facturacion</a></li>
					</ul>
			</nav>
		</div>
		<div class="contenido">
			<h2>Crear un boleto de viaje. Ingresa los datos del cliente</h2>
			<form class="agregar-empleado" action="facturagenerada.php" method="POST" onsubmit="return validar();">
			<div class="form-boleteria clearfix">
				<div class="left">
				<div class="campo">
					<label for="nombre">Nombre del cliente: <br> </label>
						<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
				</div>

				<div class="campo">
					<label for="apellido">Apellido del cliente:<br></label>
						<input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
				</div>

				<div class="campo">
					<label for="cedula">Número de cédula del cliente:<br></label>
						<input type="text" name="cedula" id="cedula" placeholder="Número de cédula" required>
				</div>

				<div class="campo">
					<label for="telefono">Teléfono del cliente:<br></label>
						<input type="text" name="telefono" id="telefono" placeholder="Teléfono" required>
				</div>
			</div>

			 <div class="right">
				<div class="campo">
					<label for="destino_salida">Salida<br>
						<select name="destino_salida" id="destino_salida" value="-Any-" onChange="validarcombobox()">>
							<option value="1">Maracaibo</option>
							<option value="2">Caracas</option>
						</select>
					</label>
				</div>
				<div class="campo">
					<label for="destino_llegada">Llegada:<br>
						<select name="destino_llegada" id="destino_llegada" value="-Any-" onChange="validarcombobox()">>
							<option value="3">Medellin</option>
							<option value="4">Bogotá</option>
							<option value="5">Santiago</option>
							<option value="6">Quito</option>
							<option value="7">Miami</option>
						</select>
					</label>
				</div>
				<div class="campo">
					<label for="dia">Dia de salida:<br></label>
						<input type="date" name="dia" id="dia" required>
				</div>
				<div class="campo">
					<label for="hora">Hora de salida:<br></label>
						<input type="time" name="hora" id="hora" required>
				</div>
				<div class="campo">
					<label for="total">Total a pagar:<br></label>
						<input type="number" name="total" id="total" required>
				</div>
			</div>
		</div>
				<div class="campo-agregar">
				<input class="agregar agregar-boleto" type="submit" value="Generar factura">
				</div>
			</form>
			</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>

<footer>
	<div>
	<a href="funciones/close.php">Cerrar sesíón</a>
	</div>
</footer>
</body>
</html>
	<?php 
	if (isset ($_GET['id'])){
		$id = $_GET['id'];
	}
	if(isset($_GET['nombre'])){
		$nombre = $_GET['nombre'];
	}
	if(isset($_GET['apellido'])){
		$apellido = $_GET['apellido'];
	}
	if(isset($_GET['cedula'])){
		$cedula = $_GET['cedula'];
	}
	if(isset($_GET['telefono'])){
		$telefono = $_GET['telefono'];
	}
	if(isset($_GET['departamento'])){
		$departamento = $_GET['departamento'];
	}
	if(isset($_GET['cargo'])){
		$cargo = $_GET['cargo'];
	}
	try {
		require_once("funciones/bd_conexion.php");
		$sql = "UPDATE `empleados` SET ";
		$sql .= "`nombre` = '{$nombre}', ";
		$sql .= "`apellido` = '{$apellido}', ";
		$sql .= "`cedula` = '{$cedula}', ";
		$sql .= "`telefono` = '{$telefono}',";
		$sql .= "`departamento_id` = '{$departamento}', ";
		$sql .= "`cargo_id` = '{$cargo}' ";
		$sql .= "WHERE `id` = '{$id}'  ";
		$resultado = $conn->query($sql);

	} catch (Exception $e) {
		$error -> $e->getMessage();
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
				<?php var_dump($_GET); ?>
			</pre>
			<?php 	
				if($resultado){
					echo "Empleado actualizado <br><hr><br>";
				} else{
					echo "Ocurrio un error " . $conn->error;
				}
			 ?>
		<a href="empleados.php">Agregar otro empleado</a>
		</div>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
<?php $conn->close(); ?>
</body>
</html>
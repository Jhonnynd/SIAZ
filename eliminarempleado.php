	<?php 
	if (isset ($_GET['id'])){
		$id = $_GET['id'];
	}
	try {
		require_once("funciones/bd_conexion.php");
		$sql = "DELETE FROM `empleados` ";
		$sql .= "WHERE `id` = '{$id}'";
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
			<?php 	
				if($resultado){
					echo "<h2>";
					echo "Empleado eliminado corrrectamente. <br><hr><br>";
					echo "</h2>";
				} else{
					echo "<h2>";
					echo "Ocurrio un error " . $conn->error;
					echo "</h2>";
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
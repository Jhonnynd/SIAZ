<?php session_start(); 
	$varsession = $_SESSION['usuario'];
	if($varsession == null || $varsession = ''){
		header ("location:index.php");
	}
	if(isset($_POST['nombre']) || trim($_POST['nombre']) !=""){
		$nombre = $_POST['nombre'];
	}
	if(isset($_POST['apellido']) || trim($_POST['apellido']) !=""){
		$apellido = $_POST['apellido'];
	}
	if(isset($_POST['cedula']) || trim($_POST['cedula']) !=""){
		$cedula = $_POST['cedula'];
	}
	if(isset($_POST['telefono']) || trim($_POST['telefono']) !=""){
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
		$sql = " INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `cargo_id`, `departamento_id`) ";
		$sql .= " VALUES (NULL, '{$nombre}', '{$apellido}', '{$cedula}', '{$telefono}', {$cargo}, {$departamento}) ";
		$resultado = $conn->query($sql);
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
			echo "Empleado agregado. Haz click en atrás para volver a la página anterior.";
			echo "</h2>";
			}else{
			echo "<h2>";
			echo "Ha ocurrido un error. Haz click en atrás para volver a la página anterior.";
			echo "</h2> <br>";
			echo $conn->error;
			} ?>	
		<div class="volver">
			<a class="btnvolver" href="empleados.php">Volver</a>
		</div>
		</div>
	</div>
<footer>
	<div>
	<a href="funciones/close.php">Cerrar sesíón</a>
	</div>
</footer>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
<?php 
	$conn->close(); 
?>
</body>
</html>
<?php session_start(); 
	$varsession = $_SESSION['usuario'];
	if($varsession == null || $varsession = ''){
		header ("location:index.php");
	}
if (isset ($_GET['id'])){
	$id = $_GET['id'];
}
	try {
		require_once("funciones/bd_conexion.php");
		$sql = " SELECT * FROM empleados ";
		$sql .=" WHERE id = {$id} ";
		$conn->set_charset('utf8');
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
	<link rel="stylesheet" href="css/estilos.css">
	<script>
		function validarcombobox(){
		var departamentos = document.getElementById("departamento").selectedIndex;
		var cargos = document.getElementById("cargo").selectedIndex;
		if( departamentos != 0 && cargos != 0) {
		        document.getElementById("agregar").disabled=false;
		    }else{
		        document.getElementById("agregar").disabled=true;
		    }
		}
	</script>
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
			<h2>Editar empleado:</h2>
			<form class="agregar-empleado clearfix" action="actualizarempleado.php" method="GET">
					<?php while($registro = $resultado->fetch_assoc()) { ?>
			<div class="left">
				<div class="campo">
					<label for="nombre">Nombre: <br> </label>
						<input type="text" value="<?php echo $registro['nombre'] ?>" name="nombre" id="nombre" placeholder="Nombre">
				</div>

				<div class="campo">
					<label for="apellido">Apellido:<br></label>
						<input type="text" value="<?php echo $registro['apellido'] ?>" name="apellido" id="apellido" placeholder="Apellido">
				</div>

				<div class="campo">
					<label for="cedula">Número de cédula:<br></label>
						<input type="text" value="<?php echo $registro['cedula'] ?>" name="cedula" id="cedula" placeholder="Número de cédula">
				</div>

				<div class="campo">
					<label for="telefono">Teléfono:<br></label>
						<input type="text" value="<?php echo $registro['telefono'] ?>" name="telefono" id="telefono" placeholder="Teléfono">
				</div>
			</div>

			 <div class="right">
				<div class="campo">
					<label for="departamento" >Departamento:<br>
						<select name="departamento" id="departamento" value="-Any-" onChange="validarcombobox()">>
							<option value="0">Selecciona un departamento</option>
							<option value="1">Viajes y Turismo</option>
						</select>
					</label>
				</div>
				<div class="campo">
					<label for="cargo">Cargo:<br>
						<select name="cargo" id="cargo" value="-Any-" onChange="validarcombobox()">>
							<option value="0">Selecciona un cargo</option>
							<option value="1">Administrador</option>
							<option value="2">Gerente</option>
							<option value="3">Administrador de caja</option>
							<option value="4">Asesor de viajes</option>
						</select>
					</label>
				</div>
				<input type="hidden" name="id" value="<?php echo $registro["id"]; ?>">
				<input class="agregar" type="submit" value="Modificar empleado">
			</div>
		<?php } ?>	
			</form>
		</div>
	</div>
<footer>
	<div>
	<a href="funciones/close.php">Cerrar sesíón</a>
	</div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
<?php $conn->close(); ?>
</body>
</html>
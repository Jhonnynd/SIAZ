<?php session_start(); 
	$varsession = $_SESSION['usuario'];
	if($varsession == null || $varsession = ''){
		header ("location:index.php");
	}
	try {
		require_once("funciones/bd_conexion.php");
		$sql = " SELECT empleados.id, nombre, apellido, cedula, telefono, departamentos.departamento, cargos.cargo FROM empleados ";
		$sql .=" INNER JOIN departamentos ON departamentos.id = empleados.departamento_id ";
		$sql .=" INNER JOIN cargos ON cargos.id = empleados.cargo_id ";
		$sql .=" ORDER BY apellido ASC ";
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
			<h2>Agregar un empleado nuevo:</h2>
			<form class="agregar-empleado clearfix" action="crearempleado.php" method="POST" onsubmit="return validar();">
			<div class="left">
				<div class="campo">
					<label for="nombre">Nombre: <br> </label>
						<input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
				</div>

				<div class="campo">
					<label for="apellido">Apellido:<br></label>
						<input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
				</div>

				<div class="campo">
					<label for="cedula">Número de cédula:<br></label>
						<input type="text" name="cedula" id="cedula" placeholder="Número de cédula" required>
				</div>

				<div class="campo">
					<label for="telefono">Teléfono:<br></label>
						<input type="tel" name="telefono" id="telefono" placeholder="Teléfono" required>
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
				<input class="agregar" id="agregar" type="submit" value="Agregar empleado" disabled>
			</div>
			</form>
			
			<div class="contenido existentes">
				<h3>Empleados existentes</h3>
				<p class="empleados-registrados">
					Número de empleados registrados en el sistema: <?php echo $resultado->num_rows; ?>
				</p>
		<div class="table-responsive-vertical">
			<table class ="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Cédula</th>
					<th>Teléfono</th>
					<th>Departamento</th>
					<th>Cargo</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				 <?php while($registros = $resultado->fetch_assoc() ){ ?>
				 	<tr>
				 		<td data-title="Apellido"> 
				 			<?php echo $registros['apellido']; ?> 
				 		</td>
				 		<td data-title="Nombre">
				 		 	<?php echo $registros['nombre']; ?> 
				 		</td>
				 		<td data-title="Cedula"> 
				 			<?php echo $registros['cedula']; ?> 
				 		</td>
				 		<td data-title="Telefono">
				 		 	<?php echo $registros['telefono']; ?> 
				 		</td>
				 		<td data-title="Departamento"> 
				 			<?php echo $registros['departamento']; ?> 
				 		</td>
				 		<td data-title="Cargo"> 
				 		 	<?php echo $registros['cargo']; ?> 
				 		</td>
			 			<td data-title=""> 
				 			<a class ="boton editar" href="editarempleado.php?id=<?php echo $registros['id']; ?>">Editar</a>
						</td>
				 		<td  data-title="" class="eliminar">
				 			<a class ="boton eliminar" id="eliminar"  onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado? Esta acción no se puede deshacer.');" href="eliminarempleado.php?id=<?php echo $registros['id']; ?>">Borrar</a>
				 		</td>
				 	</tr>
				 	<?php  }?>
			</tbody>
		</table>
	</div>
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
<?php $conn->close(); ?>
</body>
</html>
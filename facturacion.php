<?php 
	try {
		require_once("funciones/bd_conexion.php");
		$sql = " SELECT empleados.id, nombre, apellido, cedula, telefono, departamentos.departamento, cargos.cargo FROM empleados ";
		$sql .=" INNER JOIN departamentos ON departamentos.id = empleados.departamento_id ";
		$sql .=" INNER JOIN cargos ON cargos.id = empleados.cargo_id ";
		$sql .=" ORDER BY apellido ASC ";
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
			function confirmarBorrado(){
			confirm("¿Deseas borrar este empleado? Esta acción no se puede deshacer.");
			if (confirmar == true){
			continue;
			}
			else{
				window.location = "empleados.php";
			}		
			}
		
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
						<li><a href="empleados.php">Empleados</a></li>
						<li><a href="boleteria.php">Boletería</a></li>
						<li><a class="activo" href="facturacion.php">Facturacion</a></li>
					</ul>
			</nav>
		</div>
		<div class="contenido">
			<h2>Facturas generadas</h2>
			
			<div class="contenido existentes">
				<h3>Facturas en total</h3>
				<p class="empleados-registrados">
					Número de facturas registradas en el sistema: <?php echo $resultado->num_rows; ?>
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

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
<?php $conn->close(); ?>
</body>
</html>
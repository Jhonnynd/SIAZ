<?php session_start();
	try {
		require_once("funciones/bd_conexion.php");
		$sql = " SELECT idFactura, apellidoCliente, nombreCliente, cedulaCliente, destinos_salida.destino as salida, destinos_llegada.destino as llegada, fecha_salida FROM facturas ";
		$sql .=" INNER JOIN destinos as destinos_salida ON destinos_salida.idDestino = facturas.idDestino_salida  ";
		$sql .=" INNER JOIN destinos as destinos_llegada ON destinos_llegada.idDestino = facturas.idDestino_llegada ";
		$sql .=" ORDER BY apellidoCliente ASC ";
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
					<th>Factura</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Cédula</th>
					<th>Salida</th>
					<th>Fecha de salida</th>
					<th>Llegada</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				 	 <?php while($registros = $resultado->fetch_assoc() ){ ?>
				 	<tr>
				 		<td data-title="Factura"> 
				 			<?php echo $registros['idFactura']; ?> 
				 		</td>
				 		<td data-title="Apellido">
				 		 	<?php echo $registros['apellidoCliente']; ?> 
				 		</td>
				 		<td data-title="Nombre"> 
				 			<?php echo $registros['nombreCliente']; ?> 
				 		</td>
				 		<td data-title="Cedula">
				 		 	<?php echo $registros['cedulaCliente']; ?> 
				 		</td>
				 		<td data-title="Salida"> 
				 			<?php echo $registros['salida']; ?> 
				 		</td>
				 		<td data-title="Fecha de salida"> 
				 		 	<?php echo $registros['fecha_salida']; ?> 
				 		</td>
				 		<td data-title="Llegada"> 
				 		 	<?php echo $registros['llegada']; ?> 
				 		</td>
			 			<td data-title=""> 
				 			<a class ="boton editar" href="editarempleado.php?id=<?php echo $registros['idFactura']; ?>">Imprimir</a>
						</td>
				 		<td data-title="" class="eliminar">
				 			<a class ="boton eliminar" id="eliminar"  onclick="return confirm('¿Estás seguro de que quieres eliminar esta factura? Esta acción no se puede deshacer.');" href="eliminarfactura.php?id=<?php echo $registros['idFactura']; ?>">Borrar</a>
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
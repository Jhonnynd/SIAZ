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
	try {
		require_once("funciones/bd_conexion.php");
		$sql = " SELECT idFactura, apellidoCliente, nombreCliente, cedulaCliente, telefonoCliente, destinos_salida.destino as salida, destinos_llegada.destino as llegada, fecha_salida, fecha_llegada, hora_salida, hora_llegada, aereolineas.aereolinea as aereolinea, costo, forma_pago.pago as pago FROM facturas ";
		$sql .=" INNER JOIN destinos as destinos_salida ON destinos_salida.idDestino = facturas.idDestino_salida  ";
		$sql .=" INNER JOIN destinos as destinos_llegada ON destinos_llegada.idDestino = facturas.idDestino_llegada ";
		$sql .=" INNER JOIN aereolineas ON aereolineas.idAereolinea = facturas.aereolinea_id ";
		$sql .=" INNER JOIN forma_pago ON forma_pago.idPago = facturas.idForma_pago ";
		$sql .=" ORDER BY apellidoCliente";
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
	<title>Sistema de Información Administrativo ZUMAQUE</title>
	<style>
		table {
			border-collapse: collapse;
		}
		.logo-zumaque{
			text-align: left;
		}
		p{
			margin: 0;
		}
		div.cliente-info{
		margin-top: 40px;
		}
		div.info {
		text-transform: uppercase;
		font-weight: bold;
		}
		div.info h1, h2{
			text-align: center;
		}
		div.info h1{
			margin-bottom: 3px;
		}
		div.info h2{
			margin-top: 0;
		}
		div.vuelo {
			margin-top:20px;
		}
		div.vuelo p{
			text-transform: uppercase;
			padding-bottom: 3px;
		}
		.bold{
			font-weight: bold;
		}
		table{
			width: 100%;
			margin: 20px auto 0 auto;
			text-align: center;
		}
		div.existentes  table {
		 width: 100%;
		 border-collapse: collapse;
		}
		table tr th{
			padding: 10px 14px;
		}
		table tr td{
			padding: 10px 3px;
			line-height: 20px;
		}
		div.costos{
			text-align: center;
			margin: 40px 0 0 70%;
		}
		div.costos p{
			margin: 3px;
		}
		p.total{
		font-size: 23px;
		}
		p.total-text{
			font-size: 18px;
		}
	</style>
</head>
<body>

	<div class="header">
				<img class="logo-zumaque" src="img/logo.jpg" alt="">
				<p>Viajes y Turismo ZUMAQUE, C.A.</p>
				<p></p>
				<p>Viajes@zumaque.net</p>
				<p>Fecha de emisión: <?php date_default_timezone_set('America/Caracas'); $date = date('d/m/Y h:i:s a', time()); echo $date; ?></p>
	</div>	
	<div class="info">
	<h1>Informe de facturas</h1>
	<h2>Facturas generadas en total: <?php echo $resultado->num_rows; ?> </h2>	
	</div>
	<div class="vuelo existentes">
	<hr>
				<table border="1" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Ref</th>
					<th>Apellido</th>
					<th>Nombre</th>
					<th>Cédula</th>
					<th>Aéreolinea</th>
					<th>Fecha</th>
					<th>Salida</th> 
					<th>Llegada</th>
					<th>Pago</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody> 
				 	 <?php while($registros = $resultado->fetch_assoc() ){ ?>
				 	 	<?php $total = ( $registros['costo'] * 0.18 ) + $registros['costo']; ?>
				 	<tr>
				 		<td data-title="Referencia"> 
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
				 		<td data-title="Aereolinea">
				 		 	<?php echo $registros['aereolinea']; ?> 
				 		</td>
				 		<td data-title="Fecha de salida"> 
				 		 	<?php echo date("d/m/Y", strtotime($registros['fecha_salida'])); ?> 
				 		</td>
				 		<td data-title="Salida"> 
				 			<?php echo $registros['salida']; ?> 
				 		</td>
				 		
				 		<td data-title="Llegada"> 
				 		 	<?php echo $registros['llegada']; ?> 
				 		</td>
				 		<td data-title="pago"> 
				 		 	<?php echo $registros['pago']; ?> 
				 		</td>
				 		<td data-title="Total"> 
				 		 	<?php echo $total; ?> 
				 		</td>
					</tr> 
					<?php } ?>
			</tbody>
		</table>
</div>
<div class="costos">
	<p class="bold total-text">TOTAL GANADO</p>
	<?php $suma = $conn->query("SELECT SUM(costo) as costo_value FROM facturas"); ?>
	<?php $row = $suma->fetch_assoc(); ?>
	<?php $sum = $row['costo_value']; ?>
	<p class="total"><?php echo ($sum * 0.18 ) + $sum; ?> BsS</p>
</div>
		<?php $conn->close(); ?>
</body>
</html>

<!--

				<pre>
				 		<?php var_dump($registros); ?>
				 	</pre> 	
						


	-->
	<!--<tr>
				 		<td data-title="Aereolinea">
				 		 	<?php echo $registros['aereolinea']; ?> 
				 		</td>
				 		<td data-title="Fecha de salida"> 
				 		 	<?php echo date("d/m/Y", strtotime($registros['fecha_salida'])); ?> 
				 		</td>
				 		<td data-title="Salida"> 
				 			<?php echo $registros['salida']; ?> 
				 		</td>
				 		<td data-title="Hora de salida"> 
				 		 	<?php echo date("h:i a", strtotime($registros['hora_salida'])); ?> 
				 		</td>
				 		<td data-title="Fecha de llegada"> 
				 		 	<?php echo date("d/m/Y", strtotime($registros['fecha_llegada'])); ?>  
				 		</td>
				 		<td data-title="Llegada"> 
				 		 	<?php echo $registros['llegada']; ?> 
				 		</td>
				 		<td data-title="Hora de llegada"> 
				 		 	<?php echo date("h:i a", strtotime($registros['hora_llegada'])); ?> 
				 		</td>-->
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
if (isset ($_GET['id'])){
	$id = $_GET['id'];
}
	try {
		require_once("funciones/bd_conexion.php");
		$sql = " SELECT idFactura, apellidoCliente, nombreCliente, cedulaCliente, telefonoCliente, destinos_salida.destino as salida, destinos_llegada.destino as llegada, fecha_salida, fecha_llegada, hora_salida, hora_llegada, aereolineas.aereolinea as aereolinea, costo FROM facturas ";
		$sql .=" INNER JOIN destinos as destinos_salida ON destinos_salida.idDestino = facturas.idDestino_salida  ";
		$sql .=" INNER JOIN destinos as destinos_llegada ON destinos_llegada.idDestino = facturas.idDestino_llegada ";
		$sql .=" INNER JOIN aereolineas ON aereolineas.idAereolinea = facturas.aereolinea_id ";
		$sql .=" WHERE idFactura = {$id} ";
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
		
		div.existentes table tr td{
			padding: 10px 26px;
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
 <?php $registros = $resultado->fetch_assoc() ?>
	<div class="header">
				<img class="logo-zumaque" src="img/logo.jpg" alt="">
				<p>Viajes y Turismo ZUMAQUE, C.A.</p>
				<p></p>
				<p>Viajes@zumaque.net</p>
				<p>Emitido <?php date_default_timezone_set('America/Caracas'); $date = date('d/m/Y h:i:s a', time()); echo $date; ?></p>
	</div>	
	<div class="info">
	<h1>Billete electrónico</h1>
	<h2>Recibo del pasajero</h2>	
	<p>Nombre: <span><?php echo $registros['apellidoCliente'] . " " . $registros['nombreCliente'] ; ?></span> </p>
	<p>Número de cédula: <span>V<?php echo $registros['cedulaCliente']; ?></span> </p>
	<p>Número de contacto: <span><?php echo $registros['telefonoCliente']; ?></span> </p>
	<p>Referencia de factura: <span><?php echo $registros['idFactura']; ?></span> </p>
	</div>

	<div class="vuelo existentes">
	<p class="bold">Itinerario</p> 	
	<hr>
	<p>Aéreolinea: <span><?php echo $registros['aereolinea']; ?></span> </p>
	<?php 
	//Unix
	setlocale(LC_TIME, 'es_ES.UTF-8');
	 //Windows
	setlocale(LC_TIME, 'spanish'); 
	 ?>
	<p>SALIDA: <span><?php echo $registros['salida']; ?></span> </p>
	<p>LLEGADA: <span><?php echo $registros['llegada']; ?></span> </p>

				<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Aéreolinea</th>
					<th>Fecha de salida</th>
					<th>Salida</th> 
					<th>Hora de salida</th> 
					<th>Fecha de llegada</th>
					<th>Llegada</th>
					<th>Hora de llegada</th>
				</tr>
			</thead>
			<tbody> 
						<?php $total = ( $registros['costo'] * 0.18 ) + $registros['costo']; ?>
					<tr>
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
				 		</td>
				 	</tr>

			</tbody>
		</table>
	</div>
		<div class="costos"> 
		<p class="bold">COSTO DEL BOLETO:</p>
		<p><?php echo $registros['costo'] . " BsS"; ?></p>
		<p class="bold">IVA 18%</p>
		<p> <?php echo $registros['costo'] * 0.18 . " BsS"; ?> </p>
		<p class="bold total-text">TOTAL:</p>
		<p class="bold total"> <?php echo $total . " BsS"; ?> </p>
	</div>
<?php $conn->close(); ?>
</body>
</html>

<!--

				<pre>
				 		<?php var_dump($registros); ?>
				 	</pre> 	
						


	-->
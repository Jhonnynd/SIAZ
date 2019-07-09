
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

		<div class="contenido">
			
			<form class="agregar-empleado clearfix" action="registrocompleto.php" method="POST" onsubmit="return validar();">
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
						<input type="text" name="telefono" id="telefono" placeholder="Teléfono" required>
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

				<div class="campo">
					<label for="usuario">Usuario:<br></label>
					<input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
				</div>

				<div class="campo">
					<label for="password">Contraseña:<br></label>
					<input type="password" name="password" id="password" placeholder="Contraseña" required>
				</div>

				<input class="agregar" id="agregar" type="submit" value="Registrar" disabled>
			</div>
		
			</form>
		</div>
</div>
</body>
</html>
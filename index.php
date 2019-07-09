<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Información Administrativo ZUMAQUE</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body class="login">
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
			<form action="funciones/validar.php" method="POST">
			<div class="campo">
					<label for="usuario">Usuario:<br></label>
					<i class="fa fa-user-o icons" aria-hidden="false"></i>
					<input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
				</div>

				<div class="campo">
					<label for="password">Contraseña:<br></label>
					<i class="fa fa-lock icons" aria-hidden="false"></i>
					<input type="password" name="password" id="password" placeholder="Contraseña" required>
				</div>
				<input class="agregar" type="submit" value="Iniciar sesión">
				</form>
				<p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
		</div>
</div>
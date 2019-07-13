<?php 
	require_once("funciones/bd_conexion.php");
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
	if(isset($_POST['usuario']) || trim($_POST['usuario']) !=""){
		$usuario = $_POST['usuario'];
	}
	if(isset($_POST['password']) || trim($_POST['password']) !=""){
		$password = $_POST['password'];
	}
	if(isset($_POST['departamento'])){
		$departamento = $_POST['departamento'];
	}
	if(isset($_POST['cargo'])){
		$cargo = $_POST['cargo'];
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
		<?php 
		$sql = "SELECT * FROM empleados WHERE usuario = '{$usuario}' LIMIT 1 ";
		$resultado = $conn->query($sql);
		$verificarUsuario = 0;
		while ($verificacion = mysqli_fetch_object($resultado)){
			if ($verificacion->usuario == $usuario){
				$verificarUsuario = 1;
			}
		}
		if ($verificarUsuario == 1) {
			echo "<h2>";
			echo "El usuario ingresado ya esta registrado en nuestra base de datos, por favor elige otro. Haz click en atrás para volver a la página anterior.";
			echo "</h2> <br>";
		} else {
				try {
						$sql = " INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `usuario`, `password`, `cargo_id`, `departamento_id`) ";
						$sql .= " VALUES (NULL, '{$nombre}', '{$apellido}', '{$cedula}', '{$telefono}', '{$usuario}', '{$password}', '{$cargo}', '{$departamento}') ";
						$result = $conn->query($sql);
						} catch (Exception $e) {
						$error = $e->getMessage();
					} 
				if($result){
				echo "<h2>";
				echo "Te has registrado con éxito. Haz click en atrás para volver a la página anterior.";
				echo "</h2>";
				} else{
				echo "<h2>";
				echo "Ha ocurrido un error. Haz click en atrás para volver a la página anterior.";
				echo "</h2> <br>";
				echo $conn->error;
				}
			} ?>
		<div class="volver">
		<a class="btnvolver" href="index.php">Volver</a>
		</div>
		</div>
</div>
</body>
</html>
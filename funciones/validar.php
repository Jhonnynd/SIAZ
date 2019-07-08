<?php session_start();
require_once("bd_conexion.php");
$usuario=$_POST['usuario'];
$password=$_POST['password'];

$consulta = "SELECT * FROM empleados WHERE usuario='$usuario' AND password ='$password' ";
$respuesta = mysqli_query($conn, $consulta);

$filas = mysqli_num_rows($respuesta);

if ($filas > 0) {
	$_SESSION['usuario'] = $usuario;
	header ("location:../inicio.php");
} else{
	echo "Error en la autentificación. Por favor vuelve atrás y revisa los datos. <br> <br>"; 
	echo "<a class=\"btnvolver\" href=\"../index.php\">Volver</a>";
}
mysqli_free_result($respuesta);
 ?>
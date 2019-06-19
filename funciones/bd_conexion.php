<?php 
	
	$conn = new mysqli("localhost", "root", "", "siaz");
	if($conn->connect_error){
		echo $error = $conn->connect_error;
	}

 ?>
<?php session_start();

require 'bd_conexion.php';
require 'validar.php';

session_destroy();

header ("location:../index.php");



 ?>

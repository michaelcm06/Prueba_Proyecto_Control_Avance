<?php
$conexion = null;
$servidor = 'localhost'; // Servidor Local.
$bd='registro'; // Base de datos.
$user = 'root'; // Usuario de MySQL.
$pass = ''; // Contraseña de MySQL.
try{
	//Cadena de conexion a la base de datos.
	$conexion = new PDO('mysql:host='.$servidor.';dbname='.$bd, $user, $pass);
}catch (PDOException $e){
	echo "Error de conexion!";
	exit;
}
return $conexion;
?>
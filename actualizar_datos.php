<?php
if ($_POST){
	$cod = $_POST['txtCodigo'];
	$td = $_POST['txtTDoc'];
	$id = $_POST['txtDoc'];
	$nom = $_POST['txtNombres'];
	$rep = $_POST['txtRepresentante'];
	$tel = $_POST['txtTelefono'];
	$dir = $_POST['txtDir'];
	$fech = $_POST['txtFecha'];
	$email = $_POST['txtEmail'];
	$mot = $_POST['txtMotivo'];
	$est = $_POST['txtES'];
	require_once('conexion.php');
	$conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'UPDATE personas SET td=:td, identificacion=:i, nombre=:n, representante=:r, telefono=:t, direccion=:d, fecha_ing=:f, Email=:e, motivo=:m, estado=:es WHERE id=:cod';
	$stmt = $conexion->prepare($sql);
	$stmt->bindParam(":td", $td);
	$stmt->bindParam(":i", $id);
	$stmt->bindParam(":n", $nom);
	$stmt->bindParam(":r", $rep);
	$stmt->bindParam(":t", $tel);
	$stmt->bindParam(":d", $dir);
	$stmt->bindParam(":f", $fech);
	$stmt->bindParam(":e", $email);
	$stmt->bindParam(":m", $mot);
	$stmt->bindParam(":es", $est);
	$stmt->bindParam(":cod", $cod);
	$stmt->execute();
	print("<script> alert('Registro actualizado con correctamente!');</script>");
	print("<script> window.location.replace('actualizar.php');</script>");
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Proyecto CRUD | Proyecto Control de Avance</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="in.php">Proyecto Control de Avance</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link active" href="registrar.php">Registrar empresa <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="consultar.php">Consultar <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="eliminar.php">Eliminar <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="actualizar.php">Actualizar <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
	
	<div class="container-sm" style="margin-top:1%">
			<form method="POST" action="registrar.php">
				<p>Por favor, diligencie todos los campos de este formulario.</p>
				<div class="form-group">
					<select name="txtTD" class="form-control" required>
						<option value="CC">Cédula de ciudadanía</option>
						<option value="NI">NIT</option>
					</select>
				</div>

				<div class="form-group">
					<label for="txtDoc">Identificación</label>
					<input type="text" class="form-control" name="txtDoc" placeholder="Ingrese identificación" required>
				</div>

				<div class="form-group">
					<label for="txtNombres">Nombre de la compañia</label>
					<input type="text" class="form-control" name="txtNombres" placeholder="Ingrese Nombre de la compañia" required>
				</div>

				<div class="form-group">
					<label for="txtRepresentante">Representante</label>
					<input type="text" class="form-control" name="txtRepresentante" placeholder="Ingrese Represnetante Legal" required>
				</div>

				<div class="form-group">
					<label for="txtTelefono">Teléfono</label>
					<input type="number" class="form-control" name="txtTelefono" placeholder="Ingrese Teléfono o celular" required>
				</div>

				<div class="form-group">
					<label for="txtDir">Dirección</label>
					<input type="text" class="form-control" name="txtDir" placeholder="Ingrese la dirección" required>
				</div>

				<div class="form-group">
					<label for="txtFecha">Fecha</label>
					<input type="date" class="form-control" name="txtFecha" placeholder="Ingrese la fecha de ingreso" required>
				</div>

				<div class="form-group">
					<label for="txtEmail">Email</label>
					<input type="text" class="form-control" name="txtEmail" placeholder="Ingrese correo electronico" required>
				</div>

				<div class="form-group">
					<label for="txtMotivo">Ticket</label>
					<input type="text" class="form-control" name="txtMotivo" placeholder="Ingrese el tipo de ticket" required>
				</div>
				<p>Estado del Ticket</p>
				<div class="form-group">
					<select name="txtES" class="form-control" required>
						<option value="AC">Activo</option>
						<option value="PR">En Proceso</option>
						<option value="FI">Finalizado</option>
					</select>
				</div>

				<input type="submit" class="btn btn-primary" value="Registrar">
			</form>
			<?php
			if ($_POST){
				$td = $_POST['txtTD'];
				$id = $_POST['txtDoc'];
				$nom = $_POST['txtNombres'];
				$ape = $_POST['txtRepresentante'];
				$tel = $_POST['txtTelefono'];
				$dir = $_POST['txtDir'];
				$fech = $_POST['txtFecha'];
				$email = $_POST['txtEmail'];
				$mot = $_POST['txtMotivo'];
				$est = $_POST['txtES'];
				require_once('conexion.php');
				$conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = 'INSERT INTO personas (td, identificacion, nombre, representante, telefono, direccion, fecha_ing, email, motivo, estado) VALUES (:td, :i, :n, :r, :t, :d, :f, :e, :m, :es)';
				$stmt = $conexion->prepare($sql);
				$stmt->bindParam(":td", $td);
				$stmt->bindParam(":i", $id);
				$stmt->bindParam(":n", $nom);
				$stmt->bindParam(":r", $ape);
				$stmt->bindParam(":t", $tel);
				$stmt->bindParam(":d", $dir);
				$stmt->bindParam(":f", $fech);
				$stmt->bindParam(":e", $email);
				$stmt->bindParam(":m", $mot);
				$stmt->bindParam(":es", $est);
				$stmt->execute();
				print("<script> alert('Registro guardado con éxito');</script>");
			}
			?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
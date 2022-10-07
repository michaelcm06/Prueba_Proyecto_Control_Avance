<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Actualizar Personas | Proyecto Control de Avance</title>
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
					<a class="nav-link" href="registrar.php">Registrar empresa<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="consultar.php">Consultar <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="eliminar.php">Eliminar <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="actualizar.php">Actualizar <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="container-sm" style="margin-top:1%">
			<form action="actualizar.php" method="POST">
				<div class="form-group">
					<label for="txtTD">Tipo Documento</label>
					<select name="txtTD" class="form-control">
						<option value="CC">Cédula de ciudadanía</option>
						<option value="NI">NIT</option>
					</select>
				</div>
				<div class="form-group">
					<label for="txtID">Ingrese Identificación</label>
					<input type="text" class="form-control" name="txtID" placeholder="Indentificación" required>
				</div>
				<input type="submit" class="btn btn-success" value="Buscar">
			</form>
			<?php 
			if($_POST){
				$td = $_POST['txtTD'];
				$id = $_POST['txtID'];
				require_once('conexion.php');
				$conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$SQL = 'SELECT * FROM personas WHERE td=:td AND identificacion=:id';
				$stmt = $conexion->prepare($SQL);
				$stmt->bindParam('td', $td);
				$stmt->bindParam('id', $id);
				$result = $stmt->execute();
				$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
				if(count($rows)){
					foreach ($rows as $row) {
						?>
						<form method="POST" action="actualizar_datos.php" >
							<p>Por favor, diligencie todos los campos de este formulario, para actualizar.</p>
							<input type="hidden" name="txtCodigo" readonly value="<?php print($row['id']) ?>" />
							<div class="form-group">
								<select name="txtTDoc" class="form-control" required>
									<option value="CC">Cédula de ciudadanía</option>
									<option value="NI">NIT</option>
								</select>
							</div>

							<div class="form-group">
								<label for="txtDoc">Identificación</label>
								<input type="text" class="form-control" name="txtDoc" placeholder="Ingrese identificación" required value="<?php print($row['identificacion']) ?>">
							</div>

							<div class="form-group">
								<label for="txtNombres">Nombre de la compañia</label>
								<input type="text" class="form-control" name="txtNombres" placeholder="Ingrese Nombre del la compañia" required value="<?php print($row['nombre']) ?>">
							</div>

							<div class="form-group">
								<label for="txtRepresentante">Representante</label>
								<input type="text" class="form-control" name="txtRepresentante" placeholder="Ingrese Representante Legañ" required value="<?php print($row['representante']) ?>">
							</div>

							<div class="form-group">
								<label for="txtTelefono">Teléfono</label>
								<input type="number" class="form-control" name="txtTelefono" placeholder="Ingrese Teléfono o celular" required  value="<?php print($row['telefono']) ?>">
							</div>

							<div class="form-group">
								<label for="txtDir">Dirección</label>
								<input type="text" class="form-control" name="txtDir" placeholder="Ingrese la dirección" required value="<?php print($row['direccion']) ?>">
							</div>

							<div class="form-group">
								<label for="txtFecha">Fecha</label>
								<input type="date" class="form-control" name="txtFecha" placeholder="Ingrese la fecha de ingreso" required value="<?php print($row['fecha_ing']) ?>">
							</div>

							<div class="form-group">
								<label for="txtEmail">Email</label>
								<input type="text" class="form-control" name="txtEmail" placeholder="Ingrese correo electronico" required value="<?php print($row['email']) ?>">
							</div>

							<div class="form-group">
								<label for="txtMotivo">Ticket</label>
								<input type="text" class="form-control" name="txtMotivo" placeholder="Ingrese el tipo de ticket" required value="<?php print($row['motivo']) ?>">
							</div>

							<p>Estado del Ticket.</p>
								<input type="hidden" name="txtES" readonly value="<?php print($row['estado']) ?>" />
							<div class="form-group">
								<select name="txtES" class="form-control" required>
									<option value="AC">Activo</option>
									<option value="PR">En Proceso</option>
									<option value="FI">Finalizado</option>
								</select>
							</div>


							<input type="submit" class="btn btn-success" value="Actualizar persona">
						</form>	

						<?php
					}
				}else{
					?>
					<div class="alert alert-danger" role="alert" style="margin-top:1%">
						<b>Aviso:</b> ¡El usuario no existe!.
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
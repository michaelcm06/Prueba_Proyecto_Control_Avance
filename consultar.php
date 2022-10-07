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
					<a class="nav-link" href="registrar.php">Registrar empresa <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="consultar.php">Consultar <span class="sr-only">(current)</span></a>
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
	<div class="container-sm">Filtrar un registro:
	<div class="input-group mb-3">
    <input type="text" class="form-control" id="txtBusqueda" onkeyup="Buscar();" placeholder="Escribe para buscar" aria-label="Username" aria-describedby="basic-addon1">
    </div>
			<table class="table caption-top" id="tblPersonas">
				<caption>Lista de personas</caption>
				<thead>
					<tr>
						<th scope="col">TD</th>
						<th scope="col">Documento</th>
						<th scope="col">Nombre</th>
						<th scope="col">Representante</th>
						<th scope="col">Teléfono</th>
						<th scope="col">Dirección</th>
						<th scope="col">Fecha</th>
						<th scope="col">Email</th>
						<th scope="col">Ticket</th>
						<th scope="col">Estado</th>
					</tr>
				</thead>
				<tbody>
					<?php  
					require_once('conexion.php');
					$SQL = 'SELECT id, td, identificacion, nombre, representante, telefono, direccion, fecha_ing, email, motivo, estado FROM personas';
					$stmt = $conexion->prepare($SQL);
					$result = $stmt->execute();
					$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
					foreach ($rows as $row) {
						?>
						<tr>
							<td><?php print($row['td']) ?></td>
							<td><?php print($row['identificacion']) ?></td>
							<td><?php print($row['nombre']) ?></td>
							<td><?php print($row['representante']) ?></td>
							<td><?php print($row['telefono']) ?></td>
							<td><?php print($row['direccion']) ?></td>
							<td><?php print($row['fecha_ing']) ?></td>
							<td><?php print($row['email']) ?></td>
							<td><?php print($row['motivo']) ?></td>
							<td><?php print($row['estado']) ?></td>
						</tr>
						<?php    	
					}
					?>
				</tbody>
			</table>
		</div>

	</div>
	<script>
	function Eliminar (i) {
    document.getElementsByTagName("table")[0].setAttribute("id","tableid");
    document.getElementById("tableid").deleteRow(i);
    }
function Buscar() {
            var tabla = document.getElementById('tblPersonas');
            var busqueda = document.getElementById('txtBusqueda').value.toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";
            for (var i = 1; i < tabla.rows.length; i++) {
                cellsOfRow = tabla.rows[i].getElementsByTagName('td');
                found = false;
                for (var j = 0; j < cellsOfRow.length && !found; j++) { compareWith = cellsOfRow[j].innerHTML.toLowerCase(); if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1))
                    {
                        found = true;
                    }
                }
                if(found)
                {
                    tabla.rows[i].style.display = '';
                } else {
                    tabla.rows[i].style.display = 'none';
                }
            }
        }
	</script>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Centros</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>


		<div class="contenedor-tablas">
			<h1>Centros</h1>
			<table>
					<td class="titulos"><label>X</label></td>
					<td class="titulos"><label>Nombre</label></td>
					<td class="titulos"><label>Telefono</label></td>
					<td class="titulos"><label>Direccion</label></td>
					<td class="titulos"><label>Localidad</label></td>
					<td class="titulos"><label>CIF</label></td>

					<?php

						require('../conexion.php');

						$query="SELECT * FROM centros ORDER BY CIF";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {

							echo "<tr align='center'> <td><a href='update_centros.php?id=" . $extraido['CIF'] . "'> <img src='../img/edit.svg' alt='edit'> </a></td>";
							
							echo "<td>".$extraido['Nombre']."</td>";
							echo "<td>".$extraido['Tlf_cent']."</td>";
							echo "<td>".$extraido['Direccion']."</td>";
							echo "<td>".$extraido['Localidad']."</td>";
							echo "<td>".$extraido['CIF']."</td>";
						}
					?>
			</table>
			<div class="botones">
				<input type="button"  class="insert" name="insert" value="Insertar" onclick="window.location.href='insertar_centros.php'">
				<input type="button" class="delete" name="delete" value="Eliminar" onclick="window.location.href='borrar_centros.php'">
				<input type="button" class="volver" name="volver" value="Volver" onclick="window.location.href='../index.php'">
			</div>

			<h1>Buscar Centros</h1>
			<form method="post">
				<select name="eleccion">
					<option value="Nombre">Nombre</option>
					<option value="Tlf_cent">Telefono</option>
					<option value="Direccion">Direccion</option>
					<option value="Localidad">Localidad</option>
					<option value="CIF">CIF</option>
				</select>
				<input type="name"  name="campo">
				<input type="submit" class="insert" name="buscarLocalidad" value="Buscar">
			</form>
			<table>
				<td class="titulos"><label>X</label></td>
				<td class="titulos"><label>Nombre</label></td>
				<td class="titulos"><label>Telefono</label></td>
				<td class="titulos"><label>Direccion</label></td>
				<td class="titulos"><label>Localidad</label></td>
				<td class="titulos"><label>CIF</label></td>
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eleccion']) && isset($_POST['campo']) && isset($_POST['buscarLocalidad'])) {
						require('../conexion.php');
						
						$campo = $_POST['campo'];
						$eleccion = $_POST['eleccion'];

						
						$camposPermitidos = ['Nombre', 'Tlf_cent', 'Direccion', 'Localidad', 'CIF'];
						if (!in_array($eleccion, $camposPermitidos)) {
							echo "La elección no es válida.";
							exit();
						}

						
						$campo = mysqli_real_escape_string($link, $campo);

						
						$query = "SELECT * FROM centros WHERE $eleccion LIKE '%$campo%'";
						$resultado = mysqli_query($link, $query);

						
						while ($extraido = mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_centros.php?id=" . $extraido['CIF'] . "'> <img src='../img/edit.svg' alt='edit'> </a></td>";

							echo "<td>" . $extraido['Nombre'] . "</td>";
							echo "<td>" . $extraido['Tlf_cent'] . "</td>";
							echo "<td>" . $extraido['Direccion'] . "</td>";
							echo "<td>" . $extraido['Localidad'] . "</td>";
							echo "<td>" . $extraido['CIF'] . "</td>";
						}
					}
					?>
			</table>		

		</div>
	</body>
</html>
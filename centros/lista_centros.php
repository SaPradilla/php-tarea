<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Centros</title>
	</head>
	<body>


		<div>
			<table border="1">
					<td><label>X</label></td>
					<td><label>Nombre</label></td>
					<td><label>Telefono</label></td>
					<td><label>Direccion</label></td>
					<td><label>Localidad</label></td>
					<td><label>CIF</label></td></tr>

					<?php

						require('../conexion.php');

						$query="SELECT * FROM centros ORDER BY CIF";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_centros.php?id=" . $extraido['CIF'] . "'>Editar</a></td>";
							echo "<td>".$extraido['Nombre']."</td>";
							echo "<td>".$extraido['Tlf_cent']."</td>";
							echo "<td>".$extraido['Direccion']."</td>";
							echo "<td>".$extraido['Localidad']."</td>";
							echo "<td>".$extraido['CIF']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_centros.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_centros.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
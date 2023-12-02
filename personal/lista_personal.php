<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Personal</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo</label></td>
					<td><label>Nombre</label></td>
					<td><label>Telefono</label></td>
					<td><label>Direccion</label></td>
					<td><label>Puesto</label></td>
					<td><label>Salario</label></td>
					<td><label>Formacion</label></td>
					<td><label>CIF</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM personal ORDER BY Cod_per";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['Cod_per']."</td>";
							echo "<td>".$extraido['Nom_com']."</td>";
							echo "<td>".$extraido['Tlf_per']."</td>";
							echo "<td>".$extraido['Direccion']."</td>";
							echo "<td>".$extraido['Puesto_per']."</td>";
							echo "<td>".$extraido['Salario_per']."</td>";
							echo "<td>".$extraido['Formacion']."</td>";
							echo "<td>".$extraido['Ca_CIF']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_personal.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_personal.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Profesores</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Codigo</label></td>
					<td><label>Nombre</label></td>
					<td><label>Formacion</label></td>
					<td><label>Direccion</label></td>
					<td><label>Especialidad</label></td>
					<td><label>Telefono</label></td>
					<td><label>Salario</label></td>
					<td><label>CIF</label></td>
					<td><label>Curso</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM profesores ORDER BY Cod_pro";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'><td>".$extraido['Cod_pro']."</td>";
							echo "<td>".$extraido['Nom_com_pro']."</td>";
							echo "<td>".$extraido['Formacion_pro']."</td>";
							echo "<td>".$extraido['Direcc_pro']."</td>";
							echo "<td>".$extraido['Especialidad']."</td>";
							echo "<td>".$extraido['Tlf_pro']."</td>";
							echo "<td>".$extraido['Salario_pro']."</td>";
							echo "<td>".$extraido['CA1_CIF']."</td>";
							echo "<td>".$extraido['curso']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_profesores.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_profesores.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
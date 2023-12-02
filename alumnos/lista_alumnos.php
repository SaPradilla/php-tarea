<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Alumnos</title>
	</head>
	<body>


		<div>
			<table border="1">
					<td><label>X</label></td>
					<td><label>Codigo</label>
					<td><label>Nombre</label></td>
					<td><label>Telefono</label></td>
					<td><label>Direccion</label></td>
					<td><label>Codigo Curso</label></td></tr>

					<?php

						
    					require('../conexion.php');

						$query="SELECT * FROM alumnos ORDER BY Cod_alum";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_alumnos.php?id=" . $extraido['Cod_alum'] . "'>Editar</a></td>";
							echo "<td>".$extraido['Cod_alum']."</td>";
							echo "<td>".$extraido['Nom_com_alu']."</td>";
							echo "<td>".$extraido['Tlf_alum']."</td>";
							echo "<td>".$extraido['Direc_alum']."</td>";
							echo "<td>".$extraido['Ca_Cod_curso']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_alumnos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_alumnos.php'">
			<!-- <input type="button" name="update" value="Editar" onclick="window.location.href='actualizar_alumnos.php'"> -->
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
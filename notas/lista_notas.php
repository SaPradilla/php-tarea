<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Notas</title>
	</head>
	<body>


		<div>
			<table border="1">
			<td><label>X</label></td>

				<td>Codigo Del Curso</td>
					<td><label>Codigo Del Alumno</label></td>
					<td><label>Nota</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM nota ORDER BY Ca_Cod_alum";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_nota.php?id=" . $extraido['Ca1_Cod_curso'] . "'>Editar</a></td>";

							echo "<td>".$extraido['Ca1_Cod_curso']."</td>";
							echo "<td>".$extraido['Ca_Cod_alum']."</td>";
							echo "<td>".$extraido['Nota']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_notas.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_nota.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Cursos</title>
	</head>
	<body>


		<div>
			<table border="1">
					<td><label>X</label></td>
					<td><label>Nombre Del Curso</label></td>
					<td><label>Codigo Del Curso</label></td>
					<td><label>Codigo del Profesor</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM cursos ORDER BY Cod_curso";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_cursos.php?id=" . $extraido['Id_curso'] . "'>Editar</a></td>";
							echo "<td>".$extraido['Nom_cur']."</td>";
							echo "<td>".$extraido['Cod_curso']."</td>";
							echo "<td>".$extraido['Ca_Cod_pro']."</td></tr>";
						}
					?>
			</table>
			<input type="button" name="insert" value="Insertar" onclick="window.location.href='insertar_cursos.php'">
			<input type="button" name="delete" value="Eliminar" onclick="window.location.href='borrar_cursos.php'">
			<input type="button" name="volver" value="Volver" onclick="window.location.href='../index.php'">
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css">
		<title>Lista De Cursos</title>
	</head>
	<body>
		<div class="contenedor-tablas">
			<h1>Cursos</h1>
			<table >
					<td class="titulos"><label>X</label></td>
					<td class="titulos"><label>Nombre Del Curso</label></td>
					<td class="titulos"><label>Codigo Del Curso</label></td>
					<td class="titulos"><label>Codigo del Profesor</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM cursos ORDER BY Cod_curso";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_cursos.php?id=" . $extraido['Id_curso'] . "'> <img src='../img/edit.svg' alt='edit'> </a></td>";

							echo "<td>".$extraido['Nom_cur']."</td>";
							echo "<td>".$extraido['Cod_curso']."</td>";
							echo "<td>".$extraido['Ca_Cod_pro']."</td></tr>";
						}
					?>
			</table>
			<div class="botones">
				<input type="button" class="insert" name="insert" value="Insertar" onclick="window.location.href='insertar_cursos.php'">
				<input type="button" class="delete" name="delete" value="Eliminar" onclick="window.location.href='borrar_cursos.php'">
				<input type="button" class="volver" name="volver" value="Volver" onclick="window.location.href='../index.php'">
			</div>

			<h1>Estudiantes Inscriptos</h1>

			<table >

					<td class="titulos"><label>Codigo Estudiante</label></td>
					<td class="titulos"><label>Estudiante</label></td>
					<td class="titulos"><label>Curso</label></td></tr>

					<?php

						require('../conexion.php');

						$query="SELECT * FROM alumnos INNER JOIN cursos ON alumnos.Ca_Cod_curso= cursos.Cod_curso";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {

							echo "<tr><td>".$extraido['Cod_alum']."</td>";
							echo "<td>".$extraido['Nom_com_alu']."</td>";
							echo "<td>".$extraido['Nom_cur']."</td></tr>";
						}
					?>
			</table>	
		</div>
	</body>
</html>
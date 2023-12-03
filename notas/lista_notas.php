<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Notas</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>


		<div class="contenedor-tablas">
			<h1>Notas</h1>

			<table>
				<td class="titulos"><label>X</label></td>
				<td class="titulos">Codigo Del Curso</td>
				<td class="titulos"><label>Codigo Del Alumno</label></td>
				<td class="titulos"><label>Nota</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM nota ORDER BY Ca_Cod_alum";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_nota.php?id=" . $extraido['Ca1_Cod_curso'] . "'> <img src='../img/edit.svg' alt='edit'> </a></td>";

							echo "<td>".$extraido['Ca1_Cod_curso']."</td>";
							echo "<td>".$extraido['Ca_Cod_alum']."</td>";
							echo "<td>".$extraido['Nota']."</td></tr>";
						}
					?>
			</table>
			<div class="botones">
				<input type="button" class="insert" name="insert" value="Insertar" onclick="window.location.href='insertar_notas.php'">
				<input type="button" class="delete" name="delete" value="Eliminar" onclick="window.location.href='borrar_nota.php'">
				<input type="button" class="volver" name="volver" value="Volver" onclick="window.location.href='../index.php'">
			</div>
			<h1>Mejores Notas </h1>

			<table>
					<td class="titulos"><label>Nota</label></td>
					<td class="titulos"><label>Estudiante</label></td>
					<td class="titulos"><label>Curso</label></td></tr>

					<?php
    					require('../conexion.php');
						$query="SELECT DISTINCT  alumnos.Nom_com_alu, cursos.Nom_cur, nota.Nota FROM alumnos INNER JOIN nota ON alumnos.Cod_alum = nota.Ca_Cod_alum INNER JOIN cursos ON nota.Ca1_Cod_curso= cursos.Cod_curso WHERE nota.nota > 4 ORDER BY alumnos.Nom_com_alu";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							
							echo "<tr><td>".$extraido['Nota']."</td>";
							echo "<td>".$extraido['Nom_com_alu']."</td>";
							echo "<td>".$extraido['Nom_cur']."</td></tr>";
		
						}
					?>
			</table>	
		</div>
	</body>
</html>
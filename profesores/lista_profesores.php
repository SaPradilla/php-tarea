<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Profesores</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>


		<div class="contenedor-tablas">
			<h1>Profesores</h1>	
			<table>
					<td class="titulos"><label>X</label></td>
				 	<td class="titulos"><label>Codigo</label></td>
					<td class="titulos"><label>Nombre</label></td>
					<td class="titulos"><label>Formacion</label></td>
					<td class="titulos"><label>Direccion</label></td>
					<td class="titulos"><label>Especialidad</label></td>
					<td class="titulos"><label>Telefono</label></td>
					<td class="titulos"><label>Salario</label></td>
					<td class="titulos"><label>CIF</label></td>
					<td class="titulos"><label>Curso</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM profesores ORDER BY Cod_pro";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {
							echo "<tr align='center'> <td><a href='update_profesores.php?id=" . $extraido['Cod_pro'] . "'> <img src='../img/edit.svg' alt='edit'> </a></td>";
							echo "<td>".$extraido['Cod_pro']."</td>";

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
			<div class="botones">
				<input type="button" class="insert" name="insert" value="Insertar" onclick="window.location.href='insertar_profesores.php'">
				<input type="button" class="delete" name="delete" value="Eliminar" onclick="window.location.href='borrar_profesores.php'">
				<input type="button" class="volver" name="volver" value="Volver" onclick="window.location.href='../index.php'">
			</div>
			<h1>Quien tiene el mejor salio?</h1>
			<table>
				
				 	<td class="titulos"><label>Codigo</label></td>
					<td class="titulos"><label>Nombre</label></td>
					<td class="titulos"><label>Formacion</label></td>
					<td class="titulos"><label>Direccion</label></td>
					<td class="titulos"><label>Especialidad</label></td>
					<td class="titulos"><label>Telefono</label></td>
					<td class="titulos"><label>Salario</label></td>
					<td class="titulos"><label>CIF</label></td>
					<td class="titulos"><label>Curso</label></td></tr>

					<?php

						require('../conexion.php');
						$query = "SELECT * FROM profesores ORDER BY Salario_pro DESC LIMIT 1";
						$resultado = mysqli_query($link, $query);

						while ($extraido = mysqli_fetch_array($resultado)) {
							echo "<tr><td>".$extraido['Cod_pro']."</td>";
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

		</div>
	</body>
</html>
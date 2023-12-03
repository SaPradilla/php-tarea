<!DOCTYPE html>
<html>
	<head>
		<title>Lista De Personal</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<div class="contenedor-tablas">
			<h1>Personal</h1>
			<table>
				<td class="titulos"><label>X</label></td>
				<td class="titulos"><label>Codigo</label></td>
				<td class="titulos"><label>Nombre</label></td>
				<td class="titulos"><label>Telefono</label></td>
				<td class="titulos"><label>Direccion</label></td>
				<td class="titulos"><label>Puesto</label></td>
				<td class="titulos"><label>Salario</label></td>
				<td class="titulos"><label>Formacion</label></td>
				<td class="titulos"><label>CIF</label></td></tr>

					<?php

						require('../conexion.php');
						$query="SELECT * FROM personal ORDER BY Cod_per";
						$resultado=mysqli_query($link,$query);

						while ($extraido= mysqli_fetch_array($resultado)) {

							echo "<tr align='center'> <td><a href='update_personal.php?id=" . $extraido['Cod_per'] . "'> <img src='../img/edit.svg' alt='edit'> </a></td>";

							echo "<td>".$extraido['Cod_per']."</td>";
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
			<div class="botones">
				<input type="button" class="insert" name="insert" value="Insertar" onclick="window.location.href='insertar_personal.php'">
				<input type="button" class="delete" name="delete" value="Eliminar" onclick="window.location.href='borrar_personal.php'">
				<input type="button" class="volver" name="volver" value="Volver" onclick="window.location.href='../index.php'">
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>
	<html>
	<head>
		<title>Borrar Profesores</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<?php

			if (isset($_POST['eliminar'])) {
				require('../conexion.php');
				$borrar=$_POST['borrar'];
				$nfilas= count($borrar);

				for ($i=0; $i < $nfilas ; $i++) {

			        $instruccion="DELETE FROM profesores WHERE Cod_pro=$borrar[$i]";
			        $consulta=mysqli_query($link,$instruccion) or die("Fallo La Eliminacion");
				}
				mysqli_close ($link);
				echo "<P>[ <A HREF='borrar_profesores.php'>Eliminar Mas Profesores</A> ]</P>";
			}

			else
			{
		?>


		<div>
			<form method="POST" action="borrar_profesores.php">
				<div class="contenedor-tablas">
					<h1>Profesores</h1>
					<table >
						<td class="titulos">X</td>
						<td class="titulos">Codigo</td>
						<td class="titulos">Nombre</td>
						<td class="titulos">Formacion</td>
						<td class="titulos">Direccion</td>
						<td class="titulos">Especialidad</td>
						<td class="titulos">Telefono</td>
						<td class="titulos">Salario</td>
						<td class="titulos">CIF</td>
						<td class="titulos">Curso</td>
							<?php 
								require('../conexion.php');
								$query="SELECT * FROM profesores ORDER BY Cod_pro";
								$resultado= mysqli_query($link,$query);
	
								while ($extraido=mysqli_fetch_array($resultado)) {
									echo "<tr align='center'> <td><input type='CHECKBOX' name='borrar[]' value='".$extraido['Cod_pro']."'></td>";
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
						<input type="submit" class="delete" name="eliminar" value="Eliminar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_profesores.php'">
					</div>
				</div>
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
<!DOCTYPE html>
	<html>
	<head>
		<title>Borrar Cursos</title>
	</head>
	<body>
		<?php

			if (isset($_POST['eliminar'])) {
				require('../conexion.php');
				$borrar=$_POST['borrar'];
				$nfilas= count($borrar);

				for ($i=0; $i < $nfilas ; $i++) {

					$instruccion="DELETE FROM cursos WHERE Cod_curso=$borrar[$i]";
			        $consulta=mysqli_query($link,$instruccion) or die("Fallo La Eliminacion");
				}
				mysqli_close ($link);
				echo "<P>[ <A HREF='borrar_cursos.php'>Eliminar Mas Cursos</A> ]</P>";
			}

			else
			{
		?>


		<div>
			<form method="POST" action="borrar_cursos.php">
				<table border="1">
					<tr align="center"><td>X</td>
					<td>Nombre</td>
					<td>Codigo Del Curso</td>
					<td>Codigo Del Profesor</td></tr>
						<?php 
							require('../conexion.php');
							$query="SELECT * FROM cursos ORDER BY Cod_curso";
							$resultado= mysqli_query($link,$query);

							while ($extraido=mysqli_fetch_array($resultado)) {
								echo "<tr align='center'> <td><input type='CHECKBOX' name='borrar[]' value='".$extraido['Cod_curso']."'></td>";
								echo "<td>".$extraido['Nom_cur']."</td>";
								echo "<td>".$extraido['Cod_curso']."</td>";
								echo "<td>".$extraido['Ca_Cod_pro']."</td></tr>";
							}
						?>
				</table>
				<input type="submit" name="eliminar" value="Eliminar">
				<input type="button" name="back" value="Volver" onclick="window.location.href='lista_cursos.php'">
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
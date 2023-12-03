<!DOCTYPE html>
	<html>
	<head>
		<title>Borrar Cursos</title>
		<link rel="stylesheet" href="../css/style.css">

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
				<div class="contenedor-tablas">
					<h1>Cursos</h1>
					<table >
						<td class="titulos">X</td>
						<td class="titulos">Nombre</td>
						<td class="titulos">Codigo Del Curso</td>
						<td class="titulos">Codigo Del Profesor</td>
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
					<div class="botones">
						<input type="submit" class="delete" name="eliminar" value="Eliminar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_cursos.php'">
					</div>
				</div>
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="../css/style.css">
		<title>Borrar Nota</title>
	</head>
	<body>
		<?php

			if (isset($_POST['eliminar'])) {
				require('../conexion.php');
				$borrar=$_POST['borrar'];
				$nfilas= count($borrar);

				for ($i=0; $i < $nfilas ; $i++) {

					$instruccion="DELETE FROM nota WHERE Ca_Cod_alum=$borrar[$i]";
			        $consulta=mysqli_query($link,$instruccion) or die("Fallo La Eliminacion");
				}
				mysqli_close ($link);
				echo "<P>[ <A HREF='borrar_nota.php'>Eliminar Mas Notas</A> ]</P>";
			}

			else
			{
		?>


		<div>
			<form method="POST" action="borrar_nota.php">
				<div class="contenedor-tablas">
					<h1>Notas</h1>
					<table >
						<td class="titulos">X</td>
						<td class="titulos">Codigo Del Curso</td>
						<td class="titulos">Codigo Del Estudiante</td>
						<td class="titulos">Nota</td>
							<?php 
								require('../conexion.php');
								$query="SELECT * FROM nota ORDER BY Ca_Cod_alum";
								$resultado= mysqli_query($link,$query);
	
								while ($extraido=mysqli_fetch_array($resultado)) {
									echo "<tr align='center'> <td><input type='CHECKBOX' name='borrar[]' value='".$extraido['Ca_Cod_alum']."'></td>";
									echo "<td>".$extraido['Ca1_Cod_curso']."</td>";
									echo "<td>".$extraido['Ca_Cod_alum']."</td>";
									echo "<td>".$extraido['Nota']."</td></tr>";
								}
							?>
					</table>
					<div class="botones">
						<input type="submit" class="delete" name="eliminar" value="Eliminar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_notas.php'">
					</div>
				</div>
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
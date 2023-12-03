<!DOCTYPE html>
	<html>
	<head>
		<title>Borrar Alumnos</title>
		<link rel="stylesheet" href="../css/style.css">
		
	</head>
	<body>
		<?php

			if (isset($_POST['eliminar'])) {
				require('../conexion.php');
				$borrar=$_POST['borrar'];
				$nfilas= count($borrar);

				for ($i=0; $i < $nfilas ; $i++) {

			        $instruccion="DELETE FROM alumnos WHERE Cod_alum=$borrar[$i]";
                    echo " <script> console.log($borrar[$i]) </script>";

			        $consulta=mysqli_query($link,$instruccion) or die("Fallo La Eliminacion");
				}
				mysqli_close ($link);
				echo "<P>[ <A HREF='borrar_alumnos.php'>Eliminar Mas Alumnos</A> ]</P>";
			}

			else
			{
		?>


		<div>
			<form method="POST" action="borrar_alumnos.php">
				<div class="contenedor-tablas">
					<h1>Alumnos</h1>
					<table>
						<td class="titulos">X</td>
						<td class="titulos">Codigo</td>
						<td class="titulos">Nombre</td>
						<td class="titulos">Telefono</td>
						<td class="titulos">Direccion</td>
						<td class="titulos">Codigo Curso</td>
							<?php 
								require('../conexion.php');
								$query="SELECT * FROM alumnos ORDER BY Cod_alum";
								$resultado= mysqli_query($link,$query);
	
								while ($extraido=mysqli_fetch_array($resultado)) {
									echo "<tr align='center'> <td><input type='CHECKBOX' name='borrar[]' value='".$extraido['Cod_alum']."'></td>";
									echo "<td>".$extraido['Cod_alum']."</td>";
									echo "<td>".$extraido['Nom_com_alu']."</td>";
									echo "<td>".$extraido['Tlf_alum']."</td>";
									echo "<td>".$extraido['Direc_alum']."</td>";
									echo "<td>".$extraido['Ca_Cod_curso']."</td></tr>";
								}
							?>
					</table>

					<div class="botones">
	
						<input type="submit" class="delete" name="eliminar" value="Eliminar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_alumnos.php'">
	
					</div>
				</div>
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
<!DOCTYPE html>
	<html>
	<head>
		<title>Borrar Centros</title>
	</head>
	<body>
		<?php

			if (isset($_POST['eliminar'])) {
				require('../conexion.php');
				$borrar=$_POST['borrar'];
				$nfilas= count($borrar);

				for ($i=0; $i < $nfilas ; $i++) {

					$instruccion="DELETE FROM centros WHERE CIF=$borrar[$i]";
			        $consulta=mysqli_query($link,$instruccion) or die("Fallo La Eliminacion");
				}
				mysqli_close ($link);
				echo "<P>[ <A HREF='borrar_centros.php'>Eliminar Mas Centros</A> ]</P>";
			}

			else
			{
		?>


		<div>
			<form method="POST" action="borrar_centros.php">
				<table border="1">
					<tr align="center"><td>X</td>
					<td>Nombre</td>
					<td>Telefono</td>
					<td>Direccion</td>
					<td>Localidad</td>
					<td>CIF</td></tr>
						<?php 
							require('../conexion.php');
							$query="SELECT * FROM centros ORDER BY CIF";
							$resultado= mysqli_query($link,$query);

							while ($extraido=mysqli_fetch_array($resultado)) {
								echo "<tr align='center'> <td><input type='CHECKBOX' name='borrar[]' value='".$extraido['CIF']."'></td>";
								echo "<td>".$extraido['Nombre']."</td>";
								echo "<td>".$extraido['Tlf_cent']."</td>";
								echo "<td>".$extraido['Direccion']."</td>";
								echo "<td>".$extraido['Localidad']."</td>";
								echo "<td>".$extraido['CIF']."</td></tr>";
							}
						?>
				</table>
				<input type="submit" name="eliminar" value="Eliminar">
				<input type="button" name="back" value="Volver" onclick="window.location.href='lista_centros.php'">
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
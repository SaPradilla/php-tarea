<!DOCTYPE html>
	<html>
	<head>
		<title>Borrar Centros</title>
		<link rel="stylesheet" href="../css/style.css">

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
				<div class="contenedor-tablas">
					<h1>Centros</h1>
					<table>
						<td class="titulos">X</td>
						<td class="titulos">Nombre</td>
						<td class="titulos">Telefono</td>
						<td class="titulos">Direccion</td>
						<td class="titulos">Localidad</td>
						<td class="titulos">CIF</td>
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
					<div class="botones">
						<input type="submit" class="delete" name="eliminar" value="Eliminar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_centros.php'">
					</div>
				</div>
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
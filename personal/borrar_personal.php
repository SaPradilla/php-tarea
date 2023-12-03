<!DOCTYPE html>
	<html>
	<head>
		<title>Borrar Personal</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<?php

			if (isset($_POST['eliminar'])) {
				require('../conexion.php');
				$borrar=$_POST['borrar'];
				$nfilas= count($borrar);

				for ($i=0; $i < $nfilas ; $i++) {

			        $instruccion="DELETE FROM personal WHERE Cod_per=$borrar[$i]";
			        $consulta=mysqli_query($link,$instruccion) or die("Fallo La Eliminacion");
				}
				mysqli_close ($link);
				echo "<P>[ <A HREF='borrar_personal.php'>Eliminar Mas Personal</A> ]</P>";
			}

			else
			{
		?>


		<div>
			<form method="POST" action="borrar_personal.php">
				<div class="contenedor-tablas">
					<h1>Personal</h1>					
					<table>
						<td class="titulos">X</td>
						<td class="titulos">Codigo</td>
						<td class="titulos">Nombre</td>
						<td class="titulos">Telefono</td>
						<td class="titulos">Direccion</td>
						<td class="titulos">Puesto</td>
						<td class="titulos">Salario</td>
						<td class="titulos">Formacion</td>
						<td class="titulos">CIF</td>
							<?php 
								require('../conexion.php');
								$query="SELECT * FROM personal ORDER BY Cod_per";
								$resultado= mysqli_query($link,$query);
	
								while ($extraido=mysqli_fetch_array($resultado)) {
									echo "<tr align='center'> <td><input type='CHECKBOX' name='borrar[]' value='".$extraido['Cod_per']."'></td>";
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
						<input type="submit" class="delete" name="eliminar" value="Eliminar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_personal.php'">
					</div>
				</div>
			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
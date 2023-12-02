<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Alumnos</title>
	</head>
	<body>
		<?php
		
			require('../conexion.php');

            $id = $_GET['id'];
            $sql= "SELECT * FROM alumnos WHERE Cod_alum='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);

		?>
			<div>
				<h2>Actualizar Alumno</h2>
				<form method="POST" action="actualizar_alumnos.php">
                    <input type="hidden" name="id" value="<?= $row['Cod_alum'] ?>">
					<table>
						<tr><td>Codigo: </td>
						<td><input type="number" name="cod_alum" value="<?= $row['Cod_alum']?>">


						</td>
                    </tr>

						<tr><td>Nombre: </td>
						<td><input type="name" name="nom_com_alu" value="<?= $row['Nom_com_alu']?>">
						</td></tr>

						<tr><td>Telefono: </td>
						<td><input type="name" name="tlf_alum" value="<?= $row['Tlf_alum']?>">

						</td></tr>

						<tr><td>Direccion: </td>
						<td><input type="name" name="direc_alum"  value="<?= $row['Direc_alum']?>">


						</td></tr>

						<tr><td>Codigo De Curso: </td>
						<td><select name="ca_cod_curso">
                            <option value="<?= $row['Ca_Cod_curso']?>"> <?= $row['Ca_Cod_curso']?></option>

							<?php
								require ('../conexion.php');
								$query= "SELECT * FROM cursos ORDER BY Cod_curso";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[Cod_curso]'>$extram ido[Cod_curso]</option>";
								}
							?>
							</select></td></tr>

					</table>
					<input type="submit" name="submit" value="Actualizar">
					<input type="button" name="back" value="Volver" onclick="window.location.href='lista_alumnos.php'">
				</form>
			</div>
		<?php
		
		?>
	</body>
</html>
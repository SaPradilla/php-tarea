<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Profesor</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<?php
            require('../conexion.php');
            $id = $_GET['id'];
            $sql= "SELECT * FROM profesores WHERE Cod_pro='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);

		?>
			<form method="POST" action="actualizar_profesores.php">
				<div class="contenedor-crear">

				<h1>Actualizar Profesor</h1>
                    <input type="hidden" name="id" value="<?= $row['Cod_pro'] ?>">
					<table>
						<tr><td>Nombre: </td>
						<td><input type="name" name="nom_com_pro" value="<?= $row['Nom_com_pro']?>">
						</td></tr>

						<tr><td>Formacion: </td>
						<td><input type="name" name="formacion_pro" value="<?= $row['Formacion_pro']?>">

						</td></tr>

						<tr><td>Direccion: </td>
						<td><input type="name" name="direcc_pro"  value="<?= $row['Direcc_pro']?>">
						</td></tr>

                        <tr><td>Especialidad: </td>
						<td><input type="name" name="especialidad"  value="<?= $row['Especialidad']?>">
						</td></tr>

                        <tr><td>Telefono: </td>
						<td><input type="name" name="tlf_pro"  value="<?= $row['Tlf_pro']?>">
						</td></tr>

                        <tr><td>Salario: </td>
						<td><input type="name" name="salario_pro"  value="<?= $row['Salario_pro']?>">
						</td></tr>

                        <tr><td>CIF: </td>
							<td><select name="ca1_cif">
                            <option value="<?= $row['CA1_CIF']?>"> <?= $row['CA1_CIF']?></option>

							<?php
								require('../conexion.php');

                                $query= "SELECT * FROM centros ORDER BY CIF";

								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[CIF]'>$extraido[CIF]</option>";
								}
							?>
							</select></td></tr>


                        <tr><td>Curso: </td>
							<td><select name="curso">
                            <option value="<?= $row['curso']?>"> <?= $row['curso']?></option>

							<?php
								require('../conexion.php');

                                $query= "SELECT * FROM cursos ORDER BY Nom_cur";

								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
                                    echo"<option value='$extraido[Nom_cur]'>$extraido[Nom_cur]</option>";

								}
							?>
						</select></td></tr>

                        </table>
					<div class="botones">
						<input type="submit" class="insert" name="submit" value="Actualizar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_profesores.php'">
					</div>
				</div>
			</form>
		<?php
		
		?>
	</body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Nota</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<?php
            require('../conexion.php');
            $id = $_GET['id'];
            $sql= "SELECT * FROM nota WHERE Ca1_Cod_curso='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);
		?>
			<form method="POST" action="actualizar_nota.php">
				<div class="contenedor-crear">
					<h1>Actualizar Nota</h1>
                    <input type="hidden" name="id" value="<?= $row['Ca1_Cod_curso']?>">
					<table>
					<tr><td>Codigo De Curso: </td>
						<td><select name="ca1_cod_curso">

                            <option value="<?= $row['Ca1_Cod_curso']?>"> <?= $row['Ca1_Cod_curso']?></option>

							<?php
								require('../conexion.php');
								$query= "SELECT * FROM cursos ORDER BY Cod_curso";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[Cod_curso]'>$extraido[Cod_curso]</option>";
								}
							?>
							</select></td></tr>

							<table>

							<tr><td>Codigo Alumno: </td>
							<td><select name="ca_cod_alum">
                            <option value="<?= $row['Ca_Cod_alum']?>"> <?= $row['Ca_Cod_alum']?></option>

							<?php
								require('../conexion.php');

								$query= "SELECT * FROM alumnos ORDER BY Cod_alum";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[Cod_alum]'>$extraido[Cod_alum]</option>";
								}
							?>
							</select></td></tr>

						<tr><td>Nota: </td>
						<td><input type="name" name="Nota"  value="<?= $row['Nota']?>">
						</td></tr>

					</table>
					<div class="botones">
						<input type="submit" class="insert" name="submit" value="Actualizar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_notas.php'">
					</div>

				</div>
			</form>
	</body>
</html>

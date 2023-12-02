<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Personal</title>
	</head>
	<body>
		<?php
            require('../conexion.php');
            $id = $_GET['id'];
            $sql= "SELECT * FROM personal WHERE Cod_per='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);

		?>
			<div>
				<h2>Actualizar Curso</h2>
				<form method="POST" action="actualizar_personal.php">
                    <input type="hidden" name="id" value="<?= $row['Cod_per'] ?>">
					<table>
						<tr><td>Nombre: </td>
						<td><input type="name" name="nom_com" value="<?= $row['Nom_com']?>">
						</td></tr>

						<tr><td>Telefono: </td>
						<td><input type="name" name="tlf_per" value="<?= $row['Tlf_per']?>">

						</td></tr>

						<tr><td>Direccion: </td>
						<td><input type="name" name="direccion"  value="<?= $row['Direccion']?>">
						</td></tr>

                        <tr><td>Puesto: </td>
						<td><input type="name" name="puesto_per"  value="<?= $row['Puesto_per']?>">
						</td></tr>

                        <tr><td>Salario: </td>
						<td><input type="name" name="salario_per"  value="<?= $row['Salario_per']?>">
						</td></tr>

                        <tr><td>Formacion: </td>
						<td><input type="name" name="formacion"  value="<?= $row['Formacion']?>">
						</td></tr>

                        <tr><td>CIF: </td>
							<td><select name="ca_cif">
                            <option value="<?= $row['Ca_CIF']?>"> <?= $row['Ca_CIF']?></option>

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

					</table>
					<input type="submit" name="submit" value="Actualizar">
					<input type="button" name="back" value="Volver" onclick="window.location.href='lista_personal.php'">
				</form>
			</div>
		<?php
		
		?>
	</body>
</html>
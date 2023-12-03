<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Centros</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<?php
            require('../conexion.php');

            $id = $_GET['id'];
            $sql= "SELECT * FROM centros WHERE CIF='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);

		?>
			<form method="POST" action="actualizar_centros.php">
				<div class="contenedor-crear">
					<h1>Actualizar Centro</h1>
                    <input type="hidden" name="id" value="<?= $row['CIF'] ?>">
					<table>
						<tr><td>Nombre: </td>
						<td><input type="name" name="nombre" value="<?= $row['Nombre']?>">
						</td></tr>

						<tr><td>Telefono: </td>
						<td><input type="name" name="tlf_cent" value="<?= $row['Tlf_cent']?>">

						</td></tr>

						<tr><td>Direccion: </td>
						<td><input type="name" name="direccion"  value="<?= $row['Direccion']?>">
						</td></tr>

						<tr><td>Localidad: </td>
						<td><input type="name" name="localidad"  value="<?= $row['Localidad']?>">
						</td></tr>
                        <tr><td>CIF: </td>
						<td><input type="name" name="cif"  value="<?= $row['CIF']?>">
						</td></tr>

					</table>
					<div class="botones">
						<input type="submit" class="insert" name="submit" value="Actualizar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_centros.php'">
					</div>

				</div>
			</form>
		<?php
		
		?>
	</body>
</html>
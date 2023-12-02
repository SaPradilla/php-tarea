<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Centros</title>
	</head>
	<body>
		<?php
            require('../conexion.php');

            $id = $_GET['id'];
            $sql= "SELECT * FROM centros WHERE CIF='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);

		?>
			<div>
				<h2>Actualizar Centro</h2>
				<form method="POST" action="actualizar_centros.php">
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
					<input type="submit" name="submit" value="Actualizar">
					<input type="button" name="back" value="Volver" onclick="window.location.href='lista_centros.php'">
				</form>
			</div>
		<?php
		
		?>
	</body>
</html>
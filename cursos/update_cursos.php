<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Cursos</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<?php
            require('../conexion.php');
            $id = $_GET['id'];
            $sql= "SELECT * FROM cursos WHERE Id_curso='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);

		?>
				<form method="POST" action="actualizar_cursos.php">
				<div class="contenedor-crear">
				<h1>Actualizar Curso</h1>
                    <input type="hidden" name="id" value="<?= $row['Id_curso'] ?>">
					<table>
						<tr><td>Nombre: </td>
						<td><input type="name" name="nombre" value="<?= $row['Nom_cur']?>">
						</td></tr>
 
						<tr><td>Codigo: </td>
						<td><input type="name" name="cod_curso" value="<?= $row['Cod_curso']?>">

						</td></tr>

						<tr><td>CaCOD: </td>
						<td><input type="name" name="Ca_Cod_pro"  value="<?= $row['Ca_Cod_pro']?>">
						</td></tr>
                        
					

					</table>
					<div class="botones">
						<input type="submit" class="insert" name="submit" value="Actualizar">
						<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_cursos.php'">
					</div>


				</div>
			</form>
		<?php
		
		?>
	</body>
</html>
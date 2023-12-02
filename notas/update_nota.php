<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>Actualizar Nota</title>
	</head>
	<body>
		<?php
            require('../conexion.php');
            $id = $_GET['id'];
            $sql= "SELECT * FROM nota WHERE Ca_Cod_curso='$id'";
            $resultado=mysqli_query($link,$sql);
            $row = mysqli_fetch_array($resultado);
		?>
			<div>
				<h2>Actualizar Nota</h2>
                <!-- Terminar aqui -->
				<form method="POST" action="actualizar-nota.php">
					<input type="name" name="nombre" value="<?= $row['Nom_cur']?>">

					<table>

						<tr><td>Codigo De Curso: </td>
						<td><select name="ca1_cod_curso">

						<tr><td>Codigo Del Alumno: </td>
						<td><select name="ca_cod_alum">

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
						<td><input type="name" name="nota"

							<?php

								if(isset($_POST['submit']))
									print("value= '$nota'>");
								else
									print(">");
								if($errores["not"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["not"]."</SPAN>");
							?>
						</td></tr>

					</table>
					<input type="submit" name="submit" value="Insertar">
					<input type="button" name="back" value="Volver" onclick="window.location.href='lista_notas.php'">
				</form>
			</div>
		<?php
		?>
		-- <div id="footer">
		--	<a href="logout.php">Logout</a>
		-- </div>
	</body>
</html>

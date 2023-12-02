<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insertar Nota</title>
	</head>
	<body>
		<?php
		$errores["not"] = "";
		$error = false;

		if (isset($_POST['submit']))
		{
			$nota= $_POST['nota'];
			$ca_cod_alum= $_POST['ca_cod_alum'];
			$ca1_cod_curso = $_POST['ca1_cod_curso'];

			if(empty($nota) || $nota < 0 || $nota > 5)
			{
				$errores["not"]= " Nota No Valida. ";
				$error=True;
			}
			else
				$errores['not']="";

		}

		if(isset($_POST['submit']) && $error== false)
		{
			require('../conexion.php');

			echo "<UL>";
			echo "	<P>Datos Ingresados: </P>";
			echo "	<LI>Codigo del curso: $ca1_cod_curso";
			echo "	<LI>Codigo del alumno: $ca_cod_alum";
			echo "	<LI>Nota: $nota";
			echo "</UL>";

			$query = "SELECT Cod_alum FROM alumnos WHERE Cod_alum = '$ca_cod_alum' AND CA_Cod_curso = '$ca1_cod_curso'";
			$resultado= mysqli_query($link,$query);
			if($resultado->num_rows == 1){
				$query= "INSERT INTO nota (Ca1_Cod_curso,Ca_Cod_alum,Nota) VALUES ($ca1_cod_curso,$ca_cod_alum,$nota)";

				mysqli_query($link,$query) or die
				("<P><center><b>No se pudo insertar informacion</b><br><A HREF='insertar_notas.php'>Volver</A></center></P>");

	        	echo "<P>[ <A HREF='insertar_notas.php'>Insertar Otra Nota</A> ]</P>\n";
			}else{
				echo "<P><center><b>No se pudo insertar informacion por que el estudiante no peretence a dicha asignatura</b><br><A HREF='insertar_notas.php'>Volver</A></center></P>";
			}
		}
		else
		{
		?>
			<div>
				<h2>Insertar Nota</h2>
				<form method="POST" action="insertar_notas.php">
					<table>

						<tr><td>Codigo De Curso: </td>
						<td><select name="ca1_cod_curso">

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
		}
		?>
		-- <div id="footer">
		--	<a href="logout.php">Logout</a>
		-- </div>
	</body>
</html>

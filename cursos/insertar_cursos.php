<!DOCTYPE html>
<html>
	<head>
		<title>Insertar Cursos</title>
	</head>
	<body>
		<?php
		$errores["nom"] = "";
		$errores["cod"] = "";
		$error = false;

		if (isset($_POST['submit'])) 
		{
			$nom_cur= $_POST['nom_cur'];
			$cod_curso= $_POST['cod_curso'];
			$ca_cod_pro= $_POST['ca_cod_pro'];

			if(empty($nom_cur))
			{
				$errores["nom"]= " Nombre No Valido. ";
				$error=True;
			}
			else
				$errores["nom"]="";

			if(empty($cod_curso)  || (!is_numeric($cod_curso)))
			{
				$errores["cod"]= " Codigo No Valido. ";
				$error=True;
			}
			else
				$errores["cod"]="";

		}

		if(isset($_POST['submit']) && $error== false)
		{
			require('../conexion.php');

			echo "<UL>";
			echo "	<P>Datos Ingresados: </P>";
			echo "	<LI>Nombre Del Curso: $nom_cur";
			echo "	<LI>Codigo Del Curso: $cod_curso";
			echo "	<LI>Codigo Del Profesor: $ca_cod_pro";
			echo "</UL>";

			$query= "INSERT INTO cursos (Nom_cur,Cod_curso,Ca_Cod_pro) VALUES ('$nom_cur',$cod_curso,$ca_cod_pro)";

			mysqli_query($link,$query) or die 
			("<P><center><b>No se pudo insertar informacion</b><br><A HREF='insertar_cursos.php'>Volver</A></center></P>");
		 
        	echo "<P>[ <A HREF='insertar_cursos.php'>Insertar Otro Curso</A> ]</P>\n";
		}
		else
		{
		?>
			<div>
				<h2>Insertar Curso</h2>
				<form method="POST" action="insertar_cursos.php">
					<table>

						<tr><td>Nombre Del Curso: </td>
						<td><input type="name" name="nom_cur"

							<?php

								if(isset($_POST['submit']))
									print("value= '$nom_cur'>");
								else
									print(">");
								if($errores["nom"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["nom"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Codigo Del Curso: </td>
						<td><input type="name" name="cod_curso"

							<?php

								if(isset($_POST['submit']))
									print("value= '$cod_curso'>");
								else
									print(">");
								if($errores["cod"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["cod"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Codigo Del Profesor: </td>
						<td><select name="ca_cod_pro">

							<?php
								require ('conexion.php');
								$query= "SELECT * FROM profesores ORDER BY Cod_pro";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[Cod_pro]'>$extraido[Cod_pro]</option>";
								}
							?>
							</select></td></tr>

					</table>
					<input type="submit" name="submit" value="Insertar">
					<input type="button" name="back" value="Volver" onclick="window.location.href='lista_cursos.php'">
				</form>
			</div>
		<?php
		}
		?>
	</body>
</html>
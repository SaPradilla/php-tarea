<!DOCTYPE html>
<html>
	<head>
		<title>Insertar Personal</title>
	</head>
	<body>
		<?php
		$errores["nom"] = "";
		$errores["cod"] = "";
		$errores["dir"] = "";
		$errores["sal"] = "";
		$errores["for"]="";
		$errores["tel"] = "";
		$errores["pue"] = "";
		$error = false;

		if (isset($_POST['submit'])) 
		{
			$cod_per= $_POST['cod_per'];
			$nom_com= $_POST['nom_com'];
			$tlf_per= $_POST['tlf_per'];
			$direccion= $_POST['direccion'];
			$puesto_per=$_POST['puesto_per'];
			$salario_per= $_POST['salario_per'];
			$formacion= $_POST['formacion'];
			$ca_cif=$_POST['ca_cif'];

			if(empty($cod_per) || (!is_numeric($cod_per)))
			{
				$errores["cod"]= " Codigo No Valido. ";
				$error=True;
			}
			else
				$errores["cod"]="";

			if(empty($nom_com))
			{
				$errores["nom"]= " Nombre No Valido. ";
				$error=True;
			}
			else
				$errores["nom"]="";


			if(empty($tlf_per) || (!is_numeric($tlf_per)))
			{
				$errores["tel"]= " Numero de Telefono No Valido. ";
				$error=True;
			}
			else
				$errores["tel"]="";

			if(empty($salario_per) || (!is_numeric($salario_per)))
			{
				$errores["sal"]= " Salario No Valido. ";
				$error=True;
			}
			else
				$errores["sal"]="";

			if(empty($direccion))
			{
				$errores["dir"]= " Direccion No Valido. ";
				$error=True;
			}
			else
				$errores["dir"]="";

			if(empty($puesto_per))
			{
				$errores["pue"]= " Puesto No Valido. ";
				$error=True;
			}
			else
				$errores["pue"]="";

			if(empty($formacion))
			{
				$errores["for"]= " Formacion No Valido. ";
				$error=True;
			}
			else
				$errores["for"]="";
		}

		if(isset($_POST['submit']) && $error== false)
		{
			require('../conexion.php');

			echo "<UL>";
			echo "	<P>Datos Ingresados: </P>";
			echo "	<LI>Codigo: $cod_per";
			echo "	<LI>Nombre: $nom_com";
			echo "	<LI>Telefono: $tlf_per";
			echo "	<LI>Direccion: $direccion";
			echo "	<LI>Puesto: $puesto_per";
			echo "	<LI>Salario: $salario_per";
			echo "	<LI>Formacion: $formacion";
			echo "	<LI>CIF: $ca_cif";
			echo "</UL>";

			$query= "INSERT INTO personal (Cod_per,Nom_com,Tlf_per,Direccion,Puesto_per,salario_per,Formacion,Ca_cif) VALUES ($cod_per,'$nom_com',$tlf_per,'$direccion','$puesto_per',$salario_per,'$formacion',$ca_cif)";

			mysqli_query($link,$query) or die 
			("<P><center><b>No se pudo insertar informacion</b><br><A HREF='insertar_personal.php'>Volver</A></center></P>");
		 
        	echo "<P>[ <A HREF='insertar_personal.php'>Insertar Otro Personal</A> ]</P>\n";
		}
		else
		{
		?>
			<div>
				<h2>Insertar Personal</h2>
				<form method="POST" action="insertar_personal.php">
					<table>

						<tr><td>Codigo Personal: </td>
						<td><input type="name" name="cod_per"

							<?php

								if(isset($_POST['submit']))
									print("value= '$cod_per'>");
								else
									print(">");
								if($errores["cod"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["cod"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Nombre: </td>
						<td><input type="name" name="nom_com"

							<?php

								if(isset($_POST['submit']))
									print("value= '$nom_com'>");
								else
									print(">");
								if($errores["nom"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["nom"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Telefono: </td>
						<td><input type="name" name="tlf_per"

							<?php

								if(isset($_POST['submit']))
									print("value= '$tlf_per'>");
								else
									print(">");
								if($errores["tel"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["tel"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Direccion: </td>
						<td><input type="name" name="direccion"

							<?php

								if(isset($_POST['submit']))
									print("value= '$direccion'>");
								else
									print(">");
								if($errores["dir"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["dir"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Puesto: </td>
						<td><input type="name" name="puesto_per"

							<?php

								if(isset($_POST['submit']))
									print("value= '$puesto_per'>");
								else
									print(">");
								if($errores["pue"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["pue"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Salario: </td>
						<td><input type="name" name="salario_per"

							<?php

								if(isset($_POST['submit']))
									print("value= '$salario_per'>");
								else
									print(">");
								if($errores["sal"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["sal"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Formacion: </td>
						<td><input type="name" name="formacion"

							<?php

								if(isset($_POST['submit']))
									print("value= '$formacion'>");
								else
									print(">");
								if($errores["for"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["for"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>CIF: </td>
						<td><select name="ca_cif">

							<?php
								require ('conexion.php');
								$query= "SELECT * FROM centros ORDER BY CIF";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[CIF]'>$extraido[CIF]</option>";
								}
							?>
							</select></td></tr>

					</table>
					<input type="submit" name="submit" value="Insertar">
					<input type="button" name="back" value="Volver" onclick="window.location.href='lista_personal.php'">
				</form>
			</div>
		<?php
		}
		?>
	</body>
</html>
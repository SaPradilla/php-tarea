<!DOCTYPE html>
<html>
	<head>
		<title>Insertar Alumnos</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<?php
		$errores["nombre"] = "";
		$errores["direccion"] = "";
		$errores["telefono"] = "";
		$errores["codigo"] = "";
		$errores["cod_curso"]="";
		$error = false;

		if (isset($_POST['submit'])) 
		{
			$nom_com_alu= $_POST['nom_com_alu'];
			$direc_alum= $_POST['direc_alum'];
			$tlf_alum= $_POST['tlf_alum'];
			$cod_alum= $_POST['cod_alum'];
			$ca_cod_curso=$_POST['ca_cod_curso'];

			if(empty($cod_alum) || (!is_numeric($cod_alum)))
			{
				$errores["codigo"]= " Codigo No Valido. ";
				$error=True;
			}
			else
				$errores["codigo"]="";

			if(empty($nom_com_alu))
			{
				$errores["nombre"]= " Nombre No Valido. ";
				$error=True;
			}
			else
				$errores["nombre"]="";


			if(empty($tlf_alum) || (!is_numeric($tlf_alum)))
			{
				$errores["telefono"]= " Numero de Telefono No Valido. ";
				$error=True;
			}
			else
				$errores["telefono"]="";

			if(empty($direc_alum))
			{
				$errores["direccion"]= " Direccion No Valido. ";
				$error=True;
			}
			else
				$errores["direccion"]="";

			if(empty($ca_cod_curso))
			{
				$errores["cod_curso"]= " Numero de Curso No Valido. ";
				$error=True;
			}
			else
				$errores["cod_curso"]="";
		}

		if(isset($_POST['submit']) && $error== false)
		{
			require('../conexion.php');
			

			echo "<UL>";
			echo "	<P>Datos Ingresados: </P>";
			echo "	<LI>Codigo: $cod_alum ";
			echo "	<LI>Nombre: $nom_com_alu";
			echo "	<LI>Telefono: $tlf_alum";
			echo "	<LI>Direccion: $direc_alum";
			echo "	<LI>Codigo De Curso: $ca_cod_curso";
			echo "</UL>";

			$query= "INSERT INTO alumnos (Cod_alum,Nom_com_alu,Tlf_alum,Direc_alum,Ca_Cod_curso) VALUES ($cod_alum,'$nom_com_alu',$tlf_alum,'$direc_alum',$ca_cod_curso)";

			mysqli_query($link,$query) or die 
			("<P><center><b>No se pudo insertar informacion</b><br><A HREF='insertar_alumnos.php'>Volver</A></center></P>");
		 
        	echo "<P>[ <A HREF='insertar_alumnos.php'>Insertar Otro Alumno</A> ]</P>\n";
		}
		else
		{
		?>
			<div>
				<form method="POST" action="insertar_alumnos.php">
					<div class="contenedor-crear">
						
						<h1>Insertar Alumno</h1>
						<table>
	
							<tr><td>Codigo: </td>
							<td><input type="name" name="cod_alum"
	
								<?php
	
									if(isset($_POST['submit']))
										print("value= '$cod_alum'>");
									else
										print(">");
									if($errores["codigo"] != "")
										print("<BR><SPAN CLASS= 'error'>".$errores["codigo"]."</SPAN>");
								?>
							</td></tr>
	
							<tr><td>Nombre: </td>
							<td><input type="name" name="nom_com_alu"
	
								<?php
	
									if(isset($_POST['submit']))
										print("value= '$nom_com_alu'>");
									else
										print(">");
									if($errores["nombre"] != "")
										print("<BR><SPAN CLASS= 'error'>".$errores["nombre"]."</SPAN>");
								?>
							</td></tr>
	
							<tr><td>Telefono: </td>
							<td><input type="name" name="tlf_alum"
	
								<?php
	
									if(isset($_POST['submit']))
										print("value= '$tlf_alum'>");
									else
										print(">");
									if($errores["telefono"] != "")
										print("<BR><SPAN CLASS= 'error'>".$errores["telefono"]."</SPAN>");
								?>
							</td></tr>
	
							<tr><td>Direccion: </td>
							<td><input type="name" name="direc_alum"
	
								<?php
	
									if(isset($_POST['submit']))
										print("value= '$direc_alum'>");
									else
										print(">");
									if($errores["direccion"] != "")
										print("<BR><SPAN CLASS= 'error'>".$errores["direccion"]."</SPAN>");
								?>
							</td></tr>
	
							<tr><td>Codigo De Curso: </td>
							<td><select name="ca_cod_curso">
	
								<?php
									require ('../conexion.php');
									$query= "SELECT * FROM cursos ORDER BY Cod_curso";
									$resultado= mysqli_query($link,$query);
	
									while($extraido= mysqli_fetch_array($resultado))
									{
										echo "<option value='$extraido[Cod_curso]'>$extraido[Cod_curso]</option>";
									}
								?>
								</select></td></tr>
	
						</table>

						<div class="botones">
							<input type="submit" class="insert" name="submit" value="Insertar">
							<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_alumnos.php'">
						</div>
					</div>
				</form>
			</div>
		<?php
		}
		?>
	</body>
</html>
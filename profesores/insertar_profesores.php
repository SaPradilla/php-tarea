<!DOCTYPE html>
<html>
	<head>
		<title>Insertar Profesores</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>

		<?php 
			$errores['nom']="";
			$errores['for']="";
			$errores['dir']="";
			$errores['esp']="";
			$errores['tel']="";
			$errores['sal']="";
			$error=false;

			if (isset($_POST['submit'])) {

				$nom_com_pro= $_POST['nom_com_pro'];
				$formacion_pro= $_POST['formacion_pro'];
				$direcc_pro= $_POST['direcc_pro'];
				$especialidad= $_POST['especialidad'];
				$tlf_pro= $_POST['tlf_pro'];
				$salario_pro= $_POST['salario_pro'];
				$ca1_cif=$_POST['ca1_cif'];
				$curso=$_POST['curso'];

				if (empty($nom_com_pro)) {
					$errores['nom']="Nombre no Valido";
					$error=true;
				}
				else
					$errores['nom']="";

				if (empty($formacion_pro)) {
					$errores['for']="Formacion no Valida";
					$error=true;
				}
				else
					$errores['for']="";

				if (empty($direcc_pro)) {
					$errores['dir']="Direccion no Valida";
					$error=true;
				}
				else
					$errores['dir']="";

				if (empty($especialidad)) {
					$errores['esp']="Especialidad no Valida";
					$error=true;
				}
				else
					$errores['esp']="";

				if (empty($tlf_pro) || (!is_numeric($tlf_pro))) {
					$errores['tel']="Numero de Telefono no Valido";
					$error=true;
				}
				else
					$errores['tel']="";

				if (empty($salario_pro) || (!is_numeric($salario_pro))) {
					$errores['sal']="Salario No Valido";
					$error=true;
				}
				else
					$errores['sal']="";
			}

			if(isset($_POST['submit']))
			{
				require("conexion.php");

				echo "<UL>";
				echo "	<P>Datos Ingresados: </P>";
				echo "	<LI>Nombre: $nom_com_pro";
				echo "	<LI>Formacion: $formacion_pro";
				echo "	<LI>Direccion: $direcc_pro";
				echo "	<LI>Especialidad: $especialidad";
				echo "	<LI>Telefono: $tlf_pro";
				echo "	<LI>Salario: $salario_pro";
				echo "	<LI>CIF: $ca1_cif";
				echo "	<LI>Curso: $curso";
				echo "</UL>";

				$query="INSERT INTO profesores (Nom_com_pro,Formacion_pro,Direcc_pro,Especialidad,Tlf_pro,
					Salario_pro,Cod_pro,CA1_CIF,curso) VALUES ('$nom_com_pro','$formacion_pro','$direcc_pro','$especialidad',$tlf_pro,
					$salario_pro,'',$ca1_cif,'$curso')";

				mysqli_query($link,$query);
				("<P><center><b>No se pudo insertar informacion</b><br><A HREF='insertar_profesores.php'>Volver</A></center></P>");
		 
        		echo "<P>[ <A HREF='insertar_profesores.php'>Insertar Otro Profesor</A> ]</P>\n";

			}
			else
			{

		?>
		<div>
			<form method="POST" action="insertar_profesores.php">
				<div class="contenedor-crear">
				<h1>Insertar Profesor</h1>

				<table>
					<tr><td>Nombre</td>
					<td><input type="name" name="nom_com_pro"
						<?php
							if (isset($_POST['submit'])) 
								print("value=$submit>");
							else
								print(">");
							if($errores['nom'] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores['nom']."</SPAN>");
						?>
					</td></tr>
	
					<tr><td>Formacion: </td>
					<td><input type="name" name="formacion_pro"
						<?php
	
							if(isset($_POST['submit']))
								print("value=$formacion_pro");
							else
								print(">");
							if($errores['for'] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores['for']."</SPAN>");
						?>
					</td></tr>
	
					<tr><td>Direccion: </td>
					<td><input type="name" name="direcc_pro"
						<?php
	
							if(isset($_POST['submit']))
								print("value=$direcc_pro");
							else
								print(">");
							if($errores['dir'] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores['dir']."</SPAN>");
						?>
					</td></tr>
	
					<tr><td>Especialidad: </td>
					<td><input type="name" name="especialidad"
						<?php
	
							if(isset($_POST['submit']))
								print("value=$especialidad");
							else
								print(">");
							if($errores['esp'] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores['esp']."</SPAN>");
						?>
					</td></tr>
	
					<tr><td>Telefono: </td>
					<td><input type="name" name="tlf_pro"
						<?php
	
							if(isset($_POST['submit']))
								print("value=$tlf_pro");
							else
								print(">");
							if($errores['tel'] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores['tel']."</SPAN>");
						?>
					</td></tr>
	
					<tr><td>Salario: </td>
					<td><input type="name" name="salario_pro"
						<?php
	
							if(isset($_POST['submit']))
								print("value=$salario_pro");
							else
								print(">");
							if($errores['sal'] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores['sal']."</SPAN>");
						?>
					</td></tr>
	
					<tr><td>CIF: </td>
					<td><select name="ca1_cif">
						<?php
							require("../conexion.php");
							$query="SELECT * FROM centros ORDER BY CIF";
							$resultado=mysqli_query($link,$query);
	
							while($extraido=mysqli_fetch_array($resultado))
							{
								echo"<option value='$extraido[CIF]'>$extraido[CIF]</option>";
							}
						?>						
					</select></td></tr>
	
					<tr><td>Curso: </td>
					<td><select name="curso">
						<?php
							require("../conexion.php");
							$query="SELECT * FROM cursos ORDER BY Nom_cur";
							$resultado=mysqli_query($link,$query);
	
							while($extraido=mysqli_fetch_array($resultado))
							{
								echo"<option value='$extraido[Nom_cur]'>$extraido[Nom_cur]</option>";
							}
						?>						
					</select></td></tr>
	
				</table>
				<div class="botones">
					<input type="submit" class="insert" name="submit" value="Insertar">
					<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_profesores.php'">
				</div>
			</div>


			</form>
		</div>
		<?php 
		}
		?>
	</body>
</html>
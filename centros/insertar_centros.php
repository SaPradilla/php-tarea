<!DOCTYPE html>
<html>
	<head>
		<title>Insertar Centros</title>
		<link rel="stylesheet" href="../css/style.css">

	</head>
	<body>
		<?php

			$errores["nom"]= "";
			$errores["tel"]= "";
 			$errores["dir"]= "";
			$errores["loc"]= "";
			$errores["c"]= "";
			$error=false;

			if(isset($_POST['submit']))
			{

				$nombre= $_POST['nombre'];
				$tlf_cent=$_POST['tlf_cent'];
				$direccion=$_POST['direccion'];
				$localidad=$_POST['localidad'];
				$cif=$_POST['cif'];

				if (empty($nombre))
				{
					$errores['nom']= "Nombre no valido";
					$error=true;
				}
				else
					$errores['nom']="";

				if (empty($tlf_cent) || (!is_numeric($tlf_cent)))
				{
					$errores['tel']= "Numero de telefono no valido";
					$error=true;
				}
				else
					$errores['tel']="";

				if (empty($direccion))
				{
					$errores['dir']= "Direccion no valida";
					$error=true;
				}
				else
					$errores['dir']="";

				if (empty($localidad))
				{
					$errores['loc']= "Localidad no valida";
					$error=true;
				}
				else
					$errores['loc']="";

				if (empty($cif) || (!is_numeric($cif)))
				{
					$errores['c']= "CIF no valida";
					$error=true;
				}
				else
					$errores['c']="";
			}

			if(isset($_POST['submit']))
			{
				require('../conexion.php');

				echo "<UL>";
				echo "	<P>Datos Ingresados: </P>";
				echo "	<LI>Nombre: $nombre";
				echo "	<LI>Telefono: $tlf_cent";
				echo "	<LI>Direccion: $direccion";
				echo "	<LI>Localidad: $localidad";
				echo "	<LI>CIF: $cif";
				echo "</UL>";

				$query="INSERT INTO centros (Nombre,Tlf_cent,Direccion,Localidad,CIF) VALUES ('$nombre',$tlf_cent,'$direccion','$localidad',$cif)";

				mysqli_query($link,$query) or die ("<P><center><b>No se pudo insertar informacion</b><br><A HREF='insertar_centros.php'>Volver</A></center></P>");
		 
        	echo "<P>[ <A HREF='insertar_centros.php'>Insertar Otro Centro</A> ]</P>\n";
		}
		else
		{

		?>
		<div>
			
			<form method="POST" action="insertar_centros.php">
			<div class="contenedor-crear">
				<h1>Insertar Centro</h1>
				<table>
					<tr><td>Nombre: </td>
					<td><input type="name" name="nombre"
						<?php
							if(isset($_POST['submit']))
								print("value='$nombre'>");
							else
								print(">");
							if($errores["nom"] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores["nom"]."</SPAN>");
						?>	
					</td></tr>

					<tr><td>Telefono: </td>
					<td><input type="name" name="tlf_cent"
						<?php
							if(isset($_POST['submit']))
								print("value='$tlf_cent'>");
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
								print("value='$direccion'>");
							else
								print(">");
							if($errores["dir"] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores["dir"]."</SPAN>");
						?>	
					</td></tr>

					<tr><td>Localidad: </td>
					<td><input type="name" name="localidad"
						<?php
							if(isset($_POST['submit']))
								print("value='$localidad'>");
							else
								print(">");
							if($errores["loc"] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores["loc"]."</SPAN>");
						?>	
					</td></tr>

					<tr><td>CIF: </td>
					<td><input type="name" name="cif"
						<?php
							if(isset($_POST['submit']))
								print("value='$cif'>");
							else
								print(">");
							if($errores["c"] != "")
								print("<BR><SPAN CLASS= 'error'>".$errores["c"]."</SPAN>");
						?>	
					</td></tr>

				</table>
				<div class="botones">
					<input type="submit" class="insert" name="submit" value="Insertar">
					<input type="button" class="volver" name="back" value="Volver" onclick="window.location.href='lista_centros.php'">
				</div>
			</div>
		
			</form>
		</div>
		<?php
		}
		?>
	</body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>Insertar Usuario</title>
	</head>
	<body>
		<?php
		$errores["id"] = "";
		$errores["email"] = "";
		$errores["username"] = "";
		$errores["password"] = "";
		$error = false;

		if (isset($_POST['submit']))
		{
			$id= $_POST['id'];
			$idpermiso= $_POST['idpermiso'];
			$email= $_POST['email'];
			$username= $_POST['username'];
			$password=$_POST['password'];

			if(empty($id) || (!is_numeric($id)))
			{
				$errores["id"]= " Id No Valido. ";
				$error=True;
			}
			else
				$errores["id"]="";

			if(empty($email))
			{
				$errores["email"]= " Email No Valido. ";
				$error=True;
			}
			else
				$errores["email"]="";


			if(empty($username))
			{
				$errores["username"]= " username No Valido. ";
				$error=True;
			}
			else
				$errores["username"]="";

			if(empty($password))
			{
				$errores["password"]= " Password No Valido. ";
				$error=True;
			}
			else
				$errores["password"]="";
		}

		if(isset($_POST['submit']) && $error== false)
		{
			require('../conexion.php');

			echo "<UL>";
			echo "	<P>Datos Ingresados: </P>";
			echo "	<LI>Id: $id ";
			echo "	<LI>Id Permiso: $idpermiso";
			echo "	<LI>Email: $email";
			echo "	<LI>Username: $username";
			echo "</UL>";

			$query= "INSERT INTO login (id,idpermiso,email,username,password) VALUES ($id,$idpermiso,'$email','$username','$password')";

			mysqli_query($link,$query) or die
			("<P><center><b>No se pudo insertar informacion</b><br><A HREF='insertar_usuario.php'>Volver</A></center></P>");

        	echo "<P>[ <A HREF='insertar_usuario.php'>Insertar Otro Usuario</A> ]</P>\n";
		}
		else
		{
		?>
			<div>
				<h2>Insertar Usuario</h2>
				<form method="POST" action="insertar_usuario.php">
					<table>

						<tr><td>Id: </td>
						<td><input type="name" name="id"

							<?php

								if(isset($_POST['submit']))
									print("value= '$id'>");
								else
									print(">");
								if($errores["id"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["id"]."</SPAN>");
							?>
						</td></tr>

            <tr><td>Tipo de permisos: </td>
						<td><select name="idpermiso">

							<?php
								require ('conexion.php');
								$query= "SELECT idpermiso,tipo_usuario FROM permiso";
								$resultado= mysqli_query($link,$query);

								while($extraido= mysqli_fetch_array($resultado))
								{
									echo "<option value='$extraido[idpermiso]'>$extraido[tipo_usuario]</option>";
								}
							?>
							</select></td></tr>

						<tr><td>Email: </td>
						<td><input type="name" name="email"

							<?php

								if(isset($_POST['submit']))
									print("value= '$email'>");
								else
									print(">");
								if($errores["email"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["email"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>Username: </td>
						<td><input type="name" name="username"

							<?php

								if(isset($_POST['submit']))
									print("value= '$username'>");
								else
									print(">");
								if($errores["username"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["username"]."</SPAN>");
							?>
						</td></tr>

						<tr><td>password: </td>
						<td><input type="name" name="password"

							<?php

								if(isset($_POST['submit']))
									print("value= '$password'>");
								else
									print(">");
								if($errores["password"] != "")
									print("<BR><SPAN CLASS= 'error'>".$errores["password"]."</SPAN>");
							?>
						</td></tr>

					</table>
					<input type="submit" name="submit" value="Insertar">
					<input type="button" name="back" value="Volver" onclick="window.location.href='lista_usuarios.php'">
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

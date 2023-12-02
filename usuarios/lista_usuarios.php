<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lista de usuarios</title>
	</head>
	<body>


		<div>
			<table border="1">
				<tr align="center"><td><label>Id</label></td>
					<td><label>Tipo permisos</label></td>
					<td><label>Email</label></td>
					<td><label>Username</label></td>

					<?php
					if(isset($_SESSION['valid'])) {
						require('../conexion.php');
						$query="SELECT * FROM login ORDER BY username";
						$resultado=mysqli_query($link,$query);
						while ($extraido= mysqli_fetch_array($resultado)) {
							$query="SELECT tipo_usuario FROM permiso WHERE idpermiso = ".$extraido['idpermiso'];
							$resultado2=mysqli_query($link,$query);
							$extraido2=mysqli_fetch_array($resultado2);
							$datos = array($extraido['id'],$extraido['idpermiso'],$extraido['email'],$extraido['username'],$extraido['password']);
		          $_SESSION['datos'] = $datos;
							$serialized = htmlspecialchars(serialize($datos));
							echo "<tr align='center'><td>".$extraido['id']."</td>";
							echo "<td>".$extraido2['tipo_usuario']."</td>";
							echo "<td>".$extraido['email']."</td>";
							echo "<td>".$extraido['username']."</td>";
						}

					?>
			</table>
			<?php
					echo "<input type='button' name='insert' value='Insertar' onclick=\"window.location.href='insertar_usuario.php'\">
								<input type='button' name='volver' value='Volver' onclick=\"window.location.href='home.php'\">";
							}
			 ?>

		</div>
		-- <div id="footer">
		--	<a href="logout.php">Logout</a>
		-- </div>
	</body>
</html>

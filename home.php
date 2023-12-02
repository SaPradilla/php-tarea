<?php session_start(); ?>
<html>
	<head>
		<title>Estudiantes</title>
	</head>
	<body>
		<?php
		if(isset($_SESSION['valid'])) {
		 ?>
		<div>
			<table align="center">
				<h1 align="center">Estudiantes</h1>
				<BR>
				<?php
					require('conexion.php');
					$query = "SELECT * FROM permiso WHERE idpermiso=".$_SESSION['idpermiso'];

					$row = mysqli_query($link,$query) or die("Could not execute the select query.");
					$row = mysqli_fetch_array($row);
					if(is_array($row) && !empty($row)) {
				 ?>
				<tr><?php if($row['t_Alu']==1) echo "<td><input type='button' name='alumno' value='Alumno' onclick=\"window.location.href='lista_alumnos.php'\"></td>";?>
				<?php if($row['t_Cen']==1) echo "<td><input type='button' name='centros' value='Centros' onclick=\"window.location.href='lista_centros.php'\"></td>";?>
				<?php if($row['t_Cur']==1) echo "<td><input type='button' name='cursos' value='Cursos' onclick=\"window.location.href='lista_cursos.php'\"></td>";?>
				<?php if($row['t_Not']==1) echo "<td><input type='button' name='notas' value='Notas' onclick=\"window.location.href='lista_notas.php'\"></td>";?>
				<?php if($row['t_Per']==1) echo "<td><input type='button' name='personal' value='Personal' onclick=\"window.location.href='lista_personal.php'\"></td>";?>
				<?php if($row['t_Pro']==1) echo "<td><input type='button' name='profesor' value='Profesor' onclick=\"window.location.href='lista_profesores.php'\"></td>";?>
				<?php if($row['t_User']==1) echo "<td><input type='button' name='usuario' value='Usuario' onclick=\"window.location.href='lista_usuarios.php'\"></td></tr>";?>
			</table>
		</div>
		<?php
			}
		}
		 ?>
		 -- <div id="footer">
		 --	<a href="logout.php">Logout</a>
		 -- </div>
	</body>
</html>

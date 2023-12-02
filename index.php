<!DOCTYPE html>
<html>
	<head>
		<title>Estudiantes</title>
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<body>
		<div>
			<h1 class="text-principal" >Estudiantes</h1>

			<div class="tabla-crud">
				<div class="card estudiantes " onclick="window.location.href='alumnos/lista_alumnos.php'">
					<!-- <img src="./img/estudiantes.jpg" alt="" srcset=""> -->
					<p>Estudiantes</p>
				</div>
				<div class="card centros" onclick="window.location.href='centros/lista_centros.php'">
					
					<p>Centros</p>
					
				</div>
				<div class="card cursos" onclick="window.location.href='cursos/lista_cursos.php'">

					<p>Cursos</p>
				</div>
				<div class="card notas"  onclick="window.location.href='notas/lista_notas.php'">
					
					<p>Notas</p>
				</div>
				<div class="card personal" onclick="window.location.href='personal/lista_personal.php'">

					<p>Personal</p>
				</div>
				<div class="card profesor"  onclick="window.location.href='profesores/lista_profesores.php'" >
					<p>Profesores</p>
				</div>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
	<title>Registro de Inscripción</title>
</head>
<body>
	<div class="contenedor-formulario">
		<div class="wrap">
			<form action="proceso.php" class="formulario" name="formulario_registro" method="post" enctype="multipart/form-data">
					<div align="center">
					<img src="logo2.png" width="300" height="130">
					<br>
					</div>	
					<div class="input-group">
						<input type="text" id="nombre" name="nombre">
						<label class="label" for="nombre">Nombre :</label>
					</div>
					<div class="input-group">
						<label class="label" for="perfiltext">Perfil :</label>
					</div>
					<br><br>
					<div class="input-group radio">
						<input type="radio" name="perfil" id="Docente_UPN" value="Docente UPN">
						<label for="Docente_UPN">Docente UPN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="radio" name="perfil" id="Estudiante_UPN" value="Estudiante UPN">
						<label for="Estudiante_UPN">Estudiante UPN</label>
						<input type="radio" name="perfil" id="Docente_Externo" value="Docente Externo">
						<label for="Docente_Externo">Persona Externo</label>
					</div>
					<div class="input-group">
						<input type="text" id="Institucion" name="institucion">
						<label class="label" for="Institucion">Instituciónde de procedencia :</label>
					</div>
					<div class="input-group">
						<input type="text" id="ciudad" name="ciudad">
						<label class="label" for="ciudad">Ciudad :</label>
					</div>
					<div class="input-group">
						<input type="text" id="telefono" name="telefono">
						<label class="label" for="telefono">Teléfono :</label>
					</div>
					<div class="input-group">
						<input type="email" id="correo" name="correo">
						<label class="label" for="correo">Correo :</label>
					</div>

					<div class="input-group">

						<label class="label" for="tallertext">Taller :</label> <br><br>
						<input type="text" list="items" name="taller_t">
						<datalist id="items">
							<option name="taller_t" value="La Nueva Escuela Mexicana. Riesgos, retos y oportunidades.">La Nueva Escuela Mexicana. Riesgos, retos y oportunidades.</option>
							<option name="taller_t" value="Prácticas exitosas de inclusión y equidad.">Prácticas exitosas de inclusión y equidad.</option>
							<option name="taller_t" value="Evaluación como proceso hacia la excelencia educativa.">Evaluación como proceso hacia la excelencia educativa.</option>
							<option name="taller_t" value="Tendencias educativas en el siglo XXI.">Tendencias educativas en el siglo XXI.</option>
							<option name="taller_t" value="Desarrollo de habilidades de lecto-escritura.">Desarrollo de habilidades de lecto-escritura.</option>
							<option name="taller_t" value="La investigación en posgrado. Formación para la sistematización de experiencias.">La investigación en posgrado. Formación para la sistematización de experiencias.</option>
							<option name="taller_t" value="Ambientes de enseñanza-aprendizaje.">Ambientes de enseñanza-aprendizaje.</option>
							<option name="taller_t" value="Espacios innovadores para el aprendizaje.">Espacios innovadores para el aprendizaje.</option>
						</datalist>
						  
						  
					</div>

					<div class="form-group">
					<span class="label label-primary">Participación en Ponencia </span>
					<br>
					<label>Subir documento solo en formato Word!!!!!!</label>
						<input type="file" name="documento">
					<label>Subir imagen de pago (jpg, png)!!!!!</label>
						<input type="file" name="imagen">
						<br>
						<label>Texto</label>
						<br>
						<textarea name="descripcion" rows="10" cols="60" placeholder="Comparte tu opinión!"></textarea>
						<button onclick="validar(event)">Enviar</button>
					</div>
			
					<input type="submit" id="btn-submit" value="Enviar">
			
			</form>
		</div>
	</div>
	<script src="js/formulario.js"></script>
</body>
</html>
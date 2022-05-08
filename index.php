<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Inscríbete aquí</title>
		<link rel="stylesheet" href="estilos.css">
	</head>
	<body>
		
		<form action="enviar-correo.php" method="POST" class="form">
			<div class="form__container">
				<h2 class="form__title">Inscríbete aquí</h2>
				<input type="text" name="nombre" class="form__input" placeholder="Nombre" required>
				<input type="email" name="email" class="form__input" placeholder="Email corporativo" required>
				<input type="text" name="empresa" class="form__input" placeholder="Empresa" required>
				<input type="number" name="telefono" class="form__input" placeholder="Teléfono" required>
				<textarea class="form_input form__input form__input--message" name="mensaje" placeholder="Mensaje"></textarea>

				<input type="submit" value="Enviar" class="form__cta">
			</div>
		</form>

	</body>
</html>
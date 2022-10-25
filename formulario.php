<!DOCTYPE html>
<html>
<head>
	<title>Fale conosco</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="envia_email.php" method="POST">
		<label> Nome: </label>
			<input type="text" name="nome" required><br>

		<label> Sobrenome: </label>
			<input type="text" name="sobrenome" required><br>

		<label> Email: </label>
			<input type="email" name="email" required><br>

		<input type="submit" name="enviar">
</form>
</body>
</html>
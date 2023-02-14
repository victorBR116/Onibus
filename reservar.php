<!DOCTYPE html>
<html>
<head>
	<title>Assentos Reservados</title>
</head>
<body>
	<h1>Assentos Reservados:</h1>
	<?php
	//adicionar poder adicionar apenas 1 assento por perfil
	// Verifica se pelo menos um assento foi selecionado
	if (isset($_POST['assento']) && !empty($_POST['assento'])) {
		// Imprime a lista de assentos selecionados
		echo '<ul>';
		foreach ($_POST['assento'] as $assento) {
			echo "Assento:" . '<li>' . $assento . '</li>';
		}
		echo '</ul>';
	} else {
		echo '<p>Nenhum assento selecionado.</p>';
	}
	?>
	<p><a href="index.php">Voltar</a></p>
</body>
</html>

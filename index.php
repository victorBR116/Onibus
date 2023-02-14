<!DOCTYPE html>
<html>
<head>
	<title>Selecionador de Assentos</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			margin: 20px 0;
			color: #4CAF50;
		}

		form {
			width: 80%;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}

		form label {
			display: block;
			margin-bottom: 5px;
			color: #666;
		}

		form input[type="text"], form input[type="email"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px;
			font-size: 16px;
			margin-bottom: 20px;
		}

		table {
			margin: 0 auto;
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 20px;
		}

		td {
			padding: 10px;
			text-align: center;
			border: 1px solid #ccc;
			background-color: #f2f2f2;
		}

		input[type="checkbox"] {
			display: none;
		}

		input[type="checkbox"] + label {
			display: block;
			padding: 10px;
			cursor: pointer;
			border: 1px solid #ccc;
			background-color: #fff;
			color: #666;
			font-size: 16px;
		}

		input[type="checkbox"]:checked + label {
			background-color: #4CAF50;
			color: #fff;
		}

		input[type="submit"] {
			display: block;
			margin: 0 auto;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Selecione seu assento</h1>
	<form action="reservar.php" method="post">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome">
		<br>
		<label for="email">E-mail:</label>
		<input type="email" name="email" id="email">
		<br><br>
		<table>
			<?php
			// Número de assentos por fileira
			$num_assentos = 4;
			// Número de fileiras
			$num_fileiras = 6;
			// Loop pelas fileiras e assentos
			for ($i = 1; $i <= $num_fileiras; $i++) {
				echo '<tr>';
				for ($j = 1; $j <= $num_assentos; $j++) {
					echo '<td>';
					echo '<input type="checkbox" name="assento[]" value="' . $i . '-' . $j . '" id="assento-' . $i . '-' . $j . '">';
					echo '<label for="assento-' . $i . '-' . $j . '">Fila ' . $i . ', Assento ' . $j . '</label>';
					echo '</td>';
				}
				echo '</tr>';
			}
			?>
		</table>
		<br>
		<input type="submit" value="Reservar">
	</form>
</body>
</html>
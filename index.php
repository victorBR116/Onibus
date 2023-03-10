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
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		form label {
			display: block;
			margin-bottom: 5px;
			color: #666;
		}

		form input[type="text"],
		form input[type="email"] {
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
			width: 10%;
			margin-bottom: 1px;
		}

		td {
			padding: 5px;
			text-align: center;
			border: 20px solid #ccc;
			background-color: #f2f2f2;
		}

		input[type="checkbox"] {
			display: none;
		}

		input[type="checkbox"]+label {
			display: block;
			padding: 5px;
			cursor: pointer;
			border: 1px solid #ccc;
			background-color: #fff;
			color: #666;
			font-size: 14px;
		}

		input[type="checkbox"]:checked+label {
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
		<input type="text" name="nome" id="nome" required>
		<br>
		<label for="email">E-mail:</label>
		<input type="email" name="email" id="email" required>
		<br><br>
		<table>
			<?php
			// lê o arquivo de texto e armazena os assentos já selecionados em um array
			$assentos_selecionados = array();
			$filename = 'assentos.txt';
			if (file_exists($filename)) {
				$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
				foreach ($lines as $line) {
					$assento_info = explode(',', $line);
					array_push($assentos_selecionados, $assento_info[0]);
				}
			}

			// Número de assentos por fileira
			$num_assentos = 4;
			// Número de fileiras
			$num_fileiras = 6;

			// Loop pelas fileiras e assentos
			for ($i = 1; $i <= $num_fileiras; $i++) {
				echo '<tr>';
				for ($j = 1; $j <= $num_assentos; $j++) {
					echo '<td>';
					$assento_id = $i . '-' . $j;
					if (in_array($assento_id, $assentos_selecionados)) {
						echo '<label for="assento-' . $i . '-' . $j . '">Fila ' . $i . ', Assento ' . $j . '</label>';
					} else {
						echo '<input type="checkbox" name="assento[]" value="' . $assento_id . '" id="assento-' . $i . '-' . $j . '">';
						echo '<label for="assento-' . $i . '-' . $j . '">Fila ' . $i . ', Assento ' . $j . '</label>';
					}
					echo '</td>';
				}
				echo '</tr>';
			}
			?>
			<script>
				var assentos = document.querySelectorAll('input[type="checkbox"]');

				assentos.forEach(function(assento) {
					assento.addEventListener('change', function() {
						//verificar se o assento está selecionado
						if (this.checked) {
							//desmarcar todos os outros assentos selecionados
							assentos.forEach(function(outroAssento) {
								if (outroAssento != assento && outroAssento.checked) {
									outroAssento.checked = false;
								}
							});
						}
					});
				});
			</script>
		</table>
		<br>
		<input type="submit" value="Reservar">
	</form>
</body>

</html>
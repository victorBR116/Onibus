<!DOCTYPE html>
<html>

<head>
    <title>Reserva de Assento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        h1,
        h2,
        p {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="page-header">Assentos Reservados</h1>
        <?php
        //guarda a informação do assento em um array
        $assentos_selecionados = array();
        if (isset($_POST['assento']) && !empty($_POST['assento'])) {
            foreach ($_POST['assento'] as $assento) {
                array_push($assentos_selecionados, array(
                    'assento' => $assento,
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email']
                ));
            }
            // Adiciona as informações ao arquivo de texto
            $filename = 'assentos.txt';
            foreach ($assentos_selecionados as $assento) {
                $content = $assento['assento'] . ',' . $assento['nome'] . ',' . $assento['email'] . PHP_EOL;
                file_put_contents($filename, $content, FILE_APPEND);
            }
            // Imprime a lista de assentos selecionados
            foreach ($assentos_selecionados as $assento) {
        ?>
                <div class="panel panel-default">
                    <div class="panel-heading">Informações do Assento:</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Assento:</strong> <?php echo $assento['assento']; ?></li>
                            <li class="list-group-item"><strong>Nome:</strong> <?php echo $assento['nome']; ?></li>
                            <li class="list-group-item"><strong>E-mail:</strong> <?php echo $assento['email']; ?></li>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="alert alert-success" role="alert">Obrigado pela reserva! Seu assento foi reservado com sucesso.</div>
        <?php
        } else {
            echo '<div class="alert alert-warning" role="alert">Nenhum assento selecionado.</div>';
        }

        ?>
        <p class="text-center"><a href="index.php" class="btn btn-primary">Voltar</a></p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
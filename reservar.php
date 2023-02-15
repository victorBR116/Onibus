<!DOCTYPE html>
<html>
    <head>
        <title>Reserva de Assento</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            h1, h2, p {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="page-header">Assentos Reservados</h1>
            <?php
            // Verifica se pelo menos um assento foi selecionado
            if (isset($_POST['assento']) && !empty($_POST['assento'])) {
                // Imprime a lista de assentos selecionados
                foreach ($_POST['assento'] as $assento) {
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Informações do Assento:</div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Assento:</strong> <?php echo $assento; ?></li>
                                <li class="list-group-item"><strong>Nome:</strong> <?php echo $_POST['nome']; ?></li>
                                <li class="list-group-item"><strong>E-mail:</strong> <?php echo $_POST['email']; ?></li>
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

<!DOCTYPE html>
<html>
    <head>
        <title>Assentos Reservados</title>
        <style>
            ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            li {
                margin-bottom: 10px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <h1>Assentos Reservados:</h1>
        <?php
        // Verifica se pelo menos um assento foi selecionado
        if (isset($_POST['assento']) && !empty($_POST['assento'])) {
            // Imprime a lista de assentos selecionados
            foreach ($_POST['assento'] as $assento) {
                ?>
                <h2>Informações do Assento:</h2>
                <ul>
                    <li><strong>Assento:</strong> <?php echo $assento; ?></li>
                    <li><strong>Nome:</strong> <?php echo $_POST['nome']; ?></li>
                    <li><strong>E-mail:</strong> <?php echo $_POST['email']; ?></li>
                </ul>
                <?php
            }
            ?>
            <p>Obrigado pela reserva! Seus assentos foram reservados com sucesso.</p>
            <?php
        } else {
            echo '<p>Nenhum assento selecionado.</p>';
        }
        ?>
        <p><a href="index.php">Voltar</a></p>
    </body>
</html>

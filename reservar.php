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
        require_once 'funcoes.php';
        if (isset($_POST['assento']) && !empty($_POST['assento'])) {
            $assentos_selecionados = array();
            foreach ($_POST['assento'] as $assento) {
                array_push($assentos_selecionados, array(
                    'assento' => $assento,
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email']
                ));
            }
            $reservaAssentos = new ReservaAssentos($assentos_selecionados);
            $reservaAssentos->reservarAssentos();
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
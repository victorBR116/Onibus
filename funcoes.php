<?php

class ReservaAssentos
{
    private $assentosSelecionados;

    public function __construct(array $assentosSelecionados)
    {
        $this->assentosSelecionados = $assentosSelecionados;
    }

    public function reservarAssentos(): void
    {
        $this->adicionarInformacoesArquivo();
        $this->imprimirListaAssentos();
        $this->mostrarMensagemSucesso();
    }

    private function adicionarInformacoesArquivo(): void
    {
        $filename = 'assentos.txt';
        foreach ($this->assentosSelecionados as $assento) {
            $content = $assento['assento'] . ',' . $assento['nome'] . ',' . $assento['email'] . PHP_EOL;
            file_put_contents($filename, $content, FILE_APPEND);
        }
    }

    private function imprimirListaAssentos(): void
    {
        foreach ($this->assentosSelecionados as $assento) {
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
    }

    private function mostrarMensagemSucesso(): void
    {
?>
        <div class="alert alert-success" role="alert">Obrigado pela reserva! Seu assento foi reservado com sucesso.</div>
<?php
    }
}



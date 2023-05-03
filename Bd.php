<?php
var_dump(PDO::getAvailableDrivers());
$teste = new PDO('mysql:host=localhost;dbname=mercadinho_zeny', 'root', '123456');

echo "Conectado";
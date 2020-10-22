<?php
    require './connection.php';
    require './classes/carros.class.php';
    require './classes/reservas.class.php';
    
    $reservas = new Reserva($pdo);
    $carros = new Carros($pdo);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="imagens/foltz2.ico" />
</head>
<body>
    <h1>Reservas</h1>
    <br>
    <a href="reserva.php">Adcicionar Reserva</a>
    <br><br>
    <?php
        $lista = $reservas->getReservas();

        foreach($lista as $item){

            echo $item['nomePessoa']." Reservou carro ".$item['idCarro']." Entre: ".$item['data_inicio']." e ".$item['data_fim']."<br>";
        }
    ?>
    <hr>
    <?php require 'calendario.php'; ?>    

</body>
</html>


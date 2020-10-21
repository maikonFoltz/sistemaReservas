<?php
    require './connection.php';
    require './classes/carros.class.php';
    require './classes/reservas.class.php';
    
    $reservas = new Reserva($pdo);
    $carros = new Carro($pdo);
    
?>

<h1>Reservas</h1>
<?php
    $lista = $reservas->getReservas();

    foreach($lista as $item){

        echo $item['nomePessoa']." Reservou carro ".$item['idCarro']." Entre: ".$item['data_inicio']." e ".$item['data_fim']."<br>";
    }
?>

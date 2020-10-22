<?php
    require './connection.php';
    require './classes/carros.class.php';
    require './classes/reservas.class.php';
    
    $reservas = new Reserva($pdo);
    $carros = new Carros($pdo);    
?>

<h1>Adicionar Reserva</h1>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="foltz2.ico" />
</head>
<body>
    <?php
        if(!empty($_POST['carro'])){
            $car = addslashes($_POST['carro']);
            $dataInicio = addslashes($_POST['dataInicio']);
            $dataFim =addslashes($_POST['dataFim']);
            $nome = addslashes($_POST['pessoa']);

            if($reservas->verificarDisponibilidadeCarro($car, $dataInicio, $dataFim)){
                $reservas->reservar($car, $dataInicio, $dataFim, $nome);
                header("Location: index.php");
                exit;
            }else{
                echo "este carro ja esta reservado para esse periodo";
            }

        }
    ?>
    <form action="" method="post">
        Carro: <br>
        <select name="carro" id="carro">
            <?php        
            $lista = $carros->getCarros();
    
            foreach($lista as $carro):
                ?>
                <option value="<?php echo $carro['idCarro']; ?>"><?php echo $carro['nomeCarro']; ?></option>
                <?php
            endforeach;
            ?>
        </select><br><br>

        Data Inicio: <br>
        <input type="date" name="dataInicio" id="dataInicio"> <br>
        Data Fim: <br>
        <input type="date" name="dataFim" id="dataFim"> <br><br>

        Nome da Pessoa: <br>
        <input type="text" name="pessoa"> <br><br>

        <input type="submit" value="Reservar">

    </form>
</body>
</html>

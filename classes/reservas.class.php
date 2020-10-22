<?php
    
class Reserva{

    private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function getReservas() {
		$array = array();

		$sql = "SELECT * FROM reservas";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function verificarDisponibilidadeCarro($car, $dataInicio,$dataFim){
		 $sql = "SELECT * FROM reservas WHERE idCarro = :carro AND (NOT( data_inicio > :dataFim OR data_fim < dataInicio))";
		 $sql = $this->pdo->prepare($sql);
		 $sql->bindValue(":carro", $car);
		 $sql->bindValue(":dataInicio", $dataInicio);
		 $sql->bindValue(":dataFim", $dataFim);
		 $sql->execute();

		 if($sql->rowCount() > 0){
			return false;
		 }else{
			 return true;
		 }
	}

	public function reservar($car, $dataInicio, $dataFim, $nome){
		$sql = "INSERT INTO reservas (idCarro, data_inicio, data_fim, nomePessoa) VALUES (:carro, :dataInicio, :dataFim, :pessoa)";
		 $sql = $this->pdo->prepare($sql);
		 $sql->bindValue(":carro", $car);
		 $sql->bindValue(":dataInicio", $dataInicio);
		 $sql->bindValue(":dataFim", $dataFim);
		 $sql->bindValue(":pessoa", $nome);
		 $sql->execute();
	}
}
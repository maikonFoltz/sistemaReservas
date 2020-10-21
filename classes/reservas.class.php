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
}
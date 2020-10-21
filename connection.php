<?php

    try{
        $pdo = new PDO("mysql:dbname=reservas_carros;host=localhost:8889", "admin", "admin");
    }catch(PDOException $e){
        echo "ERRO: ".$e->getMessage();
        exit;
    }

?>
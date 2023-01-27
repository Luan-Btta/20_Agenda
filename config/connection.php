<?php

$typeBD = "mysql";
$host = "localhost";
$db = "agenda";
$user = "user";
$pass = "user";

try{
    
    $conn = new PDO("$typeBD:host=$host;dbname=$db", $user, $pass);

    //ATIVAR O MODO DE ERROS
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    // ERRO NA CONEXÃO
    $error = $e->getMessage();
    echo "Erro: $error";
}
<?php

session_start();

include_once("connection.php");
include_once("url.php");

//RETORNA OS DADOS DE UM CONTATO

$id;
$data = $_POST;

//ALTERAÇÕES NO BANCO
if(!empty($data)){
    if($data["type"]=="create"){
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try{
    
            $stmt->execute();
            $_SESSION["msg"] = "Contato Adicionado com Sucesso!";

        }catch(PDOException $e){
            // ERRO NA CONEXÃO
            $error = $e->getMessage();
            $_SESSION["msg"] = "Erro: $error!";
        }
    }else if($data["type"]=="update"){
        $id = $data['id'];
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try{
    
            $stmt->execute();
            $_SESSION["msg"] = "Contato atualizado com Sucesso!";

        }catch(PDOException $e){
            // ERRO NA CONEXÃO
            $error = $e->getMessage();
            $_SESSION["msg"] = "Erro: $error!";
        }
    }else if($data["type"]=="delete"){
        $id = $data['id'];

        $query = "DELETE FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);

        try{
    
            $stmt->execute();
            $_SESSION["msg"] = "Contato removido com Sucesso!";

        }catch(PDOException $e){
            // ERRO NA CONEXÃO
            $error = $e->getMessage();
            $_SESSION["msg"] = "Erro: $error!";
        }
    }
    
//REDIRECT HOME
header("Location: ../index.php");

//COLETAS NO BANCO
}else{
    if(!empty($_GET)){
        $id = $_GET['id'];
    }
    
    if(!empty($id)){
        $contact = [];
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $contact = $stmt->fetch();
    }else{
        //RETORNA TODOS OS CONTATOS
        $contacts = [];
    
        $query = "SELECT * FROM contacts";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $contacts = $stmt->fetchAll();
    }
}

//FECHAR CONEXÃO
$conn = null;
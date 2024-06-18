<?php
session_start();
include_once '../banco.php';

//Conectar o banco
$bd = conexao();

$nome = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "password");

if ($email && $nome && $senha) {
    try {
        $sqlInsert =
            "INSERT IGNORE INTO usuarios 
                (nome, email, senha)
            VALUES 
                ('$nome', '$email', '$senha')";

        $resultado = $bd->query($sqlInsert);
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }

    header("location: ../../pages/login.php");
} else {
    header("location: ../../pages/login.php");
}

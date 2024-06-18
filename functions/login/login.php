<?php
session_start();
include_once '../banco.php';

//Conectar o banco
$bd = conexao();

$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "password");

$usuario = null;

if ($email && $senha) {
    try {
        $sqlGet = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        $resultado = $bd->query($sqlGet);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }

    if ($usuario) {

        $_SESSION["logado"] = true;
        $_SESSION["usuario"] = $usuario;

        header("location: ../../index.php");
    } else {
        header("location: ../../pages/login.php?invalido=true");
    }
} else {
    header("location: ../../pages/login.php");
}

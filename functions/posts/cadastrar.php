<?php
session_start();
include_once '../banco.php';
include_once '../arquivos.php';

//Conectar o banco
$bd = conexao();

$guid = bin2hex(openssl_random_pseudo_bytes(16));
$titulo = filter_input(INPUT_POST, "title-post-input");
$texto = filter_input(INPUT_POST, "text-post-input");
$imagem = $_FILES["validatedCustomFile"];
$imagemNome = $guid . $imagem["name"];
$usuarioId = $_SESSION["usuario"]["id"];

if ($titulo && $texto && $imagemNome && $usuarioId) {
    try {
        $sqlInsert =
            "INSERT IGNORE INTO artigos 
                (idUsuarioCriador, dataCriacao, nomeImagem, titulo, textoPortugues, textoIngles, textoEspanhol)
            VALUES 
                ('$usuarioId', '" . date("Y/m/d") . "', '$imagemNome', '$titulo', '$texto', '$texto', '$texto')";

        $resultado = $bd->query($sqlInsert);

        move_uploaded_file($imagem["tmp_name"], "../../resources/imagens/" . $imagemNome);
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }

    header("location: ../../index.php");
} else {
    header("location: ../../pages/editFormPost.php?erro=1");
    die();
}

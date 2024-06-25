<?php
session_start();
include_once '../banco.php';

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

        if (!$imagem["name"]) {
            $imagemNome = null;
        }

        $sqlInsert =
            "INSERT IGNORE INTO artigos 
                (idUsuarioCriador, dataCriacao, nomeImagem, tituloPortugues, tituloIngles, tituloEspanhol, textoPortugues, textoIngles, textoEspanhol)
            VALUES 
                ('$usuarioId', '" . date("Y/m/d") . "', '$imagemNome', '$titulo', '$titulo', '$titulo', '$texto', '$texto', '$texto')";

        $bd->query($sqlInsert);

        if ($imagem["name"]) {
            move_uploaded_file($imagem["tmp_name"], "../../resources/imagens/" . $imagemNome);
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }

    header("location: ../../index.php");
} else {
    header("location: ../../pages/editFormPost.php?erro=1");
    die();
}

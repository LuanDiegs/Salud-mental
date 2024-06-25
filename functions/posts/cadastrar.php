<?php
session_start();
include_once '../banco.php';

//Conectar o banco
$bd = conexao();

$guid = bin2hex(openssl_random_pseudo_bytes(16));
$tituloPt = filter_input(INPUT_POST, "title-post-input-pt");
$tituloEn = filter_input(INPUT_POST, "title-post-input-en");
$tituloEsp = filter_input(INPUT_POST, "title-post-input-esp");
$textoPt = filter_input(INPUT_POST, "text-post-input-pt");
$textoEn = filter_input(INPUT_POST, "text-post-input-en");
$textoEsp = filter_input(INPUT_POST, "text-post-input-esp");
$imagem = $_FILES["validatedCustomFile"];
$imagemNome = $guid . $imagem["name"];
$usuarioId = $_SESSION["usuario"]["id"];

if ($usuarioId) {
    try {

        if (!$imagem["name"]) {
            $imagemNome = null;
        }

        $sqlInsert =
            "INSERT IGNORE INTO artigos 
                (idUsuarioCriador, dataCriacao, nomeImagem, tituloPortugues, tituloIngles, tituloEspanhol, textoPortugues, textoIngles, textoEspanhol)
            VALUES 
                ('$usuarioId', '" . date("Y/m/d") . "', '$imagemNome', '$tituloPt', '$tituloEn', '$tituloEsp', '$textoPt', '$textoEn', '$textoEsp')";

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

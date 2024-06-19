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
$idArtigo = $_GET["id"];

if ($titulo && $texto && $imagemNome && $usuarioId && $idArtigo) {
    try {
        $sqlGet = "SELECT * FROM artigos WHERE id = '$idArtigo'";
        $resultadoGet = $bd->query($sqlGet);
        $artigo = $resultadoGet->fetch(PDO::FETCH_ASSOC);

        if (!$imagem["name"]) {
            $imagemNome = $artigo["nomeImagem"];
        }

        $sqlUpdate =
            "UPDATE artigos 
            SET
                nomeImagem = '$imagemNome',
                titulo = '$titulo',
                textoPortugues = '$texto',
                textoIngles = '$texto',
                textoEspanhol = '$texto'
            WHERE
                id = '$idArtigo'";

        $bd->query($sqlUpdate);

        if ($imagem["name"] && $artigo["nomeImagem"] != $imagemNome) {
            unlink("../../resources/imagens/" . $artigo["nomeImagem"]);
            move_uploaded_file($imagem["tmp_name"], "../../resources/imagens/" . $imagemNome);
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }

    header("location: ../../pages/myPosts.php");
} else {
    header("location: ../../pages/editFormPost.php?id=" . $idArtigo . "&erro=1");
    die();
}

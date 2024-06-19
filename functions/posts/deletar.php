<?php
session_start();
include_once '../banco.php';

//Conectar o banco
$bd = conexao();

$idPost = $_GET['id'];
$idUsuario = $_SESSION["usuario"]["id"];

if ($idPost && $idUsuario) {
    try {
        $sqlGet = "SELECT * FROM artigos WHERE id = '$idPost' AND idUsuarioCriador = '$idUsuario'";
        $resultadoGet = $bd->query($sqlGet);
        $artigo = $resultadoGet->fetch(PDO::FETCH_ASSOC);

        $sqlDelete =
            "DELETE FROM artigos WHERE id = '$idPost' AND idUsuarioCriador = '$idUsuario'";

        $bd->query($sqlDelete);

        unlink("../../resources/imagens/" . $artigo["nomeImagem"]);
    } catch (Exception $ex) {
        echo $ex->getMessage();
        die();
    }

    header("location: ../../pages/myPosts.php");
} else {
    header("location: ../../pages/myPosts.php?erro=1");
    die();
}

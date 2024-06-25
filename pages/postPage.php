<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud mental</title>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/generalCss.css">
</head>

<style>
    .navbar-principal {
        margin-top: 2%;
    }

    .container-post {
        color: white;
        background-color: #454545;
        padding: 2%;
        border-radius: 10px;
        transition: 0.5s;
        margin-bottom: 5%;
    }

    .img-post {
        border-radius: 10px;
    }

    .title-post {
        margin-top: 5%;
        font-size: 48px;
        margin-bottom: 0;
    }

    .auditory-data-post {
        font-size: 14px;
        color: #A18EE0;
    }

    .text-post {
        white-space: pre-line;
    }
</style>

<body>
    <?php
    include_once '../functions/banco.php';

    //Conectar o banco
    $bd = conexao();
    $sqlArtigo = "SELECT * from artigos where id = '" . $_GET['id'] . "'";
    $resultadoArtigo = $bd->query($sqlArtigo);
    $artigo = $resultadoArtigo->fetch(PDO::FETCH_ASSOC);

    if ($artigo) {
        $sqlUsuario = "SELECT * from usuarios where id = '" . $artigo['idUsuarioCriador'] . "'";
        $resultadoUsuario = $bd->query($sqlUsuario);
        $usuario = $resultadoUsuario->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <?php include '../parts/navbar.php' ?>

    <div class="container container-post">
        <?php
        if ($artigo && $artigo['nomeImagem']) {
            echo '<img class="img-fluid img-post" src="../resources/imagens/' . $artigo['nomeImagem'] . '">';
        } else {
            echo '<img class="img-fluid img-post" src="../resources/imagens/default.jpg">';
        }

        ?>
        <p class="text-left font-weight-bold title-post"><?= $artigo["tituloPortugues"]; ?></p>
        <p class="text-justify auditory-data-post">Created by <?= $usuario["nome"]; ?> in <?= databr($artigo["dataCriacao"]); ?></p>
        <div class="text-justify text-post post-text"> <?= $artigo["textoPortugues"]; ?> </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

<?php
include_once '../functions/translate.php';
?>

<script>
    // Run when the page is loaded
    window.onload = function onload() {
        changeLanguage();
    }

    fixLinks();
</script>

</html>
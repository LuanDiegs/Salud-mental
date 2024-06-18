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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    //Session do carrinho
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
        <img class="img-fluid img-post">
        <p class="text-left font-weight-bold title-post"><?= $artigo["titulo"]; ?></p>
        <p class="text-justify auditory-data-post">Created by <?= $usuario["nome"]; ?> in <?= databr($artigo["dataCriacao"]); ?></p>
        <div class="text-justify text-post post-text"> <?= $artigo["textoPortugues"]; ?> </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../functions/translate.js" type="text/javascript"></script>
</body>

<script>
    // Run when the page is loaded
    window.onload = function onload() {
        changeLanguage();
    }

    fixLinks();
</script>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ECIA - SALUD MENTAL</title>

    <!-- Paleta de cores utilizada -->
    <!-- https://coolors.co/palette/012a4a-013a63-01497c-014f86-2a6f97-2c7da0-468faf-61a5c2-89c2d9-a9d6e5 -->

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/generalCss.css">
</head>
<style>
    .btn-create-post:hover {
        background-color: #5a189a;
        color: white;
        transition: 0.5s;
        box-shadow: white 0px 0px 3px;
    }

    .col-sm-4 {
        margin-bottom: 2%;
    }
</style>

<body>
    <?php
    include_once './functions/banco.php';

    $sql = "SELECT * from artigos";

    //Conectar o banco
    $bd = conexao();
    $resultado = $bd->query($sql);
    ?>

    <!-- Title -->
    <div class="container" style="padding: 2%; border-radius: 10px;">
        <h1 class="text-center main-title" style="color: white;">ECIA - SALUD MENTAL</h1>
    </div>

    <!-- Includes the navbar in the page -->
    <?php
    include 'parts/navbar.php';

    if (isset($_SESSION["logado"])) {
    ?>
        <div class="container text-right">
            <a href="pages/editFormPost.php?id=0" type="submit" class="btn btn-create-post">Create a post</a>
        </div>
    <?php
    }
    ?>
    <!-- Cards -->
    <div class="container-cards">
        <div class="container">
            <div class="row">
                <?php
                while ($dado = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $nomeImagem = "default.jpg";

                    if ($dado['nomeImagem']) {
                        $nomeImagem = $dado['nomeImagem'];
                    }
                ?>
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <img src="resources/imagens/<?= $nomeImagem; ?>" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title card-title-<?= $dado['id'] ?>"><?= $dado["tituloPortugues"]; ?></h5>
                                <a href="pages/postPage.php?id=<?= $dado['id'] ?>" class="btn btn-card mt-auto go-to-post">Go to post</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<?php
include_once './functions/translate.php';
?>

<script>
    // Run when the page is loaded
    window.onload = function onload() {
        changeLanguage();
    }
</script>

</html>
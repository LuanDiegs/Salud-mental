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
    .btn-create-post {
        margin-bottom: 2%;
        background-color: #8c3dce;
        color: white;
        width: 30%;
        transition: 0.5s;
    }

    .btn-create-post:hover {
        background-color: #5a189a;
        color: white;
        transition: 0.5s;
        box-shadow: white 0px 0px 3px;
    }
</style>

<body>
    <?php
    //Session do carrinho
    session_start();

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    include_once './functions/banco.php';

    $sql = "SELECT * from produto";
    ?>

    <!-- Title -->
    <div class="container" style="padding: 2%; border-radius: 10px;">
        <h1 class="text-center main-title" style="color: white;">ECIA - SALUD MENTAL</h1>
    </div>

    <!-- Includes the navbar in the page -->
    <?php include 'parts/navbar.php' ?>

    <!-- Button -->
    <div class="container text-right">
        <a href="pages/editFormPost.php?id=0" type="submit" class="btn btn-create-post">Create a post</a>
    </div>
    <!-- Cards -->
    <div class="container-cards">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card h-100">
                        <img src="resources/imagens/article1.jpg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title card-title-1">Videgames e como isso afeta a personalidade</h5>
                            <a href="pages/postPage.php?id=1" class="btn btn-card mt-auto">Go to post</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="resources/imagens/article2.jpg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title card-title-2">Natureza e a saude mental</h5>
                            <a href="pages/postPage.php?id=2" class="btn btn-card mt-auto">Go to post</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="resources/imagens/article3.jpg" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title card-title-3">Saúde mental e o RPG</h5>
                            <a href="pages/postPage.php?id=3" class="btn btn-card mt-auto">Go to post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="functions/translate.js" type="text/javascript"></script>
</body>

<script>
    // Run when the page is loaded
    window.onload = function onload() {
        changeLanguage();
    }
</script>

</html>
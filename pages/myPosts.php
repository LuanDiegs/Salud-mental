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
    .container-myArticles {
        color: white;
        background-color: transparent;
        border: 2px solid #8c3dce;
        padding: 2%;
        border-radius: 10px;
        width: 100%;
        transition: 0.5s;
    }

    .btn-delete,
    .btn-edit {
        margin-bottom: 2%;
        background-color: #8c3dce;
        color: white;
        width: 100%;
        height: 100%;
        padding-top: 15%;
        padding-bottom: 15%;
        transition: 0.5s;
        font-size: 24px;
    }

    .btn-delete:hover,
    .btn-edit:hover {
        background-color: #5a189a;
        color: white;
        transition: 0.5s;
        box-shadow: white 0px 0px 3px;
        border-radius: 10px;
    }

    .card-myArticle {
        margin-top: 2%;
        padding: 2%;
        padding-left: 5%;
        padding-right: 5%;
        border-radius: 15px;
        background-color: #1F1F1F !important;
    }

    .card-img-myarticle {
        width: 100% !important;
        border-radius: 10px;
    }

    .card-post-title {
        font-size: 24px;
    }

    .button {
        padding: 2%;
    }
</style>

<body>
    <?php
    include_once '../functions/banco.php';
    session_start();

    if (!isset($_SESSION["logado"])) {
        echo
        '<div class="container" style="padding: 2%; border-radius: 10px;">
            <h1 class="text-center myArticles-doLogin" style="color: white;">Por favor, faca o login!</h1>
        </div>';
    } else {
        echo
        '<!-- Title -->
        <div class="container" style="padding: 2%; border-radius: 10px;">
            <h1 class="text-center myArticles-title" style="color: white;">MY ARTICLES</h1>
        </div>';

        include '../parts/navbar.php';

        $idUsuario = $_SESSION["usuario"]["id"];
        $sql = "SELECT * from artigos where idUsuarioCriador = '" . $idUsuario . "'";

        //Conectar o banco
        $bd = conexao();
        $resultado = $bd->query($sql);
    ?>

        <?php
        if (isset($_SESSION["logado"])) {
        ?>
            <div class="container text-right">
                <a href="editFormPost.php?id=0" type="submit" class="btn btn-create-post">Create a post</a>
            </div>
        <?php
        }
        ?>
        <div class="container container-myArticles">
            <?php
            while ($dado = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $nomeImagem = "default.jpg";

                if ($dado['nomeImagem']) {
                    $nomeImagem = $dado['nomeImagem'];
                }
            ?>
                <div class="card card-myArticle h-100">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="../resources/imagens/<?= $nomeImagem; ?>" class="card-img-myarticle" alt="...">
                        </div>
                        <div class="col-md-6 my-auto text-center">
                            <h5 class="card-post-title my-auto"><?= $dado['tituloPortugues']; ?></h5>
                        </div>
                        <div class="col-md-3 my-auto">
                            <div class="row">
                                <div class="col-6 button">
                                    <a href="editFormPost.php?id=<?= $dado['id']; ?>" class="btn btn-edit"><i class="fas fa-edit"></i></a>
                                </div>
                                <div class="col-6 button">
                                    <a href="../functions/posts/deletar.php?id=<?= $dado['id']; ?>" class="btn btn-delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php } ?>
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

    //File chooser js
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>
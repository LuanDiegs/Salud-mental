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
    .container-editFormPost {
        color: white;
        background-color: #454545;
        padding: 2%;
        border-radius: 10px;
        transition: 0.5s;
    }

    .btn-submit-login {
        margin-top: 1%;
        margin-bottom: 2%;
        background-color: #8c3dce;
        color: white;
        width: 100%;
        transition: 0.5s;
    }

    .btn-submit-login:hover {
        background-color: #5a189a;
        color: white;
        transition: 0.5s;
        box-shadow: white 0px 0px 3px;
    }

    .text-post-label {
        font-size: 16px;
        margin-top: 2%;
    }

    .title-post-input {
        transition: 0.5s;
        background-color: transparent;
        color: white;
        margin-bottom: 5%;
        outline: 0;
        border-width: 0 0 2px;
        border-color: white;
        border-radius: 0;
        font-size: 30px;
        text-align: center;
    }

    .title-post-input:focus {
        transition: 0.5s;
        border-color: #8c3dce;
        background-color: #353535;
        color: white;
    }

    #input-file-label-p {
        font-size: 16px;
        margin-bottom: 1%;
    }

    .selectMainLanguage {
        background-color: #353535;
        width: 100%;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        padding: 5px;
    }

    #imageView {
        margin-top: 5%;
        border-radius: 5px;
    }

    .container-checks {
        text-align: center;
        font-size: 22px;
        color: white;
        margin-bottom: 2%;
    }

    #file-toggle-languages {
        margin: 0px;
    }

    .container-form {
        width: 90%;
        color: white;
    }

    .text-area-post {
        background-color: #353535;
        border-color: #303030;
        color: white;
    }

    .text-area-post:focus {
        background-color: #303030;
        border-color: #303030;
        color: white;
    }

    .custom-file-input,
    .post-file-label {
        background-color: #353535;
        border-color: #303030;
        color: white;
    }

    #imageView {
        border: 1px solid black;
        height: 100%;
    }
</style>

<body>
    <!-- Title -->
    <div class="container" style="padding: 2%; border-radius: 10px;">
        <h1 class="text-center post-title" style="color: white;">POST</h1>
    </div>

    <?php
    session_start();
    include_once '../functions/banco.php';
    include_once '../parts/navbar.php';

    $hrefCadastrarOuEditar = "../functions/posts/cadastrar.php";
    $artigo = null;
    $bd = conexao();

    if (isset($_GET['id']) && $_GET['id'] != 0) {
        $hrefCadastrarOuEditar = "../functions/posts/atualizar.php?id=" . $_GET['id'];
        $idArtigo = $_GET['id'];
        $sqlGet = "SELECT * FROM artigos WHERE id = '$idArtigo'";
        $resultadoGet = $bd->query($sqlGet);

        $artigo = $resultadoGet->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <div class="container-fluid container-form">
        <form id="editFormPost" method="POST" action="<?= $hrefCadastrarOuEditar; ?>" enctype="multipart/form-data">
            <div class="container-fluid" style="margin-bottom: 3%; border: 1px solid #353535; padding: 3%; border-radius: 10px">
                <div class="row">
                    <div class="col-md-4">
                        <img style id="imageView" width="100%" <?php if ($artigo && $artigo['nomeImagem']) echo 'src="../resources/imagens/' . $artigo['nomeImagem'] . '"' ?>>
                    </div>
                    <div class="col-md-8">
                        <p id="input-file-label-p">Choose the cover image of your post</p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="validatedCustomFile" id="validatedCustomFile">
                            <label class="custom-file-label post-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid container-checks text-center" style="border: 1px solid #353535; padding: 3%; border-radius: 10px">
                <p id="choose-language">Write the text in the language that you want!</p>
                <hr style="background-color: white; opacity: 0.5">

                <div class="row">
                    <div class="col-lg-4">
                        <p id="pt-choice">PORTUGUÊS</p>
                        <div class="container container-editFormPost">
                            <input type="titlePost" class="form-control title-post-input" name="title-post-input-pt" id="title-post-input-pt" <?php if ($artigo && $artigo['tituloPortugues']) echo 'value="' . $artigo['tituloPortugues'] . '"' ?> focus>
                            <div class="form-group">
                                <label class="text-post-label" for="text-post-input-pt" required>Main text post</label>
                                <textarea class="form-control text-area-post" name="text-post-input-pt" id="text-post-input-pt" rows="10" required><?php if ($artigo && $artigo['textoPortugues']) echo $artigo['textoPortugues'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <p id="pt-choice">ENGLISH</p>
                        <div class="container container-editFormPost">
                            <input type="titlePost" class="form-control title-post-input" name="title-post-input-en" id="title-post-input-en" <?php if ($artigo && $artigo['tituloIngles']) echo 'value="' . $artigo['tituloIngles'] . '"' ?> focus>
                            <div class="form-group">
                                <label class="text-post-label" for="text-post-input-en" required>Main text post</label>
                                <textarea class="form-control text-area-post" name="text-post-input-en" id="text-post-input-en" rows="10" required><?php if ($artigo && $artigo['textoIngles']) echo $artigo['textoIngles'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <p id="pt-choice">ESPANÕL</p>
                        <div class="container container-editFormPost">
                            <input type="titlePost" class="form-control title-post-input" name="title-post-input-esp" id="title-post-input-esp" <?php if ($artigo && $artigo['tituloEspanhol']) echo 'value="' . $artigo['tituloEspanhol'] . '"' ?> focus>
                            <div class="form-group">
                                <label class="text-post-label" for="text-post-input-esp" required>Main text post</label>
                                <textarea class="form-control text-area-post" name="text-post-input-esp" id="text-post-input-esp" rows="10" required><?php if ($artigo && $artigo['textoEspanhol']) echo $artigo['textoEspanhol'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-submit-login">Submit</button>
        </form>
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

    //File chooser js
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // Change image
    let fotoProd = document.getElementById("imageView");
    let arquivo = document.getElementById("validatedCustomFile");

    arquivo.addEventListener("change", function() {
        exibir(arquivo, fotoProd);
    });

    function exibir(arquivo, foto) {
        if (arquivo.files.length != 1) {
            return;
        }
        var r = new FileReader();
        r.onload = function() {
            foto.src = r.result;
        }
        r.readAsDataURL(arquivo.files[0]);

    }
</script>

</html>
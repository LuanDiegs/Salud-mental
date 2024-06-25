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
    .container-editFormPost {
        color: white;
        background-color: #454545;
        padding: 2%;
        border-radius: 10px;
        width: 50%;
        transition: 0.5s;
    }

    .btn-submit-login {
        margin-top: 5%;
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

    #title-post-input {
        transition: 0.5s;
        background-color: transparent;
        color: white;
        margin-bottom: 5%;
        outline: 0;
        border-width: 0 0 2px;
        border-color: white;
        border-radius: 0;
        font-size: 48px;
        text-align: center;
    }

    #title-post-input:focus {
        transition: 0.5s;
        border-color: #8c3dce;
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
</style>

<body>
    <!-- Title -->
    <div class="container" style="padding: 2%; border-radius: 10px;">
        <h1 class="text-center post-title" style="color: white;">POST</h1>
    </div>

    <?php
    include_once '../functions/banco.php';
    include '../parts/navbar.php';

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

    <div class="container container-editFormPost">
        <form id="editFormPost" method="POST" action="<?= $hrefCadastrarOuEditar; ?>" enctype="multipart/form-data">
            <input type="titlePost" class="form-control" name="title-post-input" id="title-post-input" <?php if ($artigo && $artigo['tituloPortugues']) echo 'value="' . $artigo['tituloPortugues'] . '"' ?> focus>
            <p id="input-file-label-p">Choose the cover image of your post</p>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="validatedCustomFile" id="validatedCustomFile">
                <label class="custom-file-label post-file-label" for="validatedCustomFile">Choose file...</label>
            </div>
            <img style id="imageView" width="100%" <?php if ($artigo && $artigo['nomeImagem']) echo 'src="../resources/imagens/' . $artigo['nomeImagem'] . '"' ?>>
            <div class="form-group select-main-language-div" style="margin-top: 5%;">
                <label class="select-main-language" for="selectMainLanguage">Select the language that you are writting the post</label>
                <select class="selectMainLanguage" aria-label="Selecione o idioma" id="selectMainLanguage">
                    <option value="1" selected>Portuguese Brazilian</option>
                    <option value="2">English</option>
                    <option value="3">Spanish</option>
                </select>
            </div>
            <div class="form-group">
                <label class="text-post-label" for="text-post-input" required>Main text post</label>
                <textarea class="form-control" name="text-post-input" id="text-post-input" rows="5" required><?php if ($artigo && $artigo['textoPortugues']) echo $artigo['textoPortugues'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-submit-login">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
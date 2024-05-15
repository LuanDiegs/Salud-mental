<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>ECIA - SALUD MENTAL</title>

        <!-- Paleta de cores utilizada -->
        <!-- https://coolors.co/palette/012a4a-013a63-01497c-014f86-2a6f97-2c7da0-468faf-61a5c2-89c2d9-a9d6e5 -->

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    </head>
    <style>
        @font-face {
            font-family: 'OdinRounded-Bold';
            src: url('resources/fonts/OdinRounded-Bold.otf');
        }

        body{
            background-color: #282828;
            font-family: 'rubik';
        }

        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }

        .card {
            background-color: #202020;
            border-radius: 30px;
        }

        .card-text{
            color: #FFFFFF;
        }

        .card-title{
            color: #FFFFFF;
        }

        .navbar-principal{
            background-color: #202020; 
            border-radius: 10px;
            padding: 1%;
            margin-bottom: 50px;
            color: white;
            text-align: center;

            border: 2px solid #7B2CBF;
        }

        .btn-card{
            background-color: #7B2CBF;
            color: white;
        }

        .btn-card:hover{
            background-color: #3c096c;
            transition: 0.5s;
            color: white;
        }
        
    </style>
    <body>
        <?php
            //Session do carrinho
            session_start();

            if(!isset($_SESSION['carrinho'])){
                $_SESSION['carrinho'] = array();
            }

            include_once './functions/banco.php';

            $sql = "SELECT * from produto";
        ?>

        <div class="container">
            <!-- TITULO -->
            <div class="container-xl" style="padding: 2%; border-radius: 10px;">
                <h1 class="text-center main-title" style="color: white;">ECIA - SALUD MENTAL</h1>
            </div>

             <!-- Navbar -->
             <div class="container-fluid navbar-principal">
                <div class="row">
                    <div class="col-sm-3">
                    One of three columns
                    </div>
                    <div class="col-sm-3">
                    One of three columns
                    </div>
                    <div class="col-sm-3">
                    One of three columns
                    </div>
                    <div class="col-sm-3">
                        <select onchange="changeLanguage()" class="form-control form-control-sm langSelect" aria-label="Selecione o idioma" id="langSelect">
                            <option value="pt_br" selected>Portuguese Brazilian</option>
                            <option value="en_us">English</option>
                            <option value="esp">Spanish</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- CARDS -->
            <div class="container">  
                <div class="row">
                    <div class="col">
                        <div class="card h-100">
                            <img src="resources/imagens/videogame.jpg" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Videgames e como isso afeta a personalidade</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-card mt-auto">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="resources/imagens/natureza.png" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Natureza e a saude mental</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-card mt-auto">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="resources/imagens/rpg-imagem.jpg" class="card-img-top" alt="...">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Saúde mental e o RPG</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-card mt-auto">Go somewhere</a>
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
</html>

<style>
    @font-face {
        font-family: 'OdinRounded-Bold';
        src: url('resources/fonts/OdinRounded-Bold.otf');
    }

    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }

    .card {
        background-color: #202020;
    }

    .card-text {
        color: #FFFFFF;
    }

    .card-title {
        color: #FFFFFF;
    }

    .navbar-principal {
        background-color: #202020;
        border-radius: 10px;
        padding: 1%;
        margin-bottom: 50px;
        color: white;
        text-align: center;

        border: 2px solid #7B2CBF;
    }

    .btn-card {
        background-color: #7B2CBF;
        color: white;
    }

    .btn-card:hover {
        background-color: #3c096c;
        transition: 0.5s;
        color: white;
    }

    .langSelect {
        background-color: #202020;
        width: 100%;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        padding: 5px;
    }

    a {
        color: white;
        text-decoration: none;
    }

    a:hover {
        color: #c77dff;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<!-- NAVBAR -->
<div class="container navbar-principal">
    <div class="row">
        <div class="col-sm-4 my-auto navbar-item navbar-item-home">
            <a href="index.php" id="linkHome"><i class="fas fa-home"></i> HOME</a>
        </div>
        <div class="col-sm-4">
            <select onchange="changeLanguage()" class="langSelect" aria-label="Selecione o idioma" id="langSelect">
                <option value="pt_br" selected>Portuguese Brazilian</option>
                <option value="en_us">English</option>
                <option value="esp">Spanish</option>
            </select>
        </div>
        <div class="col-sm-4 my-auto navbar-item navbar-item-login">
            <a href="pages/login.php" id="linkLogin"><i class="fas fa-user"></i> LOGIN |||</a>
            <a href="pages/myArticles.php" id="linkMyPosts"><i class="fas fa-user"></i> MY POSTS (TEST)</a>
        </div>
    </div>
</div>
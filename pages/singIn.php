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
    .container-singup {
        color: white;
        background-color: #454545;
        padding: 2%;
        border-radius: 10px;
        width: 50%;
        transition: 0.5s;
    }

    .btn-submit-singup {
        margin-top: 5%;
        background-color: #8c3dce;
        color: white;
        width: 100%;
        transition: 0.5s;
    }

    .btn-submit-singup:hover {
        background-color: #5a189a;
        color: white;
        transition: 0.5s;
        box-shadow: white 0px 0px 3px;
    }

    .email-label,
    .password-label {
        font-size: 16px;
    }
</style>

<body>
    <!-- Title -->
    <div class="container" style="padding: 2%; border-radius: 10px;">
        <h1 class="text-center singup-title" style="color: white;">SIGN UP</h1>
    </div>

    <?php include '../parts/navbar.php' ?>

    <div class="container container-singup">
        <h2 class="text-center singup-container-title" style="font-weight: 500;"> Do your sign up here!</h2>
        <form>
            <div class="form-group">
                <label class="name-label" for="name">Name</label>
                <input type="name" class="form-control" id="name" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label class="email-label" for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label class="password-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" onkeyup="checkPasswords()" required>
            </div>

            <div class="form-group">
                <label class="password-confirmation-label" for="password-confirmation">Password confirmation</label>
                <input type="password" class="form-control" id="password-confirmation" onkeyup="checkPasswords()" required>
                <p id='message-confirmation-passwords'></p>
            </div>
            <button type="submit" class="btn btn-submit-singup ">Submit</button>
        </form>
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

    //Put the corret link in the href of the navbar links
    const navbarHome = document.getElementById("linkHome");
    navbarHome.href = "../index.php";

    const navbarLogin = document.getElementById("linkLogin");
    navbarLogin.href = "login.php";
</script>

</html>
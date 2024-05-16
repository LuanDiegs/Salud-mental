<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud mental</title>

    <link rel="stylesheet" href="../css/generalCss.css">
</head>
<body>
    <!-- Title -->
    <div class="container" style="padding: 2%; border-radius: 10px;">
        <h1 class="text-center login-title" style="color: white;">LOGIN</h1>
    </div>

    <?php include '../parts/navbar.php' ?>

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
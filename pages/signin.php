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
    .container-signup {
        color: white;
        background-color: #454545;
        padding: 2%;
        border-radius: 10px;
        width: 50%;
        transition: 0.5s;
    }

    .btn-submit-signup {
        margin-top: 5%;
        background-color: #8c3dce;
        color: white;
        width: 100%;
        transition: 0.5s;
    }

    .btn-submit-signup:hover {
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
        <h1 class="text-center signup-title" style="color: white;">SIGN UP</h1>
    </div>

    <?php
    include_once '../functions/banco.php';
    include '../parts/navbar.php'
    ?>

    <div class="container container-signup">
        <h2 class="text-center signup-container-title" style="font-weight: 500;"> Do your sign up here!</h2>
        <form id="signIn" method="POST" action="../functions/login/cadastrar.php" onSubmit="return validateForm();">
            <div class="form-group">
                <label class="name-label" for="name">Name</label>
                <input type="name" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label class="email-label" for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label class="password-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" onkeyup="checkPasswords()" required>
            </div>

            <div class="form-group">
                <label class="password-confirmation-label" for="password-confirmation" invalid>Password confirmation</label>
                <input type="password" class="form-control" id="password-confirmation" onkeyup="checkPasswords()" required>
                <p id='message-confirmation-passwords'></p>
            </div>
            <button type="submit" class="btn btn-submit-signup ">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

<?php
include_once '../functions/translate.php';
?>

<script>
    let passwordCheck = false;

    let checkPasswords = function() {
        const valueSelect = langSelect.value;
        const passwordValue = document.getElementById('password').value;
        const passwordConfirmationValue = document.getElementById('password-confirmation').value;
        const formSignIn = document.getElementById('signIn');

        if (passwordValue && passwordConfirmationValue) {
            if (passwordValue == passwordConfirmationValue) {
                messageConfirmationPasswords.style.color = 'green';
                messageConfirmationPasswords.textContent = data[valueSelect].messageConfirmationPasswordsMatch;

                passwordCheck = true;
            } else {
                messageConfirmationPasswords.style.color = 'red';
                messageConfirmationPasswords.textContent = data[valueSelect].messageConfirmationPasswordsDontMatch;

                passwordCheck = false;
            }
        }
    }

    function validateForm() {
        return passwordCheck;
    }

    // Run when the page is loaded
    window.onload = function onload() {
        changeLanguage();
    }

    fixLinks();
</script>

</html>
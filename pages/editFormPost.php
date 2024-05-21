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

    #title-post-input{
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

    #title-post-input:focus{
        transition: 0.5s;
        border-color: #8c3dce;
    }

    #input-file-label-p{
        font-size: 16px;
        margin-bottom: 1%; 
    }
</style>

<body>
    <!-- Title -->
    <div class="container" style="padding: 2%; border-radius: 10px;">
        <h1 class="text-center post-title" style="color: white;">POST</h1>
    </div>

    <?php include '../parts/navbar.php' ?>

    <div class="container container-editFormPost">
        <form>
            <input type="titlePost" class="form-control" id="title-post-input" focus>
            <p id="input-file-label-p">Choose the cover image of your post</p>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" accept="image/*" required>
                <label class="custom-file-label post-file-label" for="validatedCustomFile">Choose file...</label>
            </div>
            <div class="form-group">
                <label class="text-post-label" for="text-post-input" required>Text post</label>
                <textarea class="form-control" id="text-post-input" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-submit-login ">Submit</button>
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

    fixLinks();
    
    //File chooser js
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        console.log($(this).val().split("\\").pop())
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>
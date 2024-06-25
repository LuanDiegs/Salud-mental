<script>
    const langSelect = document.getElementById('langSelect');

    const title = document.querySelector('.main-title');
    const signUptitle = document.querySelector('.signup-title');

    const loginContainerTitle = document.querySelector('.login-container-title');

    const signUpContainerTitle = document.querySelector('.signup-container-title');

    const emailLabel = document.querySelector('.email-label');
    const emailInput = document.getElementById('email');

    const passwordLabel = document.querySelector('.password-label');
    const passwordInput = document.getElementById('password');

    const passwordConfirmationLabel = document.querySelector('.password-confirmation-label');
    const passworConfirmationdInput = document.getElementById('password-confirmation');

    const messageConfirmationPasswords = document.getElementById('message-confirmation-passwords');

    const nameLabel = document.querySelector('.name-label');
    const nameInput = document.getElementById('name');

    const submitLoginButton = document.querySelector('.btn-submit-login');
    const submitSignInButton = document.querySelector('.btn-submit-signup');

    const postTitleEditFormInput = document.getElementById('title-post-input');

    const postFileImagemLabelP = document.getElementById('input-file-label-p');
    const postFileImagemLabel = document.querySelector('.post-file-label');

    const textPostLabel = document.querySelector('.text-post-label');
    const textPostInput = document.getElementById('text-post-input');

    const signInLink = document.querySelector('.signin-link');

    const createPostButton = document.querySelector('.btn-create-post');

    const selectMainLanguageLabel = document.querySelector('.select-main-language');

    const myPostsTitle = document.querySelector('.myArticles-title');

    const postText = document.querySelector('.post-text');

    const postTitleText = document.querySelector('.title-post');

    const myPostsNavbar = document.getElementById('linkMyPosts');

    const signOut = document.getElementById('linkDeslogar');

    const goToPost = document.getElementsByClassName('go-to-post');

    let idArticle = null;

    if (parseURLParams(location.href)) {
        if (parseURLParams(location.href).id) {
            idArticle = parseURLParams(location.href).id[0];
        }
    }

    function changeLanguage() {
        const valueSelect = langSelect.value;

        //Change the title of the page
        document.title = data[valueSelect].title

        //Change the text of this component
        if (title) {
            title.textContent = data[valueSelect].title;
        }

        //Change the text of this component
        if (signUptitle) {
            signUptitle.textContent = data[valueSelect].signUptitle;
        }

        //Change the text of this component
        if (loginContainerTitle) {
            loginContainerTitle.textContent = data[valueSelect].loginContainerTitle;
        }

        //Change the text of this component
        if (signUpContainerTitle) {
            signUpContainerTitle.textContent = data[valueSelect].signupContainerTitle;
        }

        //Change the text of this component
        if (emailLabel) {
            emailLabel.textContent = data[valueSelect].emailLabel;
            emailInput.placeholder = data[valueSelect].emailPlaceholder;
        }

        //Change the text of this component
        if (passwordLabel) {
            passwordLabel.textContent = data[valueSelect].passwordLabel;
            passwordInput.placeholder = data[valueSelect].passwordPlaceholder;
        }

        //Change the text of this component
        if (submitLoginButton) {
            submitLoginButton.textContent = data[valueSelect].submitBtn;
        }

        //Change the text of this component
        if (submitSignInButton) {
            submitSignInButton.textContent = data[valueSelect].submitBtn;
        }

        //Change the text of this component
        if (passwordConfirmationLabel) {
            passwordConfirmationLabel.textContent = data[valueSelect].passwordConfirmationLabel;
            passworConfirmationdInput.placeholder = data[valueSelect].passwordConfirmationPlaceholder;
        }

        //Change the text of this component
        if (nameLabel) {
            nameLabel.textContent = data[valueSelect].nameLabel;
            nameInput.placeholder = data[valueSelect].namePlaceholder;
        }

        //Change the text of this component
        if (postTitleEditFormInput) {
            postTitleEditFormInput.placeholder = data[valueSelect].titleEditFormPlaceholder;
        }

        //Change the text of this component
        if (postFileImagemLabelP) {
            postFileImagemLabelP.textContent = data[valueSelect].coverImagePostLabelP;
            postFileImagemLabel.textContent = data[valueSelect].coverImagePostLabel;
        }

        //Change the text of this component
        if (textPostLabel) {
            textPostLabel.textContent = data[valueSelect].textPostLabel;
            textPostInput.placeholder = data[valueSelect].textPostPlaceholder;
        }

        //Change the text of this component
        if (signInLink) {
            signInLink.textContent = data[valueSelect].signInLink;
        }

        //Change the text of this component
        if (createPostButton) {
            createPostButton.textContent = data[valueSelect].createPostButton;
        }

        //Change the text of this component
        if (selectMainLanguageLabel) {
            selectMainLanguageLabel.textContent = data[valueSelect].selectMainLanguageLabel;
        }

        //Change the text of this component
        if (myPostsTitle) {
            myPostsTitle.textContent = data[valueSelect].myPostsTitle;
        }

        //Change the text of this component
        if (myPostsNavbar) {
            myPostsNavbar.innerHTML = '<i class="fas fa-user"></i>' + data[valueSelect].myPostsNavbar.toUpperCase();
        }

        //Change the text of this component
        if (goToPost) {
            for (var i = 0, len = goToPost.length; i < len; i++) {
                goToPost[i].textContent = data[valueSelect].goToPost;
            }
        }

        //Change the text of this component
        if (signOut) {
            signOut.innerHTML = '<i class="fas fa-reply" aria-hidden="true"></i> ' + data[valueSelect].signOut.toUpperCase();
        }

        //Change the text of this component
        if (messageConfirmationPasswords) {
            checkPasswords();
        }

        //Create json articles
        var articles = {
            "pt_br": [],
            "en_us": [],
            "esp": []
        };

        <?php
        $sql = "SELECT * from artigos";

        //Conectar o banco
        $bd = conexao();
        $resultado = $bd->query($sql);

        if ($resultado) {
            while ($dado = $resultado->fetch(PDO::FETCH_ASSOC)) {
        ?>
                var textTitleArticle = "article<?= $dado["id"]; ?>Title";
                var textArticle = "article<?= $dado["id"]; ?>Text";

                articles["pt_br"][<?= $dado["id"]; ?>] = {
                    [textTitleArticle]: '<?= addslashes($dado["tituloPortugues"]); ?>',
                    [textArticle]: '<?= addslashes($dado["textoPortugues"]); ?>'
                };

                articles["en_us"][<?= $dado["id"]; ?>] = {
                    [textTitleArticle]: '<?= addslashes($dado["tituloIngles"]); ?>',
                    [textArticle]: '<?= addslashes($dado["textoIngles"]); ?>'
                };

                articles["esp"][<?= $dado["id"]; ?>] = {
                    [textTitleArticle]: '<?= addslashes($dado["tituloEspanhol"]); ?>',
                    [textArticle]: '<?= addslashes($dado["textoEspanhol"]); ?>'
                };

                //Put the title in the correct language in the card
                const card<?= $dado['id'] ?>TitleText = document.querySelector(`.card-title-<?= $dado["id"]; ?>`);
                if (card<?= $dado['id'] ?>TitleText) {
                    card<?= $dado['id'] ?>TitleText.textContent = articles[valueSelect][<?= $dado["id"]; ?>].article<?= $dado['id'] ?>Title;
                }
        <?php
            }
        }
        ?>

        //Change the text of this component
        if (postText) {
            var indexPostText = idArticle;
            var textArticle = `article${idArticle.toString()}Text`;

            if (articles[valueSelect][indexPostText][textArticle]) {
                postText.textContent = articles[valueSelect][indexPostText][textArticle];
            }
        }

        //Change the text of this component
        if (postTitleText) {
            var indexPostText = idArticle;
            var textTitleArticle = `article${idArticle.toString()}Title`;

            if (articles[valueSelect][indexPostText][textTitleArticle]) {
                postTitleText.textContent = articles[valueSelect][indexPostText][textTitleArticle];
            }
        }
    }

    var data = {
        "en_us": {
            "coverImagePostLabelP": "Choose the cover image of your post",
            "coverImagePostLabel": "Choose a image file",
            "createPostButton": "Create a post",
            "emailLabel": "Email adress",
            "emailPlaceholder": "Enter your email here",
            "goToPost": "Go to post",
            "loginContainerTitle": "Do your login here!",
            "messageConfirmationPasswordsDontMatch": "The passwords don't match",
            "messageConfirmationPasswordsMatch": "The passwords match",
            "myPostsNavbar": "My posts",
            "myPostsTitle": "My posts",
            "nameLabel": "Name",
            "namePlaceholder": "Enter your name here",
            "passwordConfirmationLabel": "Password confirmation",
            "passwordConfirmationPlaceholder": "Enter your password again",
            "passwordLabel": "Password",
            "passwordPlaceholder": "Enter your password here",
            "selectMainLanguageLabel": "Select the main language of your post",
            "signInLink": "Don't have an account? Sign in!",
            "signUptitle": "SIGN UP",
            "signupContainerTitle": "Do your sign up here!",
            "signOut": "Sign out",
            "submitBtn": "Submit",
            "textPostLabel": "Main text of your post",
            "textPostPlaceholder": "Enter your text here",
            "title": "ECIA - Mental health",
            "titleEditFormPlaceholder": "Enter the title of the post"
        },
        "esp": {
            "coverImagePostLabelP": "Introduzca la imagen de portada de su post",
            "coverImagePostLabel": "Elige un archivo de imagen",
            "createPostButton": "Crear una publicación",
            "emailLabel": "Email",
            "emailPlaceholder": "Introduzca su correo electrónico",
            "goToPost": "Ir para el post",
            "loginContainerTitle": "¡Haga el login a continuación!",
            "messageConfirmationPasswordsDontMatch": "Las contraseñas no coinciden",
            "messageConfirmationPasswordsMatch": "Las contraseñas coinciden",
            "myPostsNavbar": "Mis posts",
            "myPostsTitle": "Mis publicaciones",
            "nameLabel": "Nombre",
            "namePlaceholder": "Introduzca su nombre",
            "passwordConfirmationLabel": "Confirmación de contraseña",
            "passwordConfirmationPlaceholder": "Introduzca su contraseña de nuevo",
            "passwordLabel": "Contraseña",
            "passwordPlaceholder": "Introduzca su contraseña",
            "selectMainLanguageLabel": "Selecciona el idioma principal de su publicación",
            "signInLink": "¿No tienes una cuenta? ¡Inscríbase!",
            "signUptitle": "INSCRIBIRSE",
            "signupContainerTitle": "¡Haga su cadastro a continuación!",
            "signOut": "Desconectar",
            "submitBtn": "Enviar",
            "textPostLabel": "Texto principal de tu publicación",
            "textPostPlaceholder": "Introduzca el texto de su post aqui",
            "title": "ECIA - Salud mental",
            "titleEditFormPlaceholder": "Introduzca el título del post"
        },
        "pt_br": {
            "coverImagePostLabelP": "Insira a imagem de capa do seu post",
            "coverImagePostLabel": "Escolha um arquivo de imagem",
            "createPostButton": "Criar uma postagem",
            "emailLabel": "Email",
            "emailPlaceholder": "Insira o seu email aqui",
            "goToPost": "Ir para o post",
            "loginContainerTitle": "Faça o seu login aqui!",
            "messageConfirmationPasswordsDontMatch": "As senhas não coincidem",
            "messageConfirmationPasswordsMatch": "As senhas coincidem",
            "myPostsNavbar": "Meus posts",
            "myPostsTitle": "Minhas postagens",
            "nameLabel": "Nome",
            "namePlaceholder": "Insira seu nome aqui",
            "passwordConfirmationLabel": "Confirmação de senha",
            "passwordConfirmationPlaceholder": "Insira sua senha novamente",
            "passwordLabel": "Senha",
            "passwordPlaceholder": "Insira sua senha aqui",
            "selectMainLanguageLabel": "Selecione a lingua principal do seu post",
            "signInLink": "Não tem uma conta? Inscreva-se!",
            "signUptitle": "INSCREVER-SE",
            "signupContainerTitle": "Faça seu cadastro aqui!",
            "signOut": "Deslogar",
            "submitBtn": "Enviar",
            "textPostLabel": "Texto principal da sua postagem",
            "textPostPlaceholder": "Insira o texto do seu post aqui",
            "title": "ECIA - Saúde mental",
            "titleEditFormPlaceholder": "Insira o título da postagem"
        }
    }

    function fixLinks() {
        //Put the corret link in the href of the navbar links
        const navbarHome = document.getElementById("linkHome");
        navbarHome.href = "../index.php";

        const navbarLogin = document.getElementById("linkLogin");
        if (navbarLogin) {
            navbarLogin.href = "login.php";
        }

        const navbarMyPosts = document.getElementById("linkMyPosts");
        if (navbarMyPosts) {
            navbarMyPosts.href = "myPosts.php";
        }

        const navbarDeslogar = document.getElementById("linkDeslogar");
        if (navbarDeslogar) {
            navbarDeslogar.href = "../functions/login/deslogar.php";
        }
    }


    //Commom
    function parseURLParams(url) {
        var queryStart = url.indexOf("?") + 1,
            queryEnd = url.indexOf("#") + 1 || url.length + 1,
            query = url.slice(queryStart, queryEnd - 1),
            pairs = query.replace(/\+/g, " ").split("&"),
            parms = {},
            i, n, v, nv;

        if (query === url || query === "") return;

        for (i = 0; i < pairs.length; i++) {
            nv = pairs[i].split("=", 2);
            n = decodeURIComponent(nv[0]);
            v = decodeURIComponent(nv[1]);

            if (!parms.hasOwnProperty(n)) parms[n] = [];
            parms[n].push(nv.length === 2 ? v : null);
        }
        return parms;
    }
</script>
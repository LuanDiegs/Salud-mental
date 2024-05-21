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

// Tests
//console.log("hello");

function changeLanguage() {
    const valueSelect = langSelect.value;

    //Change the title of the page
    document.title = data[valueSelect].title

    //Change the text of this component
    if(title){
        title.textContent = data[valueSelect].title;
    }

    //Change the text of this component
    if(signUptitle){
        signUptitle.textContent = data[valueSelect].signUptitle;
    }

    //Change the text of this component
    if(loginContainerTitle){
        loginContainerTitle.textContent = data[valueSelect].loginContainerTitle;
    }

    //Change the text of this component
    if(signUpContainerTitle){
        signUpContainerTitle.textContent = data[valueSelect].signupContainerTitle;
    }

    //Change the text of this component
    if(emailLabel){
        emailLabel.textContent = data[valueSelect].emailLabel;
        emailInput.placeholder = data[valueSelect].emailPlaceholder;
    }

    //Change the text of this component
    if(passwordLabel){
        passwordLabel.textContent = data[valueSelect].passwordLabel;
        passwordInput.placeholder = data[valueSelect].passwordPlaceholder;
    }

    //Change the text of this component
    if(submitLoginButton){
        submitLoginButton.textContent = data[valueSelect].submitBtn;
    }

    //Change the text of this component
    if(submitSignInButton){
        submitSignInButton.textContent = data[valueSelect].submitBtn;
    }

    //Change the text of this component
    if(passwordConfirmationLabel){
        passwordConfirmationLabel.textContent = data[valueSelect].passwordConfirmationLabel;
        passworConfirmationdInput.placeholder = data[valueSelect].passwordConfirmationPlaceholder;
    }

    //Change the text of this component
    if(nameLabel){
        nameLabel.textContent = data[valueSelect].nameLabel;
        nameInput.placeholder = data[valueSelect].namePlaceholder;
    }

    //Change the text of this component
    if(postTitleEditFormInput){
        postTitleEditFormInput.placeholder = data[valueSelect].titleEditFormPlaceholder;
    }

    //Change the text of this component
    if(postFileImagemLabelP){
        postFileImagemLabelP.textContent = data[valueSelect].coverImagePostLabelP;
        postFileImagemLabel.textContent = data[valueSelect].coverImagePostLabel;
    }

    //Change the text of this component
    if(textPostLabel){
        textPostLabel.textContent = data[valueSelect].textPostLabel;
        textPostInput.placeholder = data[valueSelect].textPostPlaceholder;
    }

    //Change the text of this component
    if(messageConfirmationPasswords){
        checkPasswords();
    }

}

var data = {
    "en_us": {
        "coverImagePostLabelP": "Choose the cover image of your post",
        "coverImagePostLabel": "Choose a image file",
        "emailLabel": "Email adress",
        "emailPlaceholder": "Enter your email here",
        "loginContainerTitle": "Do your login here!",
        "messageConfirmationPasswordsDontMatch": "The passwords don't match",
        "messageConfirmationPasswordsMatch": "The passwords match",
        "nameLabel": "Name",
        "namePlaceholder": "Enter your name here",
        "passwordConfirmationLabel": "Password confirmation",
        "passwordConfirmationPlaceholder": "Enter your password again",
        "passwordLabel": "Password",
        "passwordPlaceholder": "Enter your password here",
        "signUptitle": "SIGN UP",
        "signupContainerTitle": "Do your sign up here!",
        "submitBtn": "Submit",
        "textPostLabel": "Text of your post",
        "textPostPlaceholder": "Enter your text here",
        "title": "ECIA - Mental health",
        "titleEditFormPlaceholder": "Enter the title of the post"
    },
    "esp": {
        "coverImagePostLabelP": "Introduzca la imagen de portada de su post",
        "coverImagePostLabel": "Elige un archivo de imagen",
        "emailLabel": "Email",
        "emailPlaceholder": "Introduzca su correo electrónico",
        "loginContainerTitle": "Haga el login a continuación!",
        "messageConfirmationPasswordsDontMatch": "Las contraseñas no coinciden",
        "messageConfirmationPasswordsMatch": "Las contraseñas coinciden",
        "nameLabel": "Nombre",
        "namePlaceholder": "Introduzca su nombre",
        "passwordConfirmationLabel": "Confirmación de contraseña",
        "passwordConfirmationPlaceholder": "Introduzca su contraseña de nuevo",
        "passwordLabel": "Contraseña",
        "passwordPlaceholder": "Introduzca su contraseña",
        "signUptitle": "INSCRIBIRSE",
        "signupContainerTitle": "Haga su cadastro a continuación!",
        "submitBtn": "Enviar",
        "textPostLabel": "Texto de su post",
        "textPostPlaceholder": "Introduzca el texto de su post aqui",
        "title": "ECIA - Salud mental",
        "titleEditFormPlaceholder": "Introduzca el título del post"
    },
    "pt_br": {
        "coverImagePostLabelP": "Insira a imagem de capa do seu post",
        "coverImagePostLabel": "Escolha um arquivo de imagem",
        "emailLabel": "Email",
        "emailPlaceholder": "Insira o seu email aqui",
        "loginContainerTitle": "Faça o seu login aqui!",
        "messageConfirmationPasswordsDontMatch": "As senhas não coincidem",
        "messageConfirmationPasswordsMatch": "As senhas coincidem",
        "nameLabel": "Nome",
        "namePlaceholder": "Insira seu nome aqui",
        "passwordConfirmationLabel": "Confirmação de senha",
        "passwordConfirmationPlaceholder": "Insira sua senha novamente",
        "passwordLabel": "Senha",
        "passwordPlaceholder": "Insira sua senha aqui",
        "signUptitle": "INSCREVER-SE",
        "signupContainerTitle": "Faça seu cadastro aqui!",
        "submitBtn": "Enviar",
        "textPostLabel": "Texto do post",
        "textPostPlaceholder": "Insira o texto do seu post aqui",
        "title": "ECIA - Saúde mental",
        "titleEditFormPlaceholder": "Insira o título da postagem"
    }
}

var checkPasswords = function() {
    const valueSelect = langSelect.value;
    const passwordValue = document.getElementById('password').value;
    const passwordConfirmationValue = document.getElementById('password-confirmation').value;

    if(passwordValue && passwordConfirmationValue){
        if (passwordValue == passwordConfirmationValue) {
                messageConfirmationPasswords.style.color = 'green';
                messageConfirmationPasswords.textContent = data[valueSelect].messageConfirmationPasswordsMatch;
        } else {
            messageConfirmationPasswords.style.color = 'red';
            messageConfirmationPasswords.textContent = data[valueSelect].messageConfirmationPasswordsDontMatch;
        }
    }
}

function fixLinks(){
    //Put the corret link in the href of the navbar links
    const navbarHome = document.getElementById("linkHome");
    navbarHome.href = "../index.php";

    const navbarLogin = document.getElementById("linkLogin");
    navbarLogin.href = "login.php";

    const navbarSignIn = document.getElementById("linkSignIn");
    navbarSignIn.href = "signin.php";
}
const langSelect = document.getElementById('langSelect');

const title = document.querySelector('.main-title');
const singUptitle = document.querySelector('.singup-title');

const loginContainerTitle = document.querySelector('.login-container-title');

const singUpContainerTitle = document.querySelector('.singup-container-title');

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
const submitSingInButton = document.querySelector('.btn-submit-singup');

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
    if(singUptitle){
        singUptitle.textContent = data[valueSelect].singUptitle;
    }

    //Change the text of this component
    if(loginContainerTitle){
        loginContainerTitle.textContent = data[valueSelect].loginContainerTitle;
    }

    //Change the text of this component
    if(singUpContainerTitle){
        singUpContainerTitle.textContent = data[valueSelect].singupContainerTitle;
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
    if(submitSingInButton){
        submitSingInButton.textContent = data[valueSelect].submitBtn;
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
    if(messageConfirmationPasswords){
        checkPasswords();
    }

}

var data = {
    "en_us":{
        "title": "ECIA - Mental health",
        "singUptitle": "SIGN UP",
        "loginContainerTitle": "Do your login here!",
        "singupContainerTitle": "Do your sign up here!",
        "emailLabel": "Email adress",
        "emailPlaceholder": "Enter your email here",
        "passwordLabel": "Password",
        "passwordPlaceholder": "Enter your password here",
        "submitBtn": "Submit",
        "passwordConfirmationLabel": "Password confirmation",
        "passwordConfirmationPlaceholder": "Enter your password again",
        "nameLabel": "Name",
        "namePlaceholder": "Enter your name here",
        "messageConfirmationPasswordsMatch": "The passwords match",
        "messageConfirmationPasswordsDontMatch": "The passwords don't match",
    },
    "pt_br":{
        "title": "ECIA - Saúde mental",
        "singUptitle": "INSCREVER-SE",
        "loginContainerTitle": "Faça o seu login aqui!",
        "singupContainerTitle": "Faça seu cadastro aqui!",
        "emailLabel": "Email",
        "emailPlaceholder": "Insira o seu email aqui",
        "passwordLabel": "Senha",
        "passwordPlaceholder": "Insira sua senha aqui",
        "submitBtn": "Enviar",
        "passwordConfirmationLabel": "Confirmação de senha",
        "passwordConfirmationPlaceholder": "Insira sua senha novamente",
        "nameLabel": "Nome",
        "namePlaceholder": "Insira seu nome aqui",
        "messageConfirmationPasswordsMatch": "As senhas coincidem",
        "messageConfirmationPasswordsDontMatch": "As senhas não coincidem",
    },
    "esp":{
        "title": "ECIA - Salud mental",
        "singUptitle": "INSCRIBIRSE",
        "loginContainerTitle": "Haga el login a continuación!",
        "singupContainerTitle": "Haga su cadastro a continuación!",
        "emailLabel": "Email",
        "emailPlaceholder": "Introduzca su correo electrónico",
        "passwordLabel": "Contraseña",
        "passwordPlaceholder": "Introduzca su contraseña",
        "submitBtn": "Enviar",
        "passwordConfirmationLabel": "Confirmación de contraseña",
        "passwordConfirmationPlaceholder": "Introduzca su contraseña de nuevo",
        "nameLabel": "Nombre",
        "namePlaceholder": "Introduzca su nombre",
        "messageConfirmationPasswordsMatch": "Las contraseñas coinciden",
        "messageConfirmationPasswordsDontMatch": "Las contraseñas no coinciden",
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
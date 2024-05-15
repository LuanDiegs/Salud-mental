const langSelect = document.getElementById('langSelect');
const titulo = document.querySelector('.main-title');

window.onload = () => {
    console.log("oi");
    changeLanguage();
}

function changeLanguage() {
    const valueSelect = langSelect.value;
    titulo.textContent = data[valueSelect].titulo;
}

var data = {
    "en_us":{
        "titulo": "ECIA - Mental health",
    },
    "pt_br":{
        "titulo": "ECIA - Saúde mental"
    },
    "esp":{
        "titulo": "ECIA - Salud mental"
    }
}
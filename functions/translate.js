const langSelect = document.getElementById('langSelect');
const title = document.querySelector('.main-title');

function changeLanguage() {
    const valueSelect = langSelect.value;

    //Change the title of the page
    document.title = data[valueSelect].title

    //Change the main title of the home page
    if(title){
        title.textContent = data[valueSelect].title;
    }

}

var data = {
    "en_us":{
        "title": "ECIA - Mental health",
    },
    "pt_br":{
        "title": "ECIA - Saúde mental"
    },
    "esp":{
        "title": "ECIA - Salud mental"
    }
}
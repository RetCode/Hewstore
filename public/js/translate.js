const languages = JSON.stringify({
    // "RU":{
    //     "main-text":"Разнообразный и богатый опыт начала ежедневной работы по формованию",
    //     "description-text":"Почему вам следует выбрать нас? - Лучшие продукты на мировом рынке, Быстрая поддержка, Мгновенное получение, Наш опыт.",
    //     "purshare-button":"Купить чит",
    //     "more-details-button":"Показать больше",
    //     "name-block":"ОБЪЯВЛЕНИЯ",
    // },
    "ENG":{
        "main-text":"The best software store for games and more",
        "description-text":"Why should you choose us? - The best products on the global market, Quick support, Instant delivery, Our experience.",
        "purshare-button":"PURCHASE CHEAT",
        "more-details-button":"CONTACT US",
        "name-block":"ANNOUNCEMENTS",
    }
});



const langsItems = document.querySelectorAll(".lang");
let currentLang = JSON.parse(languages).ENG;

langsItems.forEach(element => {
    if(element.innerHTML in currentLang)
       element.innerHTML = currentLang[element.innerHTML];
});



// Покрыть проверками на сущ объекта и другие ошибки, перенсти локалку в бэк
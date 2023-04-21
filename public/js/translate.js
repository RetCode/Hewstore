
var userLang;

const languages = JSON.stringify({
    "ru":{
        "main-text":"Лучший магазин софта для игр и не только",
        "description-text":"Почему вам следует выбрать нас? - Лучшие продукты на мировом рынке, Быстрая поддержка, Мгновенное получение, Наш опыт.",
        "purshare-button":"КУПИТЬ ЧИТ",
        "more-details-button":"СВЯЗАТЬСЯ С НАМИ",
        "announcement":"АНОНСЫ",
        "announcement-archive":"АРХИВ АНОНСОВ",
        "games": "ИГРЫ",
        "games-description": "Найдите и выберите интересующую вас игру, чтобы перейти к продуктам, доступным для этой игры",
        "search": "Поиск",
        "contacts": "КОНТАКТЫ",
        "contacts-description": "Если у вас возникли проблемы или вопросы, пожалуйста, свяжитесь с нами, мы всегда рады помочь",
        "discord-server": "Сервер Discord",
        "home": "ГЛАВНАЯ",
        "products": "ПРОДУКТЫ",
        "cart": "КОРЗИНА",
        "cart-products": "Продуктов",
        "cart-clear-all": "Убрать все",
        "cart-product": "Продукт",
        "cart-product-cost": "Итого",
        "cart-pay-button": "Перейти к оплате",
        "cart-promo": "Промокод",
        "cart-mail": "Почта",
        "game-description": "Прочитайте описание продукта или воспользуйтесь фильтром, чтобы найти продукт, совместимый с вашей системой",
        "announcements_open-link": "ОТКРЫТЬ",
        "announcement_archive-desc": "Архив анонсов за все время. Благодаря ему вы никогда не пропустите важную информацию. Изучите его..."
    },
    "en":{
        "main-text":"The best software store for games and more",
        "description-text":"Why should you choose us? - The best products on the global market, Quick support, Instant delivery, Our experience.",
        "purshare-button":"PURCHASE CHEAT",
        "more-details-button":"CONTACT US",
        "announcement":"ANNOUNCEMENTS",
        "announcement-archive":"ANNOUNCEMENT ARCHIVE",
        "games": "GAMES",
        "games-description": "Find and select the game you are interested in to go to the products available for that game",
        "search": "Search",
        "contacts": "CONTACTS",
        "contacts-description": "If you have any problems or questions, please contact us, we are always happy to help",
        "discord-server": "Discord Community",
        "home": "HOME",
        "products": "PRODUCTS",
        "cart": "CART",
        "cart-products": "Products",
        "cart-clear-all": "Clear all",
        "cart-product": "Product",
        "cart-product-cost": "Total",
        "cart-pay-button": "Proceed to checkout",
        "cart-promo": "Coupon code",
        "cart-mail": "Email for invoice updates",
        "game-description": "Read the product description or use the filter to find a product that is compatible with your system",
        "announcements_open-link": "OPEN",
        "announcement_archive-desc": "An archive of all-time announcements. Thanks to it, you will never miss important information. Explore it..."
    }
});

function getLang()
{
    if(localStorage.getItem("currentLang") != null)
    {
        tmp_leng = localStorage.getItem('currentLang');
            
    }
    else
    {
        var userLanguage = navigator.language || navigator.userLanguage;
        var languageCode = userLanguage.split('-')[0];
        tmp_leng = languageCode;
    }

    return tmp_leng
}

function insertLangWord()
{
    userLang = getLang()

    if(userLang == "ru")
    {
        document.getElementById("en").classList.remove("active");
        document.getElementById("ru").classList.add("active");
    }
    else
    {
        document.getElementById("en").classList.add("active");
        document.getElementById("ru").classList.remove("active");
    }

    const langsItems = document.querySelectorAll(".lang");
    let currentLang = JSON.parse(languages)[userLang];

    langsItems.forEach(element => {
        element_key = element.getAttribute("data-text");
        if(element_key in currentLang)
        {
            let element_text = element.innerHTML;
            let new_text = element_text.replace('{text}', currentLang[element_key]);
            element.innerHTML = new_text;
        }
    });

    try{
        const langInput = document.querySelectorAll(".langInput");
        langInput.forEach(element => {
            input_text = element.getAttribute("placeholder");
            element.setAttribute("placeholder", input_text.replace('{text}', currentLang[element.getAttribute("data-text")]));
        });
    } catch {}
}

insertLangWord();

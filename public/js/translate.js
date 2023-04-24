
var userLang;

const languages = JSON.stringify({
    "ru":{
        "main-text":"Лучший магазин софта для игр и не только",
        "description-text":"Почему вам следует выбрать нас? - Лучшие продукты на мировом рынке, Быстрая поддержка, Мгновенное получение, Наш опыт.<br><br>Хотите задать вопрос? - Свяжитесь с нами! Мы открыты для любых вопросов :)",
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
        "announcement_archive-desc": "Архив анонсов за все время. Благодаря ему вы никогда не пропустите важную информацию. Изучите его...",
        "select_payment-text": "Выберите метод оплаты",
        "cryptocurrencies_method-title": "Криптовалюты",
        "binance_method-desc": 'Если у вас нет учетной записи Binance, <a href="#">зарегистрируйтесь здесь</a> и отправляйте криптовалюту без комиссии.',
        "alert_Title": "ВАЖНО",
        "alert_Desc": "Следуйте информации, которая будет указана на следующей странице, чтобы мы смогли получить и обработать ваш платеж.",
        "correct_text": "Все верно?",
        "continue_button": "Продолжить",
        "payment_title": "Платежные Реквизиты",
        "payment_desc": "Благодарим вас за подачу заявки. Пожалуйста, заполните заявку ниже и оплатите заказ.",
        "orderId": "Номера заказа",
        "price": "Цена",
        "coin": "Монета",
        "network": "Сеть",
        "email": "Почта",
        "transaction_date": "Дата заказа",
        "order_cancel": "Отмена через:",
        "change_method": "Сменить способ оплаты",
        "status": "Статус заказа",
        "faq_text": 'Если есть вопросы, пожалуйста свяжитесь с <a href="/">Поддержкой</a>',
        "qrcode_title": "Чтобы оплатить, отсканируйте QR-код<br> через свой мобильный кошелек.",
        "qrcode_desc1": "Или оплатите",
        "qrcode_desc2": "на",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
    },
    "en":{
        "main-text":"The best software store for games and more",
        "description-text":"Why should you choose us? - The best products on the global market, Quick support, Instant delivery, Our experience.<br><br>Want to ask a question? - Contact us! We are open to any question :)",
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
        "announcement_archive-desc": "An archive of all-time announcements. Thanks to it, you will never miss important information. Explore it...",
        "select_payment-text": "Choose a payment method",
        "cryptocurrencies_method-title": "Cryptocurrencies",
        "binance_method-desc": 'If you do not have a Binance account, <a href="#">register here</a> and send crypto transactions with 0% fees.',
        "alert_Title": "IMPORTANT",
        "alert_Desc": "Follow the information on the next page so we can receive and process your payment.",
        "correct_text": "Is that correct?",
        "continue_button": "Continue",
        "payment_title": "Payment Details",
        "payment_desc": "Thank you for submitting an application. Please fill out the application below and pay for the order.",
        "orderId": "Order Id",
        "price": "Price",
        "coin": "Coin",
        "network": "Network",
        "email": "EMail",
        "transaction_date": "Transaction date",
        "order_cancel": "Canceled in",
        "change_method": "Change payment method",
        "status": "Status",
        "faq_text": 'If you have any quastions, please contact <a href="/">Support</a>',
        "qrcode_title": "To pay, scan the QR code<br> through your mobile wallet.",
        "qrcode_desc1": 'Or send',
        "qrcode_desc2": "to",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",
        "": "",

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

let searchArray;

function limitStr(str, n) {
    if(str.length > n)
        return str.substr(0, n) + "...";
    else
        return str;
}

document.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',        
        data: {method: 'getGames'},
        success: function(data){
            let items = document.querySelector('.products_items-block');
            let loadingGIF = document.querySelector('.loading');

            searchArray = data["items"];

            lang = getLang()
            langProductsCaption = lang == "ru" ? "ПОСМОТРЕТЬ ПРОДУКТЫ" : "VIEW PRODUCTS";
            langProducts = lang == "ru" ? "Продуктов" : "Products";

            for(let i = 0; i < data["items"].length; i++)
            {
                let id = data["items"][i]["id"];
                let name = data["items"][i]["name"];
                let img = data["items"][i]["img"];
                let productCount = data["items"][i]["productCount"]

                loadingGIF.remove();

                items.innerHTML += `<div class="item">
                <div class="item-image">
                    <img draggable="false" src="public/img/games/${img}">
                    <p>${name}</p>
                </div>
                <div class="item_bottom-block">
                    <a href="/game?id=${id}">
                        ${langProductsCaption} 
                        <img src="public/img/arrow.svg">
                    </a>
                    <p class="products-count">[${langProducts}: ${productCount}]</p>
                </div>
            </div>`
            }
        }
    })
    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',        
        data: {method: 'getAnnounce'},
        success: function(data){
            let items = document.querySelector('.announcements_items-block');
            let loadingGIF = document.querySelector('.loading');

            lang = getLang()
            langButton = lang == "ru" ? "ОТКРЫТЬ" : "OPEN";

            for(let i = 0; i < 3; i++)
            {
                date_announce = new Date(data["items"][i]["date"] * 1000)
                let id = data["items"][i]["id"];
                let name = limitStr(lang == "ru" ? data["items"][i]["nameru"] : data["items"][i]["nameen"], 45);
                let desc = limitStr(lang == "ru" ? data["items"][i]["descriptionru"] : data["items"][i]["descriptionen"],100);
                let img = data["items"][i]["img"];
                let date = lang == "ru" ? date_announce.getDate() + "." + (date_announce.getMonth() + 1) + "." + date_announce.getFullYear() : (date_announce.getMonth() + 1) + "/" + date_announce.getDate() + "/" + date_announce.getFullYear() 

                // loadingGIF.remove();

                items.innerHTML += `<div class="announcements-item">
                <img class="announcements_image" src="public/img/announcements/${img}">
                <div class="announcements_item-info">
                    <div class="announcements_item-date">
                        <img src="public/img/date.svg">
                        <p>${date}</p>
                    </div>
                    <div class="announcements_item-name">
                        <p>${name}</p>
                    </div>
                    <div class="announcements_item-description">
                        <p>${desc}</p>
                    </div>
                    <div class="announcements_item-link">
                        <a class="lang" data-text="announcements_open-link" href="/announcements?id=${id}">
                            ${langButton}
                            <img src="public/img/arrow.svg">
                        </a>
                    </div>
                </div>
            </div>`

            }
        }
    })
})



let findInput = document.querySelector('#findInput');
let timeOutId;
let prevText;
findInput.addEventListener('keyup', () => {
    let serachText;

    clearTimeout(timeOutId);
    
    timeOutId = setTimeout(() => {
        serachText = findInput.value
    
        let items = document.querySelector('.products_items-block');

        while (items.firstChild) {
            items.removeChild(items.firstChild);
        }

        for(let i = 0; i < searchArray.length; i++)
        {
            let id = searchArray[i]["id"];
            let name = searchArray[i]["name"];
            let img = searchArray[i]["img"];
            let productCount = searchArray[i]["productCount"]

            lang = getLang()
            langProductsCaption = lang == "ru" ? "ПОСМОТРЕТЬ ПРОДУКТЫ" : "VIEW PRODUCTS";
            langProducts = lang == "ru" ? "Продуктов" : "Products";

            if(serachText != "")
            {
                if(name.toLowerCase().match(serachText.toLowerCase() + '.*'))
                {
                    items.innerHTML += `<div class="item">
                        <div class="item-image">
                            <img draggable="false" src="public/img/games/${img}">
                            <p>${name}</p>
                        </div>
                        <div class="item_bottom-block">
                            <a href="/game?id=${id}">
                                ${langProductsCaption} 
                                <img src="public/img/arrow.svg">
                            </a>
                            <p class="products-count">[${langProducts}: ${productCount}]</p>
                        </div>
                    </div>`
                }
            }
            else
            {
                items.innerHTML += `<div class="item">
                    <div class="item-image">
                        <img draggable="false" src="public/img/games/${img}">
                        <p>${name}</p>
                    </div>
                    <div class="item_bottom-block">
                        <a href="/game?id=${id}">
                            ${langProductsCaption} 
                            <img src="public/img/arrow.svg">
                        </a>
                        <p class="products-count">[${langProducts}: ${productCount}]</p>
                    </div>
                </div>`
            }
        }

    }, 200)
    prevText = findInput.value
})



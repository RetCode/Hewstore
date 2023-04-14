let searchArray;

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
                        MORE DETAILS 
                        <img src="public/img/arrow.svg">
                    </a>
                    <p class="products-count">[Products: ${productCount}]</p>
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
                                MORE DETAILS 
                                <img src="public/img/arrow.svg">
                            </a>
                            <p class="products-count">[Products: ${productCount}]</p>
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
                            MORE DETAILS 
                            <img src="public/img/arrow.svg">
                        </a>
                        <p class="products-count">[Products: ${productCount}]</p>
                    </div>
                </div>`
            }
        }

    }, 200)
    prevText = findInput.value
})

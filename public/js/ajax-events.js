let itemsMassive;

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

            itemsMassive = data['items'];
            
            for(let i = 0; i < data["items"].length; i++)
            {
                let id = data["items"][i]["id"];
                let name = data["items"][i]["name"];
                let img = data["items"][i]["img"];

                loadingGIF.remove();

                items.innerHTML += `<div class="item">
                <div class="item-image">
                    <img draggable="false" src="public/img/products/${img}">
                    <p>${name}</p>
                </div>
                <div class="item_bottom-block">
                    <a href="/game?id=${id}">
                        MORE DETAILS 
                        <img src="public/img/arrow.svg">
                    </a>
                    <p class="products-count">[Products: 4]</p>
                </div>
            </div>`
            }
        }
    })
})

let findInput = document.querySelector('#findInput')

findInput.addEventListener('keyup', () => {
    
})
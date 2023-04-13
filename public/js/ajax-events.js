document.addEventListener('DOMContentLoaded', () => {
    // alert('1')
    $.ajax({
        url: '/api',
        method: 'post',
        dataType: 'json',
        data: {method: 'getGames'},
        success: function(data){
            let items = document.querySelector('.item')
            let loadingGIF = document.querySelector('.loading')
            
            for(let i = 0; i < data["items"].length; i++)
            {
                let id = data["items"][i]["id"];
                let name = data["items"][i]["name"];
                let img = data["items"][i]["img"];

                loadingGIF.remove();

                items.innerHTML = `<div class="item-image">
                    <img src="public/img/${img}">
                    <p>${name}</p>
                </div>
                <div class="item_bottom-block">
                    <a href="/game?id=${id}">
                        MORE DETAILS 
                        <img src="public/img/arrow.svg">
                    </a>
                    <p class="products-count">[Products: 4]</p>
                </div>`
                

            }
        }
    })
})
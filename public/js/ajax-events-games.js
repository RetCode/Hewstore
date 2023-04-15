document.addEventListener('DOMContentLoaded', () => {

    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',
        async: true,   
        data: {method: 'getFilter', filter:"filter_os"},
        success: function(data){
            let items = document.getElementById("os");
            data["items"].forEach(element => {
                items.innerHTML += `<button typer="os" x-index="${element["id"]}">${element["name"]}</button>`;
            });
        }
    });

    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',
        async: true,   
        data: {method: 'getFilter', filter:"filter_cpu"},
        success: function(data){
            let items = document.getElementById("cpu");
            data["items"].forEach(element => {
                items.innerHTML += `<button typer="cpu" x-index="${element["id"]}">${element["name"]}</button>`;
            });
        }
    });

    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',
        async: true,   
        data: {method: 'getFilter', filter:"filter_gpu"},
        success: function(data){
            let items = document.getElementById("gpu");
            data["items"].forEach(element => {
                items.innerHTML += `<button typer="gpu" x-index="${element["id"]}">${element["name"]}</button>`;
            });
        }
    });

});


// let searchArray;

// document.addEventListener('DOMContentLoaded', () => {
//     $.ajax({
//         async: true,
//         url: '/api',
//         method: 'post',
//         dataType: 'json',        
//         data: {method: 'getGames'},
//         success: function(data){
//             let items = document.querySelector('.products_items-block');
//             let loadingGIF = document.querySelector('.loading');

//             searchArray = data["items"];

//             lang = getLang()
//             langProductsCaption = lang == "ru" ? "ПОСМОТРЕТЬ ПРОДУКТЫ" : "MORE DETAILS";
//             langProducts = lang == "ru" ? "Продуктов" : "Products";

//             for(let i = 0; i < data["items"].length; i++)
//             {
//                 let id = data["items"][i]["id"];
//                 let name = data["items"][i]["name"];
//                 let img = data["items"][i]["img"];
//                 let productCount = data["items"][i]["productCount"]

//                 loadingGIF.remove();

//                 items.innerHTML += `<div class="item">
//                 <div class="item-image">
//                     <img draggable="false" src="public/img/games/${img}">
//                     <p>${name}</p>
//                 </div>
//                 <div class="item_bottom-block">
//                     <a href="/game?id=${id}">
//                         ${langProductsCaption} 
//                         <img src="public/img/arrow.svg">
//                     </a>
//                     <p class="products-count">[${langProducts}: ${productCount}]</p>
//                 </div>
//             </div>`
//             }
//         }
//     })
// })

// let findInput = document.querySelector('#findInput');
// let timeOutId;
// let prevText;
// findInput.addEventListener('keyup', () => {
//     let serachText;

//     clearTimeout(timeOutId);
    
//     timeOutId = setTimeout(() => {
//         serachText = findInput.value
    
//         let items = document.querySelector('.products_items-block');

//         while (items.firstChild) {
//             items.removeChild(items.firstChild);
//         }

//         for(let i = 0; i < searchArray.length; i++)
//         {
//             let id = searchArray[i]["id"];
//             let name = searchArray[i]["name"];
//             let img = searchArray[i]["img"];
//             let productCount = searchArray[i]["productCount"]

//             lang = getLang()
//             langProductsCaption = lang == "ru" ? "ПОСМОТРЕТЬ ПРОДУКТЫ" : "MORE DETAILS";
//             langProducts = lang == "ru" ? "Продуктов" : "Products";

//             if(serachText != "")
//             {
//                 if(name.toLowerCase().match(serachText.toLowerCase() + '.*'))
//                 {
//                     items.innerHTML += `<div class="item">
//                         <div class="item-image">
//                             <img draggable="false" src="public/img/games/${img}">
//                             <p>${name}</p>
//                         </div>
//                         <div class="item_bottom-block">
//                             <a href="/game?id=${id}">
//                                 ${langProductsCaption} 
//                                 <img src="public/img/arrow.svg">
//                             </a>
//                             <p class="products-count">[${langProducts}: ${productCount}]</p>
//                         </div>
//                     </div>`
//                 }
//             }
//             else
//             {
//                 items.innerHTML += `<div class="item">
//                     <div class="item-image">
//                         <img draggable="false" src="public/img/games/${img}">
//                         <p>${name}</p>
//                     </div>
//                     <div class="item_bottom-block">
//                         <a href="/game?id=${id}">
//                             ${langProductsCaption} 
//                             <img src="public/img/arrow.svg">
//                         </a>
//                         <p class="products-count">[${langProducts}: ${productCount}]</p>
//                     </div>
//                 </div>`
//             }
//         }

//     }, 200)
//     prevText = findInput.value
// })

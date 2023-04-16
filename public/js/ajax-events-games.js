
let currentUrl = window.location.href;
let url = new URL(currentUrl);
let id = url.searchParams.get("id");
let searchArray;
let filtersIds;
let subSearch;
let filerOs = 0;
let filterCpu = 0;
let filterGpu = 0;
let filteredOS;
let filteredCPU;
let filteredGPU;

document.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',        
        data: {method: 'getFilter', id: id},
        success: function(data){
            filtersIds = data["items"]
        }
    })

    $.ajax({
        async: true,
        url: '/api',
        method: 'post',
        dataType: 'json',        
        data: {method: 'getProducts', id: id},
        success: function(data){
            let items = document.querySelector('.catalog-block');
            searchArray = data["items"];
            subSearch = data["items"];

            lang = getLang()
            langMore = lang == "ru" ? "БОЛЬШЕ ИНФОРМАЦИИ" : "MORE DETAILS";
            langCart = lang == "ru" ? "ДОБАВИТЬ В КОРЗИНУ" : "ADD TO CART";

            for(let i = 0; i < data["items"].length; i++)
            {
                let id = data["items"][i]["id"];
                let name = data["items"][i]["name"];
                let img = data["items"][i]["img"];
                let status = data["items"][i]["status"];
                let color = data["items"][i]["color"]

                items.innerHTML += `<div class="item">
                    <div class="item-image">
                        <img src="public/img/products/${img}">
                        <p>${name}</p>
                        <p class="green" style="color:${color}; background-color:${hexToRgba(color, 0.2)}">${status}</p>
                    </div>
                    <div class="item_bottom-block">                                    
                        <button><img class="cart" src="../public/img/cart-dark.svg">${langCart}</button>
                        <a href="#">
                            ${langMore}
                            <img src="../public/img/arrow.svg">
                        </a>                              
                    </div>
                </div>`
            }
        }
    })

    document.querySelectorAll(".os-button").forEach(element => {
        element.addEventListener("click", () => {

            if(!element.classList.contains('os__filter-item-active'))
            {
                try
                {
                    document.querySelector('.os__filter-item-active').classList.remove('os__filter-item-active');
                }
                catch {}

                element.classList.add("os__filter-item-active");
                filerOs = element.getAttribute("x-data");
            }
            else
            {
                element.classList.remove("os__filter-item-active");
                filerOs = 0;
            }

            generateFilter();
        })
    });

    document.querySelectorAll(".cpu-button").forEach(element => {
        element.addEventListener("click", () => {

            if(!element.classList.contains('cpu__filter-item-active'))
            {
                try
                {
                    document.querySelector('.cpu__filter-item-active').classList.remove('cpu__filter-item-active');
                }
                catch {}

                element.classList.add("cpu__filter-item-active");
                filterCpu = element.getAttribute("x-data");
            }
            else
            {
                element.classList.remove("cpu__filter-item-active");
                filterCpu = 0;
            }

            generateFilter();
        })
    });

    document.querySelectorAll(".gpu-button").forEach(element => {
        element.addEventListener("click", () => {

            if(!element.classList.contains('gpu__filter-item-active'))
            {
                try
                {
                    document.querySelector('.gpu__filter-item-active').classList.remove('gpu__filter-item-active');
                }
                catch {}

                element.classList.add("gpu__filter-item-active");
                filterGpu = element.getAttribute("x-data");
            }
            else
            {
                element.classList.remove("gpu__filter-item-active");
                filterGpu = 0;
            }

            generateFilter();
        })
    });
})

function filterArray(arr, inputArray) {
    const filteredArray = [];
   
    arr.forEach(element => {
        inputArray.forEach(elementArr => {
            if(element["id"] == elementArr["product"])
                filteredArray.push(element)
        });
    });

    return filteredArray;
}

function filterWriter()
{
    let items = document.querySelector('.catalog-block');

    while (items.firstChild) {
        items.removeChild(items.firstChild);
    }

    for(let i = 0; i < subSearch.length; i++)
    {
        let id = subSearch[i]["id"];
        let name = subSearch[i]["name"];
        let img = subSearch[i]["img"];
        let status = subSearch[i]["status"];
        let color = subSearch[i]["color"]

        lang = getLang()
        langMore = lang == "ru" ? "БОЛЬШЕ ИНФОРМАЦИИ" : "MORE DETAILS";
        langCart = lang == "ru" ? "ДОБАВИТЬ В КОРЗИНУ" : "ADD TO CART";

        items.innerHTML += `<div class="item">
            <div class="item-image">
                <img src="public/img/products/${img}">
                <p>${name}</p>
                <p class="green" style="color:${color}; background-color:${hexToRgba(color, 0.2)}">${status}</p>
            </div>
            <div class="item_bottom-block">                                    
                <button><img class="cart" src="../public/img/cart-dark.svg">${langCart}</button>
                <a href="#">
                    ${langMore}
                    <img src="../public/img/arrow.svg">
                </a>                              
            </div>
        </div>`
    }
}

function generateFilter()
{
    filteredOS = [];
    filteredCPU = [];
    filteredGPU = [];
    subSearch = [];

    if(filerOs == 0 && filterGpu == 0 && filterCpu == 0)
    {
        subSearch = searchArray
        filterWriter()
    }
    else
    {

        filtersIds.forEach(element => {
            switch(element["filterType"])
            {
                case 1:
                    if(element["filterid"] == filerOs)
                        filteredOS.push(element);
                break;
                case 2:
                    if(element["filterid"] == filterCpu)
                        filteredCPU.push(element);
                break;
                case 3:
                    if(element["filterid"] == filterGpu)
                        filteredGPU.push(element);
                break;
            }

        });
        if(filteredOS.length != 0)
        {
            
            filteredOS.forEach(element => {
                let id = element["product"];
                
                if(filterCpu != 0 && filteredCPU.length != 0)
                {
                    filteredCPU.forEach(elementCPU => {
                        let currentID = elementCPU["product"];

                        if(currentID == id)
                        {
                            if(filterGpu != 0 && filteredGPU.length != 0)
                            {
                                filteredGPU.forEach(elementGPU => {
                                    let currentGPUid = elementGPU["product"];
                                    if(currentGPUid == id)
                                        subSearch.push(element)
                                });
                            }
                            else
                            {
                                if(filterGpu == 0)
                                    subSearch.push(element)
                            }
                        }

                    });
                }
                else if(filterGpu != 0 && filteredGPU.length != 0)
                {
                    filteredGPU.forEach(elementGPU => {
                        let currentID = elementGPU["id"];

                        if(currentID == id)
                        {
                            subSearch.push(element)
                        }

                    });
                }
                else
                {
                    if(filterGpu == 0 && filterCpu == 0)
                        subSearch.push(element)
                }
            });

        }
        else if(filteredCPU.length != 0)
        {

            if(filteredOS == 0 && filerOs == 0)

                filteredCPU.forEach(element => {
                    let id = element["product"];

                    if(filteredGPU != 0 && filteredGPU.length != 0)
                    {
                        filteredGPU.forEach(elementGPU => {
                            let currentID = elementGPU["product"];

                            if(currentID == id)
                            {
                                subSearch.push(element)
                            }
                        });
                    }
                    else
                    {
                        if(filterGpu == 0)
                            subSearch.push(element)
                    }
                });
        }
        else if(filteredGPU.length != 0)
        {
            if(filteredOS == 0 && filerOs == 0 && filterCpu == 0 && filteredCPU == 0)
                filteredGPU.forEach(element => {
                    subSearch.push(element)
                });
        }

        subSearch = filterArray(searchArray, subSearch);
        filterWriter()
    }
}

function hexToRgba(hex, alpha) {
    hex = hex.replace("#", "");
    var r = parseInt(hex.substring(0, 2), 16);
    var g = parseInt(hex.substring(2, 4), 16);
    var b = parseInt(hex.substring(4, 6), 16);
    alpha = alpha || 1;
    return 'rgba(' + r + ', ' + g + ', ' + b + ', ' + alpha + ')';
  }

let findInput = document.querySelector('#findInput');
let timeOutId;
let prevText;
findInput.addEventListener('keyup', () => {
    let serachText;

    clearTimeout(timeOutId);
    
    timeOutId = setTimeout(() => {
        serachText = findInput.value
    
        let items = document.querySelector('.catalog-block');

        while (items.firstChild) {
            items.removeChild(items.firstChild);
        }

        for(let i = 0; i < subSearch.length; i++)
        {
            let id = subSearch[i]["id"];
            let name = subSearch[i]["name"];
            let img = subSearch[i]["img"];
            let status = subSearch[i]["status"];
            let color = subSearch[i]["color"]

            lang = getLang()
            langMore = lang == "ru" ? "БОЛЬШЕ ИНФОРМАЦИИ" : "MORE DETAILS";
            langCart = lang == "ru" ? "ДОБАВИТЬ В КОРЗИНУ" : "ADD TO CART";

            if(serachText != "")
            {
                if(name.toLowerCase().match(serachText.toLowerCase() + '.*'))
                {
                    items.innerHTML += `<div class="item">
                        <div class="item-image">
                            <img src="public/img/products/${img}">
                            <p>${name}</p>
                            <p class="green" style="color:${color}; background-color:${hexToRgba(color, 0.2)}">${status}</p>
                        </div>
                        <div class="item_bottom-block">                                    
                            <button><img class="cart" src="../public/img/cart-dark.svg">${langCart}</button>
                            <a href="#">
                                ${langMore}
                                <img src="../public/img/arrow.svg">
                            </a>                              
                        </div>
                    </div>`
                }
            }
            else
            {
                items.innerHTML += `<div class="item">
                        <div class="item-image">
                            <img src="public/img/products/${img}">
                            <p>${name}</p>
                            <p class="green" style="color:${color}; background-color:${hexToRgba(color, 0.2)}">${status}</p>
                        </div>
                        <div class="item_bottom-block">                                    
                            <button><img class="cart" src="../public/img/cart-dark.svg">${langCart}</button>
                            <a href="#">
                                ${langMore}
                                <img src="../public/img/arrow.svg">
                            </a>                              
                        </div>
                    </div>`
            }
        }

    }, 200)
    prevText = findInput.value
})

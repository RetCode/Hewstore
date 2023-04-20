let productsType;
let productsTypesName;
let productsName;
let keysProducts;

document.addEventListener('DOMContentLoaded', () => {

    if(localStorage.getItem("cart") != null)
    {
        productsType = JSON.parse(localStorage.getItem("cart"))["items"];
    }

    $.ajax({
        url: '/api',
        method: 'post',
        dataType: 'json',        
        data: {method: 'getKeysCount'},
        success: function(data){
            keysProducts = data["items"]

            $.ajax({
                url: '/api',
                method: 'post',
                dataType: 'json',        
                data: {method: 'getProductsAll'},
                success: function(data){
                    productsName = data["items"]

                    $.ajax({
                        url: '/api',
                        method: 'post',
                        dataType: 'json',        
                        data: {method: 'getProductType'},
                        success: function(data){
                            productsTypesName = data["items"]

                            generateItems()
                            generateEvents()
                        }
                    })
                }
            })
        }
    })

    document.querySelector('.button-box').addEventListener("click", () => {
        let promo = document.querySelector("#promo");
        let mail = document.querySelector("#cart-mail");
        let cost = Number(document.querySelector("#cost").innerHTML);
        let items = [];

        productsType.forEach(element => {

            let countKeys;

            keysProducts.forEach(keys => {
                if(element["id"] == keys["productType"])
                    countKeys = keys["count_keys"]
            });

            if(countKeys != undefined)
            {
                items.push(element);
            }

        })

        if(mail.value != "" && mail.value.match("@") != null)
        {
            localStorage.setItem("payments", JSON.stringify({
                "mail": mail.value,
                "promo": promo.value,
                "cost": cost,
                "items": items
            }))

            location.href = "/payments"
        }
        else
        {
            $(mail).css("border","1px #8e3934 solid")
        }
    })
});

function generateItems()
{
    let products = document.querySelector(".products");  
    
    if(productsType != undefined)
    {
        while (products.firstChild) {
            products.removeChild(products.firstChild);
        }
        productsType.forEach(element => {

            let productTitle;
            let productName;
            let productId;
            let cost;
            let img;
            let gameName
            let maxValue;

            productsTypesName.forEach(productsType_ => {
                if(productsType_["id"] == element["id"])
                {
                    productTitle = productsType_["productTitle"];
                    productName = productsType_["name"];
                    productId = productsType_["product"];
                    cost = productsType_["cost"];

                }
            });

            productsName.forEach(productName_ => {
                if(productName_["id"] == productId)
                {
                    img = productName_["img"];
                    gameName = productName_["game"];
                }
            })

            keysProducts.forEach(keys => {
                if(keys["productType"] == element["id"])
                    maxValue = keys["count_keys"];
            });


            lang = getLang()
            noAvalible = lang == "ru" ? "Нет в наличии" : "Not available";

            if(maxValue == undefined)
            {
                products.innerHTML += `<div class="product-count-block">
                    <div class="product-img-box">
                        <img src="/public/img/products/${img}">
                    </div>
                    <div class="product-count-text-box">
                        <p>${productTitle}: ${productName}</p>
                        <p class="dark-text">${gameName} Software</p>
                    </div>
                    <div class="input-box">
                    </div>
                    <div class="total-number-box">
                        <p>${noAvalible}</p>
                    </div>
                    <div class="trash-box" x-data="${element["id"]}" onclick="removeItemById(this)">
                        <img src="../public/img/cart__trash.svg">
                    </div>
                </div>`
            }
            else 
            {
                products.innerHTML += `<div class="product-count-block">
                    <div class="product-img-box">
                        <img src="/public/img/products/${img}">
                    </div>
                    <div class="product-count-text-box">
                        <p>${productTitle}: ${productName}</p>
                        <p class="dark-text">${gameName} Software</p>
                    </div>
                    <div class="input-box">
                        <button onclick="addItems(this)" x-data="${element["id"]}" class="button-plus">+</button>
                        <input type="text" id="item-${element["id"]}" value="${element["count"]}" max-value="${maxValue}" readonly>
                        <button onclick="removeItems(this)" x-data="${element["id"]}" class="button-minus">-</button>
                    </div>
                    <div class="total-number-box">
                        <p>$ ${cost}</p>
                    </div>
                    <div class="trash-box" x-data="${element["id"]}" onclick="removeItemById(this)">
                        <img src="../public/img/cart__trash.svg">
                    </div>
                </div>` 
            }
        });
    }

    updateCartCount()
    rightCard()

    try{
        document.querySelector(".main").hidden = false;
        document.querySelector(".loading").remove();
    }
    catch {}
}

function addItems(object)
{
    let objectId = object.getAttribute("x-data");
    let input = document.querySelector("#item-" + objectId)
    let inputData = input.value;
    let maxVal = input.getAttribute("max-value");
    let newMass = [];

    if(inputData + 1 <= maxVal)
    {
        input.value = Number(inputData) + 1;

        let items = JSON.parse(localStorage.getItem("cart"))["items"];
        items.forEach(element => {
            if(element["id"] == objectId)
            {
                newMass.push({
                    "id": element["id"],
                    "product": element["product"],
                    "count": element["count"] + 1,
                })
            }
            else
            {
                newMass.push(element)
            }
        })

        localStorage.setItem("cart", JSON.stringify({
            "items": newMass
        }));
        productsType = newMass;
        rightCard()
    }


}

function removeItems(object)
{
    let objectId = object.getAttribute("x-data");
    let input = document.querySelector("#item-" + objectId)
    let inputData = input.value;
    let newMass = [];

    if(inputData - 1 >= 1)
    {
        input.value = Number(inputData) - 1;

        let items = JSON.parse(localStorage.getItem("cart"))["items"];
        items.forEach(element => {
            if(element["id"] == objectId)
            {
                newMass.push({
                    "id": element["id"],
                    "product": element["product"],
                    "count": element["count"] - 1,
                })
            }
            else
            {
                newMass.push(element)
            }
        })

        localStorage.setItem("cart", JSON.stringify({
            "items": newMass
        }));
        productsType = newMass;
        rightCard()
    }
}

function reLoadCart()
{
    let cartNotify = document.querySelector(".cart-count");
    let products = document.querySelector(".products");  
    while (products.firstChild) {
        products.removeChild(products.firstChild);
    }
    if(localStorage.getItem("cart") != null || localStorage.getItem("cart") != [])
    {
        let cart = JSON.parse(localStorage.getItem("cart"))["items"];
        cartNotify.innerHTML = cart.length;
        
        if(cart.length != 0)
            cartNotify.hidden = false;
        else
            cartNotify.hidden = true;
    }
    else
    {
        cartNotify.hidden = true;
    }
    generateItems()
}

function removeItemById(object) {

    id = object.getAttribute("x-data");

    const index = productsType.findIndex(item => item.id === id);
    if (index !== -1) {
        productsType.splice(index, 1);
    }
    localStorage.setItem("cart", JSON.stringify({
        "items": productsType
    }))

    reLoadCart()
    rightCard()
}

function rightCard()
{
    
    let currentCost = 0;
    let cartBox = document.querySelector(".products-cart")
    let cost = document.querySelector("#cost")
    while (cartBox.firstChild) {
        cartBox.removeChild(cartBox.firstChild);
    }
    try
    {
        productsType.forEach(element => {
            productsTypesName.forEach(products => {
                if(products["id"] == element["id"])
                {

                    let countKeys;

                    keysProducts.forEach(keys => {
                        if(products["id"] == keys["productType"])
                            countKeys = keys["count_keys"]
                    });

                    if(countKeys != undefined)
                    {
                        cartBox.innerHTML +=`<div class="product_item">
                            <p class="name-product">${products["productTitle"]}: ${products["name"]}</p>
                            <p class="amount">$ ${(products["cost"] * element["count"]).toFixed(2)}</p>
                        </div>`
                        currentCost += products["cost"] * element["count"];
                    }
                }
            });
        });
        cost.innerHTML = currentCost.toFixed(2);
    } catch {}
}

function generateEvents()
{
    document.querySelector(".cart-clear-all").addEventListener("click", () => {
        localStorage.removeItem("cart");
        generateItems()
        reLoadCart()
    })
}

function updateCartCount()
{
    if(localStorage.getItem("cart") != null)
    {
        document.getElementById("productsCount").innerHTML = JSON.parse(localStorage.getItem("cart"))["items"].length;
    }
    else 
    {
        document.getElementById("productsCount").innerHTML = 0;
    }
}
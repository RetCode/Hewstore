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
});

function generateItems()
{
    let products = document.querySelector(".products");    
    productsType.forEach(element => {

        let productTitle;
        let productName;
        let productId;
        let cost;
        let img;
        let gameName


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


        products.innerHTML += `<div class="product-count-block">
            <div class="product-img-box">
                <img src="/public/img/products/${img}">
            </div>
            <div class="product-count-text-box">
                <p>${productTitle}: ${productName}</p>
                <p class="dark-text">${gameName} Software</p>
            </div>
            <div class="input-box">
                <button class="button-plus">+</button>
                <input type="text" value="1">
                <button class="button-minus">-</button>
            </div>
            <div class="total-number-box">
                <p>$ ${cost}</p>
            </div>
            <div class="trash-box">
                <img src="../public/img/cart__trash.svg">
            </div>
        </div>`
    });
}

function generateEvents()
{
    document.querySelector(".cart-clear-all").addEventListener("click", () => {
        localStorage.removeItem("cart");
        updateCartCount()
        loadCart()
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

function loadCart()
{
    let cartNotify = document.querySelector(".cart-count");
    if(localStorage.getItem("cart") != null)
    {
        let cart = JSON.parse(localStorage.getItem("cart"))["items"];
        cartNotify.innerHTML = cart.length;
        cartNotify.hidden = false;
    }
    else
    {
        cartNotify.hidden = true;
    }
}

window.addEventListener('load', function() {
    loadCart()
})
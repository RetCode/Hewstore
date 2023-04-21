
function loadCart()
{
    let cartNotify = document.querySelector(".cart-count");
    if(localStorage.getItem("cart") != null)
    {
        let cart = JSON.parse(localStorage.getItem("cart"))["items"];
        cartNotify.innerHTML = cart.length;
        
        if(cart.length != 0)
        {
            cartNotify.hidden = false;
            cartNotify.style.display = "flex";
        }
    }
    else
    {
        cartNotify.hidden = true;
        cartNotify.style.display = "none";
    }
}

window.addEventListener('load', function() {
    loadCart()
})
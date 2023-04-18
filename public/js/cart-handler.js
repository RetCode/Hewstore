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

try
{
    document.querySelector(".cart-clear-all").addEventListener("click", () => {
        localStorage.removeItem("cart");
        loadCart()
    })
}
catch {}

window.addEventListener('load', function() {
loadCart()
})
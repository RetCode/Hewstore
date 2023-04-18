const buttons = [...document.querySelectorAll('.language-button')];
const links = [...document.querySelectorAll('.navigation-button')];
let copy = document.getElementById("copy_target");
let text = document.getElementById("text");

buttons.forEach(item =>
{
    item.addEventListener('click', () =>
    {
        localStorage.setItem("currentLang", item.getAttribute("id"));
        location.reload();
        document.querySelector('.language-button.active').classList.remove('active');
        item.classList.add('active')
    })
})

// copy.onclick = function(){
//     text.select();
//     document.execCommand("copy");
// }

function copy(){
    text.select();
    document.execCommand("copy");
}

document.querySelector("#copy_target").addEventListener('click', copy)
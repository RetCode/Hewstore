const buttons = [...document.querySelectorAll('.language-button')];
const links = [...document.querySelectorAll('.navigation-button')];

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
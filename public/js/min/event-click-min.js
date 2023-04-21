const buttons = [...document.querySelectorAll('.language-button')];
const links = [...document.querySelectorAll('.navigation-button')];
let isOpen = document.querySelector('.burger input');

console.log('item:', isOpen)

isOpen.addEventListener('click', () =>{
    document.querySelector('.mobile_header-container').classList.toggle('mobile_header-active');
    document.querySelector('.navigation_choise_language__item-block').classList.toggle('mobile__choise_language-active');
})

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
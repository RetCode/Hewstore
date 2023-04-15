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

links.forEach(item =>
{
    item.addEventListener('click', () =>
    {
        document.querySelector('.navigation-button.navigation_active').classList.remove('navigation_active')
        item.classList.add('navigation_active')
    })
})

const anchors = document.querySelectorAll('a[href*="#"]')

for (let anchor of anchors) {
  anchor.addEventListener('click', function (e) {
    e.preventDefault()
    
    const blockID = anchor.getAttribute('href').substr(1)
    
    document.getElementById(blockID).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    })
  })
}
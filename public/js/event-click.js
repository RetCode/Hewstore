const buttons = [...document.querySelectorAll('.language-button')];
const links = [...document.querySelectorAll('.navigation-button')];

buttons.forEach(item =>
    {
        item.addEventListener('click', () =>
        {
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
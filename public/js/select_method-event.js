const select_method = [...document.querySelectorAll('.select_method')];

select_method.forEach(item =>
    {
        item.addEventListener('click', () =>
        {
            document.querySelector('.select_method.active').classList.remove('active');
            item.classList.add('active');
        })
    })

function back(){
    
}
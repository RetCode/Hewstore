const select_method = [...document.querySelectorAll('.select_method')];

select_method.forEach(item =>
    {
        item.addEventListener('click', () =>
        {
            document.querySelector('.select_method.active').classList.remove('active');
            item.classList.add('active');
        })
    })

let switching_to_cryptocurrencies = document.querySelectorAll('.select_method');
let backButton = document.querySelectorAll('.back-button');

backButton.forEach(back =>{
    back.addEventListener('click', () =>{
        document.querySelector('.select_cryptocurrencies-block').classList.remove('show');
        document.querySelector('.select_final-block').classList.remove('show');
        document.querySelector('.select_payment_type-block').classList.add('show');
    })
})

switching_to_cryptocurrencies.forEach(item =>{
    item.addEventListener('click', () =>{
    
        switch(Number(item.getAttribute("data-id")))
        {
            case 1:
                document.querySelector('.select_cryptocurrencies-block').classList.add('show');
                document.querySelector('.select_payment_type-block').classList.remove('show');
                break;
            case 2:
                break;
            case 3:
                document.querySelector('.select_final-block').classList.add('show');
                document.querySelector('.select_payment_type-block').classList.remove('show');
                break;
        }
    
    })
})
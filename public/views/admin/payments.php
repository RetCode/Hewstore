<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/admin/admin.css">
    <title>Document</title>
</head>
<body>
    <main class="main-block">
        <div class="left-menu">
            <div class="header_menu">
                <div class="header_text-block">
                    <p>ADMIN PANEL</p>
                </div>
                <div class="leave_button-block">
                    <button>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 10.5V12.5C9.5 12.7652 9.39464 13.0196 9.20711 13.2071C9.01957 13.3946 8.76522 13.5 8.5 13.5H1.5C1.23478 13.5 0.98043 13.3946 0.792893 13.2071C0.605357 13.0196 0.5 12.7652 0.5 12.5V1.5C0.5 1.23478 0.605357 0.98043 0.792893 0.792893C0.98043 0.605357 1.23478 0.5 1.5 0.5H8.5C8.76522 0.5 9.01957 0.605357 9.20711 0.792893C9.39464 0.98043 9.5 1.23478 9.5 1.5V3.5M6.5 7H13.5M13.5 7L11.5 5M13.5 7L11.5 9" stroke="#54595F" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="menu_links">
                <ul>
                    <li>
                        <a class="pages_link" href="admin">Главная</a>
                    </li>
                    <li>
                        <a class="pages_link" href="games">Игры</a>
                    </li>
                    <li>
                        <a class="pages_link" href="items">Товар</a>
                    </li>
                    <li>
                        <a class="pages_link" href="types">Тип товара</a>
                    </li>
                    <li>
                        <a class="pages_link" href="keys">Ключи от товара</a>
                    </li>
                    <li>
                        <a class="pages_link" href="tag">Тег</a>
                    </li>
                    <li>
                        <a class="pages_link" href="news">Анонсы</a>
                    </li>
                    <li>
                        <a class="pages_link" href="promo">Промокоды</a>
                    </li>
                    <li>
                        <a class="pages_link active" href="">Платежи</a>
                    </li>
                    <li>
                        <a class="pages_link" href="sellers">Покупки</a>
                    </li>
                    <li>
                        <a class="pages_link" href="filters">Фильтры</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-block">
            <div class="content open">
                <div class="nav-block payments">
                    <p class="id">#</p>
                    <p>К оплате</p>
                    <p>Валюта</p>
                    <p>uuid</p>
                    <p>Кошелек</p>
                    <p>Статус</p>
                    <p>Товары</p>
                </div>
                <div class="table-block">                 
                </div>
            </div>
        </div>
    </main>
    <script src="../vendor/jquery.js"></script>
    <script>
        function loadItems()
        {
            $.ajax({
            url: "/api",
            type: "POST",
            data: {method: 'getPayments'},
            success: function(response) {
                    response["items"].forEach(element => {
                        document.getElementsByClassName("table-block")[0].innerHTML += 
                        `
                        <div class="item payments">
                            <p>${element["id"]}</p>
                            <p>${element["amount"]} ${element["currency"]}</p>
                            <p>${element["to_currency"]}</p>
                            <p>${element["uuid"]}</p>
                            <p>${element["adress"]}</p>
                            <p>${element["payment_status"]}</p>
                            <p>${element["items"]}</p>
                        </div>`;
                    });
                }
            });
        }

        loadItems()
    </script>
</body>
</html>
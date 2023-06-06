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
                        <a class="pages_link" href="tag">Тег</a>
                    </li>
                    <li>
                        <a class="pages_link" href="news">Анонсы</a>
                    </li>
                    <li>
                        <a class="pages_link" href="promo">Промокоды</a>
                    </li>
                    <li>
                        <a class="pages_link" href="payments">Платежи</a>
                    </li>
                    <li>
                        <a class="pages_link active" href="">Покупки</a>
                    </li>
                    <li>
                        <a class="pages_link" href="filters">Фильтры</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-block">
            <div class="content open">
                <div class="nav-block sellers">
                    <p class="id">#</p>
                    <p>Оплачено</p>
                    <p>Валюта</p>
                    <p>uuid</p>
                    <p>Кошелек</p>
                    <p>Статус</p>
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
            data: {method: 'getSellers'},
            success: function(response) {
                    response["items"].forEach(element => {
                        document.getElementsByClassName("table-block")[0].innerHTML += 
                        `
                        <div class="item sellers">
                            <p>${element["id"]}</p>
                            <p>${element["amount"]} ${element["currency"]}</p>
                            <p>${element["to_currency"]}</p>
                            <p>${element["uuid"]}</p>
                            <p>${element["adress"]}</p>
                            <div class="sellers_status">
                                Оплачено
                            </div>
                        </div>`;
                    });
                }
            });
        }

        loadItems()      
    </script>
</body>
</html>
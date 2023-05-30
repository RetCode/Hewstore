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
                        <a class="pages_link active" href="">Промокоды</a>
                    </li>
                    <li>
                        <a class="pages_link" href="payments">Платежи</a>
                    </li>
                    <li>
                        <a class="pages_link" href="sellers">Покупки</a>
                    </li>
                    <li>
                        <a class="pages_link" href="filters">Фильтры</a>
                    </li>
                    <li>
                        <button class="add_item-button">Добавить промокод</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-block">
            <div class="content open">
                <div class="nav-block promo">
                    <p class="id">#</p>
                    <p>Промокод</p>
                    <p>Продукт</p>
                    <p>Активаций</p>
                    <p>Время жизни</p>
                    <p>Процент</p>
                    <p>Инструменты</p>
                </div>
                <div class="table-block">                  
                </div>
            </div>
            <div class="add_item-block">
                <div class="container">
                    <div class="add_item-header">
                        <button class="back_button">
                            <img src="../../public/img/back.svg">
                        </button>
                        <p class="title">Добавление нового промокода</p>
                    </div>
                    <div class="add_item-wrapper">
                        <input class="add_item pl" type="text" placeholder="Промокод">
                        <input class="add_item pl" type="text" placeholder="Время жизни в днях">
                        <input class="add_item pl" type="text" placeholder="Кол-во активаций">
                        <select class="add_item pl">
                            <option>item</option>
                        </select>
                        <input class="add_item pl" type="text" placeholder="Процент">
                        <button class="create_button">Создать</button>                       
                    </div>
                </div>                
            </div>
            <div class="edit_item-block">
                <div class="container">
                    <div class="edit_item-header">
                        <button class="back_button">
                            <img src="../../public/img/back.svg">
                        </button>
                        <p class="title">Редактирование</p>
                    </div>
                    <div class="edit_item-wrapper">
                        <input class="add_item pl" type="text" placeholder="Промокод">
                        <input class="add_item pl" type="text" placeholder="Время жизни в днях">
                        <input class="add_item pl" type="text" placeholder="Кол-во активаций">
                        <select class="add_item pl">
                            <option>item</option>
                        </select>
                        <input class="add_item pl" type="text" placeholder="Процент">
                        <button class="create_button">Сохранить</button>  
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../vendor/jquery.js"></script>
    <script>
        newItem = document.querySelector('.add_item-button');
        let backButton = document.querySelectorAll('.back_button');
        let editButton = document.querySelectorAll('.edit-button');

        newItem.addEventListener('click', () => {
            document.querySelector('.add_item-block').classList.add('open');
            document.querySelector('.content').classList.remove('open');
        })

        backButton.forEach(back => {
                back.addEventListener('click', () => {
                document.querySelector('.add_item-block').classList.remove('open');
                document.querySelector('.edit_item-block').classList.remove('open');
                document.querySelector('.content').classList.add('open');
            })
        })

        editButton.forEach(edit => {
                edit.addEventListener('click', () => {
                document.querySelector('.content').classList.remove('open');
                document.querySelector('.edit_item-block').classList.add('open');
            })
        })       
        
        function clearAlert()
        {
            document.getElementById("alerts").innerHTML = "";
        }

        function createData()
        {
            var name = $("#nameInput").val(); 
            var fileInput = $("#fileInput")[0];
            var file = fileInput.files[0]; 
            
            var formData = new FormData(); 
            
            formData.append("name", name); 
            formData.append("file", file);
            formData.append("method", "createKey");

            $.ajax({
                url: "/api",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response["succes"] == true)
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-success" role="alert">
                        Игра успешно добавлена
                        </div>`;

                        loadItems()
                        setTimeout(clearAlert, 3000);
                    }
                    else
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-danger" role="alert">
                        Ошибка при добавлении
                        </div>`;

                        setTimeout(clearAlert, 3000);
                    }
                }
            });
        }

        function inputData(object)
        {
            let id = object.getAttribute("x-id");
            let name = object.getAttribute("x-name")

            document.getElementById("recipient-name").value = name;
            document.getElementById("recipient-id").value = id;

        }

        function deleteData(object)
        {
            let id = object.getAttribute("x-id");

            $.ajax({
            url: "/api",
            type: "POST",
            data: {method: 'deletePromo', id: id},
                success: function(response) {
                    if(response["succes"] == true)
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-success" role="alert">
                        Игра успешно удалена
                        </div>`;

                        loadItems()
                        setTimeout(clearAlert, 3000);
                    }
                    else
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-danger" role="alert">
                        Ошибка удаления
                        </div>`;

                        setTimeout(clearAlert, 3000);
                    }
                }
            });
        }

        function savedata()
        {
            let id = document.getElementById("recipient-id").value;
            let name = document.getElementById("recipient-name").value;
            $.ajax({
            url: "/api",
            type: "POST",
            data: {method: 'editPromo', id: id, text: name},
                success: function(response) {
                    if(response["succes"] == true)
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-success" role="alert">
                        Данные обновлены
                        </div>`;

                        loadItems()
                        setTimeout(clearAlert, 3000);
                    }
                    else
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-danger" role="alert">
                        Ошибка обновления данных
                        </div>`;

                        setTimeout(clearAlert, 3000);
                    }
                }
            });
        }

        function loadItems()
        {
            $.ajax({
            url: "/api",
            type: "POST",
            data: {method: 'getPromo'},
            success: function(response) {
                    response["items"].forEach(element => {
                        document.getElementsByClassName("table-block")[0].innerHTML += 
                        `
                        <div class="item promo">
                            <p>${element["id"]}</p>
                            <p>${element["promo"]}</p>
                            <p>${element["product"]}</p>
                            <p>${element["count"]}</p>
                            <p>До: ${element["life"]}</p>
                            <p>${element["procent"]}%</p>
                            <div class="button-block">
                                <button class="delete-button"  x-id="${element['id']}">Удалить</button>
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
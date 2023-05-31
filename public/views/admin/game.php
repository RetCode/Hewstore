<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/admin/admin.css">
    <title>Document</title>
</head>
<body>
    <div  class="alert-box" id="alerts" style="z-index:99; position:fixed; display:flex; justify-content:end; padding:15px; flex-direction:column;"></div>
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
                        <a class="pages_link active" href="">Игры</a>
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
                        <a class="pages_link" href="sellers">Покупки</a>
                    </li>
                    <li>
                        <a class="pages_link" href="filters">Фильтры</a>
                    </li>
                    <li>
                        <button class="add_item-button">Добавить игру</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-block">
            <div class="content open">
                <div class="nav-block game">
                    <p>#</p>
                    <p>Название</p>
                    <p>Картинка</p>
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
                        <p class="title">Создание новой игры</p>
                    </div>
                    <div class="add_item-wrapper">
                        <input id="nameInput" class="add_item pl" type="text" placeholder="Название">
                        <div class="add_item">
                            <input class="form-control" id="fileInput" type="file">
                        </div>
                        <button onclick="createData()" class="create_button">Создать</button>                        
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
                        <input class="add_item pl" id="recipient-id" type="text" placeholder="Название" hidden>
                        <input class="add_item pl" id="recipient-name" type="text" placeholder="Название">
                        <div class="add_item">
                            <input class="form-control" id="fileInput" type="file">
                        </div>
                        <button onclick="savedata()" class="create_button">Сохранить</button>  
                    </div>
                </div>
            </div>
            <div class="open_items-block">
                <div class="nav-block items_open">
                    <button class="back_button">
                        <img src="../../public/img/back.svg">
                    </button>
                    <p>#</p>
                    <p>Название</p>
                    <p>Картинка</p>
                    <p>Статус</p>
                    <p>Инструменты</p>
                </div>
                <div class="items_table-block">
                </div>
            </div>
            <div class="keys_items-block">
                <div class="nav-block">
                    <button class="back_button">
                        <img src="../../public/img/back.svg">
                    </button>
                    <p>#</p>
                    <p>Тип продукта</p>
                    <p>Ключ</p>
                    <p>Инструменты</p>
                </div>
                <div class="keys_table-block">
                </div>
            </div>
        </div>
    </main>
    <script src="../vendor/jquery.js"></script>
    <script>
        newItem = document.querySelector('.add_item-button');
        backButton = document.querySelectorAll('.back_button');

        newItem.addEventListener('click', () => {
            document.querySelector('.add_item-block').classList.add('open');
            document.querySelector('.content').classList.remove('open');
        })

        backButton.forEach(back => {
                back.addEventListener('click', () => {
                    document.querySelector('.add_item-block').classList.remove('open');
                    document.querySelector('.edit_item-block').classList.remove('open');
                    document.querySelector('.open_items-block').classList.remove('open');
                    document.querySelector('.content').classList.add('open');
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
            formData.append("method", "createGame");

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

                        cleanData()
                        loadItems()
                        setTimeout(clearAlert, 3000);
                        document.querySelector('.add_item-block').classList.remove('open');            
                        document.querySelector('.content').classList.add('open');
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

            document.querySelector('.content').classList.remove('open');
            document.querySelector('.edit_item-block').classList.add('open');
        }

        // items function
        function openItem(object)
        {
            let id = object.getAttribute("x-id");
            let name = object.getAttribute("x-name")

            document.getElementById("recipient-name").value = name;
            document.getElementById("recipient-id").value = id;

            document.querySelector('.content').classList.remove('open');
            document.querySelector('.open_items-block').classList.add('open');

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
                formData.append("method", "createProduct");

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

            // keys function
        function openKeys(object)
            {
                newItem = document.querySelector('.add_item-button');
                backButton = document.querySelectorAll('.back_button');

                newItem.addEventListener('click', () => {
                    document.querySelector('.add_item-block').classList.add('open');
                    document.querySelector('.open_items-block').classList.remove('open');
                })

                backButton.forEach(back => {
                        back.addEventListener('click', () => {
                        document.querySelector('.add_item-block').classList.remove('open');
                        document.querySelector('.edit_item-block').classList.remove('open');
                        document.querySelector('.open_items-block').classList.add('open');
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
                    data: {method: 'deleteKey', id: id},
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
                    data: {method: 'editKey', id: id, text: name},
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
                    data: {method: 'getKeys'},
                    success: function(response) {
                            response["items"].forEach(element => {
                                document.getElementsByClassName("keys_table-block")[0].innerHTML += 
                                `
                                <div class="item keys">
                                    <p>${element["id"]}</p>
                                    <p>${element["productType"]}</p>
                                    <p>${element["key_text"]}</p>
                                    <div class="button-block">
                                        <button class="edit-button" x-id="${element['id']}" x-name="${element['name']}">Редактировать</button>
                                        <button class="delete-button"  x-id="${element['id']}">Удалить</button>
                                    </div>
                                </div>`;
                            });
                        }
                    });
                }

                loadItems()
            }
            // keys function

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
                data: {method: 'deleteProduct', id: id},
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
                data: {method: 'editProduct', id: id, text: name},
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
                data: {method: 'getProductsAll'},
                success: function(response) {
                        response["items"].forEach(element => {
                            document.getElementsByClassName("items_table-block")[0].innerHTML += 
                            `
                            <div class="item items">
                                <p>${element["id"]}</p>
                                <p>${element["name"]}</p>
                                <p>${element["img"]}</p>
                                <p>${element["status"]}</p>
                                <p>${element["game"]}</p>
                                <div class="button-block">
                                    <button class="open-button" onclick="openKeys(this)" x-id="${element['id']}" x-name="${element['name']}">Открыть</button>
                                    <button class="edit-button" x-id="${element['id']}" x-name="${element['name']}">Редактировать</button>                                
                                    <button class="delete-button"  x-id="${element['id']}">Удалить</button>
                                </div>
                            </div>`;
                        });
                    }
                });
            }

            loadItems()             
        }
        // items function

        function deleteData(object)
        {
            let id = object.getAttribute("x-id");

            $.ajax({
            url: "/api",
            type: "POST",
            data: {method: 'deleteGame', id: id},
                success: function(response) {
                    if(response["succes"] == true)
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-success" role="alert">
                        Игра успешно удалена
                        </div>`;

                        cleanData()
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
            data: {method: 'editGame', id: id, text: name},
                success: function(response) {
                    if(response["succes"] == true)
                    {
                        document.getElementById("alerts").innerHTML += `<div class="alert alert-success" role="alert">
                        Данные обновлены
                        </div>`;

                        cleanData()
                        loadItems()
                        setTimeout(clearAlert, 3000);        
                        document.querySelector('.edit_item-block').classList.remove('open');
                        document.querySelector('.content').classList.add('open');
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

        function cleanData()
        {
            $(".table-block").empty();
        }

        function loadItems()
        {
            $.ajax({
            url: "/api",
            type: "POST",
            data: {method: 'getGames'},
            success: function(response) {
                    response["items"].forEach(element => {
                        document.getElementsByClassName("table-block")[0].innerHTML += 
                        `
                        <div class="item game">
                            <p>${element["id"]}</p>
                            <p>${element["name"]}</p>
                            <p>${element["img"]}</p>
                            <div class="button-block">
                                <button class="open-button" onclick="openItem(this)" x-id="${element['id']}" x-name="${element['name']}">Открыть</button>
                                <button class="edit-button" onclick="inputData(this)" x-id="${element['id']}" x-name="${element['name']}">Редактировать</button>
                                <button class="delete-button" onclick="deleteData(this)" x-id="${element['id']}">Удалить</button>
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

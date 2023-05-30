<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sceditor@latest/minified/themes/default.min.css">
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
                        <a class="pages_link" href="tag">Тег</a>
                    </li>
                    <li>
                        <a class="pages_link active" href="">Анонсы</a>
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
                <div class="nav-block annonce">
                    <p>#</p>
                    <p>Название</p>
                    <p>Описание</p>
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
                        <p class="title">Создание нового анонса</p>
                    </div>
                    <div class="add_item-wrapper">
                        <input class="add_item pl" type="text" id="nameRuInput" placeholder="Название[RU]">
                        <input class="add_item pl" type="text" id="nameEnInput" placeholder="Название[EN]">
                        <textarea class="add_item desc pl form-control" type="text" id="descRuInput" placeholder="Описание[RU]"></textarea>
                        <textarea class="add_item desc pl form-control" type="text" id="descEnInput" placeholder="Описание[EN]"></textarea>
                        <div class="add_item">
                            <input class="form-control" id="fileInput" type="file">
                        </div> 
                        <div class="textarea_box">
                            <textarea id="editor" style="display: none;"></textarea>
                        </div> 
                        <div class="textarea_box">
                            <textarea id="editor" style="display: none;"></textarea>
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
                        <input class="add_item pl" type="text" placeholder="Название">
                        <select class="add_item pl">
                            <option>item</option>
                        </select>
                        <select class="add_item pl">
                            <option>item</option>
                        </select>
                        <div class="add_item">
                            <input class="form-control" id="fileInput" type="file">
                        </div>
                        <div class="textarea_box">
                            <textarea id="editor" style="display: none;"></textarea>
                        </div> 
                        <div class="textarea_box">
                            <textarea id="editor" style="display: none;"></textarea>
                        </div>   
                        <button class="create_button">Сохранить</button>  
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../vendor/minified/sceditor.min.js"></script>
    <script src="../vendor/jquery.js"></script>
    <script>
        var textarea = document.querySelectorAll("#editor");
        textarea.forEach(element => {
            sceditor.create(element, {
                format: 'bbcode',
                style: '/vendor/minified/themes/content/default.min.css'
            });
        });
    </script>
    <script>
        newItem = document.querySelector('.add_item-button');
        let backButton = document.querySelectorAll('.back_button');
        let editButton = document.querySelectorAll('.edit-button');
        let allItems;

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
        
        function clearAlert()
        {
            document.getElementById("alerts").innerHTML = "";
        }

        function createData()
            {
                var nameru = $("#nameRuInput").val();
                var nameen = $("#nameEnInput").val();
                var descriptionru = $("#descRuInput").val(); 
                var descriptionen = $("#descEnInput").val(); 
                var bodyru = sceditor.instance(document.querySelectorAll("#editor")[0]).fromBBCode(sceditor.instance(document.querySelectorAll("#editor")[0]).val(), true); 
                var bodyen = sceditor.instance(document.querySelectorAll("#editor")[1]).fromBBCode(sceditor.instance(document.querySelectorAll("#editor")[1]).val(), true); 
                var fileInput = $("#fileInput")[0];
                var file = fileInput.files[0]; 
                
                var formData = new FormData(); 
                
                formData.append("file", file);
                formData.append("nameru", nameru); 
                formData.append("nameen", nameen);
                formData.append("descriptionru", descriptionru);
                formData.append("descriptionen", descriptionen);
                formData.append("bodyru", bodyru);
                formData.append("bodyen", bodyen);
                formData.append("method", "createAnnounce");

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
                            Продукт успешно добавлен
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

                allItems["items"].forEach(element => {
                    if(element["id"] == id)
                    {
                        document.getElementById("recipent-id").value = id;
                        document.getElementById("nameRuInput-recesipition").value = element["nameru"];
                        document.getElementById("nameEnInput-recesipition").value = element["nameen"];
                        document.getElementById("descRuInput-recesipition").value = element["descriptionru"];
                        document.getElementById("descEnInput-recesipition").value = element["descriptionen"];
                        sceditor.instance(document.querySelectorAll("#editor")[2]).val(sceditor.instance(document.querySelectorAll("#editor")[2]).toBBCode(element["bodyru"]));
                        sceditor.instance(document.querySelectorAll("#editor")[3]).val(sceditor.instance(document.querySelectorAll("#editor")[3]).toBBCode(element["bodyen"]));
                    }
                });

            }

            function deleteData(object)
            {
                let id = object.getAttribute("x-id");

                $.ajax({
                url: "/api",
                type: "POST",
                data: {method: 'deleteAnnounce', id: id},
                    success: function(response) {
                        if(response["succes"] == true)
                        {
                            document.getElementById("alerts").innerHTML += `<div class="alert alert-success" role="alert">
                            Анонс успешно удален
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
                let id = document.getElementById("recipent-id").value;
                let nameru = document.getElementById("nameRuInput-recesipition").value;
                let nameen = document.getElementById("nameEnInput-recesipition").value;
                let descru = document.getElementById("descRuInput-recesipition").value;
                let descen = document.getElementById("descEnInput-recesipition").value;
                var bodyru = sceditor.instance(document.querySelectorAll("#editor")[0]).fromBBCode(sceditor.instance(document.querySelectorAll("#editor")[0]).val(), true); 
                var bodyen = sceditor.instance(document.querySelectorAll("#editor")[1]).fromBBCode(sceditor.instance(document.querySelectorAll("#editor")[1]).val(), true); 

                $.ajax({
                url: "/api",
                type: "POST",
                data: {method: 'editAnnounce', id: id, nameru: nameru, nameen: nameen, descriptionru: descru, descriptionen: descen, bodyru: bodyru, bodyen: bodyen},
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
            data: {method: 'getAnnounce'},
            success: function(response) {
                    response["items"].forEach(element => {
                        document.getElementsByClassName("table-block")[0].innerHTML += 
                        `
                        <div class="item annonce">
                            <p>${element["id"]}</p>
                            <p>${element["nameru"]} | ${element["nameen"]}</p>
                            <p>${element["descriptionru"]} | ${element["descriptionen"]}</p>
                            <div class="button-block">
                                <button class="edit-button" onclick="inputData(this)" x-id="${element['id']}">Редактировать</button>
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
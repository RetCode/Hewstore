<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Apanel - Products</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    </head>
    <body>
        <div class="alert-box" id="alerts" style="z-index:99; position:fixed; display:flex; justify-content:end; padding:15px; flex-direction:column;">
        </div>
        <div class="container-adm" style="display: flex;">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh; position:fixed;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Админ меню</span>
                </a>
                <hr />
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/admin" class="nav-link text-white" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Главная
                        </a>
                    </li>
                    <li>
                        <a href="/admin/games" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Игры
                        </a>
                    </li>
                    <li>
                        <a href="/admin/items" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Товар
                        </a>
                    </li>
                    <li>
                        <a href="/admin/types" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Тип товара
                        </a>
                    </li>
                    <li>
                        <a href="/admin/keys" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Ключи от товара
                        </a>
                    </li>
                    <li>
                        <a href="/admin/tag" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Тег
                        </a>
                    </li>
                    <li>
                        <a href="/admin/news" class="nav-link active">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Анонсы
                        </a>
                    </li>
                    <li>
                        <a href="/admin/promo" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Промокоды
                        </a>
                    </li>
                    <li>
                        <a href="/admin/payments" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Платежи
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sellers" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Покупки
                        </a>
                    </li>
                    <li>
                        <a href="/admin/filters" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Фильтры
                        </a>
                    </li>
                </ul>
                <button type="button" class="btn btn-primary" style="margin-top: 10px; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#createGame">Добавить анонс</button>
            </div>
            <div class="table-box" style="width: 100%; margin-left:280px;">
                <table class="table table-striped" id="table">
                    <thead>
                    <tr>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
         </div>
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" id="recipent-id" hidden>
                        <input type="text" class="form-control" name="name" id="nameRuInput-recesipition" placeholder="Имя[RU]">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameEnInput-recesipition" placeholder="Имя[EN]">
                    </div>
                    <div class="mb-3">
                        <textarea type="text" class="form-control" name="name" id="descRuInput-recesipition" placeholder="Описание [RU]"></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="name" id="descEnInput-recesipition" placeholder="Описание [EN]"></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea id="editor"></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea id="editor"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="savedata()" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Сохранить</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="createGame" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Создание нового анонса</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="fileUploadForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameRuInput" placeholder="Имя[RU]">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameEnInput" placeholder="Имя[EN]">
                    </div>
                    <div class="mb-3">
                        <textarea type="text" class="form-control" name="name" id="descRuInput" placeholder="Описание [RU]"></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="name" id="descEnInput" placeholder="Описание [EN]"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="file" id="fileInput">
                    </div>
                    <div class="mb-3">
                        <textarea id="editor"></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea id="editor"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="createData()" data-bs-dismiss="modal" aria-label="Close">Создать</button>
                </div>
              </div>
            </div>
          </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="../vendor/jquery.js"></script>
        <!-- Include the default theme -->
        <link rel="stylesheet" href="/vendor/minified/themes/default.min.css" />

        <!-- Include the editors JS -->
        <script src="/vendor/minified/sceditor.min.js"></script>

        <!-- Include the BBCode or XHTML formats -->
        <script src="/vendor/minified/formats/bbcode.js"></script>
        <script src="/vendor/minified/formats/xhtml.js"></script>
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

            let allItems;

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
                var bodyru = sceditor.instance(document.querySelectorAll("#editor")[2]).fromBBCode(sceditor.instance(document.querySelectorAll("#editor")[2]).val(), true); 
                var bodyen = sceditor.instance(document.querySelectorAll("#editor")[3]).fromBBCode(sceditor.instance(document.querySelectorAll("#editor")[3]).val(), true); 
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
                        sceditor.instance(document.querySelectorAll("#editor")[0]).val(sceditor.instance(document.querySelectorAll("#editor")[0]).toBBCode(element["bodyru"]));
                        sceditor.instance(document.querySelectorAll("#editor")[1]).val(sceditor.instance(document.querySelectorAll("#editor")[1]).toBBCode(element["bodyen"]));
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
                        allItems = response
                        document.getElementById("table").innerHTML = `<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Описание</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>`;
                        response["items"].forEach(element => {
                            document.getElementById("table").innerHTML += 
                            `<tr>
                                <th scope="row">${element["id"]}</th>
                                <td>${element["nameru"]} | ${element["nameen"]}</td>
                                <td>${element["descriptionru"]} | ${element["descriptionen"]}</td>
                                <td>
                                    <button type="button" class="btn btn-secondary" onclick="inputData(this)" x-id="${element['id']}"  data-bs-toggle="modal" data-bs-target="#exampleModal">Редактировать</button>
                                    <button type="button" x-id="${element['id']}" onclick="deleteData(this)" class="btn btn-danger">Удалить</button>
                                </td>
                            </tr>`;
                        });
                    }
                });
            }

            loadItems()
        </script>
    </body>
</html>

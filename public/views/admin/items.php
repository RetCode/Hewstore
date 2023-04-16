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
                        <a href="/admin/items" class="nav-link active">
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
                        <a href="/admin/news" class="nav-link text-white">
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
                </ul>
                <button type="button" class="btn btn-primary" style="margin-top: 10px; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#createGame">Добавить продукт</button>
            </div>
            <div class="table-box" style="width: 100%; margin-left:280px;">
                <table class="table table-striped" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Картинка</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Игра</th>
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
                    <p>!! Важно, укажи прошлые параметры статуса и игры при изменении</p>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="recipient-id" hidden>
                      <label for="recipient-name" class="col-form-label">Имя:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                       <select class="form-control" name="" id="recipient-statusInput">
                       </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="" id="recipient-gameInput">
                        </select>
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Создание нового продукта</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="fileUploadForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Имя">
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" name="file" id="fileInput">
                    </div>
                    <div class="mb-3">
                       <select class="form-control" name="" id="statusInput">
                       </select>
                    </div>
                    <div class="mb-3">
                       <select class="form-control" name="" id="gameInput">
                       </select>
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
        <script>

            $.ajax({
                url: "/api",
                type: "POST",
                data: {method: 'getStatus'},
                success: function(response) {
                    response["items"].forEach(element => {
                        document.getElementById("statusInput").innerHTML += `<option value="${element["id"]}">${element["name"]}</option>`;
                        document.getElementById("recipient-statusInput").innerHTML += `<option value="${element["id"]}">${element["name"]}</option>`;
                        
                    })
                }
            });

            $.ajax({
                url: "/api",
                type: "POST",
                data: {method: 'getGames'},
                success: function(response) {
                    response["items"].forEach(element => {
                        document.getElementById("gameInput").innerHTML += `<option value="${element["id"]}">${element["name"]}</option>`;
                        document.getElementById("recipient-gameInput").innerHTML += `<option value="${element["id"]}">${element["name"]}</option>`;
                    })
                }
            });

            function clearAlert()
            {
                document.getElementById("alerts").innerHTML = "";
            }

            function createData()
            {
                var status = $("#statusInput").val();
                var game = $("#gameInput").val();
                var name = $("#nameInput").val(); 
                var fileInput = $("#fileInput")[0];
                var file = fileInput.files[0]; 
                
                var formData = new FormData(); 
                
                formData.append("name", name); 
                formData.append("file", file);
                formData.append("status", status);
                formData.append("game", game);
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
                let name = object.getAttribute("x-name");
                let status = object.getAttribute("x-status");
                let game = object.getAttribute("x-game");

                document.getElementById("recipient-name").value = name;
                document.getElementById("recipient-id").value = id;


                document.getElementById("recipient-statusInput").value = status;
                document.getElementById("recipient-gameInput").value = game;
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
                            Продукт успешно удален
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
                let status = document.getElementById("recipient-statusInput").value;
                let game = document.getElementById("recipient-gameInput").value;

                $.ajax({
                url: "/api",
                type: "POST",
                data: {method: 'editProduct', id: id, text: name, status: status, game: game},
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
                        console.log(response)
                        document.getElementById("table").innerHTML = `<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Картинка</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Игра</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>`;
                        response["items"].forEach(element => {
                            document.getElementById("table").innerHTML += 
                            `<tr>
                                <th scope="row">${element["id"]}</th>
                                <td>${element["name"]}</td>
                                <td>${element["img"]}</td>
                                <td>${element["status"]}</td>
                                <td>${element["game"]}</td>
                                <td>
                                    <button type="button" class="btn btn-secondary" onclick="inputData(this)" x-id="${element['id']}" x-name="${element['name']}" x-status="${element['statusID']}" x-game="${element['games']}" data-bs-toggle="modal" data-bs-target="#exampleModal">Редактировать</button>
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

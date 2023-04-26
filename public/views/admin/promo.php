<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Apanel - promo</title>
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
                        <a href="/admin/news" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Анонсы
                        </a>
                    </li>
                    <li>
                        <a href="/admin/promo" class="nav-link active">
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
                <button type="button" class="btn btn-primary" style="margin-top: 10px; margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#createGame">Добавить промокод</button>
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
          <div class="modal fade" id="createGame" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление нового промокода</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Промокод">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Время жизни в днях">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Кол-во активаций">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="" id="products">
                            <option value="-1">Для всех</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Процент">
                    </div>
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
                data: {method: 'getProductType'},
                success: function(response) {
                    console.log(response)
                    response["items"].forEach(element => {
                        document.getElementById("products").innerHTML += `<option value="${element["id"]}">${element["productTitle"]}: ${element["name"]}</option>`;
                        
                    })
                }
            });

            function clearAlert()
            {
                document.getElementById("alerts").innerHTML = "";
            }

            function createData()
            {
                var product = $("#products").val();
                var key = $("#nameInput").val(); 

                $.ajax({
                    url: "/api",
                    type: "POST",
                    data: {method: "createKey", product: product, key: key},
                    success: function(response) {
                        if(response["succes"] == true)
                        {
                            document.getElementById("alerts").innerHTML += `<div class="alert alert-success" role="alert">
                            Ключ успешно добавлен
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
                            Промокод успешно удален
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

            function loadItems()
            {
                $.ajax({
                url: "/api",
                type: "POST",
                data: {method: 'getPromo'},
                success: function(response) {
                        console.log(response)
                        document.getElementById("table").innerHTML = `<thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Промокод</th>
                        <th scope="col">Продукт</th>
                        <th scope="col">Активаций</th>
                        <th scope="col">Время жизни</th>
                        <th scope="col">Процент</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>`;
                        response["items"].forEach(element => {
                            document.getElementById("table").innerHTML += 
                            `<tr>
                                <th scope="row">${element["id"]}</th>
                                <td>${element["promo"]}</td>
                                <td>${element["product"]}</td>
                                <td>${element["count"]}</td>
                                <td>До: ${element["life"]}</td>
                                <td>${element["procent"]}%</td>
                                <td>
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

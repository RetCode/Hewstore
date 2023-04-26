<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Apanel - Types</title>
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
                        <a href="/admin/promo" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            Промокоды
                        </a>
                    </li>
                    <li>
                        <a href="/admin/payments" class="nav-link active">
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
                      <input type="text" class="form-control" id="recipient-id" hidden>
                      <label for="recipient-name" class="col-form-label">Имя:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                       <select class="form-control" name="" id="recipient-products">
                       </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="recipient-cost" placeholder="Цена">
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
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Создание нового тип продукта</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="nameInput" placeholder="Имя">
                    </div>
                    <div class="mb-3">
                        <select class="form-control" name="" id="products">
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" id="cost" placeholder="Цена">
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

            function loadItems()
            {
                $.ajax({
                url: "/api",
                type: "POST",
                data: {method: 'getPayments'},
                success: function(response) {
                        console.log(response)
                        document.getElementById("table").innerHTML = `<thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">К оплате</th>
                        <th scope="col">Валюта</th>
                        <th scope="col">uuid</th>
                        <th scope="col">Кошелек</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Товары</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>`;
                        response["items"].forEach(element => {
                            document.getElementById("table").innerHTML += 
                            `<tr>
                                <th scope="row">${element["id"]}</th>
                                <td>${element["amount"]} ${element["currency"]}</td>
                                <td>${element["to_currency"]}</td>
                                <td>${element["uuid"]}</td>
                                <td>${element["adress"]}</td>
                                <td>${element["payment_status"]}</td>
                                <td>${element["items"]}</td>
                            </tr>`;
                        });
                    }
                });
            }

            loadItems()
        </script>
    </body>
</html>

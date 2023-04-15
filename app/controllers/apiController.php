<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use app\core\Validations;
use app\core\View;
use app\interfaces\LocalCachedUI;

/**
 * apiController класс является контроллером для обработки API-запросов.
 * Если в запросе передается параметр "method" с непустым значением,
 * то происходит проверка на существование метода.
 * Если метод не существует, то возвращается ошибка "Method not exists".
 * Если параметр "method" не передан в запросе, то возвращается JSON-ответ
 * с параметром "api-version" и значением равным текущей версии апи.
 */

class apiController extends Controller
{
    private $api_version = "1.1";

    function apiAction()
    {
        /**
         * Если параметр "method" не передан,
         * то возвращается JSON-ответ с параметрами "response" равным false
         * и "api-version" равным текущей версии апи, и выполнение скрипта завершается.
         */

       if(isset($_POST["method"])){
            /**
             * Если параметр "method" с значение пусто,
             * то возвращается JSON-ответ с параметрами "response" равным false
             * и "error" равным "Method not exists", и выполнение скрипта завершается.
             */

           if(empty($_POST["method"])){
                Utils::sendAjaxRequest([
                    "response" => false,
                    "error" => "Method not exists"
                ]);
            }

            /**
             * Если значение параметра "method" в запросе равно "getGames",
             * то вызывается метод getGames() модели  для получения данных о играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив игр
             */
            if($_POST["method"] == "getGames"){

                // Проверяем кеширование
                $cachedResult = LocalCachedUI::getCache("getGames");
                
                if($cachedResult != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "items" => json_decode(json_encode($cachedResult),true)
                    ]);
                }
                    
                $games = $this->model->getGames();

                // Создание кеша
                LocalCachedUI::createCached("getGames", $games, 60);

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($games),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе равно "getProducts",
             * то вызывается метод getProducts() модели  для получения данных о продуктах в играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив продуктов
             */
            if($_POST["method"] == "getProducts"){

                Validations::getProducts($_POST["id"]);

                $products = $this->model->getProducts($_POST["id"]);

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($products),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе равно "getProductsAll",
             * то вызывается метод getProductsAll() модели  для получения данных о продуктах в играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив продуктов
             */
            if($_POST["method"] == "getProductsAll"){

                // Проверяем кеширование
                $cachedResult = LocalCachedUI::getCache("getProductsAll");
                
                if($cachedResult != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "items" => json_decode(json_encode($cachedResult),true)
                    ]);
                }
                    
                $products = $this->model->getProductsAll($_POST["id"]);

                // Создание кеша
                LocalCachedUI::createCached("getProductsAll", $products, 60);

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($products),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе равно "addFilter",
             * то вызывается метод addFilter() модели  для добавления данных о новом фильтре
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "addFilter"){
                
                Validations::FilterAcces($_POST['filter']);
                Validations::addFilter($_POST['filter'], $_POST["name"]);

               if($this->model->addFilter($_POST["filter"], $_POST["name"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "An " . $_POST['filter'] . " with this name already exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "editFilter",
             * то вызывается метод addFilter() модели  для редактирования данных фильтре
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "editFilter"){
                
                Validations::FilterAcces($_POST['filter']);
                Validations::editFilter($_POST['filter'], $_POST["id"], $_POST["text"]);

               if($this->model->editFilter($_POST["filter"], $_POST["id"], $_POST['text'])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "An " . $_POST['filter'] . " with this name not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "getProducts",
             * то вызывается метод getProducts() модели  для получения данных о продуктах в играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив продуктов
             */
            if($_POST["method"] == "getStatus"){

                $status = $this->model->getStatus();

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($status),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе равно "getProducts",
             * то вызывается метод getProducts() модели  для получения данных о продуктах в играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив продуктов
             */
            if($_POST["method"] == "getProductType"){

                $product = $this->model->getProductType();

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($product),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе равно "getSellers",
             * то вызывается метод getSellers() модели  для получения данных о продуктах в играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив продуктов
             */
            if($_POST["method"] == "getSellers"){

                // Проверяем кеширование
                $cachedResult = LocalCachedUI::getCache("getSellers");
                
                if($cachedResult != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "items" => json_decode(json_encode($cachedResult),true)
                    ]);
                }
                    
                $sellers = $this->model->getSellers();

                // Создание кеша
                LocalCachedUI::createCached("getSellers", $sellers, 60);


                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($sellers),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе равно "getSellers",
             * то вызывается метод getSellers() модели  для получения данных о продуктах в играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив продуктов
             */
            if($_POST["method"] == "getPayments"){

                // Проверяем кеширование
                $cachedResult = LocalCachedUI::getCache("getPayments");
                
                if($cachedResult != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "items" => json_decode(json_encode($cachedResult),true)
                    ]);
                }
                    
                $sellers = $this->model->getPayments();

                // Создание кеша
                LocalCachedUI::createCached("getPayments", $sellers, 60);


                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($sellers),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе равно "getFilter",
             * то вызывается метод getFilter() модели  для редактирования данных фильтре
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "getFilter"){
                
                Validations::FilterAcces($_POST['filter']);

                $data = $this->model->getFilter($_POST["filter"]);

                if($data != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true,
                        "items" => $data
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "An " . $_POST['filter'] . " with this name not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "editGame",
             * то вызывается метод editGame() модели  для редактирования данных о игре
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "editGame"){
                
                Validations::editTitle($_POST['id'], $_POST["text"]);

               if($this->model->editGame($_POST['id'], $_POST["text"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Product not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "editProduct",
             * то вызывается метод editProduct() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "editProduct"){
                
                Validations::editTitle($_POST['id'], $_POST["text"]);

               if($this->model->editProduct($_POST['id'], $_POST["text"], $_POST["status"], $_POST["game"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Product not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "editProduct",
             * то вызывается метод editProduct() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "editStatus"){
                
                Validations::editTitle($_POST['id'], $_POST["text"]);

               if($this->model->editStatus($_POST['id'], $_POST["text"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Status not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "addStatus",
             * то вызывается метод addStatus() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "addStatus"){
                
                Validations::addStatus($_POST["name"]);

               if($this->model->addStatus($_POST["name"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Status not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "deleteStatus",
             * то вызывается метод addStatus() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "deleteStatus"){
                
                Validations::deleteId($_POST["id"]);

               if($this->model->deleteStatus($_POST["id"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Status not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "deleteGame",
             * то вызывается метод addStatus() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

             if($_POST["method"] == "deleteGame"){
                
                Validations::deleteId($_POST["id"]);

               if($this->model->deleteGame($_POST["id"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Status not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "deleteGame",
             * то вызывается метод addStatus() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

             if($_POST["method"] == "deleteProduct"){
                
                Validations::deleteId($_POST["id"]);

               if($this->model->deleteProduct($_POST["id"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Status not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "getOffer",
             * то вызывается метод getOffer() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             */

            if($_POST["method"] == "getOffer"){
                
                Validations::getOffer($_POST["amount"], $_POST["network"], $_POST["to_currency"]);

               if($this->model->getOffer($_POST["amount"], $_POST["network"], $_POST["to_currency"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Status not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "createGame",
             * то вызывается метод createGame() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */
            if($_POST["method"] == "createGame"){
                
                $targetDir = "public/img/games/";
                $targetFile = $targetDir . basename($_FILES["file"]["name"]);
                $name = $_POST["name"];
                
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                    if($this->model->createGame($_POST["name"], $_FILES["file"]["name"])){
                        Utils::sendAjaxRequest([
                            "response" => true,
                            "succes" => true
                        ]);
                    }
                } else {
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "createGame",
             * то вызывается метод createGame() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */
            if($_POST["method"] == "createProduct"){
                
                $targetDir = "public/img/products/";
                $targetFile = $targetDir . basename($_FILES["file"]["name"]);
                $name = $_POST["name"];
                
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                    if($this->model->createProduct($_POST["name"], $_FILES["file"]["name"], $_POST["status"], $_POST["game"])){
                        Utils::sendAjaxRequest([
                            "response" => true,
                            "succes" => true
                        ]);
                    }
                } else {
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                    ]); 
                }
            }

        }
        else{
            Utils::sendAjaxRequest([
                "response" => false,
                "api-version" => $this->api_version
            ]);
        }
    }
}
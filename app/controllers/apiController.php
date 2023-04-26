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

                // Проверяем кеширование
                $cachedResult = LocalCachedUI::getCache("getProducts-" . $_POST["id"]);
                
                if($cachedResult != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "items" => json_decode(json_encode($cachedResult),true)
                    ]);
                }
                    
                $products = $this->model->getProducts($_POST["id"]);

                // Создание кеша
                LocalCachedUI::createCached("getProducts-" . $_POST["id"], $products, 60);

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
             * Если значение параметра "method" в запросе равно "getStatus",
             * то вызывается метод getStatus() модели  для получения данных о продуктах в играх.
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

                // Проверяем кеширование
                $cachedResult = LocalCachedUI::getCache("getProductsTypes");
                
                if($cachedResult != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "items" => json_decode(json_encode($cachedResult),true)
                    ]);
                }
                    
                $products = $this->model->getProductType();

                // Создание кеша
                LocalCachedUI::createCached("getProductsTypes", $products, 60);


                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($products),true)
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
             * Если значение параметра "method" в запросе равно "getPayments",
             * то вызывается метод getPayments() модели  для получения данных о продуктах в играх.
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
                
                $data = $this->model->getFilter($_POST["id"]);

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
                        "error" => "not exists"
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
             * Если значение параметра "method" в запросе равно "editProductType",
             * то вызывается метод editProductType() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

             if($_POST["method"] == "editProductType"){
                
                Validations::editTitle($_POST['id'], $_POST["text"]);

               if($this->model->editProductType($_POST['id'], $_POST["text"], $_POST["product"], $_POST["cost"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "ProductType not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "editProduct",
             * то вызывается метод editProduct() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             */

            if($_POST["method"] == "editStatus"){
                
               if($this->model->editStatus($_POST['id'], $_POST["text"], $_POST["color"])){
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
             */

            if($_POST["method"] == "addStatus"){
                
                Validations::addStatus($_POST["name"], $_POST["color"]);

               if($this->model->addStatus($_POST["name"], $_POST["color"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Error"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "deleteStatus",
             * то вызывается метод addStatus() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
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
             * то вызывается метод deleteGame() модели  для редактирования данных о продукте
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
             * Если значение параметра "method" в запросе равно "deleteProduct",
             * то вызывается метод deleteProduct() модели  для редактирования данных о продукте
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
                        "error" => "Product not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "deleteProductType",
             * то вызывается метод deleteProductType() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

             if($_POST["method"] == "deleteProductType"){
                
                Validations::deleteId($_POST["id"]);

               if($this->model->deleteProductType($_POST["id"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "ProductType not exists"
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
               
                try{
                    $data = $this->model->getOffer(
                        $_POST["amount"], 
                        $_POST["network"], 
                        $_POST["to_currency"], 
                        $_POST["mail"], 
                        $_POST["promo"], 
                        $_POST["items"]
                    );
                }
                catch(Exception $ex)
                {
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "status" => $ex
                    ]);
                }

                if($data != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true,
                        "hash" => $data
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
             * Если значение параметра "method" в запросе равно "createProduct",
             * то вызывается метод createProduct() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
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

            /** 
             * Если значение параметра "method" в запросе равно "createProductType",
             * то вызывается метод createProductType() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             */
            if($_POST["method"] == "createProductType"){
                
                if($this->model->createProductType($_POST["name"], $_POST["game"], $_POST["cost"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                } else {
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "getKeysCount",
             * то вызывается метод getKeysCount() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             */
            if($_POST["method"] == "getKeysCount"){
                
                $data = $this->model->getKeysCount();

                if($data != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true,
                        "items" => $data
                    ]);
                } else {
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                    ]); 
                }
            }  
            
            /** 
             * Если значение параметра "method" в запросе равно "getKeys",
             * то вызывается метод getKeys() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             */
            if($_POST["method"] == "getKeys"){
                
                $data = $this->model->getKeysAll();

                if($data != null){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true,
                        "items" => $data
                    ]);
                } else {
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                    ]); 
                }
            }
            
            /** 
             * Если значение параметра "method" в запросе равно "deleteKey",
             * то вызывается метод deleteKey() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "deleteKey"){
                
                Validations::deleteId($_POST["id"]);

               if($this->model->deleteKey($_POST["id"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Key not exists"
                    ]); 
                }
            }

            /** 
             * Если значение параметра "method" в запросе равно "deleteKey",
             * то вызывается метод deleteKey() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

             if($_POST["method"] == "createKey"){
                
               if($this->model->createKey($_POST["key"], $_POST["product"])){
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => true
                    ]);
                }
                else{
                    Utils::sendAjaxRequest([
                        "response" => true,
                        "succes" => false,
                        "error" => "Key not exists"
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
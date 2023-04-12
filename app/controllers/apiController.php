<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use app\core\Validations;
use app\core\View;

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
             * Если значение параметра "method" в запросе не равно "getGames",
             * то вызывается метод getGames() модели  для получения данных о играх.
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * и "items" содержащим массив игр
             */
           if($_POST["method"] == "getGames"){
                $games = $this->model->getGames();

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($games),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе не равно "getProducts",
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
             * Если значение параметра "method" в запросе не равно "addFilter",
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
             * Если значение параметра "method" в запросе не равно "searchGame",
             * то вызывается метод searchGame() модели для выдачи объекта по введенном имени
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             */

            if($_POST["method"] == "searchGame"){
                
                Validations::searchGame($_POST['text']);

                $search = $this->model->searchGame($_POST["text"]);

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($search),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе не равно "searchItems",
             * то вызывается метод searchGame() модели для выдачи объекта по введенном имени
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             */

            if($_POST["method"] == "searchItems"){
                
                Validations::searchItems($_POST["text"], $_POST["id"]);

                $search = $this->model->searchItems($_POST["text"], $_POST["id"]);

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($search),true)
                ]);
            }

            /** 
             * Если значение параметра "method" в запросе не равно "editFilter",
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
             * Если значение параметра "method" в запросе не равно "editGame",
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
             * Если значение параметра "method" в запросе не равно "editProduct",
             * то вызывается метод editProduct() модели  для редактирования данных о продукте
             * Результат передается в виде JSON-ответа с параметрами "response" равным true,
             * Защита ключем на основании IP сервера и версии API md5(ip . api_version)
             */

            if($_POST["method"] == "editProduct"){
                
                Validations::editTitle($_POST['id'], $_POST["text"]);

               if($this->model->editProduct($_POST['id'], $_POST["text"])){
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
             * Если значение параметра "method" в запросе не равно "editProduct",
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

        }
        else{
            Utils::sendAjaxRequest([
                "response" => false,
                "api-version" => $this->api_version
            ]);
        }
    }
}
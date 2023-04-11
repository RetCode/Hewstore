<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;

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
    function apiAction()
    {
        /**
         * Если параметр "method" не передан,
         * то возвращается JSON-ответ с параметрами "response" равным false
         * и "api-version" равным текущей версии апи, и выполнение скрипта завершается.
         */

        if(isset($_POST["method"]))
        {
            /**
             * Если параметр "method" с значение пусто,
             * то возвращается JSON-ответ с параметрами "response" равным false
             * и "error" равным "Method not exists", и выполнение скрипта завершается.
             */

            if(empty($_POST["method"]))
            {
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
            if($_POST["method"] != "getGames")
            {
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
            if($_POST["method"] == "getProducts")
            {
                if(!isset($_POST["id"]) || empty($_POST["id"]))
                    Utils::sendAjaxRequest([
                        "response" => false,
                        "error" => "ID undefined"
                    ]);

                $products = $this->model->getProducts($_POST["id"]);

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($products),true)
                ]);
            }
        }
        else
        {
            Utils::sendAjaxRequest([
                "response" => false,
                "api-version" => "1.1"
            ]);
        }
    }
}
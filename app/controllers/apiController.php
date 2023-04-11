<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;

class apiController extends Controller
{
    function apiAction()
    {
        if(isset($_POST["method"]))
        {
            if(empty($_POST["method"]))
            {
                Utils::sendAjaxRequest([
                    "response" => false,
                    "error" => "Method not exists"
                ]);
                exit;
            }

            if($_POST["method"] != "getGames")
            {
                $games = $this->model->getGames();

                Utils::sendAjaxRequest([
                    "response" => true,
                    "items" => json_decode(json_encode($games),true)
                ]);
                exit;
            }

        }
        else
        {
            Utils::sendAjaxRequest([
                "response" => true,
                "api-version" => "1.1"
            ]);
        }
    }
}
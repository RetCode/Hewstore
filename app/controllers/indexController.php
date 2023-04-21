<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use app\core\Validations;
use app\interfaces\LocalCachedUI;

class indexController extends Controller
{
    function indexAction()
    {
        // Utils::sendMail("HewStore Buy", "test", "PURCHASE","xoheveras.tm@gmail.com");

        $this->view->render_html([
            "HEADER" => Utils::getTemplates("header.template")
        ]);
    }

    function cartAction()
    {
        $this->view->render_html([
            "HEADER" => Utils::getTemplates("header_other.template")
        ]);
    }

    function gameAction()
    {
        Validations::gamesAction($_GET["id"]);

        $this->view->render_html([
            "HEADER" => Utils::getTemplates("header_other.template"),
            "GAMENAME" => $this->model->getGameName($_GET["id"])
        ]);
    }

    function paymentsAction()
    {
        $this->view->render_html([
            "HEADER" => Utils::getTemplates("header_other.template")
        ]);
    }

    function payAction()
    {

        Validations::payAction($_GET["hash"]);

        $result = $this->model->getPayInfo($_GET["hash"]);

        if($result != null)
        {
            $products = $this->model->getProducts(json_decode($result[0]["items"], true));

            $this->view->render_html([
                "HEADER" => Utils::getTemplates("header_other.template"),
                "order_id" => $result[0]["uuid"],
                "count_price" => $result[0]["amount"],
                "count_coin" => number_format($result[0]["payment_amount"], 8) . " " . $result[0]["to_currency"],
                "network" => $result[0]["network"],
                "user_email" => $result[0]["mail"],
                "date" => date("d.m.Y", $result[0]["expired_at"] - 7200),
                "payment_status" => $result[0]["payment_status"],
                "payment_wallet_name" => $result[0]["adress"],
                "amount" => number_format($result[0]["payment_amount"], 8),
                "time" => $result[0]["expired_at"],
                "items" => $products,
            ]);
        }
        else
        {
            header("Location: /");
        }
    }
}
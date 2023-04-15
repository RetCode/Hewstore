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
}
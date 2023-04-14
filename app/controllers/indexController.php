<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;

class indexController extends Controller
{
    function indexAction()
    {
        $this->view->render_html([
            "HEADER" => Utils::getTemplates("header.template")
        ]);
    }
}
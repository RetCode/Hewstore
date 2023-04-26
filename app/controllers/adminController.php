<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use app\core\Validations;
use app\interfaces\SessionUI;

class adminController extends Controller
{
    function gameAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");

        $this->view->run();
    }
    
    function itemsAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");

        $this->view->run();
    }

    function typesAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");

        $this->view->run();
    }

    function keysAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");

        $this->view->run();
    }

    function tagAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");

        $this->view->run();
    }
    
    function newsAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");
            
        $this->view->run();
    }

    function promoAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");
            
        $this->view->run();
    }

    function paymentsAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");
            
        $this->view->run();
    }

    function sellersAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");
            
        $this->view->run();
    }

    function adminAction()
    {

        if($_POST["login"] == "@HewStoreAdmin%Panel#6207" && $_POST["password"] == "~gwHyq7026")
            SessionUI::set("admin_auth", True);

        if(SessionUI::get("admin_auth") == True)
            header("Location: /admin/games");

        $this->view->run();
    }

    function filtersAction()
    {
        if(SessionUI::get("admin_auth") != True)
            header("Location: /admin");
            
        $this->view->run();
    }
}
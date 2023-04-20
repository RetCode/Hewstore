<?php
namespace app\core;

/**
*|-----------------------------------------------------------------
*|
*|  This file is responsible for all redirects in Xinoro
*|
*|  by xoheveras
*|-----------------------------------------------------------------
**/

class Router
{
    public static function start()
    {
        $route = trim($_REQUEST['route']??'index');

        switch($route)
        {
            case "index": Router::done("index", "index"); break;
            case "api": Router::done("api", "api"); break;
            case "cart": Router::done("index", "cart"); break;
            case "game": Router::done("index", "game"); break;
            case "payments": Router::done("index", "payments"); break;
            case "pay": Router::done("index", "pay"); break;
            case "admin/games": Router::done("admin", "game"); break;
            case "admin/items": Router::done("admin", "items"); break;
            case "admin/types": Router::done("admin", "types"); break;
            case "admin/keys": Router::done("admin", "keys"); break;
            case "admin/tag": Router::done("admin", "tag"); break;
            case "admin/news": Router::done("admin", "news"); break;
            case "admin/promo": Router::done("admin", "promo"); break;
            case "admin/payments": Router::done("admin", "payments"); break;
            case "admin/sellers": Router::done("admin", "sellers"); break;
            case "admin": Router::done("admin", "admin"); break;
            default: Router::error(404);
        }
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $controller - Name controller in folder
    *|  @param string $action - Name action(func) in controller(up)
    *|-----------------------------------------------------------------
    **/

    public static function done($controller,$action)
    {
        $newAction = $action."Action";
        $newController = $controller."Controller";
        require_once("app/controllers/".$newController.".php");
        $pageController = new $newController($controller, $action);
        $pageController->$newAction();
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $code - Error code
    *|-----------------------------------------------------------------
    **/

    public static function error($code)
    {
        require_once("public/views/errors/404.php");
        exit;
    }
}
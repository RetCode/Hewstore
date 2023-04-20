<?php
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;
use app\interfaces\localCachedUI;

class indexModel extends Model
{
    function getGameName($id)
    {
        $cachedResult = LocalCachedUI::getCache("gamename-" . $id);
        
        if($cachedResult != null){
            return $cachedResult;
        }
            
        $gameName = DataBase::Query("SELECT name FROM games_table WHERE id = ?",
        [
            $id
        ]);

        if($gameName != null){
            // Создание кеша
            LocalCachedUI::createCached("gamename-" . $id, $gameName[0]["name"], 60);
            return $gameName[0]["name"];
        }
        else{
            header("Location: /");
        }
    }

    function getPayInfo($hash)
    {
        $result = DataBase::Query("SELECT * FROM payments WHERE uuid = ?",[
            $hash
        ]);
        return $result;
    }

    function getProducts($arr)
    {

        $html = "";


        foreach($arr as $id => $el)
        {
            $products = DataBase::Query("SELECT product.name as 'cheat', products_type.name FROM products_type
            INNER JOIN product ON products_type.product = product.id
            WHERE products_type.id = ?", [
                $el["id"]
            ])[0];

            $html .= '<p>' . $products["cheat"] . ' - ' . $products["name"] . ' x' . $el["count"] .'</p>';
     
        }

        return $html;
    }
}
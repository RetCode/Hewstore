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
}
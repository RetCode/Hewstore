<?php
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;

class apiModel extends Model
{
    function getGames()
    {
        return $this->DataBase::Query("SELECT * FROM games");
    }
}
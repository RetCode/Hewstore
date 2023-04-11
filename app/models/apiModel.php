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

    function getProducts($id)
    {
        return $this->DataBase::Query(
            "SELECT product.id, product.name, product.img, status_table.name, games_table.name FROM product
             JOIN status_table ON status_table.id = product.status
             JOIN games_table ON games_table.id = product.games", 
             [
               $id
             ]
        );
    }
}
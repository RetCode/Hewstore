<?php
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;
use PhpOption\None;

class apiModel extends Model{

    function getGames(){
        return $this->DataBase::Query("SELECT * FROM games_table");
    }

    function getProducts($id){
        return $this->DataBase::Query(
            "SELECT product.id, product.name, product.img, status_table.name as 'status', games_table.name as 'game' FROM product
             INNER JOIN status_table ON status_table.id = product.status
             INNER JOIN games_table ON games_table.id = product.games
             WHERE product.games = ?", 
             [
               $id
             ]
        );
    }

    function addFilter($filter, $value){

        $isExists = DataBase::Query(
            "SELECT id FROM `?` WHERE name LIKE '?'",
            [
                $filter,
                $value
            ]);

        var_dump($isExists);
        
        if($isExists == null){
            DataBase::QueryUpd("INSERT INTO `?` VALUES(NULL, ?)",
            [
                $filter,
                $value
            ]);
            return True;
        }
        else return false;
    }
}
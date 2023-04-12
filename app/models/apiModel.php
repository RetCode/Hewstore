<?php
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;
use PhpOption\None;

class apiModel extends Model{

    /** 
     * Запрос в базу данных на запрос игр
     * @return array
    */
    function getGames(){
        return $this->DataBase::Query("SELECT * FROM games_table");
    }

    /** 
     * Запрос в базу данных на запрос продуктов под игру
     * @param int $id
     * @return array
    */
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

    /** 
     * Запрос в базу данных на добавление нового филтра
     * @param string $filter
     * @param string $value
     * @return false|true
    */
    function addFilter($filter, $value){

        $isExists = DataBase::Query(
            "SELECT id FROM $filter WHERE name LIKE ?",
            [
                $value
            ]);

        if($isExists == null){
            DataBase::QueryUpd("INSERT INTO $filter VALUES(NULL, ?)",
            [
                $value
            ]);
            return True;
        }
        else return false;
    }

    /** 
     * Запрос в базу данных на поиск игры
     * @param string $text
     * @return array
    */
    function searchGame($text){
        return $this->DataBase::Query("SELECT * FROM games_table WHERE name LIKE ?",[
            $text."%"
        ]);
    }

    /** 
     * Запрос в базу данных на поиск товара под игру
     * @param string $text
     * @param int $id
     * @return array
    */
    function searchItems($text, $id){
        return $this->DataBase::Query("SELECT product.id, product.name, product.img, status_table.name as 'status', games_table.name as 'game' FROM product
        INNER JOIN status_table ON status_table.id = product.status
        INNER JOIN games_table ON games_table.id = product.games
        WHERE product.games = ? AND product.name LIKE ?",[
            $id,
            $text."%"
        ]);
    }

    /** 
     * Запрос в базу данных на редактирование фильтра
     * @param string $filter
     * @param string $value
     * @return array
    */
    function editFilter($filter, $id, $text){

        $isExists = DataBase::Query(
            "SELECT id FROM $filter WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("UPDATE $filter SET name = ? WHERE id = ?",
            [
                $text,
                $id
            ]);
            return True;
        }
        else return false;
    }

    /** 
     * Запрос в базу данных на редактирование игры
     * @param string $id
     * @param string $text
     * @return array
    */
    function editGame($id, $text){

        $isExists = DataBase::Query(
            "SELECT id FROM games_table WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("UPDATE games_table SET name = ? WHERE id = ?",
            [
                $text,
                $id
            ]);
            return True;
        }
        else return false;
    }

    /** 
     * Запрос в базу данных на редактирование игры
     * @param string $id
     * @param string $text
     * @return array
    */
    function editProduct($id, $text){

        $isExists = DataBase::Query(
            "SELECT id FROM product WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("UPDATE product SET name = ? WHERE id = ?",
            [
                $text,
                $id
            ]);
            return True;
        }
        else return false;
    }

   /** 
     * Запрос в базу данных на редактирование игры
     * @param string $id
     * @param string $text
     * @return array
    */
    function editStatus($id, $text){

        $isExists = DataBase::Query(
            "SELECT id FROM status_table WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("UPDATE status_table SET name = ? WHERE id = ?",
            [
                $text,
                $id
            ]);
            return True;
        }
        else return false;
    }

}
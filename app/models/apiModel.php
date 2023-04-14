<?php
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;
use Cryptomus\Api\Client;


class apiModel extends Model{

    /** 
     * Запрос в базу данных на запрос игр
     * @return array
    */
    function getGames(){
        return $this->DataBase::Query("SELECT games_table.id, games_table.name, games_table.img, 
                (SELECT COUNT(id) FROM product WHERE product.games = games_table.id) as 'productCount' 
                FROM games_table WHERE 1");
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
     * @return True|False
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
     * Запрос в базу данных на редактирование фильтра
     * @param string $filter
     * @param string $value
     * @return True|False
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
     * @return True|False
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
     * @return True|False
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
     * Запрос в базу данных на редактирование статуса
     * @param string $id
     * @param string $text
     * @return True|False
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

   /** 
     * Запрос в базу данных на создание статуса
     * @param string $text
     * @return True|False
    */
    function addStatus($text){
        DataBase::QueryUpd("INSERT INTO status_table VALUES(Null, ?)",
        [
            $text
        ]);
        return True;
    }

   /** 
     * Запрос в базу данных на создание статуса
     * @param string $id
     * @return True|False
    */
    function deleteStatus($id){

        $isExists = DataBase::Query(
            "SELECT id FROM status_table WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("DELETE FROM status_table WHERE id = ?",
            [
                $id
            ]);
            return True;
        }
        else return false;
    }


    /**
     *  Запрос на создание платежа
     */

    function getOffer($amount, $network, $to_currency){

        $client = Client::payment($_ENV["PAYMENT_KEY"], $_ENV["MERCHANT_UUID"]);

        $idPayment = DataBase::Query("SELECT id FROM payments ORDER BY id DESC LIMIT 1", [])[0];

        $data = [
            'amount' => strval($amount),
            'currency' => 'USD',
            'network' => $network,
            'order_id' => strval($idPayment + 1),
            'url_return' => 'https://example.com/return',
            'url_callback' => 'https://example.com/callback',
            'is_payment_multiple' => false,
            'lifetime' => '7200',
            'to_currency' => $to_currency
        ];

        $result = $client->create($data);

        var_dump($idPayment);
        var_dump($result);

        DataBase::QueryUpd("INSERT INTO payments VALUES(Null, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
        [
            $amount,
            "USD",
            $network,
            7200,
            $to_currency,
            $result["uuid"],
            $result["payment_status"],
            $result["expired_at"],
            $result["address"]
        ]);

        return True;
    }

}
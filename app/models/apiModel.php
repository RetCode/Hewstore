<?php
use app\core\DataBase;
use app\core\Model;
use app\core\Utils;
use Cryptomus\Api\Client;
use app\interfaces\LocalCachedUI;

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
     * Запрос в базу данных на запрос продуктов под игру
     * @return array
    */
    function getProductsAll(){
        return $this->DataBase::Query(
            "SELECT product.id, product.name, product.img,  product.status as 'statusID', product.games,  status_table.name as 'status', games_table.name as 'game' FROM product
             INNER JOIN status_table ON status_table.id = product.status
             INNER JOIN games_table ON games_table.id = product.games"
        );
    }

    /** 
     * Запрос в базу данных на запрос продуктов под игру
     * @return array
    */
    function getProductType(){
        return $this->DataBase::Query(
            "SELECT products_type.id, products_type.product, products_type.name, products_type.cost, product.name as 'productTitle' 
            FROM products_type 
            INNER JOIN product ON product.id = products_type.product"
        );
    }

    /** 
     * Запрос в базу данных на запрос платежей
     * @return array
    */
    function getSellers(){
        return $this->DataBase::Query(
            "SELECT * FROM payments WHERE payment_status = 'success'"
        );
    }

    /** 
     * Запрос в базу данных на запрос всех платежей
     * @return array
    */
    function getPayments(){
        return $this->DataBase::Query(
            "SELECT * FROM payments"
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
     * Запрос в базу данных на получение филтров
     * @param string $filter
    */
    function getFilter($filter){

        // Проверяем кеширование
        $cachedResult = LocalCachedUI::getCache($filter);
        
        if($cachedResult != null)
            return $cachedResult;
            
        $data = DataBase::Query("SELECT * FROM $filter");

        if($data != null)
            // Создание кеша
            LocalCachedUI::createCached($filter, $data, 60);

        return $data;
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

            if (file_exists("public/cached/getGames.cached"))
                unlink("public/cached/getGames.cached");

            return True;
        }
        else return false;
    }

    /** 
     * Запрос в базу данных на редактирование игры
     * @param string $id
     * @param string $text
     * @param int $status
     * @param int $game
     * @return True|False
    */
    function editProduct($id, $text, $status, $game){

        $isExists = DataBase::Query(
            "SELECT id FROM product WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("UPDATE product SET name = ?, status = ?, games = ? WHERE id = ?",
            [
                $text,
                $status,
                $game,
                $id
            ]);

            if (file_exists("public/cached/getProductsAll.cached"))
                unlink("public/cached/getProductsAll.cached");

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
     * Запрос в базу данных на удаление статуса
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
     * Запрос в базу данных на удаление игры
     * @param string $id
     * @return True|False
    */
    function deleteGame($id){

        $isExists = DataBase::Query(
            "SELECT id FROM games_table WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("DELETE FROM games_table WHERE id = ?",
            [
                $id
            ]);

            if (file_exists("public/cached/getGames.cached"))
                unlink("public/cached/getGames.cached");

            return True;
        }
        else return false;
    }

    /** 
     * Запрос в базу данных на удаление игры
     * @param string $id
     * @return True|False
    */
    function deleteProduct($id){

        $isExists = DataBase::Query(
            "SELECT id FROM product WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("DELETE FROM product WHERE id = ?",
            [
                $id
            ]);

            if (file_exists("public/cached/getProductsAll.cached"))
                unlink("public/cached/getProductsAll.cached");

            return True;
        }
        else return false;
    }


    /** 
     * Запрос на получение всех статустов
    */
    function getStatus(){
        return DataBase::Query("SELECT * FROM status_table");
    }


    /**
     *  Запрос на создание платежа
     */

    function getOffer($amount, $network, $to_currency){

        $client = Client::payment($_ENV["PAYMENT_KEY"], $_ENV["MERCHANT_UUID"]);

        $idPayment = DataBase::Query("SELECT id FROM payments ORDER BY id DESC LIMIT 1")[0]["id"];

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

    /**
     *  Запрос на создание игры
     */

    function createGame($name, $filename){

        DataBase::QueryUpd("INSERT INTO games_table VALUES(Null, ?, ?)",
        [
            $name,
            $filename,
        ]);
        
        if (file_exists("public/cached/getGames.cached"))
            unlink("public/cached/getGames.cached");

        return True;
    }

    /**
     *  Запрос на создание продукта
     */

    function createProduct($name, $filename, $status, $game){

        DataBase::QueryUpd("INSERT INTO product VALUES(Null, ?, ?, ?, ?)",
        [
            $name,
            $filename,
            $status,
            $game
        ]);
        
        if (file_exists("public/cached/getProductsAll.cached"))
            unlink("public/cached/getProductsAll.cached");

        return True;
    }
}
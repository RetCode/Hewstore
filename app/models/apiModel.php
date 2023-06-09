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
     * Запрос в базу данных на запрос ключей
     * @return array
    */
    function getKeys(){
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
            "SELECT product.id, product.name, product.img, status_table.name as 'status', games_table.name as 'game', status_table.color FROM product
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
            INNER JOIN product ON product.id = products_type.product
            ORDER BY cost"
        );
    }

    /** 
     * Запрос в базу данных на запрос платежей
     * @return array
    */
    function getSellers(){
        return $this->DataBase::Query(
            "SELECT * FROM payments WHERE payment_status = 'paid' OR payment_status = 'paid_over'"
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
     * Запрос в базу данных на получение филтров
     * @param string $filter
    */
    function getFilter($id){

        // Проверяем кеширование
        $cachedResult = LocalCachedUI::getCache("getProductsFilter-" . $id);
        
        if($cachedResult != null)
            return $cachedResult;
            
        $data = DataBase::Query("SELECT * FROM stats_product WHERE game = ?", [$id]);

        if($data != null)
            // Создание кеша
            LocalCachedUI::createCached("getProductsFilter-" . $id, $data, 60);

        return $data;
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
     * Запрос в базу данных на редактирование продукта
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
     * Запрос в базу данных на редактирование продукта
     * @param string $id
     * @param string $text
     * @param int $product
     * @param float $cost
     * @return True|False
    */
    function editProductType($id, $text, $product, $cost){

        $isExists = DataBase::Query(
            "SELECT id FROM products_type WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("UPDATE products_type SET name = ?, product = ?, cost = ? WHERE id = ?",
            [
                $text,
                $product,
                $cost,
                $id
            ]);

            if (file_exists("public/cached/getProductsTypes.cached"))
                unlink("public/cached/getProductsTypes.cached");

            return True;
        }
        else return false;
    }

   /** 
     * Запрос в базу данных на редактирование статуса
     * @param string $id
     * @param string $text
     * @param string $color
     * @return True|False
    */
    function editStatus($id, $text, $color){

        $isExists = DataBase::Query(
            "SELECT id FROM status_table WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("UPDATE status_table SET name = ?, color = ? WHERE id = ?",
            [
                $text,
                $color,
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
    function addStatus($text, $color){
        DataBase::QueryUpd("INSERT INTO status_table VALUES(Null, ?, ?)",
        [
            $text,
            $color
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
     * Запрос в базу данных на удаление типа продукта
     * @param string $id
     * @return True|False
    */
    function deleteProductType($id){

        $isExists = DataBase::Query(
            "SELECT id FROM products_type WHERE id = ?",
            [
                $id
            ]);

        if($isExists != null){
            DataBase::QueryUpd("DELETE FROM products_type WHERE id = ?",
            [
                $id
            ]);

            if (file_exists("public/cached/getProductsTypes.cached"))
                unlink("public/cached/getProductsTypes.cached");

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

    function getOffer($amount, $network, $to_currency, $mail, $promo, $items){

        $client = Client::payment($_ENV["PAYMENT_KEY"], $_ENV["MERCHANT_UUID"]);

        $idPayment = DataBase::Query("SELECT id FROM payments ORDER BY id DESC LIMIT 1")[0]["id"];

        $data = [
            'amount' => strval($amount),
            'currency' => 'USD',
            'network' => $network,
            'order_id' => strval($idPayment + 1),
            'url_return' => 'https://example.com/return',
            'url_callback' => $_ENV["WEBHOOK_URL"],
            'is_payment_multiple' => true,
            'lifetime' => '7200',
            'to_currency' => $to_currency
        ];

        $result = $client->create($data);

        DataBase::QueryUpd("INSERT INTO payments VALUES(Null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
        [
            $amount,
            "USD",
            $network,
            7200,
            $to_currency,
            $result["uuid"],
            $result["payment_status"],
            time() + 7200,
            $result["address"],
            $result["payer_amount"],
            $mail,
            json_encode($items)
        ]);

        if($result['payment_status'] == "cancel")
            return "cancel";
        else
            return $result["uuid"];
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

    /**
     *  Запрос на создание продукта
     */

    function createProductType($name, $product, $cost){

        DataBase::QueryUpd("INSERT INTO products_type VALUES(Null, ?, ?, ?)",
        [
            $product,
            $name,
            $cost
        ]);

        if (file_exists("public/cached/getProductsAll.cached"))
            unlink("public/cached/getProductsAll.cached");

        return True;
    }

    /**
     *  Запрос на получение кол-ва ключей
     */

    function getKeysCount()
    {
        return DataBase::Query("SELECT productType, COUNT(*) as count_keys
        FROM key_table
        GROUP BY productType");
    }


    /**
     *  Запрос на получение ключей
     */
    function getKeysAll()
    {
        return DataBase::Query("SELECT key_table.id, key_table.key_text, products_type.name, key_table.productType, (SELECT name FROM product WHERE id = products_type.id) as 'pName'
        FROM key_table
        INNER JOIN products_type ON products_type.id = key_table.productType
        INNER JOIN product ON product.id = products_type.id");
    }

    /**
     *  Запрос на удаление ключа
     */
    function deleteKey($id)
    {
        DataBase::QueryUpd("DELETE FROM key_table WHERE id = ?", [
            $id
        ]);
        return True;
    }

    /**
     *  Запрос на создание ключа
     */

     function createKey($id, $product){

        DataBase::QueryUpd("INSERT INTO key_table VALUES(Null, ?, ?)",
        [
            $id,
            $product
        ]);
        return True;
    }

    /**
     *  Запрос на создание анонса
     */

     function createAnnounce($nameru, $nameen, $descriptionru, $descriptionen, $img, $bodyru, $bodyen){
        
        DataBase::QueryUpd('INSERT INTO announcements VALUES(Null, ?, ?, ?, ?, ?, ?, ?, ?)',
        [
            $nameru,
            $nameen,
            $descriptionru,
            $descriptionen,
            $img,
            $bodyru,
            $bodyen,
            time()
        ]);

        if (file_exists("public/cached/getAnnounce.cached"))
            unlink("public/cached/getAnnounce.cached");

        return True;
    }

    /**
     *  Запрос на удаление анонса
     */

     function deleteAnnounce($id){
        
        DataBase::QueryUpd('DELETE FROM announcements WHERE id = ?',
        [
            $id
        ]);
        if (file_exists("public/cached/getAnnounce.cached"))
            unlink("public/cached/getAnnounce.cached");
        return True;
    }

    /**
     *  Запрос на редактирование анонса
     */

     function editAnnounce($id, $nameru, $nameen, $descriptionru, $descriptionen, $bodyru, $bodyen){
        
        DataBase::QueryUpd('UPDATE announcements SET nameru = ?, nameen = ?, descriptionru = ?, descriptionen = ?, bodyru = ?, bodyen = ? WHERE id = ?',
        [
            $nameru,
            $nameen,
            $descriptionru,
            $descriptionen,
            $bodyru,
            $bodyen,
            $id
        ]);
        if (file_exists("public/cached/getAnnounce.cached"))
            unlink("public/cached/getAnnounce.cached");
        return True;
    }

    /**
     *  Запрос на получение анонсов
     */

     function getAnnounce(){
        return DataBase::Query('SELECT * FROM announcements');
    }
    

    /**
     *  Запрос на создание промокода
     */

     function createPromo($promo, $life, $count, $product, $procent){
        
        DataBase::QueryUpd('INSERT INTO promo VALUES(Null, ?, ?, ?, ?, ?)',
        [
            $promo,
            $life,
            $count,
            $product,
            $procent
        ]);

        return True;
    }

    /**
     *  Запрос на удаление проиокода
     */

     function deletePromo($id){
        
        DataBase::QueryUpd('DELETE FROM promo WHERE id = ?',
        [
            $id
        ]);
        return True;
    }

    /**
     *  Запрос на получение промокодов
     */

     function getPromo(){
        return DataBase::Query('SELECT * FROM promo');
    }
}
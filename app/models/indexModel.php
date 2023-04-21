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

    function changeStatus($id, $status)
    {
        $order = DataBase::Query("SELECT * FROM payments WHERE id = ?",[
            $id
        ]);

        if($order != null)
        {
            if($status == "paid" || $status = "paid_over")
            {
                Utils::sendMail(
                    "Thank you for purchase",
                    Utils::renderHTML(
                        Utils::getTemplates("mail.template"),
                        [
                            "URL" => $_SERVER["SERVER_NAME"],
                            "ORDER_ID" => $order[0]["id"],
                            "DATE" => date("d.m.Y", $order[0]["expired_at"]),
                        ]
                    ),
                    "Digital goods store",
                    $order[0]["mail"]
                );

                DataBase::QueryUpd("UPDATE payments SET payment_status = ?, expired_at = ? WHERE id = ?",[
                    $status,
                    time() - 8000,
                    $id
                ]);

                Utils::debugLog("ID: $id Status: $status", "payStatus");
            }
            else 
            {
                DataBase::QueryUpd("UPDATE payments SET payment_status = ? WHERE id = ?",[
                    $status,
                    $id
                ]);
            }
        }
    }

    function payStatus($string)
    {
        switch($string)
        {
            case "cancel":
                return "Pay cancel";
            break;
            case "paid":
                return "Pay success";
            break;
            case "wrong_amount":
                return "Wrong amount";
            break;
            case "paid_over":
                return "Pay success";
            break;
        }
    }
}
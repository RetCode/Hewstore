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

                $keys = json_decode($order[0]["items"], true);
                $html = "";

                foreach($keys as $id => $el)
                {
                    $products = DataBase::Query("SELECT product.name as 'cheat', products_type.name FROM products_type
                    INNER JOIN product ON products_type.product = product.id
                    WHERE products_type.id = ?", [
                        $el["id"]
                    ])[0];

                    for($i = 0; $i < $el["count"]; $i++)
                    {

                        $key = DataBase::Query("SELECT id, key_text FROM key_table WhERE productType = ?",[
                            $el["id"]
                        ]);

                        try{
                            DataBase::Query("DELETE FROM key_table where id = ?", [
                                $key[0]["id"]
                            ]);
                            $key = $key[0]["key_text"];
                        }
                        catch(Exception $ex){
                            Utils::debugLog($ex, "ketGiveExceptions");
                            $key = "This key is out of stock, please contact support";
                        }

                        $html .= '<tr>
                                    <td style="direction:ltr;font-size:0px;padding:14px 25px 0px 25px;text-align:center;">
                                    <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:450px;" ><![endif]-->
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background-color:rgba(45, 51, 74, 0.5);vertical-align:top;" width="100%">
                                        <tbody>
                                            <tr>
                                            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <div style="font-family: Roboto; color: rgba(255, 227, 1, 0.85); font-size: 11px; font-weight: 400; line-height: 14px;">KEY ' . $products["cheat"] . ': ' . $products["name"] . '</div>
                                                <div style="font-family: Roboto; color: #FFE301; font-size: 15px; font-weight: 400; line-height: 19px;">' . $key . '</div>
                                                </div>
                                            </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <!--[if mso | IE]></td></tr></table><![endif]-->
                                    </td>
                                </tr>';
                    }
                }

                Utils::sendMail(
                    "Thank you for purchase",
                    Utils::renderHTML(
                        Utils::getTemplates("mail.template"),
                        [
                            "URL" => $_SERVER["SERVER_NAME"],
                            "ORDER_ID" => $order[0]["id"],
                            "DATE" => date("d.m.Y", $order[0]["expired_at"]),
                            "KEYS" => $html
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
            case "check":
                return "Wait pay";
            break;
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
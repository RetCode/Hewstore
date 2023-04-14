<?php
namespace app\interfaces;

/**
*|-----------------------------------------------------------------
*|  @param interface_localCachedInterfaces
*|  Реализация интерфесай prosyctsInterface
*|-----------------------------------------------------------------
**/

interface localCachedInterfaces
{
    public static function createCached($key, $data, $minuts);
    public static function getCache($key);
    public static function checkTimestamp($timestamp);
}

class LocalCachedUI implements localCachedInterfaces
{
    public static function createCached($key, $data, $minuts)
    {
        $cachedObject = [
            "lifetime" => time() + $minuts * 60,
            "data" => $data
        ];

        file_put_contents($_ENV["CACHED_FOLDER"] . $key . '.cached', json_encode($cachedObject, JSON_FORCE_OBJECT));
    }

    public static function getCache($key)
    {
        if(file_exists($_ENV["CACHED_FOLDER"] . $key . ".cached")){
            $json = file_get_contents($_ENV["CACHED_FOLDER"] . $key . '.cached');
            $jsonArray = json_decode($json, true);

            if(LocalCachedUI::checkTimestamp($jsonArray["lifetime"]))
                return $jsonArray["data"];
            else
                return null;
        }
        else{
            return null;
        }
    }

    public static function checkTimestamp($timestamp)
    {
        if($timestamp >= time())
            return true;
        else 
            return false;
    }
}
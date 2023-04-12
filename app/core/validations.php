<?php
namespace app\core;
use app\core\Utils;

/**
*|-----------------------------------------------------------------
*|
*|  This file contains a validation functions
*|
*|-----------------------------------------------------------------
**/

class Validations
{
    /**
    *|-----------------------------------------------------------------
    *|  @param integer $id
    *|  Валидация метода api - getProducts
    *|-----------------------------------------------------------------
    **/
    static function getProducts($id)
    {
        if(!isset($id) || empty($id))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "ID undefined"
            ]);
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $filter
    *|  @param string $value
    *|  Валидация метода api - addFilter
    *|-----------------------------------------------------------------
    **/
    static function addFilter($filter, $value)
    {
        if(!isset($filter) || empty($filter))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Filter undefined"
            ]);

        if(!isset($value) || empty($value))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Name undefined"
            ]);
    }
}
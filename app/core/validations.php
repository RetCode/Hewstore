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
    *|  Валидация метода api - FilterAcces
    *|-----------------------------------------------------------------
    **/
    static function FilterAcces($filter)
    {

        $acces_filter = ["filter_os", "filter_cpu", "filter_gpu"];

        if(!in_array($filter, $acces_filter))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "filter not access"
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

    /**
    *|-----------------------------------------------------------------
    *|  @param string $text
    *|  Валидация метода api - searchGame
    *|-----------------------------------------------------------------
    **/
    static function searchGame($text)
    {
        if(!isset($text) || empty($text))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "text undefined"
            ]);
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $text
    *|  @param int $id
    *|  Валидация метода api - searchItems
    *|-----------------------------------------------------------------
    **/
    static function searchItems($text, $id)
    {
        if(!isset($text) || empty($text))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "text undefined"
            ]);

        if(!isset($id) || empty($id))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "id undefined"
            ]);
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $text
    *|  @param int $id
    *|  Валидация метода api - searchItems
    *|-----------------------------------------------------------------
    **/
    static function editFilter($filter, $id, $text)
    {
        if(!isset($filter) || empty($filter))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Filter undefined"
            ]);

        if(!isset($id) || empty($id))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Id undefined"
            ]);

        if(!isset($text) || empty($text))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Text undefined"
            ]);
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param string $id
    *|  @param int $text
    *|  Валидация метода api - editTitle
    *|-----------------------------------------------------------------
    **/
    static function editTitle($id, $text)
    {
        if(!isset($id) || empty($id))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Id undefined"
            ]);

        if(!isset($text) || empty($text))
            Utils::sendAjaxRequest([
                "response" => false,
                "error" => "Text undefined"
            ]);
    }
}
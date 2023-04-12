<?php
namespace app\interfaces;

/**
*|-----------------------------------------------------------------
*|  @param interface_prodyctsInterface
*|  Реализация интерфесай prosyctsInterface
*|-----------------------------------------------------------------
**/

interface productsInterface
{
    public function getId():                                    int;
    public function getName():                               string;
    public function getImg():                                string;
    public function getIDStatus():                              int;
    public function getIDGames():                               int;

}

class Product implements productsInterface
{
    private $id;
    private $name;
    private $img;
    private $idstatus;
    private $idgames;

    function __construct($id, $name, $img, $idstatus, $idgames)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
        $this->idstatus = $idstatus;
        $this->idgames = $idgames;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function getIDStatus(): int
    {
        return $this->idstatus;
    }

    public function getIDGames(): int
    {
        return $this->idgames;
    }
}
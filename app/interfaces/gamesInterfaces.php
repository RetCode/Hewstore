<?php
namespace app\interfaces;

/**
*|-----------------------------------------------------------------
*|  @param interface_gamesInterface
*|  Реализация интерфесай gamesInterface
*|-----------------------------------------------------------------
**/

interface gamesInterface
{
   public function getId():                                    int;
   public function getName():                               string;
   public function getImg():                                string;
//    public function serialize()
}


class GamesUI implements gamesInterface
{
    private $id;
    private $name;
    private $img;

    function __construct($id, $name, $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
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
}
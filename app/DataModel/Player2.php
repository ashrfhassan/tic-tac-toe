<?php

namespace App\DataModel;


class Player2 extends Player
{
    public $name   = "player2";
    public $symbol = "O";

    public function __construct($p2Name)
    {
        $this->name = $p2Name;
    }
}
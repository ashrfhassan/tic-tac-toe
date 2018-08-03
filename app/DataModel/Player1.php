<?php

namespace App\DataModel;

class Player1 extends Player
{
    public $name   = "player1";
    public $symbol = "X";

    public function __construct($p1Name)
    {
        $this->name = $p1Name;
    }
}
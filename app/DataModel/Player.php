<?php

namespace App\DataModel;

use App\Helpers\Helper;

abstract class Player implements IPlayer
{
    public $name   = null;
    public $symbol = null;

    public function makeMove($currentState, $squareNumber)
    {
        $currentState = Helper::updateCurrentState($currentState, $squareNumber, $this->symbol);
        return ["currentState" => $currentState, "winner" => WinnerChecker::checkWinner($currentState, $this)];
    }
}
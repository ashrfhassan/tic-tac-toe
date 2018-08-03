<?php
/**
 * Created by PhpStorm.
 * User: ashHassan
 * Date: 8/3/18
 * Time: 12:38 PM
 */

namespace App\DataModel;


interface IPlayer
{
    public function makeMove($currentState, $squareNumber);
}
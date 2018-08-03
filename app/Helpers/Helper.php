<?php

namespace App\Helpers;

class Helper
{
    public static function updateCurrentState($currentState, $squareNumber, $symbole)
    {
        $currentState = json_decode(json_encode($currentState));
        foreach ($currentState as $option) {
            foreach ($option as $key => $value) {
                if ($key === $squareNumber) {
                $option->$key = $symbole;
                }
            }
        }
        return $currentState;
    }

}
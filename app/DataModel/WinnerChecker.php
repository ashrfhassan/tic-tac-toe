<?php

namespace App\DataModel;


class WinnerChecker
{

    public static function checkWinner($currentState, $player)
    {
      $winPossibilities = self::getWinPossibilities($player->symbol);
      foreach ($winPossibilities as $winPossibility){
          foreach ($currentState as $state)
          if($winPossibility == $state){
              return $player;
          }
      }
      return false;
    }

    public static function getWinPossibilities($symbol)
    {
        $option1 = array("s1" => $symbol, "s2" => $symbol, "s3" => $symbol);
        $option2 = array("s4" => $symbol, "s5" => $symbol, "s6" => $symbol);
        $option3 = array("s7" => $symbol, "s8" => $symbol, "s9" => $symbol);
        $option4 = array("s1" => $symbol, "s4" => $symbol, "s7" => $symbol);
        $option5 = array("s2" => $symbol, "s5" => $symbol, "s8" => $symbol);
        $option6 = array("s3" => $symbol, "s6" => $symbol, "s9" => $symbol);
        $option7 = array("s1" => $symbol, "s5" => $symbol, "s9" => $symbol);
        $option8 = array("s3" => $symbol, "s5" => $symbol, "s7" => $symbol);
        return json_decode(json_encode(array($option1, $option2, $option3, $option4, $option5, $option6, $option7, $option8)));
    }
}
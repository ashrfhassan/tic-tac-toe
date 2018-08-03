<?php

namespace App\Controllers;

use App\DataModel\Player1;
use App\DataModel\Player2;
use App\DataModel\WinnerChecker;
use App\DB\DBConnection;
use Mockery\Exception;

class BaseController
{
    public static $player       = null;
    public static $dbConnection = null;

    public function __construct()
    {
        self::$dbConnection = DBConnection::getDBConnection();
    }

    public function startNewMatch($p1Name = "player1", $p2Name = "player2")
    {
        $currentState = WinnerChecker::getWinPossibilities("");
        self::$dbConnection->query("INSERT INTO matches (p1_name, p2_name) VALUES ('$p1Name', '$p2Name')");
        return ["currentState" => $currentState, "match_id" => self::$dbConnection->insert_id];
    }

    public function makeMove($currentState, $squareNumber, $symbol, $matchID, $pName)
    {
        if ($symbol == "X")
            self::$player = new Player1($pName);
        else if ($symbol == "O")
            self::$player = new Player2($pName);
        else
            throw new Exception('Undefined symbol');
        $playerName = self::$player->name;
        $playerSymbol = self::$player->symbol;
        self::$dbConnection
            ->query(
                "INSERT INTO transactions (match_id, square_number, player_name, player_symbol) VALUES ('$matchID', '$squareNumber', '$playerName', '$playerSymbol')"
            );
        $results = self::$player->makeMove($currentState, $squareNumber);
        if ($results["winner"]) {
            $winnerName = $results["winner"]->name;
            self::$dbConnection
                ->query(
                    "UPDATE matches set winner = '$winnerName' where match_id = $matchID"
                );
        }
        return $results;
    }
}
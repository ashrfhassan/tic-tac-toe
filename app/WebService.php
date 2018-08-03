<?php

namespace App;

use App\Controllers\BaseController;

class WebService
{

    //-----------------------------------Utilities System-----------------------------//

    protected static function response($data)
    {
        $data->error = 0;
        $data->message = "request has been made successfully.";
        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    protected static function error($errorCode, $errorMessage = "")
    {
        return json_encode(array("error" => $errorCode, "message" => $errorMessage));
    }

    /**
     * @brief processes all requested commands
     */
    public static function processCommand($method, $request, $input)
    {
        if (count($request) < 2 || strtolower($request[3]) != "api") {
            http_response_code(404);
            return WebService::error(ERRMSG_INVALID_FORMAT, "Check URL");
        }

        $command = strtolower($request[4]);

        $stdObject = new \stdClass();
        $baseController = new BaseController();
        /**********************************************************
         * APIs
         **********************************************************/
        if ($command == "startnewmatch") {
         $stdObject->data = $baseController->startNewMatch($input["p1Name"], $input["p2Name"]);
        }else if($command == "makemove"){
            $stdObject->data = $baseController->makeMove($input["currentState"], $input["squareNumber"], $input["symbol"], $input["matchID"], $input["pName"]);
        }

        return self::response($stdObject);
    }

}

?>
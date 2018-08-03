<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');
error_reporting(E_ERROR | E_PARSE);

include_once './config.php';
require './vendor/autoload.php';
use App\WebService;

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$input = json_decode(file_get_contents('php://input'), true);
if ($input === null)
    $input = $_POST;
if ($request[3] == "api") {
    header("Content-Type: application/json; charset=UTF-8");
    echo WebService::processCommand($method, $request, $input);
} else {
    header("Status: 404 Not Found");
    echo "Wrong URL";
}

?>
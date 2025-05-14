<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("RACINE", __DIR__);

require(RACINE."/src/functions/router.php");
require(RACINE."/src/models/connect.php");
require(RACINE."/src/models/request.php");

$action = "default";

if(isset($_GET["action"])){
    $action = $_GET["action"];

}

$fichier = switchman($action);
require(RACINE."/src/controllers/".$fichier); 





?>
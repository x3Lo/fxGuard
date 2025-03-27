<link href="public/css/style.css" rel="stylesheet" />
<?php

session_start();

require(__DIR__ . "/src/config.php");
require(RACINE."/src/functions/routeur.php");
require(RACINE."/src/models/connect.php");
require(RACINE."/src/models/request.php");



$action = "default";

if(isset($_GET["action"])){
    $action = $_GET["action"];

}

$fichier = switchman($action);
require(RACINE."/src/controllers/".$fichier); 





?>
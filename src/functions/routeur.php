<?php


function switchman($action = "default"){

    $theActions = array();
    $theActions["default"]="ctrlHomePage.php";
    $theActions["page404"]="page404_ctrl.php";
    

    $controler_id = $theActions[$action];

   	//si le fichier n'existe pas :
	if(! file_exists(RACINE . '/src/controllers/'. $controler_id) ) die("Le fichier : " . $controler_id . " n'existe pas !");

	//si la clé "action" existe dans notre tableau "lesActions" :
    if (array_key_exists($action,$theActions)) {
		// le fichier à inclure sera retourné :
        return $controler_id;
    } else {
        return $theActions["page404"];
    }

}
<?php


function switchman($action = "default"){

    $theActions = array();
    $theActions["configCreator"]="ctrlConfigCreator.php";
    $theActions["configView"]="ctrlConfigView.php";
    $theActions["configAdd"]="ctrlConfigAdd.php";
    $theActions["configRemove"]="ctrlConfigRemove.php";
    $theActions["configList"]="ctrlConfigList.php";
    $theActions["configListRemove"]="ctrlConfigListRemove.php";
    $theActions["configShare"]="ctrlConfigShare.php";
    $theActions["contact"]="ctrlContact.php";
    $theActions["default"]="ctrlHomePage.php";
    $theActions["login"]="ctrlLogin.php";
    $theActions["logout"]="ctrlLogout.php";
    $theActions["profile"]="ctrlProfile.php";
    $theActions["profileEdit"]="ctrlProfileEdit.php";
    $theActions["register"]="ctrlRegister.php";
    $theActions["comment"]="ctrlComment.php";
    $theActions["deleteComment"]="ctrlDeleteComment.php";
    $theActions["deleteProfile"]="ctrlDeleteProfile.php";
    $theActions["page404"]="page404_ctrl.php";
    $theActions["confidentialite"]="ctrlConfidentialite.php";
    $theActions["mentions-legales"]="ctrlMentions-legales.php";


    $theActions["admin"]="ctrlAdmin.php";
    $theActions["upgradeUser"]="ctrlUpgradeUser.php";
    $theActions["downgradeUser"]="ctrlDowngradeUser.php";
    $theActions["deleteTheme"]="ctrlDeleteTheme.php";
    $theActions["addTheme"]="ctrlAddTheme.php";
    

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
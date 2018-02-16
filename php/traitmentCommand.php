<?php
session_start();

include "scriptBDD.php";


function createAddress($streetnumber, $streetname, $postalcode, $city, $country){
    $error = 'Votre adresse a bien été enregistrée.';
    $boolError = false;
    if (!is_numeric($streetnumber)){
        $boolError = true;
        $error = 'Utilisez UNIQUEMENT des chiffres pour le numéro de rue!';
    } elseif(!is_numeric($postalcode)){
        $boolError = true;
        $error = 'Utilisez UNIQUEMENT des chiffres pour le code postal!';
    } elseif(empty(($streetnumber) || ($streetname) || ($postalcode) || ($city) || ($country))) {
        $boolError = true;
        $error = 'Vous devez remplir tous les champs du formulaire!';
    } elseif (!empty( ($streetname) || ($city) || ($country))){
        $arrayForm = array($streetname, $city, $country);
        foreach($arrayForm as $elementForm){
            if(ctype_digit($elementForm)){
                $boolError = true;
                $error = 'Vous ne pouvez pas pas utiliser de chiffres dans les cases "nom de rue", "nom de ville" et 
                nom de pays"';
            }
        }
    }
    return array($boolError, $error);
}


$_POST['numrue'] = addslashes($_POST['numrue']);
$_POST['nomrue'] = addslashes($_POST['nomrue']);
$_POST['cp'] = addslashes($_POST['cp']);
$_POST['ville'] = addslashes($_POST['ville']);
$_POST['pays'] = addslashes($_POST['pays']);


if (empty($_POST['numrue'] || $_POST['nomrue'] || $_POST['cp'] || $_POST['ville'] || $_POST['pays'])) {
   $error = "Veuillez remplir tous les champs";
} elseif (empty($_POST['numrue'] && $_POST['nomrue'] && $_POST['cp'] && $_POST['ville'] && $_POST['pays'])){
    $error = "Veuillez remplir tous les champs";
} else {
    $error = createAddress($_POST['numrue'], $_POST['nomrue'], $_POST['cp'], $_POST['ville'], $_POST['pays'])[1];

    if (createAddress($_POST['numrue'], $_POST['nomrue'], $_POST['cp'], $_POST['ville'], $_POST['pays'])[0] == false) {
        addAdress($_POST['numrue'], $_POST['nomrue'], $_POST['cp'], $_POST['ville'], $_POST['pays']);
        $_SESSION['adresse'] = getAdress();
        dropPanier();

    }


}

$_SESSION["errorAdd"] = $error;
header("Location: ../index.php");
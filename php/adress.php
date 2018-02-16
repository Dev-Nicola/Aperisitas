<?php
session_start();





function createAddress($streetnumber, $streetname, $postalcode, $city, $country){
    $error = 'Votre adresse a bien été enregistrée.';
    if (!is_numeric($streetnumber)){
        $error = 'Utilisez UNIQUEMENT des chiffres pour le numéro de rue!';
    } elseif(!is_numeric($postalcode)){
        $error = 'Utilisez UNIQUEMENT des chiffres pour le code postal!';
    } elseif(empty(($streetnumber) || ($streetname) || ($postalcode) || ($city) || ($country))) {
        $error = 'Vous devez remplir tous les champs du formulaire!';
    } elseif (!empty( ($streetname) || ($city) || ($country))){
        $arrayForm = array($streetname, $city, $country);
        foreach($arrayForm as $elementForm){
            if(ctype_digit($elementForm)){
                $error = 'Vous ne pouvez pas pas utiliser de chiffres dans les cases "nom de rue", "nom de ville" et 
                nom de pays"';
            }
        }
    }
    return $error;
}


if(!empty($_POST['streetnumber'] || $_POST['streetname'] || $_POST['postalcode'] || $_POST['city'] || $_POST['country'])) {
    $message_error = createAddress($_POST['streetnumber'], $_POST['streetname'],$_POST['postalcode'], $_POST['city'], $_POST['country']);
    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
} elseif(empty($_POST['streetnumber'] || $_POST['streetname'] || $_POST['postalcode'] || $_POST['streetname'] || $_POST['country'])) {
    $message_error = createAddress($_POST['streetnumber'], $_POST['streetname'], $_POST['postalcode'], $_POST['city'], $_POST['country']);
    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
}
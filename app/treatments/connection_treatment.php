<?php

if(isset($_POST['identifiantUser']) || isset($_POST['emailUser']) || isset($_POST['motDePasseUser']) || isset($_POST['confirmMotDePasseUser'])):
    $errors = [];
    if (!isset($_POST['identifiantUser'])) {
        $errors[] = "L'identifiant n'est pas renseigné";
    }
    if (!isset($_POST['motDePasseUser'])) {
        $errors[] = "Le mot de passe utilisateur n'est pas renseigné";
    }
    if (!empty($errors)) {
        $mesc->notifEntete(implode(", ", $errors), 0);
    }else{
        $identifiantUser = $_POST['identifiantUser'];
        $motDePasseUser = $_POST['motDePasseUser'];
    }
endif;


// Si il n'y aucune erreur et que l'utilisateur n'est pas connecté, on tente de le connecter
if(isset($errors) && empty($errors) && !isset($_SESSION["user_id"]) ){
    $user = new User(NULL, $identifiantUser, $motDePasseUser, $identifiantUser, NULL, NULL);
    $connexion = $user->connexion();

    if(is_array($connexion))
    {
        $mesc->afficherErreurs($connexion);
    }
}

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

<?php
if(isset($_POST['identifiantUser']) || isset($_POST['emailUser']) || isset($_POST['motDePasseUser']) || isset($_POST['confirmMotDePasseUser']))
{
    $errors = [];
    if (!isset($_POST['identifiantUser'])) {
        $errors[] = "L'identifiant n'est pas défini";
    }
    if (!isset($_POST['emailUser'])) {
        $errors[] = "L'adresse mail n'est pas défini";
    }
    if (!isset($_POST['motDePasseUser'])) {
        $errors[] = "Le mot de passe utilisateur n'est pas renseigné";
    }
    if (!isset($_POST['confirmMotDePasseUser'])) {
        $errors[] = "Le champ de confirmation de mot de passe est manquant";
    }
    if ($_POST['motDePasseUser'] !== $_POST['confirmMotDePasseUser']) {
        $errors[] = "Les mots de passes ne correspondent pas";
    }
    if (!empty($errors)) {
        $mesc->notifEntete(implode(", ", $errors), 0);
    }else{
        $identifiantUser = $_POST['identifiantUser'];
        $emailUser = $_POST['emailUser'];
        $motDePasseUser = $_POST['motDePasseUser'];
        $confirmMotDePasseUser = $_POST['confirmMotDePasseUser'];
    }
}

if(isset($errors) && empty($errors)){
    $user = new User(NULL, $identifiantUser, $motDePasseUser, $emailUser, NULL, NULL);
    $user->ajoute();
}
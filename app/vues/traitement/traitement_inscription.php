<?php
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
    if($bdd->inscriptionUser($_POST['emailUser'], $_POST['identifiantUser'], $_POST['motDePasseUser'])){
        header("Location: " . dirname($url) . "/connexion");
    }else{
    }
}
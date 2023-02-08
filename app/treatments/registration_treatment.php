<?php
if(isset($_POST['userIdentifier']) || isset($_POST['userMail']) || isset($_POST['userPassword']) || isset($_POST['confirmedUserPassword']))
{
    $errors = [];
    if (!isset($_POST['userIdentifier'])) {
        $errors[] = "L'identifiant n'est pas défini";
    }
    if (!isset($_POST['userMail'])) {
        $errors[] = "L'adresse mail n'est pas défini";
    }
    if (!isset($_POST['userPassword'])) {
        $errors[] = "Le mot de passe utilisateur n'est pas renseigné";
    }
    if (!isset($_POST['confirmedUserPassword'])) {
        $errors[] = "Le champ de confirmation de mot de passe est manquant";
    }
    if ($_POST['userPassword'] !== $_POST['confirmedUserPassword']) {
        $errors[] = "Les mots de passes ne correspondent pas";
    }
    if (!empty($errors)) {
        $mesc->headerNotification(implode(", ", $errors), 0);
    }else{
        $identifiantUser = $_POST['userIdentifier'];
        $emailUser = $_POST['userMail'];
        $motDePasseUser = $_POST['userPassword'];
        $confirmMotDePasseUser = $_POST['confirmedUserPassword'];
    }
}

if(isset($errors) && empty($errors)){
    $user = new User(NULL, $userIdentifier, $userPassword, $userMail, NULL, NULL);

    $add = $user->add();
    if(is_array($add))
    {
        $mesc->showErrors($add);
    }
}

<?php

if(isset($_GET['action'])){
    switch ($_GET['action']):
        case 'connexion':
            require_once __DIR__ . '\composants\formulaire_connexion.php';
            break;
        case 'inscription':
            require_once __DIR__ . '\composants\formulaire_inscription.php';
            break;
        default:
            require_once __DIR__ . '\404.php';
            break;
    endswitch;
}else{
    require_once __DIR__ . '\composants\formulaire_connexion.php';
}

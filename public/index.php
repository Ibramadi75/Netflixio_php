<?php

/**
* Page index 
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

// require_once __DIR__ . '/includes/class.PdoNetflixio.php';
require_once dirname(__DIR__ ) . '/includes/class.MetteurEnScene.php';
require_once dirname(__DIR__ ) . '/app/controleurs/Controleur.php';
require_once dirname(__DIR__ ) . '/app/vues/traitement/control_traitement.php';

// Crée une instance du contrôleur, du metteur en scène et du PDO 
$controleur = new ControleurUtilisateur();
$mesc = new MetteurEnScene();
$bdd = new DB();
?>
<style>
    <?php
        // Je n'arrive pas à récupérer les css avec les feuilles de styles, pourquoi ? On va faire comme ça pour le moment
        echo file_get_contents(__DIR__ . '/assets/styles/formulaires.css');
        echo file_get_contents(__DIR__ . '/assets/styles/global.css');
        echo file_get_contents(__DIR__ . '/assets/styles/pannel.css');
    ?>
</style>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/styles/global.css">
    <link rel="stylesheet" href="assets/styles/formulaires.css">
    <link rel="stylesheet" href="assets/styles/pannel.css">
</head>
<body>
    <?php
        require_once dirname(__DIR__) . "/route/Route.php";
    ?>
</body>
</html>

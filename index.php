<?php

/**
* Page index 
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

include "controleurs/class.controleurUtilisateur.php";
require_once "attributs/class.Route.php";

// Crée une instance du contrôleur
$controleur = new controleurUtilisateur();

// $action = isset($_GET['action']) ? $_GET['action'] : 'accueil';

// // Appelle la méthode correspondante du contrôleur
// match ($action) {
//   'accueil' => $controleur->getPageAccueil(),
//   'profil' => $controleur->getPageProfil($_GET['id']),
//   'connexion' => $controleur->getPageConnexion(),
//   'inscription' => $controleur->getPageInscription(),
//   default => $controleur->getPage404(), // Affiche une erreur si l'action est inconnue
// };


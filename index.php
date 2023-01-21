<?php

/**
* Page index 
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

include "controleurs/class.controleurUtilisateur.php";

// Crée une instance du contrôleur
$controleur = new controleurUtilisateur();

$action = isset($_GET['action']) ? $_GET['action'] : 'accueil';

  // Appelle la méthode correspondante du contrôleur
  match ($action) {
    'accueil' => $controleur->getAccueilPage(),
    'profil' => $controleur->getPageProfil($_GET['id']),
    default => $controleur->getNotFoundPage(), // Affiche une erreur si l'action est inconnue
};



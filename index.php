<?php

/**
* Page index 
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

include "controleurs/class.controleurUtilisateur.php";

// Crée une instance du contrôleur
$controller = new UserController();

// Récupère l'action demandée dans l'URL
$action = $_GET['action'];

// Appelle la méthode correspondante du contrôleur
if ($action == 'index') {
  $controller->index();
} elseif ($action == 'show') {
  $controller->show($_GET['id']);
} else {
  // Affiche une erreur si l'action est inconnue
  echo "Erreur : action inconnue.";
}


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

if(isset($_GET['action']))
{
  // Récupère l'action demandée dans l'URL
  $action = $_GET['action'];
}else{
  $action = '404';
}

  // Appelle la méthode correspondante du contrôleur
  if ($action == 'index') {
    $controleur->index();
  } elseif ($action == 'show') {
    $controleur->show($_GET['id']);
  } else {
    // Affiche une erreur si l'action est inconnue
    echo "Erreur : action inconnue.";
  }



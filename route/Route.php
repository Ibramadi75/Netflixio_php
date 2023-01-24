<?php

/**
* Route
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

/*** Récupération de la clé de la route ***/
$origine = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);

/*** ROUTES ***/
// $routes = array(
//     "/afficher_un_livre" => "vues/accueil",
//     "/ajouter_un_livre" => "livre/ajouter",
//     "/afficher_une_image" => "image/index",
//     "/supprimer_une_image" => "image/supprimer"
// );

$routes = match ($origine) {
  '/accueil', '/' => "vues/accueil",
  '/profil' => "vues/pageProfil",
  '/connexion' => "vues/accueil?action=connexion",
  '/inscription' => "vues/accueil?action=inscription",
  default => "vues/404", // Affiche une erreur si l'action est inconnue
};

/*** Création de l'url de destination ***/
$destination = $routes . '.php';

/*** Appel du bon fichier ***/
require $destination;


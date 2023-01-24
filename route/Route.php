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
$routes = match ($origine) {
  'index.php' => "",
  '/', '/connexion' => "vues/accueil",
  '/profil' => "vues/pageProfil",
  '/inscription' => "vues/accueil",
  default => "vues/404", // Affiche une erreur si l'action est inconnue
};

// match ($origine) {
//     '/inscription' => "vues/accueil",
//     default => "vues/404", // Affiche une erreur si l'action est inconnue
// };



/*** Création de l'url de destination ***/
$destination = $routes . ".php";

/*** Appel du bon fichier ***/
require $destination;


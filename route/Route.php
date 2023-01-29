<?php
/**
* Route
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/




/*** Récupération de la clé de la route ***/
$origine = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);
$origine = substr($_SERVER['REQUEST_URI'], strpos($origine, "Netflixio_php") + strlen("Netflixio_php"), strlen($_SERVER['REQUEST_URI']));

/*** ROUTES ***/
$routes = match ($origine) {
  'index.php' => "index",
  '/', '/connexion' => "connexion",
  '/profil' => "profil",
  '/home' => "index",
  '/inscription' => "inscription",
  default => "vue404", // Affiche une erreur si l'action est inconnue
};
$ctrl->$routes();


<?php

/**
* Route
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

/*** Récupération de la clé de la route ***/

$url = "http://localhost/Netflixo/Netflixio_php/inscription";
$new_url = substr($url, 0, strpos($url, "Netflixio_php") + strlen("Netflixio_php")); // affiche "http://localhost/Netflixo/"


$origine = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);
$origine = substr($_SERVER['REQUEST_URI'], strpos($origine, "Netflixio_php") + strlen("Netflixio_php"), strlen($_SERVER['REQUEST_URI']));

/*** ROUTES ***/
$routes = match ($origine) {
  'index.php' => "",
  '/', '/connexion' => "app/vues/vueConnexion",
  '/profil' => "app/vues/vueProfil",
  '/home' => "app/vues/vueAccueil",
  '/inscription' => "app/vues/vueInscription",
  default => "app/vues/vue404", // Affiche une erreur si l'action est inconnue
};

// $form = match ($origine) {
//   '/inscription' => dirname(__DIR__) . '\vues\composants\formulaire_inscription.php',
//   default => dirname(__DIR__) . '\vues\composants\formulaire_connexion.php',
// };


/*** Création de l'url de destination ***/
$destination = dirname(__DIR__) . '/' . $routes . ".php";

/*** Appel du bon fichier ***/
require $destination;


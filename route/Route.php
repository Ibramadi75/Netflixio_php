<?php

/**
* Route
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

/*** Récupération de la clé de la route ***/
$origine = str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);

$url = "http://localhost/Netflixo/Netflixio_php/inscription";
$new_url = substr($url, 0, strpos($url, "Netflixio_php") + strlen("Netflixio_php")); // affiche "http://localhost/Netflixo/"

/*** ROUTES ***/
$routes = match ($origine) {
  'index.php' => "",
  '/', '/connexion' => "vues/accueil",
  '/profil' => "vues/pageProfil",
  '/inscription' => "vues/accueil",
  default => "vues/404", // Affiche une erreur si l'action est inconnue
};

$form = match ($origine) {
    '/inscription' => dirname(__DIR__) . '\vues\composants\formulaire_inscription.php',
    default => dirname(__DIR__) . '\vues\composants\formulaire_connexion.php',
};



/*** Création de l'url de destination ***/
$destination = $routes . ".php";

/*** Appel du bon fichier ***/
require $destination;


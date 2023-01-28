<?php
/**
* Route
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

/*** Récupération de la clé de la route ***/
$origine = str_replace(dirname($_SERVER["PHP_SELF"]), "", $_SERVER["REQUEST_URI"]);
$origine = substr($_SERVER["REQUEST_URI"], strpos($origine, "Netflixio_php") + strlen("Netflixio_php"), strlen($_SERVER["REQUEST_URI"]));

/*** ROUTES ***/
$routes = match ($origine) {
  "index.php" => "index",
  "/", "/connexion" => "connexion",
  "/profil" => "profil",
  "/home" => "index",
  "/inscription" => "inscription",
  default => "erreur404", // Affiche une erreur 404 si l"action est inconnue
};

/* ici l'objectif est de pouvoir à l'avenir créer mes propres codes d'erreurs qui pourront être définit dans la base de données en m'évitant de devoir créer une page pour chacune d'entre elles*/
if(str_contains($routes, "erreur"))
{
  // On extrait le code d'erreur
  $code = str_replace("erreur", "", $routes);
  // On redéfinit $routes de façon à récupérer la méthode adéquate
  $routes = "erreur";
  // On créer une instance d'Erreur qui va récupérer les informations de l'erreur dans la base de données¨
  $err = new Erreur($code, $pdo);
}

// On récupère l'url de la racine
$rootUrl = $ctrl->getApp()->getRootUrl();

// On s'assure que la variable soit un tableau (certaines méthodes retourne des chaînes de caractères)
(array)$chemins = $ctrl->$routes();
// On récupère chaque vue ainsi que les fichiers nécessaires à leur bons fonctionnement
foreach($chemins as $chemin){
  require_once $chemin;
}

<?php

/**
 * Contrôleur
 *
 * @author Ibrahim Madi <ibrahim75madi@gmail.com>
 * @version 0
 */

// require dirname(__DIR__) . "/models/DB.php";
require dirname(__DIR__) . "/models/User.php";
class Controleur{
  private App $app;
  /* Constructeur */
  public function __construct(
    private string $dir,
    private string|NULL $prefix = NULL,
    private string|NULL $vue = NULL,
    private string|NULL $traitement = NULL,
  ){
    $this->prefix = dirname($dir) . "/app/";
    $this->vue = $this->prefix . "vues/";
    $this->traitement = $this->prefix . "traitements/";
    $this->app = new App("http://localhost:8888/Netflixio_php");
  }

  /* Getters et Setters */
  public function getApp() : App
  {
    return $this->app;
  }

  /* Méthodes */
  public function index() : string
  {
    // Code pour afficher la vue par défaut
    return $this->vue . "vueAccueil";
  }

  public function connexion() : array
  {
    // Code pour afficher la vue par défaut
    return array(
      $this->traitement . "traitement_connexion.php",
      $this->vue . "vueConnexion.php"
    );
  }

  public function inscription() : array
  {
    // Code pour afficher la vue par défaut
    return array(
      $this->traitement . "traitement_inscription.php",
      $this->vue . "vueInscription.php"
    );
  }

  public function erreur() : array
  {
    return array(
      $this->vue . "vueErreur.php",
    );
  }

  public function content_e($id)
  {
    // Code pour afficher les détails d'un élément en particulier
  }

  public function edit($id)
  {
    // Code pour afficher la vue d'édition
  }

  // public function update(Request $request, $id)
  // {
  //   // Code pour traiter les données soumises par le formulaire d'édition
  // }

  public function destroy($id)
  {
    // Code pour supprimer un élément
  }
}

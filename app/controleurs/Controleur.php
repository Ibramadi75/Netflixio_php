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
  }


  public function index()
  {
    // Code pour afficher la vue par défaut
    return $this->vue . 'vueAccueil';
  }

  public function connexion()
  {
    // Code pour afficher la vue par défaut
    require_once $this->traitement . "traitement_connexion.php";
    require_once $this->vue . "vueConnexion.php";
  }

  public function inscription()
  {
    // Code pour afficher la vue par défaut
    require $this->traitement . "traitement_inscription.php";
    require $this->vue . 'vueInscription.php';

    if(isset($errors) && empty($errors)){
      $user = new User(NULL, $identifiantUser, $motDePasseUser, $emailUser, NULL, NULL);
      $user->ajoute();
    }
  }

  public function vue404(){
    require $this->vue . 'vue404.php';
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

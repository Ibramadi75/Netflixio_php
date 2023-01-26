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
    private string $prefix
  ){}

  public function index()
  {
    // Code pour afficher la vue par défaut
    return $this->prefix . 'vueAccueil';
  }

  public function connexion()
  {
    // Code pour afficher la vue par défaut
    return $this->prefix . 'vueConnexion';
  }

  public function inscription()
  {
    // Code pour afficher la vue par défaut
    require dirname(__DIR__) . "/traitement/traitement_inscription.php";
    if(isset($errors) && empty($errors)){
      $user = new User(NULL, $identifiantUser, $motDePasseUser, $emailUser, NULL, NULL);
      $user->ajoute();
    }
    return $this->prefix . 'vueInscription';
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

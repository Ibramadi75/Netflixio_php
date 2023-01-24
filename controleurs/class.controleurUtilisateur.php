<?php

/**
* Contrôleur
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

include "includes/class.PdoNetflixio.php";

class controleurUtilisateur
{
  private PdoNetflixio $bdd;

  public function getDashboard($id)
  {
    // Récupère les informations de l'utilisateur depuis la base de données
    $user = $this->bdd->getUserFromDB($id);

    // Affiche la vue avec les informations de l'utilisateur
    include 'vues/dashboard.php';
  }
  
  /**
   * Page d'accueil
   */
  public function getPageAccueil(){
    include dirname(__DIR__) . '\vues\accueil.php';
  }

  /**
   * Page connexion
   */
  public function getPageConnexion(){
    $this->getPageAccueil();
  }

  /**
   * Page connexion
   */
  public function getPageInscription(){
    include dirname(__DIR__) . '\vues\accueil.php';
  }


  /**
   * Page profil
   */
  public function getPageProfil(string $username = ""){
    include dirname(__DIR__) . '/vues/pageProfil.php';
  }

  /**
   * Page 404
   */
  public function getPage404($e = NULL){
    include dirname(__DIR__) . '/vues/notFoundPage.php';
  }
}


<?php

/**
* Contrôleur
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

include "includes/class.pdoNetflixio.php";


class controleurUtilisateur
{
  private PdoNetflixio $bdd;

  public function getDashboard($id)
  {
    // Récupère les informations de l'utilisateur depuis la base de données
    $user = $this->bdd->getUserFromDB($id);

    // Affiche la vue avec les informations de l'utilisateur
    include 'vues/dashboard.php.php';
  }

  /**
  * Récupère la page de connexion avec éventuellement un username en paramètre afin de préremplir le champ
  * @param string $username nom de l'utilisateur facultatif pour préremplir le champ
  */

  public function connexionPage(string $username = ""){

  }
}


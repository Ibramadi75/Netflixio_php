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

  public function index()
  {
    // Récupère la liste des utilisateurs depuis la base de données
    $users = $this->bdd->getUsersFromDB();

    // Affiche la vue avec la liste des utilisateurs
    include 'vues/utilisateurs.php';
  }

  public function show($id)
  {
    // Récupère les informations de l'utilisateur depuis la base de données
    $user = $this->bdd->getUserFromDB($id);

    // Affiche la vue avec les informations de l'utilisateur
    include 'vues/utilisateur.php';
  }
}


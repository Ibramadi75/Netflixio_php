<?php

class UserController
{
  public function index()
  {
    // Récupère la liste des utilisateurs depuis la base de données
    $users = getUsersFromDatabase();

    // Affiche la vue avec la liste des utilisateurs
    include 'views/users.php';
  }

  public function show($id)
  {
    // Récupère les informations de l'utilisateur depuis la base de données
    $user = getUserFromDatabase($id);

    // Affiche la vue avec les informations de l'utilisateur
    include 'views/user.php';
  }
}


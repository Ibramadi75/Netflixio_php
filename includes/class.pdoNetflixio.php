<?php

/**
* Classe PDO qui va me permettre de réaliser des requêtes sur la base de données
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

class PdoNetflixio
{
    private  $serveur;
    private  $bdd;
    private  $user;
    private  $mdp;
    private  $instancePdo;

    public function __construct()
    {
        try {
            $ini = parse_ini_file(__DIR__ . '/../app.ini');

            $this->user = $ini['db_user'];
            $this->mdp = $ini['db_password'];
            $this->serveur = $ini['db_host'];
            $this->bdd = $ini['db_name'];

            //  die("mysql:host=".$this->serveur.';' .'dbname='.$this->bdd) ; 
            $this->instancePdo = new PDO("mysql:host=" . $this->serveur . ';' . 'dbname=' . $this->bdd, $this->user, $this->mdp);
            $this->instancePdo->query("SET CHARACTER SET utf8");
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
    }

    /**
    * Permet de récupérer l'intégralité des utilisateurs de la base de données
    *
    * @return array Retourne un tableau des utilisateurs de la base de données
    * ainsi que l'intégralité de leurs informations non sensibles ou personnelles
    *
    * @access public
    */
    public function getUsersFromDB()
    {
        $req = sprintf("SELECT id, username, email, subscription_type, created_at FROM `users` WHERE 1");
        $stmt = $this->instancePdo->prepare($req);
        $res = $stmt->execute();

        return $res;
    }

    /**
    * Permet de récupérer l'intégralité des données d'un utilisateur de la base de données
    *
    * @return array Contient les données de l'utilisateur de la base de données dont l'id correspond
    *
    * @param int $id Identifiant de l'utilisateur dans la base de données
    * @access public
    */
    public function getUserFromDB($id)
    {
        $req = sprintf("SELECT id, username, email, subscription_type, created_at FROM `users` WHERE id = %s", $this->instancePdo->quote($id));
        $stmt = $this->instancePdo->prepare($req);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
    * Permet de récupérer l'intégralité des données d'un contenu vidéo de la base de données
    *
    * @return array Contient les données du contenu vidéo dont l'id correspond
    *
    * @param int $id Identifiant du contenu vidéo dans la base de données
    * @access public
    */
    public function getContentsFromDB()
    {
        $req = sprintf("SELECT id, title, release_year, number_of_seasons, rating, k.libelle FROM `tv_shows` AS a JOIN kinds AS k ON a.kind_id = k.id WHERE 1");
        $stmt = $this->instancePdo->prepare($req);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
    * Permet de récupérer l'intégralité des données d'un contenu vidéo de la base de données
    *
    * @return array Contient les données d'un contenu vidéo de la base de données dont l'id correspond
    *
    * @param int $id Identifiant d'un contenu vidéo dans la base de données
    * @param mixed $type Genre du contenu, "movies" ou 1, "tv_shows" ou 2
    * @access public
    */
    public function getContentFromDB($id, $type)
    {
        if($type == 1){ $type = "movies"; }
        else if($type == 2){ $type = "tv_shows";};

        $req = sprintf("SELECT title, release_year, duration, rating FROM %s WHERE id = %s", $this->instancePdo->quote($type), $this->instancePdo->quote($id));
        $stmt = $this->instancePdo->prepare($req);
        $stmt->execute();

        return $stmt->fetch();
    }

}

<?php

/**
* Classe PDO qui va me permettre de réaliser des requêtes sur la base de données
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

class PdoApp
{
    private $serveur;
    private $bdd;
    private $user;
    private $mdp;
    private $instancePdo;

    /* Getters */
    public function getInst(){
        return $this->instancePdo;
    }


    public function __construct()
    {
        try {
            $ini = parse_ini_file(dirname(dirname(__DIR__)) . '/app.ini');

            $this->user = $ini['db_user'];
            $this->mdp = $ini['db_password'];
            $this->serveur = $ini['db_host'];
            $this->bdd = $ini['db_name'];

            //  die("mysql:host=".$this->serveur.';' .'dbname='.$this->bdd) ; 
            $this->instancePdo = new PDO("mysql:host=" . $this->serveur . ';' . 'dbname=' . $this->bdd, $this->user, $this->mdp);

            $this->instancePdo->query("SET CHARACTER SET utf8");
        }catch (PDOException $e)
        {
            $this->instancePdo = new PDO("mysql:host=" . $this->serveur, $this->user, $this->mdp);
            $this->initDbIfNotExists();

            $e->getMessage();
        }
    }

    /**
    * Permet de réinitialiser la base de données
    *
    * @param bool $force Permet de forcer la réinitialisation même si la base de données existe déjà    
    * 
    * @return bool True en cas d'initialisation
    *
    * @access private
    */
    private function initDbIfNotExists(bool $force = false){
        if (!$this->dbExists($this->bdd) || $force){
            $query = file_get_contents(dirname(__DIR__) . "/assets/bdd.sql");
            $stmt = $this->instancePdo->prepare($query);
            if($stmt->execute()){
                return 1;
            };
        };
        return -1; // Bdd non créée 
    }

    /**
    * Permet de vérifier que la base de données existe
    *
    * @param string $dbname Nom de la base de données 
    * 
    * @return bool True si la base de données existe, False si elle n'existe pas 
    *
    * @access private
    */
    private function dbExists($dbname){
        try {
            // $query = sprintf("SELECT COUNT(*) FROM information_schema.schemata WHERE schema_name = '%s'", $dbname);
            $query = "SHOW DATABASES LIKE '$dbname'";

            $stmt = $this->instancePdo->prepare($query);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count > 0) {
                // echo "La base de données existe.";
                return 1;
            } else {
                // echo "La base de données n'existe pas.";
                return 0;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
    *
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
    * @param bool $affiche True : Récupérer les films seulement si ils ont une affiche, False : Récupérer tous les films
    *
    * @access public
    * @return array Contient les données du contenu vidéo dont l'id correspond
    */
    public function getContentsFromDB(bool $affiche = FALSE) : array
    {
        $jointure = $affiche ? "LEFT JOIN" : "INNER JOIN";
        // on récupère les films et leurs affiches
        $req = sprintf("
            SELECT c.id, c.title AS titre_contenu, c.release_year, c.duration, c.number_of_seasons, cp.url_affiche, c.rating FROM contents AS c %s contents_profiles AS cp ON cp.idContent = c.id
        ", $jointure);
        $stmt = $this->instancePdo->prepare($req);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
    * Permet de récupérer l'intégralité des données d'un contenu vidéo de la base de données
    *
    * @param int $id Identifiant d'un contenu vidéo dans la base de données
    * @param bool $type Genre du contenu, "movies" = 0, "tv_shows" = 1
    *
    * @access public
    * @return array Contient les données d'un contenu de la table "app_contents" dont l'id correspond
    */
    public function getContentFromDB($id, $type) : array
    {
        $type = $type ? "tv_shows" : "movies";

        $req = sprintf("SELECT title, release_year, duration, rating FROM %s WHERE id = %s", $this->instancePdo->quote($type), $this->instancePdo->quote($id));
        $stmt = $this->instancePdo->prepare($req);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
    * Permet de récupérer l'intégralité des données d'un contenu vidéo de la base de données
    *
    * @param string $identifiant identifiant entré par l'utilisateur
    * @param string $motDePasse mot de passe entré par l'utilisateur
    *
    * @access public
    * @return bool — TRUE en cas de succès ou FALSE en cas d'échec.
    */
    public function inscriptionUser($email, $identifiant, $motDePasse)
    {
        $req = sprintf("INSERT INTO users(username, password, email, subscription_type) VALUES(%s, %s, %s, 'free')", $this->instancePdo->quote($identifiant), $this->instancePdo->quote(password_hash($motDePasse, PASSWORD_DEFAULT)), $this->instancePdo->quote($email));
        $stmt = $this->instancePdo->prepare($req);

        return $stmt->execute();
    }
}
	
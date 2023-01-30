<?php
/**
* Modele User
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

require_once 'PdoApp.php';
class User{
    private PdoApp $pdo;

    public function __construct(
        private int|null $id,
        private string $username,
        private string $password,
        private string $email,
        private int|null $sub_type,
        private string|null $created_at,
    ){
        $this->pdo = new PdoApp();
    }

    /**
     * Inscrit l'utilisateur à la base de données
     * 
     * @access public
     * @return array|bool True en cas de succès ou tableau d'erreurs en cas d'échec
     */
    public function ajoute() : array|bool
    {
        // Liste des erreurs rencontrées
        $erreurs = [];

        // Liste des vérifications 
        $verifications = array(
            "L'adresse mail n'est pas valide." => filter_var($this->email, FILTER_VALIDATE_EMAIL),
            "L'adresse mail est déjà assigné à un utilisateur." => $this->emailNonExistant($this->email),
            "Le nom d'utilisateur est déjà assigné à un utilisateur." => $this->usernameNonExistant($this->username),
        );

        // Pour chaque vérification, si elle n'est pas validé stocker l'erreur dans la liste des erreurs rencontrées
        foreach($verifications as $description => $condition)
        {
            $condition ? "" : $erreurs[] = $description;
        }

        if(!empty($erreurs))
        {
            return $erreurs;
        }

        // code to insert the user in the database
        $req = sprintf("INSERT INTO app_users(`username`, `password`, `email`, `subscription_type`, `created_at`) VALUES(%s, %s, %s, '1', NOW())", 
            $this->pdo->getInst()->quote("$this->username"),
            $this->pdo->getInst()->quote(password_hash($this->password, PASSWORD_DEFAULT)),
            $this->pdo->getInst()->quote($this->email)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        // print_r($stmt);
        $stmt->execute();

        return True;
    }

    public function supprime() : void
    {
        // code to delete the user from the database
        $req = sprintf("DELETE FROM `app_users` WHERE `users`.`id` = %s", 
            $this->pdo->getInst()->quote($this->id)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
    }

    public function connexion() : array|bool
    {
        // code to connect user

        // Liste des erreurs rencontrées
        $erreurs = [];

        // L'utilisateur peut choisir de se connecter avec son adresse mail ou son nom d'utilisateur
        $identifiant = empty($this->username) ? $this->email : $this->username;

        $req = sprintf("SELECT id, username, email, password, subscription_type, created_at FROM `app_users` WHERE email = %s OR username = %s", 
            $this->pdo->getInst()->quote($identifiant), $this->pdo->getInst()->quote($identifiant)
        );
        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();

        $res = $stmt->fetch();

        // Liste des vérifications locals
        $verifications = array(
            "L'adresse mail n'est pas valide." => filter_var($this->email, FILTER_VALIDATE_EMAIL),
            "L'identifiant n'est pas valide." => $res === false,
            "Le mot de passe est incorrect." => password_verify($this->password, $res["password"])
        );

        // Pour chaque vérification, si elle n'est pas validé stocker l'erreur dans la liste des erreurs rencontrées
        foreach($verifications as $description => $condition)
        {
            $condition ? "" : $erreurs[] = $description;
        }

        if(!empty($erreurs))
        {
            return $erreurs;
        }

        $_SESSION["user_id"] = $res["id"];
        return 1;
    }

    public function metAjour() : void
    {
        // code to update the user from the database
        $req = sprintf("UPDATE `app_users` SET `username` = %s, `email` = %s; `subscription_type` = %s, `created_at` = %s WHERE `users`.`id` = %s;", 
            $this->pdo->getInst()->quote($this->username),
            $this->pdo->getInst()->quote($this->email),
            $this->pdo->getInst()->quote($this->sub_type),
            $this->pdo->getInst()->quote($this->created_at),
            $this->pdo->getInst()->quote($this->id)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
    }

    /**
     * Vérifie qu'une adresse mail n'existe pas déjà dans la table des utilisateurs
     * 
     * @param string $email
     * 
     * @access private
     * @return bool True si l'adresse mail n'existe pas déjà ou False si elle existe déjà
     */
    private function emailNonExistant(string $email) : bool
    {
        $req = sprintf("SELECT COUNT(*) FROM `app_users` WHERE `email` = %s", 
            $this->pdo->getInst()->quote($email)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();

        return $stmt->fetch()[0] == 0 ? True : False;
    }

    /**
     * Vérifie qu'un nom d'utilisateur n'existe pas déjà dans la table des utilisateurs
     * 
     * @param string $username
     * 
     * @access private
     * @return bool True si le nom d'utilisateur n'existe pas déjà ou False si elle existe déjà
     */
    private function usernameNonExistant(string $username) : bool
    {
        $req = sprintf("SELECT COUNT(*) FROM `app_users` WHERE `username` = %s", 
            $this->pdo->getInst()->quote($username)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();

        return $stmt->fetch()[0] == 0 ? True : False;
    }
}
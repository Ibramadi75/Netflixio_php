<?php
/**
* User model
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

namespace App\Models;
use App\lib\PdoApp;

require_once dirname(__DIR__) . '/lib/PdoApp.php';
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
    public function add() : array|bool
    {
        // Liste des erreurs rencontrées
        $errors = [];

        // Liste des vérifications 
        $verifications = array(
            "L'adresse mail n'est pas valide." => filter_var($this->email, FILTER_VALIDATE_EMAIL),
            "L'adresse mail est déjà assigné à un utilisateur." => $this->emailDoesNotExists($this->email),
            "Le nom d'utilisateur est déjà assigné à un utilisateur." => $this->usernameDoesNotExists($this->username),
        );

        // Pour chaque vérification, si elle n'est pas validé stocker l'erreur dans la liste des erreurs rencontrées
        foreach($verifications as $description => $condition)
        {
            $condition ? "" : $erreurs[] = $description;
        }

        if(!empty($errors))
        {
            return $errors;
        }

        // code to insert the user in the database
        $req = sprintf("INSERT INTO app_users(`username`, `password`, `email`, `subscription_type`, `created_at`) VALUES(%s, %s, %s, '1', NOW())", 
            $this->pdo->getInst()->quote("$this->username"),
            $this->pdo->getInst()->quote(password_hash($this->password, PASSWORD_DEFAULT)),
            $this->pdo->getInst()->quote($this->email)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();

        return True;
    }

    public function delete() : void
    {
        // code to delete the user from the database
        $req = sprintf("DELETE FROM `app_users` WHERE `users`.`id` = %s", 
            $this->pdo->getInst()->quote($this->id)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
    }

    public function connection() : array|bool
    {
        // code to connect user

        // encountered errors 
        $errors = [];

        // User can connect with mail address or username
        $identifier = empty($this->username) ? $this->email : $this->username;

        $req = sprintf("SELECT id, username, email, password, subscription_type, created_at FROM `app_users` WHERE email = %s OR username = %s", 
            $this->pdo->getInst()->quote($identifier), $this->pdo->getInst()->quote($identifier)
        );
        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();

        $res = $stmt->fetch();

        // List of local verifications
        $verifications = array(
            "L'adresse mail n'est pas valide." => filter_var($this->email, FILTER_VALIDATE_EMAIL),
            "L'identifiant n'est pas valide." => $res === false,
            "Le mot de passe est incorrect." => password_verify($this->password, $res["password"])
        );

        // For each verification, if is not validated, store the error in errors array
        foreach($verifications as $description => $condition)
        {
            $condition ? "" : $errors[] = $description;
        }

        if(!empty($errors))
        {
            return $errors;
        }

        $_SESSION["user_id"] = $res["id"];
        return 1;
    }

    public function update() : void
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
     * Verify that email address does not exists in the table
     * 
     * @param string $email
     * 
     * @access private
     * @return bool True if exist, False if not
     */
    private function emailDoesNotExists(string $email) : bool
    {
        $req = sprintf("SELECT COUNT(*) FROM `app_users` WHERE `email` = %s", 
            $this->pdo->getInst()->quote($email)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();

        return $stmt->fetch()[0] == 0 ? True : False;
    }

    /**
     * Verify that a username does not exist in the users table
     * 
     * @param string $username
     * 
     * @access private
     * @return bool True if exist or False if not
     */
    private function usernameDoesNotExists(string $username) : bool
    {
        $req = sprintf("SELECT COUNT(*) FROM `app_users` WHERE `username` = %s", 
            $this->pdo->getInst()->quote($username)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();

        return $stmt->fetch()[0] == 0 ? True : False;
    }
}
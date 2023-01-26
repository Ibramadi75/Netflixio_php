<?php
/**
* Modele User
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

require_once 'PdoApp.php';
class User{
    public function __construct(
        private int|null $id,
        private string $username,
        private string $password,
        private string $email,
        private int|null $sub_type,
        private string|null $created_at,
        private $pdo = new PdoApp()
    ){
    }

    public function ajoute() {
        // code to insert the user in the database
        $req = sprintf("INSERT INTO users(`username`, `password`, `email`, `subscription_type`, `created_at`) VALUES(%s, %s, %s, 'free', NOW())", 
            $this->pdo->getInst()->quote("$this->username"),
            $this->pdo->getInst()->quote(password_hash($this->password, PASSWORD_DEFAULT)),
            $this->pdo->getInst()->quote($this->email)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
    }

    public function supprime() {
        // code to delete the user from the database
        $req = sprintf("DELETE FROM `users` WHERE `users`.`id` = %s", 
            $this->pdo->getInst()->quote($this->id)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
    }

    public function metAjour() {
        // code to update the user from the database
        $req = sprintf("UPDATE `users` SET `username` = %s, `email` = %s; `subscription_type` = %s, `created_at` = %s WHERE `users`.`id` = %s;", 
            $this->pdo->getInst()->quote($this->username),
            $this->pdo->getInst()->quote($this->email),
            $this->pdo->getInst()->quote($this->sub_type),
            $this->pdo->getInst()->quote($this->created_at),
            $this->pdo->getInst()->quote($this->id)
        );
    }
}
<?php
/**
* Modele User
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/
require 'PdoApp.php';
class User{
    public function __construct(
        private int|null $id,
        private string $username,
        private string $password,
        private string $email,
        private int|null $sub_type,
        private string|null $created_at
    ){}

    public function ajoute() {
        // code to insert the user in the database
        $req = sprintf("INSERT INTO users(username, password, email, subscription_type,created_at) VALUES(%s, %s, %s, 'free', NOW()", PdoApp::getPdo()->quote($this->username), PdoApp::getPdo()->quote($this->password), PdoApp::getPdo()::quote($this->email));
        $stmt = PdoApp::getPdo()::prepare($req);
        $stmt->execute();
    }

    public function supprime() {
        // code to delete the user from the database
    }

    public function metAjour() {
        // code to update the user from the database
    }
}
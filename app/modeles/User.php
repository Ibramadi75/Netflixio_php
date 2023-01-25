<?php

class User{
    public function __construct(
        private int $id,
        private string $username,
        private string $password,
        private string $email,
        private int $sub_type,
        private string $created_at
    ){}

    public function ajoute() {
        // code to insert the user in the database
    }

    public function supprime() {
        // code to delete the user from the database
    }

    public function metAjour() {
        // code to update the user from the database
    }
}
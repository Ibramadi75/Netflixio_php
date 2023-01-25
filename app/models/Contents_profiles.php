<?php

class Contents_profiles{
    public function __construct(
        private int $id,
        private int $idContent,
        private string $url_affiche
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
<?php

class Subscription_types{
    public function __construct(
        private int $id,
        private string $libelle,
        private float $price,
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
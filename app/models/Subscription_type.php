<?php

class Subscription_types{
    public function __construct(
        private int $id,
        private string $libelle,
        private float $price,
    ){}

    public function add() {
        // code to insert the user in the database
    }

    public function delete() {
        // code to delete the user from the database
    }

    public function update() {
        // code to update the user from the database
    }
}
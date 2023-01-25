<?php

class Contents{
    public function __construct(
        private int $id,
        private string $title,
        private int $release_year,
        private int $duration,
        private int $number_of_seasons,
        private float $rating
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
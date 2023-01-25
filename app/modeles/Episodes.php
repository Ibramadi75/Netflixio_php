<?php

class Episodes{
    public function __construct(
        private int $id,
        private string $title,
        private string $description,
        private int $season_number,
        private int $episode_number,
        private int $duration,
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
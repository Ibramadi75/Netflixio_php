<?php

namespace App\Models;
use App\lib\PdoApp;

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
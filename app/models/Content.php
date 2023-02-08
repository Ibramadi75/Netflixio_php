<?php

namespace App\Models;
use App\lib\PdoApp;

class Contents{
    public function __construct(
        private int $id,
        private string $title,
        private int $release_year,
        private int $duration,
        private int $number_of_seasons,
        private float $rating
    ){}

    public function addslashes() {
        // code to insert the user in the database
    }

    public function delete() {
        // code to delete the user from the database
    }

    public function update() {
        // code to update the user from the database
    }
}
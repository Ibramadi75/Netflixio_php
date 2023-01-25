<?php

class User_watch_history{
    public function __construct(
        private int $id,
        private int $user_id,
        private int $idContent,
        private int $episode_id,
        private string $watch_date,
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
<?php

class User_watch_history{
    public function __construct(
        private int $id,
        private int $user_id,
        private int $idContent,
        private int $episode_id,
        private string $watch_date,
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
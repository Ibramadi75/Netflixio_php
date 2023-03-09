<?php


/**
 * 
 * Usefull methods that can be used in the entire program
 * @author Ibrahim MADI
 */

class Utility
{
    static function Router() : string
    {
        /*** Getting Route key ***/
        $origine = str_replace(dirname($_SERVER["PHP_SELF"]), "", $_SERVER["REQUEST_URI"]);
        $origine = substr($_SERVER["REQUEST_URI"], strpos($origine, "Netflixio_php") + strlen("Netflixio_php"), strlen($_SERVER["REQUEST_URI"]));

        /*** ROUTES ***/
        $routes = match ($origine) {
            "connexion", "login" => "login",
            "inscription", "register" => "register",
            default => "home"
        };

        // disconnect user
        if($routes === "deconnexion")
        {
            unset($_SESSION["user_id"]);
            $routes = "connexion";
        }

        // If User is connected, he can't access connection and registration page
        if(isset($_SESSION["user_id"]))
        {
            $routes = match ($origine) { default => "profil" };
        }

        return $routes;
    }
}
<?php
if(isset($_POST['connexion_form'])){
    require (__DIR__ . "\\traitement_connexion.php");
}
elseif(isset($_POST['inscription_form'])){
    require (__DIR__ . "\\traitement_inscription.php");
}

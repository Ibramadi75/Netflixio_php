<?php
    require "modules/modHeader.php";
?>
<link rel="stylesheet" href="public/assets/styles/formulaires.css">
<div class="container mainContainer">
    <div class="formulaire_container">
        <h1>S'inscrire</h1>
        <form action="" method="POST">
            <div class="parent" style="position:relative">
                <input onfocusout="unfocus(this.id)" onclick="focused(this.id)" type="text" name="identifiantUser" id="identifiantUser">
                <label id="identifiantUser_label" for="identifiantUser">Nom d'utilisateur</label>
            </div>
            <div class="parent" style="position:relative">
                <input onfocusout="unfocus(this.id)" onclick="focused(this.id)" type="text" name="emailUser" id="emailUser">
                <label id="emailUser_label" for="emailUser">Adresse e-mail</label>
            </div>
            <div class="parent" style="position:relative">
                <input onfocusout="unfocus(this.id)" onclick="focused(this.id)" type="password" name="motDePasseUser" id="motDePasseUser">
                <label id="motDePasseUser_label" for="motDePasseUser">Mot de passe</label>
            </div>
            <div class="parent" style="position:relative">
                <input onfocusout="unfocus(this.id)" onclick="focused(this.id)" type="password" name="confirmMotDePasseUser" id="confirmMotDePasseUser">
                <label id="confirmMotDePasseUser_label" for="confirmMotDePasseUser">Confirmation du mot de passe</label>
            </div>
            <div class="submitCont">
                <input type="submit" name="inscription_form" value="S'identifier">
            </div>
        </form>
        <a href="<?= ROOT ?>/connexion">Se connecter</a>
    </div>
</div>

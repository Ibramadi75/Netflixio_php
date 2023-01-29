<?php
    require "composants/header.php";
?>
<div class="container mainContainer">
    <div class="formulaire_container">
        <h1>S'identifier</h1>
        <form action="" method="POST">
            <div class="parent" style="position:relative">
                <input type="text" onfocusout="unfocus(this.id)" onclick="focused(this.id)" name="identifiantUser" id="identifiantUser">
                <label id="identifiantUser_label" for="identifiantUser">Adresse e-mail</label>
            </div>
            <div class="parent" style="position:relative">
                <input type="password" onfocusout="unfocus(this.id)" onclick="focused(this.id)" name="motDePasseUser" id="motDePasseUser">
                <label id="motDePasseUser_label" for="motDePasseUser">Mot de passe</label>
            </div>
            <div class="submitCont">
                <input type="submit" name="connexion_form" value="S'identifier">
            </div>
        </form>
        <a href="<?= $_SERVER['REQUEST_URI'] ?>inscription">S'inscrire</a>
    </div>
</div>
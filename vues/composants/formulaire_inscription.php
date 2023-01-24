<div class="connexion">
    <h1>S'inscrire</h1>
    <form action="" method="POST">
        <div class="parent" style="position:relative">
            <input type="text" name="identifiantUser" id="identifiantUser">
            <label for="identifiantUser">Nom d'utilisateur</label>
        </div>
        <div class="parent" style="position:relative">
            <input type="text" name="emailUser" id="emailUser">
            <label for="emailUser">Adresse e-mail</label>
        </div>
        <div class="parent" style="position:relative">
            <input type="password" name="motDePasseUser" id="motDePasseUser">
            <label for="motDePasseUser">Mot de passe</label>
        </div>
        <div class="parent" style="position:relative">
            <input type="password" name="confirmMotDePasseUser" id="confirmMotDePasseUser">
            <label for="confirmMotDePasseUser">Confirmation du mot de passe</label>
        </div>
        <div class="submitCont">
            <input type="submit" name="inscription_form" value="S'identifier">
        </div>
    </form>
    <a href="<?= $new_url ?>/connexion">Se connecter</a>
</div>

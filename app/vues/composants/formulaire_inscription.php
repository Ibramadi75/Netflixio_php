<div class="formulaire_container">
    <h1>S'inscrire</h1>
    <form action="" method="POST">
        <div class="parent" style="position:relative">
            <input onclick="focused(this.id)" type="text" name="identifiantUser" id="identifiantUser">
            <label id="identifiantUser_label" for="identifiantUser">Nom d'utilisateur</label>
        </div>
        <div class="parent" style="position:relative">
            <input onclick="focused(this.id)" type="text" name="emailUser" id="emailUser">
            <label id="emailUser_label" for="emailUser">Adresse e-mail</label>
        </div>
        <div class="parent" style="position:relative">
            <input onclick="focused(this.id)" type="password" name="motDePasseUser" id="motDePasseUser">
            <label id="motDePasseUser_label" for="motDePasseUser">Mot de passe</label>
        </div>
        <div class="parent" style="position:relative">
            <input onclick="focused(this.id)" type="password" name="confirmMotDePasseUser" id="confirmMotDePasseUser">
            <label id="confirmMotDePasseUser_label" for="confirmMotDePasseUser">Confirmation du mot de passe</label>
        </div>
        <div class="submitCont">
            <input type="submit" name="inscription_form" value="S'identifier">
        </div>
    </form>
    <a href="<?= $new_url ?>/connexion">Se connecter</a>
</div>

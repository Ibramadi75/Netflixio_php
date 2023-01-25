<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Netflix</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="topbar">
        <div class="container navContainer">
            <span class="nouveau">
                Nouveau !
            </span>
            <p style="display:inline-block" href="#" class="nav-item">Offres désormais disponibles à partir de <strong>5,99 €</strong>./mois</p> <a class="ensavoirplus" href="">En savoir plus</a>
        </div>
    </div>
    <div style="position:relative;">
        <img id="Netflixio_Logo" src="vues\contents\Netflixio_Logo.png" alt="Logo netflixio">
    </div>
    <div class="container mainContainer">
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

    </div>
</body>
</html>
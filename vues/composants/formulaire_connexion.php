<div class="connexion">
    <h1>S'identifier</h1>
    <form action="">
        <div class="parent" style="position:relative">
            <input type="text" name="identifiantUser" id="identifiantUser">
            <label for="identifiantUser">Adresse e-mail</label>
        </div>
        <div class="parent" style="position:relative">
            <input type="password" name="motDePasseUser" id="motDePasseUser">
            <label for="motDePasseUser">Mot de passe</label>
        </div>
        <div class="submitCont">
            <input type="submit" value="S'identifier">
        </div>
    </form>
    <a href="">S'inscrire</a>
</div>
<style>
    .submitCont {
        background: #e50914;
        border-radius: 10px;
    }

    .connexion {
        color: white;
        width: 300px;
        height: fit-content;
        margin: 0 auto;
        padding: 1em;
        border-radius: 10px;
        padding: 40px;
        text-align: center;
        background-color: rgba(0, 0, 0, .75);
    }

    .connexion h1 {
        margin-bottom: 1em;
        font-size: 1.5em;
    }

    .connexion form {
        margin-bottom: 1em;
    }

    .connexion form label {
        position: absolute;
        left: 20px;
        top: 1em;
        background-color: none;
        color: #8c8c8c;
    }

    .parent>* {
        transition: .1s;
    }

    .parent>input:focus+label {
        font-size: 12px;
        top: 2px;
    }

    .parent {
        background: #333;
        margin-bottom: 1em;
    }


    .connexion form input[type="text"],
    .connexion form input[type="password"] {
        font-size: 20px;
        color: #8c8c8c;
        background: none;
        width: 100%;
        padding: .5em 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .connexion form input[type="submit"] {
        background-color: black;
        color: white;
        padding: 1em 1em;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background: none;
        font-size: 16px;
    }

    .connexion a {
        display: inline-block;
        margin-top: 1em;
        color: #8c8c8c;
        text-decoration: none;
    }
</style>
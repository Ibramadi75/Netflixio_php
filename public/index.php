<script defer>
    function erreur_animation() {
        elements = document.getElementsByClassName("notif_erreur");
        // console.log(el);
        // el.style.animation = "notif_erreur 5s forwards";
        // el.Style.backgroundColor = "blue";


        var delay = 0;
        // Or
        [].forEach.call(elements, function(el) {
            setTimeout(() => {
                el.style.animation = "notif_erreur 5s forwards";
                el.style.opacity = "1";
            }, delay)
            delay += 300;
        });
    }
</script>

<?php
/**
 * Page index 
 *
 * @author Ibrahim Madi <ibrahim75madi@gmail.com>
 * @version 0
 */

// require_once __DIR__ . '/includes/class.PdoNetflixio.php';
require_once dirname(__DIR__) . '/includes/class.MetteurEnScene.php';
require_once dirname(__DIR__) . '/app/controleurs/Controleur.php';
require_once dirname(__DIR__) . '/app/models/PdoApp.php';
require_once dirname(__DIR__) . '/app/models/App.php';
require_once dirname(__DIR__) . '/app/models/Erreur.php';

// Crée une instance du contrôleur, du metteur en scène et du PDO 
$ctrl = new Controleur(__DIR__);
$mesc = new MetteurEnScene();
$pdo = new PdoApp();


?>
<style>
    <?php
    // Je n'arrive pas à récupérer les css avec les feuilles de styles, pourquoi ? On va faire comme ça pour le moment
    echo file_get_contents(__DIR__ . '/assets/styles/formulaires.css');
    echo file_get_contents(__DIR__ . '/assets/styles/global.css');
    echo file_get_contents(__DIR__ . '/assets/styles/pannel.css');
    echo file_get_contents(__DIR__ . '/assets/styles/erreurs.css');
    ?>
</style>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/styles/global.css">
    <link rel="stylesheet" href="assets/styles/formulaires.css">
    <link rel="stylesheet" href="assets/styles/pannel.css">
</head>

<body>
    <?php
    require_once dirname(__DIR__) . "/route/Route.php";
    ?>
</body>

</html>

<script>
    function focused(el) {
        // On récupère le label associé
        el_label = document.getElementById(el + "_label");
        el_label.style.fontSize = "12px";
        el_label.style.top = "0px";
    }

    function unfocus(el) {
        el_label = document.getElementById(el + "_label");
        el = document.getElementById(el);
        if (el.value.length == 0) {
            el_label.style.fontSize = "16px";
            el_label.style.top = "1em";
        }
    }
</script>
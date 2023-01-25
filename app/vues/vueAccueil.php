<?php
  require_once dirname(__DIR__) . '/includes/class.PdoNetflixio.php';
  require_once dirname(__DIR__) . '/includes/class.MetteurEnScene.php';
  $bdd = new PdoNetflixio();
  $mesc = new MetteurEnScene();
  require __DIR__ . '\traitement\control_traitement.php';
  ?>

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
  

</body>

</html>


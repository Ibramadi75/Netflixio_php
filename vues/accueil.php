<?php
  require_once dirname(__DIR__) . '/includes/class.pdoNetflixio.php';
  require_once dirname(__DIR__) . '/includes/class.metteurEnScene.php';
  $bdd = new PdoNetflixio();
  $mesc = new MetteurEnScene();
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
  <div class="container mainContainer">
    <?= $mesc->lesCartesAffichesStandard($bdd->getContentsFromDB(), 2); ?>
    <!-- https://flxt.tmsimg.com/assets/p9932851_b_h9_ab.jpg FUTURAMA -->
  </div>
</body>

</html>

<style>
  /* Styles Globaux */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: #123347;

    min-width: 100vw;
    min-height: 100vh;
    background: linear-gradient(43deg, #cc080a 0%, #e55c5c 35%, #122b42 90%);
  }

  /* Styles de la barre de navigation */
  .topbar {
    background-color: #fff;
    font-size: 21px;
    display: flex;
    justify-content: space-between;
    padding: 0px 20px;
    margin-bottom: 60px;
  }

  .nouveau{
    background-color: red;
    border-radius:30px;
    height:fit-content;
    color: white;
    font-size: 12px;
    font-weight: 700;
    padding: 5px 10px;
    text-transform: uppercase;
  }

  .row{
    background-color: green;
  }

  .mainContainer{
    display: flex;
  }

  .ensavoirplus{
    align-items: center;
    display: flex;
    font-size: 1rem;
    font-weight: 700;
    justify-content: center;
    text-decoration: none;
  }

  .nav-item {
    color: black;
    text-decoration: none;
    padding: 0 10px;
  }

  .carteAffiche:hover{
    z-index:99;
  }

  /* Styles des conteneurs */
  .container {
    max-width: 1200px;
    margin: auto;
  }

  /* Styles des titres */
  .title {
    text-align: center;
    margin-top: 50px;
  }

  .navContainer{
    display: flex;
    align-items: center;
  }

  .image-container {
    width:300px;
    height: 220px;
    transition: .3s;
    transform: scale(1);
    overflow: hidden;
  }
  /* Styles des vignettes */
  .thumbnail {
    background-color: #f5f5f5;
    overflow: hidden;


    transition: .3s;
  }
  .image-container:hover{
    transform: scale(1.1);
    z-index: 99;
  }

  .thumbnail img {
    /* width: inherit;
    width: -webkit-fill-available; */
    width: -moz-available;
  }

  .caption {
    position: absolute;
    padding: 20px;
  }

  .caption .title {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .blurred-image {
    filter: blur(3px);
  }

  .overlay-text {
    position: absolute;
    background-color: rgba(255, 255, 255, 0.4);
    width: 100%;
    height:0%;
    bottom: 0%;
    left: 50%;
    transform: translate(-50%, -0%);
    color: black;
    transition: .3s;
    text-align: center;
    font-weight: 700;
  }

  .overlay-text > p{
    font-size: 20px;
  }

  .thumbnail:hover + .overlay-text, .overlay-text:hover{
    height: 30%;
  }
</style>
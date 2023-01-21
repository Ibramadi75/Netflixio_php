<?php

/**
* Classe MetteurEnScene qui va permettre à partir de données de créer et structurer les composants réguliers de l'applications
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

class MetteurEnScene {

    /* Méthodes */

    /**
     * Génère la carte d'un contenu à partir de son titre et de son affiche
     * 
     * @param string $titre_contenue titre du contenue
     * @param string $url_affiche url de l'image faisant office d'affiche du contenue
     */
    private function carteAfficheStandard($titre_contenu, $url_affiche){
        echo '
        <a href="" class="carteAffiche">
            <div class="image-container">
            <img class="thumbnail" src="'.$url_affiche.'" class="blurred-image">
            <div class="overlay-text">
                <p>'.$titre_contenu.'</p>
            </div>
            </div>
        </a>
        ';
    }

    public function lesCartesAffichesStandard(array $contenus, int $row_size){
        $ft = true;
        $i = 0;
        foreach($contenus as $contenu){
            $i++;
            if ($i == $row_size OR $ft){
                echo '<div class="row">';
            }
            $this->carteAfficheStandard($contenu['titre_contenu'], $contenu['url_affiche']);
            if ($i == $row_size){
                echo '</div>';
                $i = 0;
            }
            $ft = false;
        } // à fixer
    }
}
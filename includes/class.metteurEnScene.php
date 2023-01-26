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

    /**
     * Organise les cartes généré à partir de la méthode carteAfficheStandard
     * 
     * @param array $contenus contient les informations sur les contenus
     * @param int $row_size permet de définir le nombre de carte à afficher par ligne défini à 3 par défaut
     */
    public function lesCartesAffichesStandard(array $contenus, int $row_size = 3){ 
        $i = 0;
        foreach($contenus as $contenu){
            if($i == 0):
                echo '<div class="row">';
            endif;
            $this->carteAfficheStandard($contenu['titre_contenu'], $contenu['url_affiche']);
            if($i == $row_size-1):
                echo '</div>';
                $i = -1;
            endif;
            $i++;
        } // à fixer 
    }

    /**
     * Permet d'afficher une notification à l'utilisateur
     * 
     * @param string $message contient le message à afficher dans la notification
     * @param string|bool $type permet de définir le type de notification "erreur"|0 ou "succes"|1
     */
    public function notifEntete(string $message, string|bool $type = "succes"){
        if($type == "succes"){
            $type = 1;
        }else if($type == "erreur"){
            $type = 0;
        }

        if($type){
            echo "<div style='position:sticky;top:0;width:100%;background:black;color:white;text-align:center;padding:10px 10px;' class='notif_head'>
                $message
            </div>";
        }else{
            echo "<div style='position:sticky;top:0;width:100%;background:red;color:white; text-align:center;padding:10px 10px;' class='notif_head'>
                $message
            </div>";
        }
    }
}
<?php
/**
* Modele App
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

require_once 'PdoApp.php';

class App{
    private PdoApp $pdo;
    private int|null $id;

    public function __construct(
        private string $root
    ){
        $this->pdo = new PdoApp();
        
        if($this->getCountTable("config_paths")){
            $this->initApp();
        }
    }

    /**
     * Retourne le nombre de champs dans la table spécifiée en paramètre
     * 
     * @param string $table Le nom de la table
     * 
     * @access private
     * @return string Le nombre de champs dans la table spécifiée en paramètre
     */
    private function getCountTable(string $table){
        $req = sprintf("SELECT COUNT(*) FROM %s", 
            $table
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        // print_r($stmt);
        $stmt->execute();
    }

    /**
     * Récupère l'id de la configuration la plus récente
     * => Permet de définir la dernière configuration créer comme la configuration active
     * 
     * @access private
     * @return int id de la configuration la plus récente
     * 
     * à fix : que se passe-t-il si la table n'existe pas ? Peut-être faudrait-t-il retourner -1 ?
    */
    private function getIdApp(){
        $req = sprintf("SELECT max(id) FROM config_paths;");

        return $this->pdo->getInst()->query($req);
    }

    /**
     * Initialise l'application lors de son premier lancement
     * 
     * @access public
     * @return bool false en cas d'échec
     */
    public function initApp() {
        // assigne l'url de la racine de l'application
        $req = sprintf("INSERT INTO config_paths(`rootPath`) VALUES(%s);", 
            $this->pdo->getInst()->quote($this->root)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        print_r($stmt);
        if($stmt->execute()){
            // On récupère l'id de l'app
            $this->id = $this->getIdApp();
            return true;
        }

        return false;
    }
}
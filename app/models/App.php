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

    public function getCountTable(string $table){
        $req = sprintf("SELECT COUNT(*) FROM %s", 
            $table
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        // print_r($stmt);
        $stmt->execute();
    }

    public function getIdApp(){
        $req = sprintf("SELECT max(id) FROM config_paths;");

        return $this->pdo->getInst()->query($req);
    }

    public function initApp() {
        // assigne l'url de la racine de l'application
        $req = sprintf("INSERT INTO config_paths(`rootPath`) VALUES(%s);", 
            $this->pdo->getInst()->quote($this->root)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        print_r($stmt);
        $stmt->execute();

        // On récupère l'id de l'app
        $this->id = $this->getIdApp();
    }
}
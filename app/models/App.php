<?php
/**
* Modele User
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

require_once 'PdoApp.php';
class App{
    public function __construct(
        private int|null $id,
        private string $rootPath, 
        private $pdo = new PdoApp()
    ){
    }
    public function ajoute() {
        // code to insert the user in the database
        $req = sprintf("SELECT rootPath FROM %s", 
            $this->pdo->getInst()->quote($this->pdo->bdd)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
    }
}
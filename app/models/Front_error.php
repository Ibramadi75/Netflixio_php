<?php

namespace App\Models;
use App\lib\PdoApp;

class FrontError {
    private string $description;
    private string $urlBackground;

    public function __construct(
        private int $code,
        private PdoApp $pdo
    ){
        $err = $this->getErrorInfos($this->code);

        $this->description = $err["description"];
        $this->urlBackground = $err["urlBackground"];
    }

    /* Getters et Setters */
    public function getDescription(){
        return $this->description;
    }

    public function getUrlBackground(){
        return $this->urlBackground;
    }

    public function getCode(){
        return $this->code;
    }

    /* Methods */
    private function getErrorInfos(int $code) : array {
        // Get error informations
        $req = sprintf("SELECT description, urlBackground FROM config_erreurs", 
            $this->pdo->getInst()->quote($code)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
        return $stmt->fetch();
    }
}
<?php


class Erreur {
    private string $description;
    private string $urlBackground;

    public function __construct(
        private int $code,
        private PdoApp $pdo
    ){
        $err = $this->getErreurInfos($this->code);

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

    /* Méthodes */
    private function getErreurInfos(int $code) : array {
        // Récupère les infos de l'erreur
        $req = sprintf("SELECT description, urlBackground FROM config_erreurs", 
            $this->pdo->getInst()->quote($code)
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
        return $stmt->fetch();
    }
}
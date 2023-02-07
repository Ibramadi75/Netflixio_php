<?php
/**
* Modele App
*
* @author Ibrahim Madi <ibrahim75madi@gmail.com>
* @version 0
*/

require_once dirname(__DIR__) . '/lib/PdoApp.php';

class App{
    private int|null $id;

    public function __construct(
        private string $root, // Root URL of the app 
        private PdoApp $pdo // PDO instance of the app 
    ){
        // If there are no fields in the config_paths table, initialize the app 
        if($this->getCountTable("config_paths") == 0){
            $this->initApp();
        }
    }

    // Getter the root URL of the app 
    public function getRootUrl() : string
    {
		return $this->root;
	}

    /**
    * Retrieve the number of fields in a specified table
    *
    * @param string $table The name of the table
    *   
    * @access private
    * @return int The number of fields in a specified table, or False if the table does not exist 
    */
    private function getCountTable(string $table) : int|bool
    {
        $req = sprintf("SELECT COUNT(*) FROM %s", 
            $table
        );

        $stmt = $this->pdo->getInst()->prepare($req);
        $stmt->execute();
        $res = $stmt->fetch();

        return isset($res[0]) ? $res[0] : false;
    }

    /**
    * Retrieve id of most recent configuration
    * => Set last created configuration as active configuration
    *
    * @access private
    * @return int id of most recent configuration
    * à fix : que se passe-t-il si la table n'existe pas ? Peut-être faudrait-t-il retourner -1 ?
    */
    private function getIdApp() : int
    {
        $req = sprintf("SELECT max(id) FROM config_paths;");

        $req = $this->pdo->getInst()->query($req);
        return $req->fetch()[0];
    }

    /**
     * Initialize the application on its first launch
     * 
     * @access public
     * @return bool false if failed
     */
    public function initApp() : bool
    {
        // Assign the URL of the application root
        $req = sprintf("INSERT INTO config_paths(`rootPath`) VALUES(%s);", 
            $this->pdo->getInst()->quote($this->root)
        );
    
        $stmt = $this->pdo->getInst()->prepare($req);
        // print_r($stmt);
        if($stmt->execute()){
            // Retrieve the app id 
            $this->id = $this->getIdApp();
            return true;
        }
        return false;
    }
}
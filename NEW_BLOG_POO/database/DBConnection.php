<?php
namespace Database;
use PDO;
use Exception;

class DBConnection {
    private $dbname;
    private $host;
    private $username;
    private $password;
    private $pdo;



    public function __construct(string $dbname, string $host, string $username, string $password) {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;

    }

    public function getPdo() : PDO{
       if($this->pdo === null) {
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=myapp', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("set names utf8");        
                $this->pdo = $pdo;
                            
        } catch(Exception $e) {     
            die('Erreur : '.$e->getMessage());
        }
    }
    return $this->pdo;
}


}
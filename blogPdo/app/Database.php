<?php
namespace App;
use \PDO;
use \Exception;



class Database {
   
    private $db;


    public function __construct($db_host='localhost', $db_name='blog', $db_user='root', $db_pass='') {
        $this->$db_host = $db_host;
        $this->$db_name = $db_name;
        $this->$db_user = $db_user;
        $this->$db_pass = $db_pass;
    }

    private function getPdo(){
       if($this->db === null) {
            try {
                $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->exec("set names utf8"); 
                $this->db = $db;
                            
        } catch(Exception $e) {     
            die('Erreur : '.$e->getMessage());
        }
    }
    return $this->db;
}
    
    public function select($statement, $classname){
        
        $req = $this->getPdo()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $classname);
        return $datas;
    }


    public function prepare($statement, $attributes, $classname, $one = false) {
        $req = $this->getPdo()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $classname);
        if($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

}

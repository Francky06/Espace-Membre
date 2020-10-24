<?php
namespace App;
use \PDO;
use \Exception;



class Database {
   
    private $db;

    private function getPdo(){
       if($this->db === null) {
            try {
                $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->exec("set names utf8"); 
                $this->db = $db;
                return $this->db;            
        } catch(Exception $e) {     
            die('Erreur : '.$e->getMessage());
        }
    }
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

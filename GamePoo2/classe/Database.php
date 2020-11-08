<?php
namespace App;
use \PDO;
use \Exception;



class Database {
   
    private $pdo;

    public function __construct($db_host='localhost', $db_name='game', $db_user='root', $db_pass='') {
        $this->$db_host = $db_host;
        $this->$db_name = $db_name;
        $this->$db_user = $db_user;
        $this->$db_pass = $db_pass;
    }

    public function getPdo(){
       if($this->pdo === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=game', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8"); 
            $this->pdo = $pdo;
            
                           
        } 
    return $this->pdo; 
    }

    public function select() {
            $req ='SELECT * FROM personnages ORDER BY id';
            $resultat = $this->getPdo()->query($req); 
            while($perso = $resultat->fetch(PDO::FETCH_ASSOC)) {                  
            echo $perso['nom'], ' a ', $perso['forcePerso'], ' de force, ', $perso['degats'],
            ' de dégâts, ', $perso['experience'], ' d\'expérience et est au niveau ', $perso['niveau'].'<br>';
                      }
    }

    
    public function test(){
    
                $request = $this->getPdo()->query('SELECT id, nom, degats FROM personnage');                  
                while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) {
                // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
                // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
                $perso = new Personnage($donnees);
                
                echo $perso->getNom(), ' a '. $perso->getDegats(). ' de dégâts'.'<br>';
            }
             
}



}
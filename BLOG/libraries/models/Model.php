<?php
namespace Modeles;
require_once ('libraries/database.php');

    abstract class Model {
        protected $pdo;
        protected $table;
        public function __construct(){
        $this->pdo = getPdo();
    }

     public function find(int $id) {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

        public function delete(int $id): void{
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }


     public function findAll(?string $order=""){
        $resultats = "SELECT * FROM {$this->table}";
        if($order){
            $resultats .=" ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($resultats);
        $articles = $resultats->fetchAll();
        return $articles;
    }
}
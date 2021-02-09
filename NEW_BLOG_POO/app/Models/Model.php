<?php
namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model {

    protected $db;
    protected $table;

    public function __construct(DBConnection $db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->requete("SELECT * FROM ($this->table) ORDER BY created_at DESC");
        /*        
        $stmt = $this->db->getPDO()->query("SELECT * FROM ($this->table) ORDER BY created_at DESC"); 
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $posts = $stmt->fetchAll();
        return $posts;
        */ 
    }

    public function findById(int $id) {
        return $this->requete("SELECT * FROM ($this->table) WHERE id = ?", [$id], true);
    }


    public function destroy(int $id): bool {
        return $this->requete("DELETE FROM posts WHERE id = ?", [$id]);
    }


    public function requete($sql, array $param = null, bool $single = null) {
        $method = is_null($param) ? 'query' : 'prepare';

        if(strpos($sql,'DELETE') === 0 || strpos($sql,'UPDATE') === 0 || strpos($sql,'INSERT') === 0 ) {
            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }

    public function update($id, $data, ?array $relations = null) {
        $sqlPartie = "";
        $i = 1;
        foreach ($data as $key => $value) {
            $virgule = $i === count($data) ? " " : ', ';
            $sqlPartie .= "{$key} = :{$key}{$virgule}";
            $i++;
        }
        $data['id']= $id;
        return $this->requete("UPDATE {$this->table} SET {$sqlPartie} WHERE id =:id", $data);

    }

  
}
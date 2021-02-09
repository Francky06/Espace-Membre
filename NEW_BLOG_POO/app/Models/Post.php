<?php

namespace App\Models;

use DateTime;

class Post extends Model {

 
    protected $table = 'posts';

    public function getCreated_at() {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    public function getExcerpt() {
        return substr($this->content, 0, 250) . '...';
    }

    public function getButton() {
        return <<<HTML
        <a href="./posts/$this->id" class="btn btn-info">Lire l'article</a>
HTML;
    }

    public function getTags() {
        return $this->requete(
            "SELECT t.* FROM tags t 
                INNER JOIN post_tag pt ON pt.tag_id = t.id 
                INNER JOIN posts p ON pt.post_id = p.id
                WHERE p.id = ?"
                , [$this->id]);
    }

    public function update($id, $data, ?array $relations= null) {
        parent::update($id, $data);
        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");
        $result = $stmt->execute([$id]);

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) VALUE (?,?)");
            $stmt->execute([$id, $tagId]);
        }

        if($result) {
            return true;
        }
        
        
    }
}
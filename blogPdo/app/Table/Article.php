<?php
namespace App\Table;
use App\App;

class Article extends Table {

    public static function getLast() {
        return App::getDb()->select('SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
        FROM articles 
        LEFT JOIN categories 
        ON category_id = categories.id ORDER BY date DESC' , __CLASS__);
    }


    public static function lastByCategory($category_id){
        return App::getDb()->prepare('SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
        FROM articles 
        LEFT JOIN categories
        ON category_id = categories.id
        WHERE category_id = ? 
        ORDER BY date DESC' ,[$category_id], __CLASS__);
    }

    public function getUrl() {
        return 'index.php?p=article&id='.$this->id;
    }

    public function getExtrait() {
        $html = '<p>' . substr($this->contenu, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
        
    }

}
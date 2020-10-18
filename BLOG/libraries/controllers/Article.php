<?php
namespace Controllers;
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
require_once 'libraries/models/Comment.php';

class Article {

    protected $model;
    public function __construct() {
        $this->model = new \Modeles\Article();
    }

    public function index() {
   
    $articles = $this->model->findAll("created_at desc");
    $pageTitle = "Accueil";
    render('articles/index', compact('pageTitle', 'articles'));

    }
     public function show() {       
     
        $commentModel = new \Modeles\Comment();
        $article_id = null;
        // Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        // On peut désormais décider : erreur ou pas ?!
        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }
        
        $article = $this->model->find($article_id);
        $commentaires = $commentModel->findAll($article_id);
        $pageTitle = $article['title'];
        render('articles/show',compact('pageTitle','article','commentaires',
        'article_id'));    
     }

    
     public function delete() {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
        $id = $_GET['id'];
        /**
         * 3. Vérification que l'article existe bel et bien
         */
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }
        $model->delete($id);
        redirect('index.php');
            }

    }

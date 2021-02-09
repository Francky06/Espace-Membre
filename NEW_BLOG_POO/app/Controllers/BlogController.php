<?php


namespace App\Controllers;
use PDO;
use App\Models\Tag;
use App\Models\Post;
use Database\DBConnection;

class BlogController extends Controller{


    public function welcome() {
        return $this->view('blog.welcome');
    }

    public function index() {

        $post = new Post($this->getDB());
        $posts = $post->getAll();
        return $this->view('blog.index', compact('posts'));
    }

    public function show (int $id) {

        $post = new Post($this->getDB());
        $post = $post->findById($id);
        return $this->view('blog.show', compact('post'));

    }

    public function tag(int $id) {
        $tag = (new Tag($this->getDB()))->findById($id);
        return $this->view('blog.tag', compact('tag'));
        
    }
}
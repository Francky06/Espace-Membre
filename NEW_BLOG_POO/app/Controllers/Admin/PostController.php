<?php

namespace App\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Controllers\Controller;

class PostController extends Controller {

    public function index() {
        $posts = (new Post($this->getDB()))->getAll();
        return $this->view('admin.post.index', compact('posts'));
        
    }

    public function destroy($id) {
        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if($result) {
            return header('Location: http://localhost/NEW_BLOG_POO/admin/posts');
        }
    }

    public function edit($id) {
        $post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->getAll();
        return $this->view('admin.post.edit', compact('post', 'tags'));
    }

    public function update($id) {
        $post = (new Post($this->getDB()));
        $tags = array_pop($_POST);
        $result = $post->update($id, $_POST, $tags);

        if($result) {
            return header('Location: http://localhost/NEW_BLOG_POO/admin/posts');
        }
    }

    
}
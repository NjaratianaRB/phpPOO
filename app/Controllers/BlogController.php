<?php

namespace App\Controllers;

use App\Models\Post;

class BlogController extends Controller {

    public function welcome()
    {
        return $this->view('blog.welcome');
    }

    public function index()
    {
        $post = new Post($this->getDB());
        $posts = $post->all();

       return $this->view('blog.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post = new Post($this->getDB());
        $post = $post->findBy($id);

       
        return $this->view('blog.show', compact('post'));
    }
}
/** 
 * QUERY
    $req = $this->db->getPDO()->query('SELECT * FROM posts');
        $posts = $req->fetchAll();
        //var_dump($posts);
        foreach ($posts as $post) {
            echo $post->title;
        }
 */
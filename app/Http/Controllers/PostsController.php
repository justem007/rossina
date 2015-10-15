<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Rossina\Http\Requests;
use Rossina\Post;
use Rossina\Repositories\Interfaces\Larasponse;
use Rossina\Repositories\Transformers\PostTransformer;


class PostsController extends ApiController
{
    protected $model;
    protected $fractal;
    protected $apiController;

    public function __construct(Post $model, Larasponse $fractal, ApiController $apiController){
        $this->model = $model;
        $this->fractal = $fractal;
        $this->apiController = $apiController;
    }

    public function all($columns = array('*')){

        $post = $this->model->all();

        return $this->apiController->respondWithCollection($post, new PostTransformer());
    }

    public function find($id, $columns = array('*')){

        $posts = $this->model->find($id, $columns = array('id', 'title', 'text'));

        return $posts;

    }

    public function create(){

        $post = $this->model->create( Input::all() );

        return $post;
    }

    public function update($id){

        $post = $this->model->update( Input::all(), $id );

        return $post;

    }

    public function delete($id){

       $post = $this->model->find($id)->delete();

        return redirect()->route('posts');

    }

    public function contar(){

        return $this->model->contar();
    }
}

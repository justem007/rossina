<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\PostRepositoryEloquent;


class PostsController extends Controller
{
    protected $repository;

    public function __construct(PostRepositoryEloquent $repository){
        $this->repository = $repository;
    }

    public function all($columns = array('*')){

        $post = $this->repository->all($columns = array('id', 'title', 'text'));

        return $post;
    }

    public function find($id, $columns = array('*')){

        $posts = $this->repository->find($id, $columns = array('id', 'title', 'text'));

        if(!$posts){

            return  ['reponse'=> 'Post não encontrado'];
        }

        return $posts;

    }

    public function create(){

        $post = $this->repository->create( Input::all() );

        return $post;
    }

    public function update($id){

        $post = $this->repository->update( Input::all(), $id );

        return $post;

    }

    public function delete($id){

       $post = $this->repository->find($id)->delete();

        return redirect()->route('posts');

    }

    public function contar(){

        return $this->repository->contar();
    }
}

<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Post;
use Rossina\Repositories\Repository\PostRepositoryEloquent as PostRE;
use Rossina\Repositories\Transformers\PostTransformer;

class PostsController extends ApiController
{
    protected $repository;

    protected $apiController;

    public function __construct(PostRE $repository, ApiController $apiController){
        $this->repository = $repository;
        $this->apiController = $apiController;
    }

    public function index(Manager $fractal, PostTransformer $projectTransformer){

        $projects = $this->repository->with(['comments.posts.tags'])->all();

        $collection = new Collection($projects, $projectTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respond($data);


//        return Post::select('id','title', 'text','active')
//            ->with(['tags'=>function($q){
//                $q->select('id','title');
//            }])
//            ->orderBy('id', 'desc')
//            ->take($n)
//            ->get();

    }

    public  function all(){

        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new PostTransformer());

    }

    public function show($id, Manager $fractal, PostTransformer $projectTransformer)
    {
        $project = $this->repository->findOrFail($id);

        $item = new Item($project, $projectTransformer);

        $data = $fractal->createData($item)->toArray();

        return $this->respond($data);
    }

    public function find($id, $columns = array('*')){

        $repository = $this->repository->find($id, $columns = array('id', 'title', 'text'));

        return $repository;

    }

    public function create(){

        $repository = $this->repository->create( Input::all() );

        return $repository;
    }

    public function update($id){

        $repository = $this->repository->update( Input::all(), $id );

        return $repository;

    }

    public function delete($id){

       $repository = $this->repository->find($id)->delete();

        return redirect()->route('posts');

    }

    public function contar(){

        return $this->repository->contar();
    }

    public function last($n=3){

        return Post::select('id','title', 'text','active')
            ->with(['tags'=>function($q){
                $q->select('id','title');
            }])
            ->with(['images'=>function($q){
                $q->select('id','name', 'description');
            }])
            ->with(['comments'=>function($q){
                $q->select('id','text', 'name');
            }])
            ->orderBy('id', 'desc')
            ->take($n)
            ->get();
    }
}

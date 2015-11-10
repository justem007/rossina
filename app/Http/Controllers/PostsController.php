<?php

namespace Rossina\Http\Controllers;

use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\PostRepositoryEloquent as PostRE;
use Rossina\Repositories\Transformers\PostTransformer;

class PostsController extends ApiController
{
    protected $repository;

    protected $apiController;

    public function __construct(PostRE $repository, ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
    }

    public function index(Manager $fractal, PostTransformer $projectTransformer)
    {
        $projects = $this->repository->with(['comments.posts.tags'])->all();

        $collection = new Collection($projects, $projectTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respond($data);
    }

    public  function all()
    {
        $repository = $this->repository->all();

        return $this->apiController->respondWithCollection($repository, new PostTransformer());
    }

    public function show($id, Manager $fractal, PostTransformer $projectTransformer)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $projectTransformer);

        $data = $fractal->createData($item)->toArray();

        if (!$data) {
            return $this->errorNotFound('Você inventou um ID e tentou carregar um local? Idiota.');
        }

        return $this->respond($data);
    }

    public function find($id, $columns = array('*'))
    {
        $repository = $this->repository->find($id, $columns = array('id', 'title', 'text'));

        return $repository;
    }

    public function create()
    {
        $repository = $this->repository->create( Input::all() );

        return $repository;
    }

    public function update($id)
    {
        $repository = $this->repository->update( Input::all(), $id );

        return $repository;
    }

    public function delete($id)
    {
       $repository = $this->repository->find($id)->delete();

        return redirect()->route('posts');
    }

}

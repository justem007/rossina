<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoDoisRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoDoisTransformer;

class BlocoDoisController extends ApiController
{

    /**
     * @var BlocoDoisRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;

    public function __construct(BlocoDoisRepositoryEloquent $repository, ApiController $apiController)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
    }

    public function index()
    {
        $blocodois = $this->repository->all();

        return $this->apiController->respondWithCollection($blocodois, new BlocoDoisTransformer);
    }

    public function show($id, Manager $fractal, BlocoDoisTransformer $blocoDoisTrasnformer)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $blocoDoisTrasnformer);

        $data = $fractal->createData($item)->toArray();

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

<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoCamisetaRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoCamisetaTransformer;

class BlocoCamisetaController extends ApiController
{

    /**
     * @var BlocoCamisetaRepositoryEloquent
     */
    protected $repository;
    /**
     * @var ApiController
     */
    protected $apiController;
    /**
     * @var Manager
     */
    protected $fractal;
    /**
     * @var BlocoCamisetaTransformer
     */
    protected $blocoCamisetaTransformer;

    public function __construct(BlocoCamisetaRepositoryEloquent $repository, ApiController $apiController,
                                 Manager $fractal, BlocoCamisetaTransformer $blocoCamisetaTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoCamisetaTransformer = $blocoCamisetaTransformer;
    }

    public function index()
    {
        $blocoCamiseta = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoCamiseta, $this->blocoCamisetaTransformer);
    }

    public function show($id, Manager $fractal, BlocoCamisetaTransformer $blocoCamisetaTrasnformer)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $blocoCamisetaTrasnformer);

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

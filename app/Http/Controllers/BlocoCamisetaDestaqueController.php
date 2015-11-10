<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Repositories\Repository\BlocoCamisetaDestaqueRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoCamisetaDestaqueTransformer;

class BlocoCamisetaDestaqueController extends ApiController
{
    /**
     * @var BlocoCamisetaDestaqueRepositoryEloquent
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
     * @var BlocoCamisetaDestaqueTransformer
     */
    protected $blocoCamisetaTransformer;

    public function __construct(BlocoCamisetaDestaqueRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, BlocoCamisetaDestaqueTransformer $blocoCamisetaDestaqueTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoCamisetaDestaqueTransformer = $blocoCamisetaDestaqueTransformer;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocoCamiseta = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoCamiseta, $this->blocoCamisetaDestaqueTransformer);
    }

    public function show($id, Manager $fractal, BlocoCamisetaDestaqueTransformer $blocoCamisetaDestaqueTrasnformer)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $blocoCamisetaDestaqueTrasnformer);

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

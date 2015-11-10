<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Rossina\Http\Requests;
use Rossina\Http\Controllers\Controller;
use Rossina\Repositories\Repository\BlocoDoisDestaqueDoisRepositoryEloquent;
use Rossina\Repositories\Transformers\BlocoDoisDestaqueDoisTransformer;

class BlocoDoisDestaqueDoisController extends ApiController
{

    /**
     * @var BlocoDoisDestaqueDoisRepositoryEloquent
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
     * @var BlocoDoisDestaqueDoisTransformer
     */
    protected $blocoDoisDestaqueDoisTransformer;

    public function __construct(BlocoDoisDestaqueDoisRepositoryEloquent $repository, ApiController $apiController,
                                Manager $fractal, BlocoDoisDestaqueDoisTransformer $blocoDoisDestaqueDoisTransformer)
    {
        $this->repository = $repository;
        $this->apiController = $apiController;
        $this->fractal = $fractal;
        $this->blocoDoisDestaqueDoisTransformer = $blocoDoisDestaqueDoisTransformer;
    }

    public function index()
    {
        $blocoDoisDestaqueDois = $this->repository->all();

        return $this->apiController->respondWithCollection($blocoDoisDestaqueDois, $this->blocoDoisDestaqueDoisTransformer);
    }

    public function show($id, Manager $fractal, BlocoDoisDestaqueDoisTransformer $blocoDDDT)
    {
        $project = $this->repository->find($id);

        $item = new Item($project, $blocoDDDT);

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
